<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Database\Eloquent\Model;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Get index data
     *
     * @return array{employees: \Illuminate\Database\Eloquent\Collection<int, \App\Models\User>, statuses: array{cancelled: mixed, completed: mixed, in_progress: mixed, pending: mixed, taskProgress: \Illuminate\Database\Eloquent\Collection<int, \App\Models\User>}}
     */
    public function getIndexData(): array
    {
        return [
            'employees'      => $this->taskRepository->getEmployeesExceptAuth(),
            'statuses'       => $this->taskRepository->getStatusCounts(),
            'taskPendings'   => $this->taskRepository->getTaskPending(),
            'taskInProgress' => $this->taskRepository->getTaskInProgress(),
            'taskCompleteds' => $this->taskRepository->getTaskCompleted(),
            'taskOverdues'   => $this->taskRepository->getTaskOverdue(),
        ];
    }

    /**
     * Create Task
     *
     * @param  array  $data
     * @return \App\Models\Task
     */
    public function createTask(array $data): Task
    {
        return $this->taskRepository->create($data);
    }

    public function updateTask(int $taskId, array $data)
    {
        $task = Task::findOrFail($taskId);

        return $this->taskRepository->update($task, $data);
    }

    public function deleteTask(Model $model)
    {
        return $this->taskRepository->destroy($model);
    }
}
