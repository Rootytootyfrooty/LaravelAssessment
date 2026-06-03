@props(['firstName', 'lastName', 'company', 'email', 'number', 'id'])
<a href="/employees/{{ $id }}" class="border border-border rounded-lg p-4">
        <h2 class="text-xl text-white">{{ $firstName }} {{ $lastName }}</h2>
        <p>{{ $company }}</p>
        <p>{{ $email }}</p>
        <p>{{ $number }}</p>
</a>