<?php namespace Dimsav\Todo\Services;

use Auth;
use Dimsav\Todo\Exceptions\ValidationException;
use Dimsav\Todo\Models\Todo;
use Dimsav\Todo\Models\User;
use Dimsav\Todo\Exceptions\UnauthorizedUserException;
use Dimsav\Todo\Repositories\TodoRepository;
use Dimsav\Todo\Validators\TodoValidator;

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
        return $this->repo->create($attributes, $this->getCurrentUserOrFail());
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