<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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
    Route::post('permission/create', [PermissionController::class, 'create'])->name('permissions.create')->can('permissions.index');
    Route::post('permission/update', [PermissionController::class, 'update'])->name('permissions.update')->can('permissions.index');
    Route::delete('permission/destroy/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy')->can('permissions.index');
});
