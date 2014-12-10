<?php namespace Dimsav\Todo\Repositories; 

use Cache;
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
        return Cache::tags('user_'.$user->id)->remember('get_all_todos_by_user_id_'.$user->id, 60, function() use ($user) {
            \Log::info('not cached');
            return $this->model->where('user_id', $user->id)->get();
        });
    }

    public function findByIdOrFail($id, User $user)
    {
        $todo = Cache::tags('user_'.$user->id)->remember("get_task_by_id_{$id}_user_".$user->id, 60, function() use ($id) {
            \Log::info('not cached');
            return $this->model->find($id);
        });

        if ( ! $todo)
        {
            throw new TodoNotFoundException;
        }
        return $todo;
    }

    public function clearCache(User $user)
    {
        Cache::tags('user_'.$user->id)->flush();
    }
}