<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\EmployeeRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

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

    public function updateEmployee(Model $model, array $data, array $roleIds)
    {
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $this->employeeRepository->update($model, $data);
        $this->employeeRepository->syncRoles($model, $roleIds);
    }

    public function deleteEmployee(Model $model)
    {
        return $this->employeeRepository->destroy($model);
    }

    public function updateProfileEmployee(Model $model, array $data)
    {
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->employeeRepository->updateProfile($model, $data);
    }

    public function assignRoles(User $employee, array $roleIds)
    {
        $this->employeeRepository->syncRoles($employee, $roleIds);
    }
}
