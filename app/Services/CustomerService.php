<?php

namespace App\Services;

use App\Repositories\CustomerRepository;
use Illuminate\Database\Eloquent\Model;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAllCustomers()
    {
        $perPage = config('commons.per_page');

        return $this->customerRepository->get($perPage);
    }

    public function getCustomerContact()
    {
        $perPage = config('commons.per_page');

        return $this->customerRepository->getContact($perPage);
    }

    /**
     * Get statuses for staff
     *
     * @param  int  $staffId
     */
    public function getStatusesForStaff(int $staffId)
    {
        return $this->customerRepository->getStatusesByStaff($staffId);
    }

    /**
     * Get customers for staff by status
     *
     * @param  int  $staffId
     * @param  int  $status
     */
    public function getCustomersForStaffByStatus(int $staffId, int $status)
    {
        return $this->customerRepository->getCustomersByStatus($staffId, $status);
    }

    public function createCustomer(array $data)
    {
        return $this->customerRepository->create($data);
    }

    public function updateCustomer(Model $model, array $data)
    {
        return $this->customerRepository->update($model, $data);
    }

    public function deleteCustomer(Model $model)
    {
        return $this->customerRepository->destroy($model);
    }
}
