<?php

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class EmployeeRepository implements BaseRepositoryInterface
{
    protected $employee;

    public function __construct(User $employee)
    {
        $this->employee = $employee;
    }

    public function get(int $perPage)
    {
        return $this->employee->query()
            ->where('id', '!=', auth()->id())
            ->filter(request())
            ->paginate($perPage)
            ->withQueryString();
    }

    public function create(array $data)
    {
        return $this->employee->create($data);
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
