<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerAppointmentRequest;
use App\Http\Requests\CustomerBookedRequest;
use App\Models\Customer;
use App\Models\CustomerAppointment;
use App\Models\Service;
use App\Models\User;
use App\Services\CustomerAppoinmentService;
use App\Services\CustomerService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CustomerAppointmentController extends Controller
{
    protected $customerAppoinmentService;

    protected $customerService;

    public function __construct(CustomerAppoinmentService $customerAppoinmentService, CustomerService $customerService)
    {
        $this->customerAppoinmentService = $customerAppoinmentService;
        $this->customerService           = $customerService;
    }

    /**
     * Ruturn view index
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $customers = Customer::all();

        return view('work.customer-appointment', compact('customers'));
    }

    /**
     * Return date getAl Customer Appoinment
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll(): JsonResponse
    {
        try {
            $customerAppoiments = $this->customerAppoinmentService->getAllCustomerAppoinment();

            return $this->success($customerAppoiments, __('view.notyf.get_data'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $customerAppoiments, __('view.notyf.error'));
        }
    }

    /**
     * Get data Customer Status Contact, Booked, Inserested
     *
     * @return JsonResponse
     */
    public function getCustomerForAppoinment(): JsonResponse
    {
        try {
            // Lấy tất cả customer_id từ bảng appointment
            $customerIds = Customer::pluck('id')->toArray();

            $customers = $this->customerAppoinmentService->getCustomer($customerIds);

            return $this->success($customers, __('view.notyf.get_data'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), '', __('view.notyf.error'));
        }
    }

    /**
     * Return view Customer Booked
     *
     * @return View
     */
    public function customerBooked(): View
    {
        $employees           = User::where('id', '!=', auth()->id())->get();
        $services            = Service::all();
        $customerAppoinments = $this->customerAppoinmentService->getCustomerBooked();

        return view('customer.booked', compact('employees', 'services', 'customerAppoinments'));
    }

    /**
     * Create appointment calendar
     *
     * @param  \App\Http\Requests\CustomerAppointmentRequest  $request
     * @return JsonResponse
     */
    public function create(CustomerAppointmentRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $this->customerAppoinmentService->createAppointment($data);

            DB::commit();

            return $this->success($data, __('view.notyf.create'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    /**
     * Update appointment calendar
     *
     * @param  \App\Http\Requests\CustomerAppointmentRequest  $request
     * @param  mixed  $id
     * @return JsonResponse
     */
    public function update(CustomerAppointmentRequest $request, $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            $fields = ['title', 'customer_id', 'date', 'start_time', 'end_time'];
            $data   = array_intersect_key($data, array_flip($fields));

            $appointment = CustomerAppointment::findOrFail($id);
            $this->customerAppoinmentService->updateAppointment($appointment, $data);

            DB::commit();

            return $this->success($data, __('view.notyf.update'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), null, __('view.notyf.error'));
        }
    }

    /**
     * Update Customer Booked
     *
     * @param  \App\Http\Requests\CustomerBookedRequest  $request
     * @return JsonResponse
     */
    public function updateCustomerBooked(CustomerBookedRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            $customerId = $request->input('customer_id');
            $customer   = Customer::find($customerId);

            $customerAppointmentId = $request->input('customer_appointment_id');
            $customerAppointment   = CustomerAppointment::find($customerAppointmentId);

            $this->customerService->updateCustomer($customer, $data);
            $this->customerAppoinmentService->updateAppointment($customerAppointment, $data);

            DB::commit();

            return $this->success($data, __('view.notyf.update'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $data, __('view.notyf.error'));
        }
    }

    /**
     * Destroy appointment
     *
     * @param  \App\Models\CustomerAppointment  $customerAppointment
     * @return JsonResponse
     */
    public function destroy(CustomerAppointment $customerAppointment): JsonResponse
    {
        DB::beginTransaction();
        try {
            $this->customerAppoinmentService->deleteCustomerAppointment($customerAppointment);

            DB::commit();

            return $this->success($customerAppointment, __('view.notyf.delete'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $customerAppointment, __('view.notyf.error'));
        }
    }
}
