@props(['employee' => new App\Models\Employee(), 'companies'])
    <div
        style="display: none"
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
                    enctype="multipart/form-data"
                    action="{{ $employee->exists ? route('employee.update', $employee) : route('employee.store') }}" 
                    class="flex flex-col">
                    @csrf

                    @if($employee->exists)
                    @method('PATCH')
                    @endif

                    <div class="space-y-2 mt-2">
                        <label  for="first_name" class="label">First Name: </label>
                        <input name="first_name" type="text" class="input" id="first_name" value="{{ old('first_name', $employee->first_name) }}">
                    </div>
                    <div class="space-y-2 mt-2">
                        <label  for="last_name" class="label">Last Name: </label>
                        <input name="last_name" type="text" class="input" id="last_name" value="{{ old('last_name', $employee->last_name) }}">
                    </div>
                    <div class="space-y-2 mt-2">
                        <label for="email" class="label">Email: </label>
                        <input name="email" type="email" class="input" id="email" value="{{ old('name', $employee->email) }}">
                    </div>
                    <div class="space-y-2 mt-2">
                        <label for="number" class="label">Telephone Number: </label>
                        <input name="number" type="tel" class="input" id="number" value="{{ old('name', $employee->number) }}">
                    </div>
                    <div class="space-y-2 mt-2 flex flex-col">
                        <label for="company" class="label">Company: </label>
                        <select name="company_id" id="company">
                            @if($employee->exists)
                                @foreach ($companies as $company)
                                    <option selected="{{ optional($employee->company->id) === $company->id ? 'selected' : '' }}" value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            
                            @else
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <p class="text-error">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="mt-4 flex flex-row justify-between w-[309px]">
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
