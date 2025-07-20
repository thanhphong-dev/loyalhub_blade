<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::resources([
        'employees' => EmployeeController::class,
    ]);
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles/update', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles/destroy/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
});
