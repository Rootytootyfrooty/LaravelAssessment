<x-layout title="Companies">
    <div class="max-w-8/10 mx-auto">
        <x-sort :sort="$sort" />
    </div>
    <div class="grid md:grid-cols-2 gap-6 m-6 max-w-8/10 mx-auto xl:max-w-[1150px]">
        @foreach ($companies as $company)
            <x-cards.company-card 
                :name="$company->name"
                :email="$company->email"
                :website="$company->website"
                :employee_count="$company->employees_count"
                :company="$company->id"
                class="shadow-xl max-w-2xl w-full max-h-[80dvh] overflow-auto">

            </x-cards.company-card>
        @endforeach
    </div>
    <div>
        {{ $companies->links() }}
    </divs>
    <x-cards.modal />
</x-layout>