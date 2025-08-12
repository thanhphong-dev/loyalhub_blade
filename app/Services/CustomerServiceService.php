<?php

namespace App\Services;

use App\Repositories\CustomerSerivceRepository;
use Illuminate\Database\Eloquent\Model;

class CustomerServiceService
{
    protected $customerServiceRepository;

    public function __construct(CustomerSerivceRepository $customerAppoinmentService)
    {
        $this->customerServiceRepository = $customerAppoinmentService;
    }

    public function getAllCustomerService()
    {
        $perPage = config('commons.per_page');

        return $this->customerServiceRepository->get($perPage);
    }

    public function createCustomerService(array $data)
    {
        return $this->customerServiceRepository->create($data);
    }

    public function updateCustomerService(Model $model, array $data)
    {
        return $this->customerServiceRepository->update($model, $data);
    }

    public function deleteCustomerService(Model $model)
    {
        return $this->customerServiceRepository->destroy($model);
    }
}
