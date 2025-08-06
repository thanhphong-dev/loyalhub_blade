<?php

namespace App\Repositories;

use App\Enums\CustomerStatus;
use App\Interfaces\BaseRepositoryInterface;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;

class CustomerRepository implements BaseRepositoryInterface
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function get(int $perPage)
    {
        return $this->customer->query()
             ->where('status', [
                CustomerStatus::NEW
             ])
            ->filter(request())
            ->paginate($perPage)
            ->withQueryString();
    }

    public function getContact(int $perPage)
    {
        return $this->customer->query()
            ->whereIn('status', [
                CustomerStatus::CONTACTED,
                CustomerStatus::INTERESTED,
                CustomerStatus::BOOKED,
            ])
            ->filter(request())
            ->paginate($perPage)
            ->withQueryString();
    }

    public function create(array $data)
    {
        return $this->customer->create($data);
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
