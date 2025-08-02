<?php

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class ServiceRepository implements BaseRepositoryInterface
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function get(int $perPage)
    {
        return $this->service->query()
            ->filter(request())
            ->paginate($perPage)
            ->withQueryString();
    }

    public function create(array $data)
    {
        return $this->service->create($data);
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
