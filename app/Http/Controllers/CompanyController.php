<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        
        $sort = $request->query('sort', 'latest');

        $companies = Company::withCount('employees')
            ->sort($sort)
            ->paginate(10)
            ->withQueryString();
        
        return view('company.index', compact('companies', 'sort'));
    }
    public function show(Company $company)
    {
        $company->load(['employees'])->loadCount('employees');
        return view('company.show', [
            'company' => $company,
        ]);
    }

    public function store(Request $request) {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('companies', 'email')],
            'website' => ['required', 'string', 'url', 'max:255', Rule::unique('companies', 'website')],
            'logo' => ['required', 'image', 'mimes:png', 'max:2048'],
        ]);


        $company = Company::create($request->only('name', 'email', 'website'));

        $request->file('logo')->storeAs(
            'icons',
            $company->id . '.png',
            'public'
        );


        return redirect()->route('company.index');
        }
        //return to_route('company.index');


    public function update(Company $company, Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('companies', 'email')->ignore($company)],
            'website' => ['required', 'string', 'url', 'max:255', Rule::unique('companies', 'website')->ignore($company)],
            'logo' => ['image', 'mimes:png', 'max:2048'],
        ]);

        $company->update($request->only('name', 'email', 'website'));

        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete('icons/' . $company->id . '.png');

            $request->file('logo')->storeAs(
                'icons',
                $company->id . '.png',
                'public'
            );
        }
        return redirect()->route('company.show', $company);
    }

    public function destroy(Company $company) {
        $company->delete();

        return to_route('company.index');
    }
}