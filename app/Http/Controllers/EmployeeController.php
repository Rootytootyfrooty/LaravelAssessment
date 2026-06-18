<?php
 
namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $companies = Company::all();
    
        $sort = $request->query('sort', 'latest');
        $search = $request->query('search');

        $employees = Employee::with('company')
            ->search($search)
            ->sort($sort)
            ->paginate(10)
            ->withQueryString();
        
        return view('employee.index', compact('employees', 'sort', 'companies', 'search'));
    }

    public function show(Employee $employee, Company $companies)
    {
        $companies = Company::all();
        $employee->load('company');

        return view('employee.show', compact('employee', 'companies'));
    }

    public function store(StoreEmployeeRequest $request) {

        Employee::create($request->validated());

        return redirect()->route('employee.index')->with('success', 'New employee added');
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee) {

        $employee->update($request->validated());

        return redirect()->route('employee.show', $employee)->with('success', 'Employee record updated');
    }

    public function destroy(Employee $employee) {

        $employee->delete();

        return to_route('employee.index')->with('success', 'Employee record deleted');
    }
}