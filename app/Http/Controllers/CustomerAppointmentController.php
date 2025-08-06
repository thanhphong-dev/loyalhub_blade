<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAppointment;
use App\Models\CustomerCalendar;
use App\Services\CustomerAppoinmentService;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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
        return view('work.customer-appointment');
    }

    public function getAll()
    {
        try{
            $customerAppoiments = $this->customerAppoinmentService->getAllCustomerAppoinment();

            return $this->success($customerAppoiments, __("view.notyf.get_data"));

        } catch(Exception $e) {

            return $this->error($e->getMessage(), $customerAppoiments, __("view.notyf.error"));
        }
    }

    public function getCustomerForAppoinment(CustomerAppointment $customerAppointment)
    {
        try{
            $customers = $this->customerAppoinmentService->getCustomer($customerAppointment);

            return $this->success($customers, __("view.notyf.get_data"));
        }catch(Exception $e) {
            return $this->error($e->getMessage(), '', __("view.notyf.error"));
        }
    }

    public function getEmployeeForAppoinment(CustomerAppointment $customerAppointment)
    {

    }
}
