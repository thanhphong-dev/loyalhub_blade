<?php

namespace App\Services;

use App\Models\Role;
use App\Repositories\RoleRepository;
use Illuminate\Database\Eloquent\Model;

class RoleService
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAllRole()
    {
        $perPage = config('commons.per_page');

        return $this->roleRepository->get($perPage);
    }

    public function createRole(array $data)
    {
        return $this->roleRepository->create($data);
    }

    public function updateRole(int $roleId, array $data)
    {
        $role = Role::find($roleId);

        return $this->roleRepository->update($role, $data);
    }

    public function deleteRole(Model $model)
    {
        return $this->roleRepository->destroy($model);
    }
}
