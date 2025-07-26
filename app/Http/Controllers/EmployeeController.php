<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\InfomationEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\EmployeeService;
use Exception;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index()
    {
        $roles     = Role::all();
        $employees = $this->employeeService->getAllEmployee();

        return view('employee.index', compact('roles', 'employees'));
    }

    public function create(CreateEmployeeRequest $request)
    {
        try {
            $data = $request->validated();
            $this->employeeService->createEmployee($data);

            return $this->success($data, __('view.notyf.create'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    public function update(UpdateEmployeeRequest $request)
    {
        try {
            $data = $request->validated();
            // dd($data);
            $employeeId = $request->input('id');

            $employee = User::find($employeeId);
            // dd($employee);

            if ($request->hasFile('avatar_url') && $request->file('avatar_url')->isValid()) {
                $data['avatar_url'] = handleImageUpload($data['avatar_url'], $employee->avatar_url, 'employee');
            }

            $this->employeeService->updateEmployee($employee, $data);

            return $this->success($data, __('view.notyf.update'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    public function destroy(User $employee)
    {
        try {
            $this->employeeService->deleteEmployee($employee);

            return $this->success($employee, __('view.notyf.delete'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), __('view.notyf.error'));
        }
    }

    public function detail(User $employee): View
    {
        $roles = Role::get();

        return view('employee.detail', compact('employee', 'roles'));
    }

    public function profile(InfomationEmployeeRequest $request, User $employee)
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
