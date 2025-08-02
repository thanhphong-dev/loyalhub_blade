<?php

namespace App\Services;

use App\Models\Service;
use App\Repositories\ServiceRepository;
use Illuminate\Database\Eloquent\Model;

class ServiceService
{
    protected $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function getService()
    {
        $perPage = config('commons.per_page');

        return $this->serviceRepository->get($perPage);
    }

    public function createService(array $data)
    {
        return $this->serviceRepository->create($data);
    }

    public function updateService(int $serviceId, array $data)
    {
        $service = Service::find($serviceId);

        return $this->serviceRepository->update($service, $data);
    }

    public function deleteService(Model $model)
    {
        return $this->serviceRepository->destroy($model);
    }
}
