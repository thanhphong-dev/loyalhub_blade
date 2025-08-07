<?php

namespace App\Repositories;

use App\Enums\CustomerStatus;
use App\Interfaces\BaseRepositoryInterface;
use App\Models\Customer;
use App\Models\CustomerAppointment;
use Illuminate\Database\Eloquent\Model;

class CustomerAppoinmentRepository implements BaseRepositoryInterface
{
    protected $customerAppoinment;

    public function __construct(CustomerAppointment $customerAppointment)
    {
        $this->customerAppoinment = $customerAppointment;
    }

    public function get(int $pePage) {}

    public function getAll()
    {
        return $this->customerAppoinment->get();
    }

    public function getCustomerForAppoinment(array $customerIds)
    {
        if (empty($customerIds)) {
            return collect();
        }

        return Customer::query()
            ->whereIn('id', $customerIds)
            ->whereIn('status', [
                CustomerStatus::CONTACTED,
                CustomerStatus::BOOKED,
                CustomerStatus::INTERESTED,
            ])
            ->select(['id', 'fullname', 'email', 'status'])
            ->get();
    }

    public function create(array $data)
    {
        return CustomerAppointment::create($data);
    }

    public function update(Model $model, array $data) {}

    public function destroy(Model $model)
    {
        return $model->delete();
    }
}
