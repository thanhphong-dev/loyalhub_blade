<?php

namespace App\Repositories;

use App\Enums\TaskStatus;
use App\Interfaces\BaseRepositoryInterface;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TaskRepository implements BaseRepositoryInterface
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Get all task
     *
     * @param  int  $perPage
     */
    public function get(int $perPage)
    {
        return $this->task->query()
            ->filter(request())
            ->paginate($perPage)
            ->withQueryString();
    }

    /**
     * Create task
     *
     * @param  array  $data
     * @return Task
     */
    public function create(array $data): Task
    {
        return $this->task->create($data);
    }

    /**
     * Update task
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  array  $data
     * @return bool|Model
     */
    public function update(Model $model, array $data)
    {
        $model->fill($data);

        if ($model->isDirty()) {
            $model->save();

            return $model;
        }

        return false;
    }

    /**
     * Destroy task
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     */
    public function destroy(Model $model)
    {
        return $model->delete();
    }

    /**
     * Get employees except auth
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, User>
     */
    public function getEmployeesExceptAuth(): Collection
    {
        return User::where('id', '!=', auth()->id())->get();
    }

    /**
     * Summary of getStatusCounts
     *
     * @return array{counts: array{cancelled: mixed, completed: mixed, in_progress: mixed, pending: mixed, percentages: array, total: float|int}|array{counts: array{cancelled: mixed, completed: mixed, in_progress: mixed, pending: mixed}, percentages: array<float|int>, total: float|int}}
     */
    public function getStatusCounts(): array
    {
        $startDate = now()->subDays(30);

        $counts = [
            TaskStatus::PENDING->value => Task::where('status', TaskStatus::PENDING->value)
                ->where('created_at', '>=', $startDate)
                ->count(),
            TaskStatus::IN_PROGRESS->value => Task::where('status', TaskStatus::IN_PROGRESS->value)
                ->where('created_at', '>=', $startDate)
                ->count(),
            TaskStatus::COMPLETED->value => Task::where('status', TaskStatus::COMPLETED->value)
                ->where('created_at', '>=', $startDate)
                ->count(),
            TaskStatus::OVERDUE->value => Task::where('status', TaskStatus::OVERDUE->value)
                ->where('created_at', '>=', $startDate)
                ->count(),
        ];

        $total = array_sum($counts);

        $percentages = [];
        foreach ($counts as $status => $count) {
            $percentages[$status] = $total > 0
                ? round(($count / $total) * 100, 2)
                : 0;
        }

        return [
            'counts'      => $counts,
            'percentages' => $percentages,
            'total'       => $total,
        ];
    }

    /**
     * Get task pending
     *
     * @return Collection
     */
    public function getTaskPending(): Collection
    {
        return $this->task->where('status', TaskStatus::PENDING)->get();
    }

    /**
     * Get task in progress
     *
     * @return Collection
     */
    public function getTaskInProgress(): Collection
    {
        return $this->task->where('status', TaskStatus::IN_PROGRESS)->get();
    }

    /**
     * Get task completed
     *
     * @return Collection
     */
    public function getTaskCompleted(): Collection
    {
        return $this->task->where('status', TaskStatus::COMPLETED)->get();
    }

    /**
     * Get task overdue
     *
     * @return Collection
     */
    public function getTaskOverdue(): Collection
    {
        return $this->task->where('status', TaskStatus::OVERDUE)->get();
    }
}
