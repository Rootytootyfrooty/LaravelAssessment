<?php
 
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'latest');

        $employees = Employee::with('company')
            ->sort($sort)
            ->paginate(10)
            ->withQueryString();
        

        return view('employee.index', compact('employees', 'sort'));
    }
}