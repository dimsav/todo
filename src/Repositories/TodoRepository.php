<?php namespace Dimsav\Todo\Repositories; 

use Dimsav\Todo\Exceptions\TodoNotFoundException;
use Dimsav\Todo\Models\Todo;
use Dimsav\Todo\Models\User;

class TodoRepository {

    /**
     * @var Todo
     */
    private $model;

    public function __construct(Todo $model)
    {
        $this->model = $model;
    }

    public function getAllByUser(User $user)
    {
        return $this->model->where('user_id', $user->id)->get();
    }

    public function findByIdOrFail($id)
    {
        if ( ! $todo = $this->model->find($id))
        {
            throw new TodoNotFoundException;
        }
        return $todo;
    }
}