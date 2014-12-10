<?php namespace Dimsav\Todo\Services;

use Auth;
use Dimsav\Todo\Exceptions\TodoNotFoundException;
use Dimsav\Todo\Exceptions\ValidationException;
use Dimsav\Todo\Models\Todo;
use Dimsav\Todo\Models\User;
use Dimsav\Todo\Exceptions\UnauthorizedUserException;
use Dimsav\Todo\Repositories\TodoRepository;
use Dimsav\Todo\Validators\TodoValidator;
use Input;

class TodoService {

    /**
     * @var TodoRepository
     */
    private $repo;

    /**
     * @var TodoValidator
     */
    private $todoValidator;

    public function __construct(TodoRepository $repo, TodoValidator $todoValidator)
    {
        $this->repo = $repo;
        $this->todoValidator = $todoValidator;
    }

    /**
     * @return Todo
     * @throws UnauthorizedUserException
     */
    public function getAllByCurrentUserToJson()
    {
        $user = $this->getCurrentUserOrFail();
        return $this->repo->getAllByUser($user);
    }

    /**
     * @param array $attributes
     * @return Todo
     * @throws UnauthorizedUserException
     * @throws ValidationException
     */
    public function create(array $attributes)
    {
        $this->todoValidator->validate($attributes);
        $user = $this->getCurrentUserOrFail();

        $todo = new Todo;
        $todo->text     = Input::get('text');
        $todo->finished = Input::get('finished');
        $todo->user_id  = $user->id;
        $todo->save();

        $this->repo->clearCache($user);
        return $todo;
    }

    /**
     * @param $id
     * @throws ValidationException
     * @throws TodoNotFoundException
     */
    public function updateById($id)
    {
        $this->todoValidator->validate(Input::all());
        $user = $this->getCurrentUserOrFail();
        $todo = $this->repo->findByIdOrFail($id, $user);

        $todo->text     = Input::get('text');
        $todo->finished = Input::get('finished');
        $todo->save();
        $this->repo->clearCache($user);
    }

    public function deleteById($id)
    {
        $user = $this->getCurrentUserOrFail();
        $todo = $this->repo->findByIdOrFail($id, $user);
        $todo->delete();
        $this->repo->clearCache($user);
    }

    /**
     * @return User
     * @throws UnauthorizedUserException
     */
    private function getCurrentUserOrFail()
    {
        if ( ! Auth::check())
        {
            throw new UnauthorizedUserException;
        }
        return Auth::getUser();
    }
}