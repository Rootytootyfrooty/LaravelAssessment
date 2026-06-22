<x-layout title="Employees">
    <div class="max-w-8/10 mx-auto">
        <x-sort :sort="$sort" :search="$search" />
        <div class="flex justify-center">
            @if($employees->count() === 0)
                <p class="mt-20">Sorry, no results for "{{ $search }}"</p>
                @else
                <p class="mt-2">{{ $employees->total() }} result{{ $employees->total() > 1 ? 's' : '' }}</p>
            @endif
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-6 m-6 max-w-8/10 xl:max-w-[1150px] mx-auto">
        @foreach ($employees as $employee)
            <x-cards.employee-card 
                :first-name="$employee->first_name" 
                :last-name="$employee->last_name" 
                :email="$employee->email" 
                :company="$employee->company->name"
                :number="$employee->number"
                :id="$employee->id"
                class="shadow-xl max-w-2xl w-full max-h-[80dvh] overflow-auto">

            </x-cards.employee-card>
        @endforeach
    </div> 
    <div class="mx-auto mb-3 px-2">
        {{ $employees->links() }}
    </div>
    <x-cards.modal :companies="$companies" />
</x-layout>