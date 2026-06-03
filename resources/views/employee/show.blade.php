<x-layout>
    <div class="max-w-8/10 mx-auto flex-col">
        <div class="flex align-center py-2 gap-x-4 justify-center">

            <h1 class="text-center text-5xl my-6 text-white">{{ $employee->first_name }} {{ $employee->last_name }}</h1>
        </div>
        <div class="border rounded-md p-3">
            <div class="flex flex-col items-center justify-center text-xl">
                <p>Email: {{ $employee->email }}</p>
                <p>Number: {{ $employee->number }}</p>
                <a href="/companies/{{ $employee->company->id }}">Company: {{ $employee->company->name }}</a>
            </div>
            @auth
            <div class="w-full flex justify-end mt-3">
                <button id="open-modal" class="btn btn-accent ml-auto mr-0">Edit</button>
            </div>
            </div>
            <x-cards.employee-modal :companies="$companies" :employee="$employee"/>
            @endauth
    </div>
</x-layout>