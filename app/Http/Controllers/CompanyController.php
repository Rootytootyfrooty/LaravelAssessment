<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        
        $sort = $request->query('sort', 'latest');

        $companies = Company::withCount('employee')
            ->sort($sort)
            ->paginate(10)
            ->withQueryString();

        return view('company.index', compact('companies', 'sort'));
    }
    public function show(Company $company)
    {
        $company->loadCount('employee');
        return view('company.show', [
            'company' => $company,
        ]);
    }
    public function update(Company $company, Request $request) {
        //dd($request);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('companies', 'email')->ignore($company)],
            'website' => ['required', 'string', 'url', 'max:255', Rule::unique('companies', 'website')->ignore($company)],
        ]);
        //dd($validated);
        $company->update($validated);
        return redirect()->back();
    }
}