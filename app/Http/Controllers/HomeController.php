<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $companyCount = Company::count();

            $employees = Employee::orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        
        $employeeCount = Employee::count();

        return view('welcome', compact('companies', 'companyCount', 'employees', 'employeeCount'));
    }
}
