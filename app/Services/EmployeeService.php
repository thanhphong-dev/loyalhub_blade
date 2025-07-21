<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\EmployeeRepository;

class EmployeeService
{
    protected $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function getAllEmployee()
    {
        $perPage = config('commons.per_page');

        return $this->employeeRepository->get($perPage);
    }

    public function createEmployee(array $data)
    {
        return $this->employeeRepository->create($data);
    }

    public function updateEmployee(int $employeeId, array $data)
    {
        $employee = User::find($employeeId);

        return $this->employeeRepository->update($employee, $data);
    }
}
