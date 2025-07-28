<?php

namespace App\Services;

use App\Models\Permission;
use App\Repositories\PermissionRepository;
use Illuminate\Database\Eloquent\Model;

class PermissionService
{
    protected $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function getPermissions()
    {
        $perPage = config('commons.per_page');

        return $this->permissionRepository->get($perPage);
    }

    public function createPermission(array $data)
    {
        return $this->permissionRepository->create($data);
    }

    public function updatePermission(int $permissionId, array $data)
    {
        $permission = Permission::find($permissionId);

        return $this->permissionRepository->update($permission, $data);
    }

    public function deletePermission(Model $model)
    {
        return $this->permissionRepository->destroy($model);
    }
}
