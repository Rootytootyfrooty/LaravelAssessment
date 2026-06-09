@props(['sort' => ["sort" => "latest"]])
<div class="flex gap-3 max-w-full flex-wrap mx-auto justify-center mt-10">
    <x-sort-link option="latest" :active="($sort === 'latest')">Sort By Latest</x-sort-link>
    <x-sort-link option="oldest" :active="($sort === 'oldest')">Sort By Oldest</x-sort-link>
    <div id="more-options-btn" class="btn bg-gray-700 flex items-center justify-center md:order-12">
        {{-- <p>Show {{ ($_GET['sort'] === 'latest' || 'oldest') ? 'more' : 'fewer' }} options</p> --}}
        {{-- <p>Show {{ !($sort === 'latest' || $sort === 'oldest') ? 'fewer' : 'more' }} options</p> --}}
        @if(!($sort === 'latest' || $sort === 'oldest'))
            <p>Show fewer options</p>
            <span class="mb-1 rotate-180 md:rotate-90 md:mt-1.5 md:-ml-1">&#129175;</span>
        @else
            <p>Show more options</p>
            <span class="mt-2 md:-rotate-90 md:mt-1 md:ml-1">&#129175;</span>
        @endif
    </div>
    <div id="more-options" class="flex flex-wrap justify-center gap-3 {{ !($sort === 'latest' || $sort === 'oldest') ? '' : 'hidden' }}">
        
        <x-sort-link option="aToZ" :active="($sort === 'aToZ')">Sort A-Z</x-sort-link>
        <x-sort-link option="zToA" :active="($sort === 'zToA')">Sort Z-A</x-sort-link>
        @if (request()->routeIs('employee.index'))
            <x-sort-link option="companiesAsc" :active="($sort === 'companiesAsc')">Sort Company A-Z</x-sort-link>
            <x-sort-link option="companiesDesc" :active="($sort === 'companiesDesc')">Sort Company Z-A</x-sort-link>
        @endif
        @if (request()->routeIs('company.index'))
            <x-sort-link option="employeesAsc" :active="($sort === 'employeesAsc')">Employees Asc.</x-sort-link>
            <x-sort-link option="employeesDesc" :active="($sort === 'employeesDesc')">Employees Desc.</x-sort-link>
        @endif
    </div>
</div>