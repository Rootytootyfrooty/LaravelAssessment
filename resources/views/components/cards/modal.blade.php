@props(['company' => new App\Models\Company(), 'employee' => new App\Models\Employee(), 'companies' => ''])
<x-form :company="$company" :employee="$employee">
    <form 
        method="POST" 
        enctype="multipart/form-data"
        class="flex flex-col items-center w-[320px]"

        @if (request()->routeIs('company.index') || (request()->routeIs('company.show')))
        action="{{ $company->exists ? route('company.update', $company) : route('company.store') }}" 
        >
        @csrf
            @if($company->exists)
                @method('PATCH')
            @endif

            <x-form.form-pair name="name" label="Company Name" :model="$company" type="text" class="input" />

            <x-form.form-pair name="email" label="Email" :model="$company" type="email"  class="input" />

            <x-form.form-pair name="website" label="Website" :model="$company" type="url"  class="input" />

            <x-form.form-pair name="logo" label="Logo" :model="$company" type="file" accept="image/*" 
                style="flex flex-col [&_input]:p-2 [&_input]:border [&_input]:border-base-content/0 [&_input]:hover:border-base-content/20 [&_input]:rounded-lg [&_input]:hover:cursor-pointer [&_input]:hover:bg-base-100" 
            />

        @endif

        @if (request()->routeIs('employee.index') || (request()->routeIs('employee.show')))
            action="{{ $employee->exists ? route('employee.update', $employee) : route('employee.store') }}" 
            >
            @csrf
            @if($employee->exists)
                @method('PATCH')
            @endif

            <x-form.form-pair name="first_name" label="First Name" :model="$employee" type="text" class="input" />

            <x-form.form-pair name="last_name" label="Last Name" :model="$employee" type="text" class="input" />

            <x-form.form-pair name="email" label="Email" :model="$employee" type="email" class="input" />

            <x-form.form-pair name="number" label="Number" :model="$employee" type="tel" class="input" />
            
            <div class="space-y-2 mt-2 w-full flex flex-col">
                <label for="company_id" class="label"><span aria-hidden="true" class="-mr-1">*</span>Company: </label>
                <select name="company_id" id="company_id">
                    @if($employee->exists)
                        @foreach ($companies->sortBy('name') as $company)
                            <option {{ ($employee->company->id) === $company->id ? 'selected' : '' }} value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    
                    @else
                        @foreach ($companies->sortBy('name') as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

        @endif
            
        <button type="submit" class="btn btn-primary mt-4 w-full" data-test="submit-btn">Submit</button>
        <p class="text-base-content/70 italic">Required fields are marked with an asterisk</p>
    </form>
</x-form>
