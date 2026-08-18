@props(['employee' => new App\Models\Employee(), 'companies' => '', 'company' => new App\Models\Company()])
<div id="modal"
    aria-modal="true"
    role="dialog"
    tabindex="-1" 
    class="{{ $errors->any() ? 'opacity-100 translate-y-0 translate-x-0 ' : 'hidden opacity-0 -translate-y-4 translate-x-4 ' }}fixed inset-0 z-50 flex flex-col items-center justify-center bg-black/50 backdrop-blur-xs transition-all duration-250 ease-in">
    <div class="bg-black/70 p-7 rounded-lg">
        @if (request()->routeIs('company.index') || (request()->routeIs('company.show')))
            <h2 class="text-3xl">{{ $company->exists ? 'Edit Company' : 'Add New Company' }}</h2>
        @endif
        @if (request()->routeIs('employee.index') || (request()->routeIs('employee.show')))
            <h2 class="text-3xl">{{ $employee->exists ? 'Edit Employee' : 'Add New Employee' }}</h2>
        @endif
        {{ $slot }}

        <div class="mt-4 flex flex-row justify-between w-[309px]">
            <button id="close-modal" class="btn btn-grey btn-outlined">Cancel</button>
            @if (request()->routeIs('company.index') || (request()->routeIs('company.show') || request()->routeIs('employee.index') || (request()->routeIs('employee.show'))))
                @if($company->exists || $employee->exists)
                    <button data-test="delete" class="btn btn-secondary btn-outlined delete-company">Delete</button>
                @endif
            @endif
        </div>

    </div>
</div>
<div
    class="bg-base-300 min-w-[250px] text-center p-4 rounded-md text-xl absolute left-1/2 lg:left-1/2 top-1/2 -translate-y-1/2
    opacity-0 transition-all duration-300 ease-in delete-confirmation-msg hidden z-51">
    @if (request()->routeIs('company.index') || (request()->routeIs('company.show')))
    @if($company->exists)
        <p class="mb-5">Are you sure you want to <span class="text-red-300">delete</span><strong> {{ $company->name }}</strong>?</p>
        <form method="POST" action="{{ route('company.destroy', $company) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-secondary h-[25px] w-[80px] p-4 mr-1">Confirm</button>
            <button type="button" class="btn h-[25px] w-[80px] p-4 cancel-delete ml-1">Cancel</button>
        </form>
        @endif
    @endif
    @if (request()->routeIs('employee.index') || (request()->routeIs('employee.show')))
        @if($employee->exists)
        <p class="mb-5">Are you sure you want to <span class="text-red-300">delete</span><strong> {{ $employee->first_name }} {{ $employee->last_name }}? </strong></p>
        <form method="POST" action="{{ route('employee.destroy', $employee) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-secondary h-[25px] w-[80px] p-4 mr-1">Confirm</button>
            <button type="button" class="btn h-[25px] w-[80px] p-4 cancel-delete ml-1">Cancel</button>
        </form>
        @endif
    @endif
    
</div>