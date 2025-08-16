<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Return view index
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $data = $this->taskService->getIndexData();

        return view('work.index', $data);
    }

    public function create(TaskRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $this->taskService->createTask($data);

            DB::commit();

            return $this->success($data, __('view.notyf.create'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    public function update(TaskRequest $request)
    {
        DB::beginTransaction();
        try {
            $data   = $request->validated();
            $taskId = $request->input('task_id');

            $this->taskService->updateTask($taskId, $data);
            DB::commit();

            return $this->success($data, __('view.notyf.create'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    public function destroy(Task $task)
    {
        DB::beginTransaction();
        try {
            $this->taskService->deleteTask($task);

            DB::commit();

            return $this->success($task, __('view.notyf.delete'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $task, __('view.notyf.error'));
        }
    }
}
