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
            @if (request()->routeIs('company.index') || (request()->routeIs('company.show')))
                @if($company->exists)
                <form method="POST" action="{{ route('company.destroy', $company) }}">
                    @csrf
                    @method('DELETE')
                    <button data-test="delete" class="btn btn-secondary btn-outlined">Delete</button>
                </form>
                @endif
            @endif
            @if (request()->routeIs('employee.index') || (request()->routeIs('employee.show')))
                @if($employee->exists)
                <form method="POST" action="{{ route('employee.destroy', $employee) }}">
                    @csrf
                    @method('DELETE')
                    <button data-test="delete" class="btn btn-secondary btn-outlined">Delete</button>
                </form>
                @endif
            @endif
        </div>

    </div>
</div>