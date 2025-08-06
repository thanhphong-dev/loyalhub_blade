<?php

namespace App\Services;

use App\Models\CustomerAppointment;
use App\Repositories\CustomerAppoinmentRepository;

class CustomerAppoinmentService
{
    protected $customerAppoinmentRepository;

    public function __construct(CustomerAppoinmentRepository $customerAppoinmentRepository)
    {
        $this->customerAppoinmentRepository = $customerAppoinmentRepository;
    }

    public function getAllCustomerAppoinment()
    {
        return $this->customerAppoinmentRepository->getALL();
    }

    public function getCustomer(CustomerAppointment $customerAppointment)
    {
        return $this->customerAppoinmentRepository->getCustomerForAppoinment($customerAppointment);
    }
}
