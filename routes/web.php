<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SessionsController;
use App\Models\Company;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/companies', [CompanyController::class, 'index'])->name('company.index');
Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('company.show')->middleware('auth');
Route::patch('/companies/{company}', [CompanyController::class, 'update'])->name('company.update')->middleware('auth');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');

Route::get('/login', [SessionsController::class, 'index'])->name('admin.index')->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->name('login')->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');