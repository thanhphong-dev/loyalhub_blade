<?php

namespace App\Repositories;

use App\Enums\CustomerStatus;
use App\Interfaces\BaseRepositoryInterface;
use App\Models\CustomerService;
use Illuminate\Database\Eloquent\Model;

class CustomerSerivceRepository implements BaseRepositoryInterface
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function get(int $perPage)
    {
        return $this->customerService->query()
            ->with('customer')
            ->whereHas('customer', function ($q) {
                $q->where('status', CustomerStatus::SERVICED);
            })
            ->filter(request())
            ->paginate($perPage)
            ->withQueryString();
    }

    public function create(array $data)
    {
        return $this->customerService->create($data);
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
