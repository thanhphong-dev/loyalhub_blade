<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Services\ServiceService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    /**
     * Return view index
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $categories = ServiceCategory::all();
        $services   = $this->serviceService->getService();

        return view('service.index', compact('categories', 'services'));
    }

    /**
     * Create service
     *
     * @param  \App\Http\Requests\ServiceRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(ServiceRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $this->serviceService->createService($data);

            DB::commit();

            return $this->success($data, __('view.notyf.create'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    /**
     * Update service
     *
     * @param  \App\Http\Requests\ServiceRequest  $request
     * @return JsonResponse
     */
    public function update(ServiceRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $data      = $request->validated();
            $serviceId = $request->input('id');

            $this->serviceService->updateService($serviceId, $data);

            DB::commit();

            return $this->success($data, __('view.notyf.update'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    /**
     * Destroy service
     *
     * @param  \App\Models\Service  $service
     * @return JsonResponse
     */
    public function destroy(Service $service): JsonResponse
    {
        DB::beginTransaction();
        try {
            $this->serviceService->deleteService($service);

            DB::commit();

            return $this->success($service, __('view.notyf.delete'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $service, __('view.notyf.error'));
        }
    }
}
