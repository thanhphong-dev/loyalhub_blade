<?php

namespace App\Repositories;

use App\Enums\CustomerStatus;
use App\Models\Customer;
use App\Models\CustomerAppointment;

class CustomerAppoinmentRepository
{
    protected $customerAppoinment;
    public function __construct(CustomerAppointment $customerAppointment)
    {
        $this->customerAppoinment = $customerAppointment;
    }
    public function getALL()
    {
        return $this->customerAppoinment->get();
    }

    public function getCustomerForAppoinment(CustomerAppointment $customerAppointment)
    {
            return Customer::query()
            ->where(function ($query) use ($customerAppointment) {
                $query->where('status_id', CustomerStatus::CONTACTED)
                      ->orWhere('status_id', CustomerStatus::INTERESTED)
                      ->orWhere('id', $customerAppointment->customer_id);
            })
            ->select(['id', 'fullname', 'email', 'status', 'position'])
            ->get();
    }
}
