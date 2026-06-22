<?php
 
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        
        $sort = $request->query('sort', 'latest');
        $search = $request->query('search');
        
        $companies = Company::withCount('employees')
            ->search($search)
            ->sort($sort)
            ->paginate(10)
            ->withQueryString();
        
        return view('company.index', compact('companies', 'sort', 'search'));
    }
    public function show(Company $company)
    {
        $company->load(['employees'])->loadCount('employees');
        return view('company.show', [
            'company' => $company,
        ]);
    }

    public function store(StoreCompanyRequest $request) {

        $company = Company::create($request->validated());

        if ($request->hasFile('logo')) {
            $request->file('logo')->move(
                public_path('storage/icons'),
                $company->id . '.png'
            );
        }


        return redirect()->route('company.index')->with('success', 'New company added');
        }


    public function update(Company $company, UpdateCompanyRequest $request) {

        $company->update($request->validated());

        if ($request->hasFile('logo')) {
                $oldPath = public_path('storage/icons/' . $company->id . '.png');

            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $request->file('logo')->move(
                public_path('storage/icons'),
                $company->id . '.png'
            );
        }
        return redirect()->route('company.show', $company)->with('success', 'Company record updated');
    }

    public function destroy(Company $company) {
        $company->delete();

        return to_route('company.index')->with('success', 'Company record deleted');
    }
}