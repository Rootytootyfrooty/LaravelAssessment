<x-layout title="Employees">
    <div class="max-w-8/10 mx-auto">
        <x-sort :sort="$sort" :search="$search" />
        <div class="flex justify-center mb-3">
            @if($employees->count() === 0)
                <p class="mt-20">Sorry, no results for "{{ $search }}"</p>
                @else
                <p class="mt-2">{{ $employees->total() }} result{{ $employees->total() > 1 ? 's' : '' }}</p>
            @endif
        </div>
    </div>

    <div class="mx-5 lg:mx-auto max-w-[1150px] overflow-x-scroll border border-border rounded-t-md">
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th scope="col" class="p-2" >Name</th>
                    <th scope="col" class="p-2 border-l border-r">Company</th>
                    <th scope="col" class="p-2 border-r">Email</th>
                    <th scope="col" class="p-2 border-r">Number</th>
                    <th scope="col">Controls</th>
                </tr>
            </thead>
            <tbody class="[&>*:nth-child(odd)]:bg-base-300">
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
            </tbody>
        </table>
    </div> 
    <div class="mx-auto mb-3 px-2">
        {{ $employees->links() }}
    </div>
    <x-cards.modal :companies="$companies" />
</x-layout>