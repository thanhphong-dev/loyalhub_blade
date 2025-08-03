<?php

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
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index')->can('roles.index');
    Route::post('role/create', [RoleController::class, 'create'])->name('roles.create')->can('roles.create');
    Route::post('role/update', [RoleController::class, 'update'])->name('roles.update')->can('roles.update');
    Route::delete('role/destroy/{role}', [RoleController::class, 'destroy'])->name('roles.destroy')->can('roles.destroy');

    // employee
    Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index')->can('employees.index');
    Route::post('employee/create', [EmployeeController::class, 'create'])->name('employees.create')->can('employees.create');
    Route::post('employee/update', [EmployeeController::class, 'update'])->name('employees.update')->can('employees.update');
    Route::delete('employee/destroy/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy')->can('employees.destroy');
    Route::get('employee/detail/{employee}', [EmployeeController::class, 'detail'])->name('employees.detail')->can('employees.detail');
    Route::post('employee/profile/{employee}', [EmployeeController::class, 'profile'])->name('employees.profile')->can('employees.profile');

    // permission
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index')->can('permissions.index');
    Route::post('permission/create', [PermissionController::class, 'create'])->name('permissions.create')->can('permissions.create');
    Route::post('permission/update', [PermissionController::class, 'update'])->name('permissions.update')->can('permissions.update');
    Route::delete('permission/destroy/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy')->can('permissions.destroy');

    // service categories
    Route::get('service/categories', [ServiceCategoryController::class, 'index'])->name('service_categories.index')->can('service_categories.index');
    Route::post('service/category/create', [ServiceCategoryController::class, 'create'])->name('service_categories.create')->can('service_categories.create');
    Route::post('service/category/update', [ServiceCategoryController::class, 'update'])->name('service_categories.update')->can('service_categories.update');
    Route::delete('service/category/destroy/{serviceCategory}', [ServiceCategoryController::class, 'destroy'])->name('service_categories.destroy')->can('service_categories.destroy');

    // service
    Route::get('services', [ServiceController::class, 'index'])->name('services.index')->can('services.index');
    Route::post('service/create', [ServiceController::class, 'create'])->name('services.create')->can('services.create');
    Route::post('service/update', [ServiceController::class, 'update'])->name('services.update')->can('services.update');
    Route::delete('service/delete/{service}', [ServiceController::class, 'destroy'])->name('services.destroy')->can('services.destroy');

    // customer
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::post('customer/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('customer/update', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('customer/destroy/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
});
