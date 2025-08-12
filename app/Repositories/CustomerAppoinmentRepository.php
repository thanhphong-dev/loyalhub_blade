<?php

namespace App\Repositories;

use App\Enums\CustomerStatus;
use App\Interfaces\BaseRepositoryInterface;
use App\Models\Customer;
use App\Models\CustomerAppointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomerAppoinmentRepository implements BaseRepositoryInterface
{
    protected $customerAppointment;

    public function __construct(CustomerAppointment $customerAppointment)
    {
        $this->customerAppointment = $customerAppointment;
    }

    public function get(int $pePage) {}

    public function getAll()
    {
        return $this->customerAppointment
            ->leftJoin('customers', 'customer_appointments.customer_id', '=', 'customers.id')
            ->leftJoin('users', 'customers.assigned_staff_id', '=', 'users.id')
            ->select([
                'customer_appointments.*',
                'customers.fullname',
                'customers.email',
                'customers.status',
                'customers.assigned_staff_id',
                DB::raw("CONCAT(users.frist_name, ' ', users.last_name) as employee_name"),
            ])
            ->get(); // hoặc paginate(10)
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

    public function getBooked(int $perPage)
    {
        return $this->customerAppointment->query()
            ->whereHas('customer', function ($q) {
                $q->where('status', CustomerStatus::BOOKED);
            })
            ->filter(request())
            ->paginate($perPage)
            ->withQueryString();
    }

    public function create(array $data)
    {
        return CustomerAppointment::create($data);
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
