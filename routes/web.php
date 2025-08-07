<?php

use App\Http\Controllers\CustomerAppointmentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group(function () {
    // role
    Route::prefix('roles')->group(function () {
        Route::get('/index', [RoleController::class, 'index'])->name('roles.index')->can('roles.index');
        Route::post('/create', [RoleController::class, 'create'])->name('roles.create')->can('roles.create');
        Route::post('/update', [RoleController::class, 'update'])->name('roles.update')->can('roles.update');
        Route::delete('/destroy/{role}', [RoleController::class, 'destroy'])->name('roles.destroy')->can('roles.destroy');
    });

    // employee
    Route::prefix('employees')->group(function () {
        Route::get('/index', [EmployeeController::class, 'index'])->name('employees.index')->can('employees.index');
        Route::post('/create', [EmployeeController::class, 'create'])->name('employees.create')->can('employees.create');
        Route::post('/update', [EmployeeController::class, 'update'])->name('employees.update')->can('employees.update');
        Route::delete('/destroy/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy')->can('employees.destroy');
        Route::get('/detail/{employee}', [EmployeeController::class, 'detail'])->name('employees.detail')->can('employees.detail');
        Route::post('/profile/{employee}', [EmployeeController::class, 'profile'])->name('employees.profile')->can('employees.profile');
    });

    // permission
    Route::prefix('permissions')->group(function () {
        Route::get('/index', [PermissionController::class, 'index'])->name('permissions.index')->can('permissions.index');
        Route::post('/create', [PermissionController::class, 'create'])->name('permissions.create')->can('permissions.create');
        Route::post('/update', [PermissionController::class, 'update'])->name('permissions.update')->can('permissions.update');
        Route::delete('/destroy/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy')->can('permissions.destroy');
    });

    // service categories
    Route::prefix('service-categories')->group(function () {
        Route::get('/index', [ServiceCategoryController::class, 'index'])->name('service_categories.index')->can('service_categories.index');
        Route::post('/create', [ServiceCategoryController::class, 'create'])->name('service_categories.create')->can('service_categories.create');
        Route::post('/update', [ServiceCategoryController::class, 'update'])->name('service_categories.update')->can('service_categories.update');
        Route::delete('/destroy/{serviceCategory}', [ServiceCategoryController::class, 'destroy'])->name('service_categories.destroy')->can('service_categories.destroy');
    });

    // service
    Route::prefix('services')->group(function () {
        Route::get('/index', [ServiceController::class, 'index'])->name('services.index')->can('services.index');
        Route::post('/create', [ServiceController::class, 'create'])->name('services.create')->can('services.create');
        Route::post('/update', [ServiceController::class, 'update'])->name('services.update')->can('services.update');
        Route::delete('/delete/{service}', [ServiceController::class, 'destroy'])->name('services.destroy')->can('services.destroy');
    });

    // customer
    Route::prefix('customers')->group(function () {
        Route::get('/index', [CustomerController::class, 'index'])->name('customers.index');
        Route::post('/create', [CustomerController::class, 'create'])->name('customers.create');
        Route::post('/update', [CustomerController::class, 'update'])->name('customers.update');
        Route::post('/update-status/{id}', [CustomerController::class, 'updateStatus'])->name('customers.update-status');
        Route::delete('/destroy/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
        Route::get('/contact', [CustomerController::class, 'customerContact'])->name('customers.contact');
    });

    // customer appointment
    Route::prefix('customer-appointments')->group(function () {
        Route::get('/index', [CustomerAppointmentController::class, 'index'])->name('customer_appointments.index');
        Route::get('/get-all', [CustomerAppointmentController::class, 'getALL'])->name('customer_appointments.get_all');
        Route::get('/get-customer', [CustomerAppointmentController::class, 'getCustomerForAppoinment'])->name('customer_appointments.get_customer_for_edit');
        Route::get('/get-employee/{customerAppointment}', [CustomerAppointmentController::class, 'getEmployeeForAppoinment'])->name('customer_appointments.get_employee_for_edit');
        Route::post('/create', [CustomerAppointmentController::class, 'create'])->name('customer_appointments.create');
        Route::put('/update/{id}', [CustomerAppointmentController::class, 'update'])->name('customer_appointments.update');
        Route::delete('/delete/{customerAppointment}', [CustomerAppointmentController::class, 'destroy'])->name('customer_appointments.destroy');
    });
});
