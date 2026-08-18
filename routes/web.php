<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('welcome')->middleware('auth');

Route::get('/companies', [CompanyController::class, 'index'])->name('company.index')->middleware('auth');
Route::post('/companies/store', [CompanyController::class, 'store'])->name('company.store')->middleware('auth');
Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('company.show')->middleware('auth');
Route::patch('/companies/{company}', [CompanyController::class, 'update'])->name('company.update')->middleware('auth');
Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('company.destroy')->middleware('auth');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index')->middleware('auth');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employee.store')->middleware('auth');
Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employee.show')->middleware('auth');
Route::patch('/employees/{employee}', [EmployeeController::class, 'update'])->name('employee.update')->middleware('auth');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy')->middleware('auth');

Route::get('/login', [SessionsController::class, 'index'])->name('admin.index')->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->name('login')->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');