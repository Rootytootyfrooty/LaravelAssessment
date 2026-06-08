@props(['company' => new App\Models\Company()])
    <div
        style="display: {{ $errors->any() ? 'block' : 'none'}}"
        id="modal"
        aria-modal="true"
        role="dialog"
        tabindex="-1"
        
        >
        <div class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-black/50 backdrop-blur-xs">
            <div>
                <h2 class="text-3xl">{{ $company->exists ? "Edit Company" : 'Add New Company' }}</h2>
                <form 
                    method="POST" 
                    enctype="multipart/form-data"
                    action="{{ $company->exists ? route('company.update', $company) : route('company.store') }}" 
                    class="flex flex-col">
                    @csrf

                    @if($company->exists)
                    @method('PATCH')
                    @endif

                    <div class="space-y-2 mt-2">
                        <label  for="name" class="label">Company Name: </label>
                        <input name="name" type="text" class="input" id="name" value="{{ old('name', $company->name) }}">
                        @if ($errors->has('name'))
                            <p class="text-error text-center">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="space-y-2 mt-2">
                        <label for="email" class="label">Email: </label>
                        <input name="email" type="email" class="input" id="email" value="{{ old('email', $company->email) }}">
                        @if ($errors->has('email'))
                            <p class="text-error text-center">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="space-y-2 mt-2">
                        <label for="url" class="label">Website: </label>
                        <input name="website" type="url" class="input" id="url" value="{{ old('website', $company->website) }}">
                        @if ($errors->has('website'))
                            <p class="text-error text-center">{{ $errors->first('website') }}</p>
                        @endif
                    </div>
                    <div class="space-y-2 mt-2 flex flex-col">
                        <label for="logo" class="label">Logo: </label>
                        <input type="file" name="logo" accept="image/png" id="logo">
                        @if ($errors->has('logo'))
                            <p class="text-error text-center">{{ $errors->first('logo') }}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
                <div class="mt-4 flex flex-row justify-between w-[309px]">
                    <button id="close-modal" class="btn btn-grey btn-outlined">Cancel</button>
                    @if($company->exists)
                    <form method="POST" action="{{ route('company.destroy', $company) }}">
                        @csrf
                        @method('DELETE')
                        <button id="delete-company" class="btn btn-secondary btn-outlined">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
