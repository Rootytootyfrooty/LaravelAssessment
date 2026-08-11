@props(['name', 'email', 'website', 'employee_count', 'company'])
<div
    class="bg-red-700 min-w-[250px] text-center p-4 rounded-md text-xl absolute left-1/2 lg:left-1/2 top-1/2 -translate-y-1/2
    opacity-0 transition-all duration-300 ease-in delete-confirmation-msg hidden">
    <form method="POST" action="{{ route('company.destroy', $company) }}" class="h-[25px]">
        @csrf
        @method('DELETE')
        <p>Are you sure you want to delete {{ $name }}?</p>
        <button class="btn btn-secondary h-[25px] w-[60px] p-1">Confirm</button>
    </form>
    <button class="btn btn-accent h-[25px] w-[60px] p-1 cancel-delete">Cancel</button>
</div>
<tr class="border-t">
    <th scope="row" class="fill-white align-middle">
        <div class="fill-white flex flex-row gap-x-2 p-3 items-center">
            <img 
                src="{{ asset('storage/icons/' . $company . '.png') }}" 
                alt="Company Logo for {{ $name }}"
                class="max-w-5 max-h-5"
                >
                <a href="/companies/{{ $company }}">{{ $name }}</a>
        </div>
    </th>

    <td scope="row" class="p-3 border-l border-r">
        <div>{{ $email }}</div>
    </td>

    <td scope="row" class="p-3 border-r">
        <div>{{ $website }}</div>
    </td>

    <td scope="row" class="p-3 border-r">
        <div>
            {{ $employee_count }}
        </div>
    </td>
    <td scope="row" class="align-middle">
        <div class="flex flex-row justify-center gap-x-1">
            <a href="/companies/{{ $company }}" class="btn text-primary h-[25px] w-[60px] p-1 border border-primary">View</a>
            <a href="/companies/{{ $company }}" class="btn text-accent h-[25px] w-[60px] p-1 open-modal border border-accent">Edit</a>
            <button class="btn text-secondary h-[25px] w-[60px] p-1 delete-company border border-secondary">Delete</button>
        </div>
    </td>
</tr>
{{-- <x-form :company="$company"/> --}}