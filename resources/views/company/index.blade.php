<x-layout title="Companies">
    <div class="max-w-8/10 mx-auto flex flex-col items-center">
        <x-sort :sort="$sort" />
        <div class="flex justify-center mb-3">
            @if($companies->count() === 0)
                <p class="mt-20">Sorry, no results for "{{ $search }}"</p>
                @else
                <p class="mt-2">{{ $companies->total() }} result{{ $companies->total() > 1 ? 's' : '' }}</p>
            @endif
        </div>
    </div>
    <div class="mx-5 lg:mx-auto max-w-[1150px] overflow-x-scroll border border-border rounded-t-md">
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th scope="col" class="p-2" >Company Name</th>
                    <th scope="col" class="p-2 border-l border-r">Email</th>
                    <th scope="col" class="p-2 border-r">Website</th>
                    <th scope="col" class="p-2 border-r">Employees</th>
                    <th scope="col">Controls</th>
                </tr>
            </thead>
            <tbody class="[&>*:nth-child(odd)]:bg-base-300">
                @foreach ($companies as $company)
                    <x-cards.company-card 
                        :name="$company->name"
                        :email="$company->email"
                        :website="$company->website"
                        :employee_count="$company->employees_count"
                        :company="$company->id"
                        class="shadow-xl max-w-2xl w-full max-h-[80dvh]"
                        :whole-company="$company">

                    </x-cards.company-card>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mx-auto mb-3 px-2">
        {{ $companies->links() }}
    </div>
    <x-cards.modal />
</x-layout>