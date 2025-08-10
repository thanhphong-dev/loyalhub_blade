<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerServiceRequest;
use App\Http\Requests\UpdateCustomerServiceRequest;
use App\Models\Customer;
use App\Models\CustomerService;
use App\Models\Service;
use App\Models\User;
use App\Services\CustomerService as CustomerUseService;
use App\Services\CustomerServiceService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CustomerServiceController extends Controller
{
    public $customerServiceService;

    public $customerService;

    public function __construct(CustomerServiceService $customerServiceService, CustomerUseService $customerService)
    {
        $this->customerServiceService = $customerServiceService;
        $this->customerService        = $customerService;
    }

    /**
     * Return view index
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $customerServices = $this->customerServiceService->getAllCustomerService();
        $services         = Service::all();
        $employees        = User::where('id', '!=', auth()->id())->get();

        return view('customer.service', compact('customerServices', 'employees', 'services'));
    }

    /**
     * Create Customer Use Service
     *
     * @param  \App\Http\Requests\CustomerServiceRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CustomerServiceRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $data       = $request->validated();
            $customerId = $request->input('customer_id');
            $status     = $request->input('status');
            $customer   = Customer::findOrFail($customerId);

            $this->customerServiceService->createCustomerService($data);

            $customer->status = $status;
            $customer->save();

            DB::commit();

            return $this->success($data, __('view.notyf.create'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    /**
     * Update infomation Customer use Service
     *
     * @param  \App\Http\Requests\UpdateCustomerServiceRequest  $request
     * @return JsonResponse
     */
    public function update(UpdateCustomerServiceRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $data              = $request->validated();
            $customerId        = $request->input('customer_id');
            $customerServiceId = $request->input('customer_service_id');

            $customer        = Customer::findOrFail($customerId);
            $customerService = CustomerService::findOrFail($customerServiceId);

            $this->customerService->updateCustomer($customer, $data);
            $this->customerServiceService->updateCustomerService($customerService, $data);

            DB::commit();

            return $this->success($data, __('view.notyf.update'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    /**
     * Destroy Customer use Service
     *
     * @param  \App\Models\CustomerService  $customerService
     * @return JsonResponse
     */
    public function destroy(CustomerService $customerService): JsonResponse
    {
        DB::beginTransaction();
        try {
            $this->customerServiceService->deleteCustomerService($customerService);

            DB::commit();

            return $this->success($customerService, __('view.notyf.delete'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $customerService, __('view.notyf.error'));
        }
    }
}
