@props(['name', 'email', 'website', 'employee_count', 'company'])
<a href="/companies/{{ $company }}" class="flex flex-col justify-between border border-border rounded-lg px-5 lg:p-8 py-6 hover:scale-105 transition-hover duration-250 ease-in-out min-w-0">
    <div class="flex items-center pb-6 gap-x-4">
        <div class="fill-white max-w-20 max-h-20">
            <img 
                src="{{ asset('storage/icons/' . $company . '.png') }}" 
                alt="Company Logo for {{ $name }}"
                >
        </div>
        <h2 class="text-2xl md:text-3xl max-h-30 my-auto font-semibold">{{ $name }}</h2>
    </div>
    
    <div class="max-w-full min-w-0 flex flex-col justify-center text-lg gap-y-2 md:truncate md:hover:whitespace-normal md:hover:overflow-visible">

        <div class="flex flex-row items-center">
            <x-icon icon="mail-envelope-closed" class="pr-3 mt-1 [&_path]:fill-blue-300" />
            <div class="truncate">{{ $email }}</div>
        </div>

        <div class="flex flex-row items-center">
            <x-icon icon="sphere" class="pr-3 [&_path]:fill-emerald-300"/>
            <div class="truncate">{{ $website }}</div>
        </div>

        <div class="flex flex-row items-center">
            <x-icon icon="people_outline" class="pr-3 mr-1 [&_path]:fill-yellow-100"/>
            <div>
                <span class="hidden sm:inline">Number of </span>Employees: <strong>{{ $employee_count }}</strong>
            </div>
        </div>

    </div>
</a>