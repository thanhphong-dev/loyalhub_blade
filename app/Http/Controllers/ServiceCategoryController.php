<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCategoryRequest;
use App\Models\ServiceCategory;
use App\Services\ServiceCategoryService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ServiceCategoryController extends Controller
{
    protected $serviceCategory;

    public function __construct(ServiceCategoryService $serviceCategory)
    {
        $this->serviceCategory = $serviceCategory;
    }

    /**
     * Return view index
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $serviceCategories = $this->serviceCategory->getAllServiceCategory();

        return view('service.category', compact('serviceCategories'));
    }

    /**
     * Create sercice categories
     *
     * @param  \App\Http\Requests\ServiceCategoryRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(ServiceCategoryRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $this->serviceCategory->createServiceCategory($data);

            return $this->success($data, __('view.notyf.create'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    /**
     * Update service categories
     *
     * @param  \App\Http\Requests\ServiceCategoryRequest  $request
     * @return JsonResponse
     */
    public function update(ServiceCategoryRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $serviceCategoryId = $request->input('id');
            $data              = $request->validated();

            $this->serviceCategory->updateServiceCategory($serviceCategoryId, $data);

            DB::commit();

            return $this->success($data, __('view.notyf.update'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    /**
     * Destroy service categories
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return JsonResponse
     */
    public function destroy(ServiceCategory $serviceCategory): JsonResponse
    {
        DB::beginTransaction();
        try {
            $this->serviceCategory->deleteServiceCategory($serviceCategory);

            DB::commit();

            return $this->success($serviceCategory, __('view.notyf.delete'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $serviceCategory, __('view.notyf.error'));
        }
    }
}
