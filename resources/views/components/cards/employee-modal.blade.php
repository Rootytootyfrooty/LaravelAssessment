@props(['employee' => new App\Models\Employee(), 'companies'])
    <div
        style="display: {{ $errors->any() ? 'block' : 'none'}}"
        id="modal"
        data-open-on-error="{{ $errors->any() ? '1' : '0' }}"
        aria-modal="true"
        role="dialog"
        tabindex="-1"
        >
        <div class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-black/50 backdrop-blur-xs">
            <div>
                <h2 class="text-3xl">{{ $employee->exists ? 'Edit Employee' : 'Add New Employee' }}</h2>
                <form 
                    method="POST" 
                    
                    action="{{ $employee->exists ? route('employee.update', $employee) : route('employee.store') }}" 
                    class="flex flex-col items-center w-[320px]">
                    @csrf

                    @if($employee->exists)
                    @method('PATCH')
                    @endif

                    <div class="space-y-2 mt-2 w-full">
                        <label  for="first_name" class="label"><span aria-hidden="true" class="-mr-1">*</span>First Name: </label>
                        <input name="first_name" type="text" class="input" id="first_name" value="{{ old('first_name', $employee->first_name) }}">
                        @if ($errors->has('first_name'))
                            <p class="text-error text-center">{{ $errors->first('first_name') }}</p>
                        @endif
                    </div>
                    <div class="space-y-2 mt-2 w-full">
                        <label  for="last_name" class="label"><span aria-hidden="true" class="-mr-1">*</span>Last Name: </label>
                        <input name="last_name" type="text" class="input" id="last_name" value="{{ old('last_name', $employee->last_name) }}">
                        @if ($errors->has('last_name'))
                            <p class="text-error text-center">{{ $errors->first('last_name') }}</p>
                        @endif
                    </div>
                    <div class="space-y-2 mt-2 w-full">
                        <label for="email" class="label"><span aria-hidden="true" class="-mr-1">*</span>Email: </label>
                        <input name="email" type="email" class="input" id="email" value="{{ old('email', $employee->email) }}">
                        @if ($errors->has('email'))
                            <p class="text-error text-center">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="space-y-2 mt-2 w-full">
                        <label for="number" class="label"><span aria-hidden="true" class="-mr-1">*</span>Telephone Number: </label>
                        <input name="number" type="tel" class="input" id="number" value="{{ old('number', $employee->number) }}">
                        @if ($errors->has('number'))
                            <p class="text-error text-center">{{ $errors->first('number') }}</p>
                        @endif
                    </div>
                    <div class="space-y-2 mt-2 w-full flex flex-col">
                        <label for="company" class="label"><span aria-hidden="true" class="-mr-1">*</span>Company: </label>
                        <select name="company_id" id="company">
                            @if($employee->exists)
                                @foreach ($companies as $company)
                                    <option {{ ($employee->company->id) === $company->id ? 'selected' : '' }} value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            
                            @else
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 w-full" data-test="submit-employee-btn">Submit</button>
                    <p class="text-base-content/70 italic">Required fields are marked with an asterisk</p>
                </form>
                
                <div class="mt-2 flex flex-row justify-between w-full">
                    <button id="close-modal" class="btn btn-grey btn-outlined">Cancel</button>
                    @if($employee->exists)
                    <form method="POST" action="{{ route('employee.destroy', $employee) }}">
                        @csrf
                        @method('DELETE')
                        <button id="delete-employee" class="btn btn-secondary btn-outlined">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
