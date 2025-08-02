<?php

namespace App\Services;

use App\Models\ServiceCategory;
use App\Repositories\ServiceCategoryRepository;
use Illuminate\Database\Eloquent\Model;

class ServiceCategoryService
{
    protected $serviceCategoryRepository;

    public function __construct(ServiceCategoryRepository $serviceCategoryRepository)
    {
        $this->serviceCategoryRepository = $serviceCategoryRepository;
    }

    public function getAllServiceCategory()
    {
        $perPage = config('commons.per_page');

        return $this->serviceCategoryRepository->get($perPage);
    }

    public function createServiceCategory(array $data)
    {
        return $this->serviceCategoryRepository->create($data);
    }

    public function updateServiceCategory(int $serviceCategoryId, array $data)
    {
        $serviceCategory = ServiceCategory::find($serviceCategoryId);

        return $this->serviceCategoryRepository->update($serviceCategory, $data);
    }

    public function deleteServiceCategory(Model $model)
    {
        return $this->serviceCategoryRepository->destroy($model);
    }
}
