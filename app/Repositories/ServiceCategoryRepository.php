<?php

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategoryRepository implements BaseRepositoryInterface
{
    protected $serviceCategory;

    public function __construct(ServiceCategory $serviceCategory)
    {
        $this->serviceCategory = $serviceCategory;
    }

    public function get(int $perPage)
    {
        return $this->serviceCategory->query()
            ->filter(request())
            ->paginate($perPage)
            ->withQueryString();
    }

    public function create(array $data)
    {
        return $this->serviceCategory->create($data);
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
