@props(['name', 'email', 'website', 'employee_count', 'company'])
<a href="/companies/{{ $company }}" class="border border-border rounded-lg p-4">
    <div class="flex align-center py-2 gap-x-4">
        <div class="fill-white text-white">
            {!! file_get_contents(storage_path("app/public/icons/{$company}.svg")) !!}
        </div>
        <h2 class="text-xl h-7 text-white">{{ $name }}</h2>
    </div>
    <p>{{ $email }}</p>
    <p>{{ $website }}</p>
    {{-- <p>http://www.{{ $name }}.com</p> --}}
    <p>Number of employees: {{ $employee_count }}</p>

</a>