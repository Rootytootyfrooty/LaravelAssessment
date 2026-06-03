<x-layout page="Employee">
    <div class="max-w-8/10 mx-auto">
        <h1 class="text-center text-5xl my-6 text-white">Employees</h1>
        <x-sort />
    </div>

    <div class="grid md:grid-cols-2 gap-6 m-6 max-w-8/10 mx-auto">
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
    <div class="mx-auto">
        {{ $employees->links() }}
    </div>
    <x-cards.employee-modal :companies="$companies" />
</x-layout>