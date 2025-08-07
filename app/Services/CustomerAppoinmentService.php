<?php

namespace App\Services;

use App\Repositories\CustomerAppoinmentRepository;
use Illuminate\Database\Eloquent\Model;

class CustomerAppoinmentService
{
    protected $customerAppoinmentRepository;

    public function __construct(CustomerAppoinmentRepository $customerAppoinmentRepository)
    {
        $this->customerAppoinmentRepository = $customerAppoinmentRepository;
    }

    public function getAllCustomerAppoinment()
    {
        return $this->customerAppoinmentRepository->getAll();
    }

    public function getCustomer(array $customerIds)
    {
        return $this->customerAppoinmentRepository->getCustomerForAppoinment($customerIds);
    }

    public function createAppointment(array $data)
    {
        return $this->customerAppoinmentRepository->create($data);
    }

    public function deleteCustomerAppointment(Model $model)
    {
        return $this->customerAppoinmentRepository->destroy($model);
    }
}
