@props(['sort' => ["sort" => "latest"], 'search' => ''])
<div class="mb-2">
    <div class="flex gap-3 max-w-full flex-wrap mx-auto justify-center mt-8">

        <x-sort-link option="aToZ" :active="($sort === 'aToZ')">Sort A-Z</x-sort-link>
        <x-sort-link option="zToA" :active="($sort === 'zToA')">Sort Z-A</x-sort-link>

        

        <button id="more-options-btn" class="btn bg-gray-700 hover:bg-gray-600 flex items-center justify-center md:order-12">
            <span id="option-text">
                @if(!($sort === 'aToZ' || $sort === 'zToA'))
                    Fewer Options
                @else
                    More Options
                @endif
            </span>
            <x-icon id="chevron" icon="chevron-down" class="-pr-1 mt-1 [&_path]:fill-white [&_svg]:w-[12px] [&_svg]:max-h-[12px]" />
        </button>

        <div id="more-options" class="flex flex-wrap justify-center gap-3 {{ !($sort === 'aToZ' || $sort === 'zToA') ? '' : 'hidden' }}">

            <x-sort-link option="latest" :active="($sort === 'latest')">Sort By Latest</x-sort-link>
            <x-sort-link option="oldest" :active="($sort === 'oldest')">Sort By Oldest</x-sort-link>

            @if (request()->routeIs('employee.index'))
                <x-sort-link option="companiesAsc" :active="($sort === 'companiesAsc')">Company A-Z</x-sort-link>
                <x-sort-link option="companiesDesc" :active="($sort === 'companiesDesc')">Company Z-A</x-sort-link>
            @endif
            @if (request()->routeIs('company.index'))
                <x-sort-link option="employeesAsc" :active="($sort === 'employeesAsc')">Employees Asc.</x-sort-link>
                <x-sort-link option="employeesDesc" :active="($sort === 'employeesDesc')">Employees Desc.</x-sort-link>
            @endif

        </div>
    </div>

    <div class="mt-5">
        <form method="GET" class="flex flex-row justify-center">
            <input
                class="input rounded-none rounded-tl-lg rounded-bl-lg"
                type="text"
                id="search"
                name="search"
                required 
                value="{{ request('search') }}"
                aria-label="search-records" />
                @if(request()->has('sort'))
                <input type="hidden" name="sort" value="{{ request('sort') }}" />
                @endif
            <button type="submit" class="btn rounded-none rounded-tr-lg rounded-br-lg">Search</button>
        </form>
    </div>
    <div class="flex justify-center mt-1">
        <a href="{{ url()->current() }}" id="clear-search" class="text-gray-400 text-center">Clear search</a>
    </div>
    
</div>