@props(['company'])
<div
    class="fixed inset-0 flex items-center justify-center bg-black/50 backdrop-blur-xs"
    style="display: none"
    id="edit-modal"
    >
    <form method="POST" action="/">
        @csrf
        @method('PATCH')
        <label for="name" class="label">Company Name: </label>
        <input type="text" class="input" id="name" value="{{ $company->name }}">

        <label for="email" class="label">Email: </label>
        <input type="email" class="input" id="email" value="{{ $company->email }}">

        <label for="url" class="label">Website: </label>
        <input type="url" class="input" id="url" value="{{ $company->website }}">
    </form>
</div>