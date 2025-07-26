<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group(function () {
    // role
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('role/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('role/update', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('role/destroy/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // employee
    Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::post('employee/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('employee/update', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('employee/destroy/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    Route::get('employee/detail/{employee}', [EmployeeController::class, 'detail'])->name('employees.detail');
    Route::post('employee/profile/{employee}', [EmployeeController::class, 'profile'])->name('employees.profile');
});
