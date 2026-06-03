<x-layout>
    <div class="max-w-8/10 mx-auto flex-col">
        <div class="flex align-center py-2 gap-x-4 justify-center">
            <div class="fill-white my-auto text-white">
                <img 
                src="{{ asset('storage/icons/' . $company->id . '.png') }}" 
                alt="Company Logo for {{ $company->name }}"
                class="max-w-20 max-h-20">
            </div>
            <h1 class="text-center text-5xl my-6 text-white">{{ $company->name }}</h1>
        </div>
        <div class="border rounded-md p-3">
            <div class="flex flex-col items-center justify-center text-xl gap-y-3">
                <p>Email: {{ $company->email }}</p>
                <p>Website: {{ $company->website }}</p>
                <a>Number of Employees: {{ $company->employee_count }}</a>
            </div>
            @auth
            <div class="w-full flex justify-end mt-3">
                <button id="open-modal" class="btn btn-accent ml-auto mr-0">Edit</button>
            </div>
        </div>
        <x-cards.modal :company="$company" />
        @endauth
    </div>
</x-layout>