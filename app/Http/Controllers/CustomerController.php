<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\Service;
use App\Models\User;
use App\Services\CustomerService;
use Exception;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $employees = User::where('id', '!=', auth()->id())->get();
        $services  = Service::all();
        $customers = $this->customerService->getAllCustomers();

        return view('customer.index', compact('employees', 'services', 'customers'));
    }

    public function create(CreateCustomerRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                $data['file'] = handleImageUpload($data['file'], null, 'customer/file');
            }

            $this->customerService->createCustomer($data);

            DB::commit();

            return $this->success($data, __('view.notyf.create'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    public function update(UpdateCustomerRequest $request)
    {
        DB::beginTransaction();
        try {
            $data       = $request->validated();
            $customerId = $request->input('id');
            $customer   = Customer::find($customerId);

            if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
                $data['logo'] = handleImageUpload($data['logo'], $customer->logo, 'customer/images');
            }

            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                $data['file'] = handleFileUpload($data['file'], $customer->file, 'customer/file');
            }

            $this->customerService->updateCustomer($customer, $data);

            DB::commit();

            return $this->success($data, __('view.notyf.update'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    public function destroy(Customer $customer)
    {
        DB::beginTransaction();
        try {
            if ($customer) {
                $this->customerService->deleteCustomer($customer);
            }

            DB::commit();

            return $this->success($customer, __('view.notyf.delete'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $customer, __('view.notyf.error'));
        }
    }
}
