<?php

namespace App\Services;

use App\Models\Role;
use App\Repositories\RoleRepository;

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

    public function updateRole(Role $role, array $data)
    {
        $role->fill($data);

        if ($role->isDirty()) {
            return $this->roleRepository->update($data);
        }

        return false;
    }
}
