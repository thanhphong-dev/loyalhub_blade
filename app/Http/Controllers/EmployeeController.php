<?php

namespace App\Http\Controllers;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index');
    }
}
