<?php
 
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        //dd('index method hit', $request->all());
        $companies = Company::all();

        $sort = $request->query('sort', 'latest');

        $employees = Employee::with('company')
            ->sort($sort)
            ->paginate(10)
            ->withQueryString();
        
        //dd($sort);
        return view('employee.index', compact('employees', 'sort', 'companies'));
    }

    public function show(Employee $employee, Company $companies)
    {
        $companies = Company::all();
        $employee->load('company');

        return view('employee.show', compact('employee', 'companies'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('employees', 'email')],
            'number' => ['required', 'string', 'max:15', Rule::unique('employees', 'number')],
            'company_id' => ['required', 'integer', 'exists:companies,id'],
        ]);

        Employee::create($validated);


        return redirect()->route('employee.index')->with('success', 'New employee added');
        }

    public function update(Request $request, Employee $employee) {
    $validated = $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('employees', 'email')->ignore($employee)],
        'number' => ['required', 'string', 'max:15', Rule::unique('employees', 'number')->ignore($employee)],
        'company_id' => ['required', 'integer', 'exists:companies,id'],
    ]);

    $employee->update($validated);

    return redirect()->route('employee.show', $employee)->with('success', 'Employee record updated');
    }
    public function destroy(Employee $employee) {
        //dd($employee);
        $employee->delete();

        return to_route('employee.index')->with('success', 'Employee record deleted');
    }
}