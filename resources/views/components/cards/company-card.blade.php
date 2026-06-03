@props(['name', 'email', 'website', 'employee_count', 'company'])
<a href="/companies/{{ $company }}" class="border border-border rounded-lg p-4">
    <div class="flex align-center pb-4 gap-x-4">
        <div class="fill-white text-white max-w-20 max-h-20">
            <img 
                src="{{ asset('storage/icons/' . $company . '.png') }}" 
                alt="Company Logo for {{ $name }}"
                >
        </div>
        <h2 class="text-3xl h-7 text-white my-auto">{{ $name }}</h2>
    </div>
    <p>{{ $email }}</p>
    <p>{{ $website }}</p>
    {{-- <p>http://www.{{ $name }}.com</p> --}}
    <p>Number of employees: {{ $employee_count }}</p>

</a>