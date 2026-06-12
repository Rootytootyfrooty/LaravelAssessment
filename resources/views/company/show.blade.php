<x-layout title="{{ $company->name }}">
    <div class="max-w-8/10 mx-auto flex-col">
        <div class="flex items-center py-2 my-4 gap-x-4 justify-center">
            <div class="fill-white my-auto">
                <img 
                src="{{ asset('storage/icons/' . $company->id . '.png') }}" 
                alt="Company Logo for {{ $company->name }}"
                class="max-w-20 max-h-20">
            </div>
        </div>
        <div class="max-w-[750px] mx-auto">
            <div class="flex flex-col items-center justify-center text-xl gap-y-3">
                <div class="border rounded-md p-5 w-full flex flex-col md:flex-row items-center gap-2">
                    <strong>Email: </strong>
                    <a href="mailto:{{ $company->email }}" class="break-all md:break-normal">{{ $company->email }}</a>
                </div>
                <div class="border rounded-md p-5 w-full flex flex-col md:flex-row items-center gap-2">
                    <strong>Website: </strong><a href="{{ $company->website }}" target="_blank" class="url">{{ $company->website }}</a>
                </div>
                
            </div>
            @auth
            <div class="w-full flex justify-end mt-3">
                <button id="open-modal" class="btn btn-accent ml-auto mr-0">Edit</button>
            </div>
            <div class="mt-4 p-2 w-full text-2xl">
                <a>{{ $company->employees_count }} employee{{ ($company->employees_count === 1) ? '' : 's' }}:</a> 
            </div>
            <div class="mt-5 [&>*:nth-child(even)]:bg-gray-500 [&>*:nth-child(odd)]:bg-gray-700">
                @foreach ($company->employees as $employee)
                    <a href="/employees/{{ $employee->id }}" 
                        class="flex justify-center sm:justify-between gap-y-40 text-xl hover:brightness-[85%]">
                        <span class="p-2">{{ $employee->first_name }} {{ $employee->last_name }}</span>
                        <span class="hidden sm:inline p-2">{{ $employee->email }}</span>
                    </a>
                @endforeach
            </div>
        </div>
        <x-cards.modal :company="$company" />
        @endauth
    </div>
</x-layout>