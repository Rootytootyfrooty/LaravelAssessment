<x-layout title="{{ $employee->first_name }} {{ $employee->last_name }}">
    <div class="max-w-8/10 mx-auto flex-col mt-20">
        <div class="p-3 max-w-[750px] mx-auto">
            <div class="flex flex-col items-center justify-center text-xl gap-4 text-center">
                <div class="p-3 md:p-5 w-full flex flex-col md:flex-row gap-2">
                    <strong>Email: </strong>
                    <p class="break-all md:break-normal">{{ $employee->email }}</p>
                </div>
                <div class="p-5 w-full flex flex-col md:flex-row gap-2 border-t border-b">
                    <strong>Telephone number: </strong>
                    <p class="break-all md:break-normal">{{ $employee->number }}</p>
                </div>
                <div class="p-5 w-full flex flex-col md:flex-row gap-2">
                    <strong>Company: </strong>
                    <a href="/companies/{{ $employee->company->id }}" class="break-all md:break-normal link-primary">{{ $employee->company->name }}</a>
                </div>
            </div>
            @auth
            <div class="w-full flex justify-end mt-3">
                <button id="open-modal" class="btn btn-accent ml-auto mr-0">Edit</button>
            </div>
        </div>
        <x-cards.modal :companies="$companies" :employee="$employee"/>
            @endauth
    </div>
</x-layout>