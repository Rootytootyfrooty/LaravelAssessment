@props(['firstName', 'lastName', 'company', 'email', 'number'])
<div class="border border-border rounded-lg p-3">
    <h2 class="text-xl text-white">{{ $firstName }} {{ $lastName }}</h2>
    <p>{{ $company }}</p>
    <p>{{ $email }}</p>
    <p>{{ $number }}</p>
</div>