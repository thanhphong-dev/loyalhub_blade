<?php

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class PermissionRepository implements BaseRepositoryInterface
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function get(int $perPage)
    {
        return $this->permission->all()->groupBy(function ($permissions) {
            return explode('.', $permissions->slug)[0];
        });
    }

    public function create(array $data)
    {
        return $this->permission->create($data);
    }

    public function update(Model $model, array $data)
    {
        $model->fill($data);

        if ($model->isDirty()) {
            $model->save();

            return $model;
        }

        return false;
    }

    public function destroy(Model $model)
    {
        return $model->delete();
    }
}
