<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerAppointmentRequest;
use App\Models\Customer;
use App\Models\CustomerAppointment;
use App\Services\CustomerAppoinmentService;
use Exception;
use Illuminate\Support\Facades\DB;

class CustomerAppointmentController extends Controller
{
    protected $customerAppoinmentService;

    public function __construct(CustomerAppoinmentService $customerAppoinmentService)
    {
        $this->customerAppoinmentService = $customerAppoinmentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();

        return view('work.customer-appointment', compact('customers'));
    }

    public function getAll()
    {
        try {
            $customerAppoiments = $this->customerAppoinmentService->getAllCustomerAppoinment();

            return $this->success($customerAppoiments, __('view.notyf.get_data'));
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $customerAppoiments, __('view.notyf.error'));
        }
    }

    public function getCustomerForAppoinment()
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

    public function getEmployeeForAppoinment(CustomerAppointment $customerAppointment) {}

    public function create(CustomerAppointmentRequest $request)
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

    public function update(CustomerAppointmentRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            $fields = ['title', 'customer_id', 'date', 'start_time', 'end_time'];
            $data   = array_intersect_key($data, array_flip($fields));

            $appointment = CustomerAppointment::findOrFail($id);
            $appointment->update($data);

            DB::commit();

            return $this->success($data, __('view.notyf.update'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), null, __('view.notyf.error'));
        }
    }

    public function destroy(CustomerAppointment $customerAppointment)
    {
        try {
            $this->customerAppoinmentService->deleteCustomerAppointment($customerAppointment);

            return $this->success($customerAppointment, __('view.notyf.delete'));
        } catch (Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), $customerAppointment, __('view.notyf.error'));
        }
    }
}
