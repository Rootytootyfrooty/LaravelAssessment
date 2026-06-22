<x-layout title="Companies">
    <div class="max-w-8/10 mx-auto flex flex-col items-center">
        <x-sort :sort="$sort" />
        <div>
            @if($companies->count() === 0)
                <p class="mt-20">Sorry, no results for "{{ $search }}"</p>
                @else
                <p class="mt-2">{{ $companies->total() }} result{{ $companies->total() > 1 ? 's' : '' }}</p>
            @endif
        </div>
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
    <div class="mx-auto mb-3 px-2">
        {{ $companies->links() }}
    </div>
    <x-cards.modal />
</x-layout>