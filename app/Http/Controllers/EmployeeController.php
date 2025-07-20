<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Models\Role;
use App\Services\EmployeeService;
use Exception;

class EmployeeController extends Controller
{
    protected $employeeService;
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }
    public function index()
    {
        $roles = Role::all();
        $employees = $this->employeeService->getAllEmployee();

        return view('employee.index', compact('roles', 'employees'));
    }

    public function create(CreateEmployeeRequest $request)
    {
        try{
            $data = $request->validated();
            $this->employeeService->createEmployee($data);

            return $this->success($data, __("view.notyf.create"));

        } catch (Exception $e) {
            return $this->error($e->getMessage(), $data, __("view.notyf.error"));
        }
    }
}
