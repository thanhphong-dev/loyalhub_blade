<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\InfomationEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\EmployeeService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * Return view index
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $roles     = Role::all();
        $employees = $this->employeeService->getAllEmployee();

        return view('employee.index', compact('roles', 'employees'));
    }

    /**
     * Create employee
     *
     * @param  \App\Http\Requests\CreateEmployeeRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateEmployeeRequest $request): JsonResponse
    {
        try {
            $data    = $request->validated();
            $roleIds = $request->input('role_id');

            $employee = $this->employeeService->createEmployee($data);
            $this->employeeService->assignRoles($employee, [$roleIds]);

            return $this->success($data, __('view.notyf.create'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    /**
     * Update employee
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @return JsonResponse
     */
    public function update(UpdateEmployeeRequest $request): JsonResponse
    {
        try {
            $data       = $request->validated();
            $employeeId = $request->input('id');
            $roleIds    = $request->input('role_id');

            $employee = User::find($employeeId);

            if ($request->hasFile('avatar_url') && $request->file('avatar_url')->isValid()) {
                $data['avatar_url'] = handleImageUpload($data['avatar_url'], $employee->avatar_url, 'employee');
            }

            $this->employeeService->updateEmployee($employee, $data, [$roleIds]);

            return $this->success($data, __('view.notyf.update'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    /**
     * Destroy employee
     *
     * @param  \App\Models\User  $employee
     * @return JsonResponse
     */
    public function destroy(User $employee): JsonResponse
    {
        try {
            $this->employeeService->deleteEmployee($employee);

            return $this->success($employee, __('view.notyf.delete'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), __('view.notyf.error'));
        }
    }

    /**
     * Return view detail employee
     *
     * @param  \App\Models\User  $employee
     * @return \Illuminate\Contracts\View\View
     */
    public function detail(User $employee): View
    {
        $roles = Role::get();

        return view('employee.detail', compact('employee', 'roles'));
    }

    /**
     *Update profile emmployee
     *
     * @param  \App\Http\Requests\InfomationEmployeeRequest  $request
     * @param  \App\Models\User  $employee
     * @return JsonResponse
     */
    public function profile(InfomationEmployeeRequest $request, User $employee): JsonResponse
    {
        try {
            $data = $request->validated();
            // dd($data);

            if ($request->hasFile('avatar_url') && $request->file('avatar_url')->isValid()) {
                $data['avatar_url'] = handleImageUpload($data['avatar_url'], $employee->avatar_url, 'employee');
            }

            $this->employeeService->updateProfileEmployee($employee, $data);

            return $this->success($data, __('view.notyf.update'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }
}
