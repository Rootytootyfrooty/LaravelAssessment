@props(['firstName', 'lastName', 'company', 'email', 'number', 'id'])
{{-- <x-cards.modal /> --}}
<div
    class="bg-red-700 min-w-[250px] text-center p-4 rounded-md text-xl absolute left-1/2 lg:left-1/2 top-1/2 -translate-y-1/2
    opacity-0 transition-all duration-300 ease-in delete-confirmation-msg hidden">
    <form method="POST" action="{{ route('employee.destroy', $id) }}" class="h-[25px]">
        @csrf
        @method('DELETE')
        <p>Are you sure you want to delete {{ $firstName }} {{ $lastName }}?</p>
        <button class="btn btn-secondary h-[25px] w-[60px] p-1">Confirm</button>
    </form>
    <button class="btn btn-accent h-[25px] w-[60px] p-1 cancel-delete">Cancel</button>
</div>
<tr class="border-t">
    <th scope="row" class="fill-white align-middle">
        <div class="fill-white flex flex-row gap-x-2 p-3 items-center">
            <a href="/employees/{{ $id }}">{{ $firstName }} {{ $lastName }}</a>
        </div>
    </th>

    <td scope="row" class="p-3 border-l border-r">
        <div>{{ $company }}</div>

    </td>

    <td scope="row" class="p-3 border-r">
        <div>{{ $email }}</div>

    </td>

    <td scope="row" class="p-3 border-r">
        <div>{{ $number }}</div>
    </td>
    <td scope="row" class="align-middle">
        <div class="flex flex-row justify-center gap-x-1">
            <a href="/employees/{{ $id }}" class="btn text-primary h-[25px] w-[60px] p-1 border border-primary">View</a>
            <a href="/employees/{{ $id }}" class="btn text-accent h-[25px] w-[60px] p-1 open-modal border border-accent">Edit</a>
            <button class="btn text-secondary h-[25px] w-[60px] p-1 delete-company border border-secondary">Delete</button>
        </div>
    </td>
</tr>
