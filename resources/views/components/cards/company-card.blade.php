@props(['name', 'email', 'website', 'employee_count', 'company'])
<div
    class="bg-base-300 min-w-[250px] text-center p-4 rounded-md text-xl absolute left-1/2 lg:left-1/2 top-1/2 -translate-y-1/2
    opacity-0 transition-all duration-300 ease-in delete-confirmation-msg hidden">
    <form method="POST" action="{{ route('company.destroy', $company) }}" class="h-[25px]">
        @csrf
        @method('DELETE')
        <p class="mb-5">Are you sure you want to <span class="text-red-300">delete</span><strong> {{ $name }}?</strong></p>
        <button type="submit" class="btn btn-secondary h-[25px] w-[80px] p-4 mr-1">Confirm</button>
        <button type="button" class="btn h-[25px] w-[80px] p-4 cancel-delete ml-1">Cancel</button>
    </form>
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
            {{-- <a href="/companies/{{ $company }}" class="btn text-accent h-[25px] w-[60px] p-1 border border-accent">Edit</a> --}}
            {{-- <a href="{{ route('company.show', [$company->id, 'trigger' -> 'modal']) }}" class="btn text-accent h-[25px] w-[60px] p-1 border border-accent">Edit</a> --}}
            <a href="/companies/{{ $company }}?trigger=modal" class="btn text-accent h-[25px] w-[60px] p-1 border border-accent">Edit</a>
            
            <button class="btn text-secondary h-[25px] w-[60px] p-1 delete-company border border-secondary">Delete</button>
        </div>
    </td>
</tr>