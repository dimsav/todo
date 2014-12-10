<?php namespace Dimsav\Todo\Services;

use Auth;
use Dimsav\Todo\Models\User;
use Dimsav\Todo\Exceptions\UnauthorizedUserException;
use Dimsav\Todo\Repositories\TodoRepository;

class TodoService {

    /**
     * @var TodoRepository
     */
    private $repo;

    public function __construct(TodoRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAllByCurrentUserToJson()
    {
        $user = $this->getCurrentUserOrFail();
        return $this->repo->getAllByUser($user);
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