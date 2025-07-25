<?php

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;

class RoleRepository implements BaseRepositoryInterface
{
    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function get(int $perPage)
    {
        return $this->role->query()
            ->filter(request())
            ->paginate($perPage)
            ->withQueryString();
    }

    public function create(array $data)
    {
        return $this->role->create($data);
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
