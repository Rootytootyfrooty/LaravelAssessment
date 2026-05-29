<x-layout>
    <div class="max-w-8/10 mx-auto flex-col">
        <div class="flex align-center py-2 gap-x-4 justify-center">
            <div class="fill-white my-auto text-white">
                {!! file_get_contents(storage_path("app/public/icons/{$company->id}.svg")) !!}
            </div>
            <h1 class="text-center text-5xl my-6 text-white">{{ $company->name }}</h1>
        </div>
        <div class="border rounded-md p-3">
            <div class="flex flex-col items-center justify-center">
                <p>Email: {{ $company->email }}</p>
                <p>Website: {{ $company->website }}</p>
                <a>Number of Employees: {{ $company->employee_count }}</a>
            </div>
            @auth
            <div class="w-full flex justify-end mt-3">
                <button id="edit-btn" class="btn btn-accent ml-auto mr-0">Edit</button>
            </div>
        </div>
        <div
            style="display: none"
            id="edit-modal"
            aria-modal="true"
            role="dialog"
            >
            <div class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-black/50 backdrop-blur-xs">
                <h2 class="text-3xl">Edit Company</h2>
                <form method="POST" action="{{ route('company.update', $company) }}" class="flex flex-col">
                    @csrf
                    @method('PATCH')
                    <div class="space-y-2 mt-2">
                        <label  for="name" class="label">Company Name: </label>
                        <input name="name" type="text" class="input" id="name" value="{{ $company->name }}">
                    </div>
                    <div class="space-y-2 mt-2">
                        <label for="email" class="label">Email: </label>
                        <input name="email" type="email" class="input" id="email" value="{{ $company->email }}">
                    </div>
                    <div class="space-y-2 mt-2">
                        <label for="url" class="label">Website: </label>
                        <input name="website" type="url" class="input" id="url" value="{{ $company->website }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
                <div class="mt-4">
                    <button id="cancel-edit" class="btn btn-grey btn-outlined">Cancel</button>
                    <button id="cancel-edit" class="btn btn-secondary btn-outlined">Delete</button>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p class="text-error">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        @endauth
        @guest
        </div>
        @endguest
        {{-- <x-cards.modal company="{{ $company }}"/> --}}
    {{-- <x-cards.company-card 
        name="{{ $company->name }}"  
        email="{{ $company->email }}" 
        website="{{ $company->website }}"
        employee_count="{{ $company->employee_count }}"
        company="{{ $company->id }}"
        class="shadow-xl max-w-2xl w-full max-h-[80dvh] overflow-auto"
        >
    </x-cards.company-card> --}}

    </div>
</x-layout>