@props(['firstName', 'lastName', 'company', 'email', 'number', 'id'])
<a href="/employees/{{ $id }}" class="flex flex-col justify-between border border-border rounded-lg px-7 py-8 lg:p-9 hover:scale-105 transition-hover duration-250 ease-in-out break-words min-w-0">
    <h2 class="text-3xl pb-6 text-center">{{ $firstName }} {{ $lastName }}</h2>


        <div class="flex flex-col text-lg gap-y-2 max-w-full min-w-0 lg:ml-8">

            <div class="flex flex-row items-center">
                <x-icon icon="building-o" class="pr-3 [&_path]:fill-gray-200 [&_svg]:max-h-[25px]"/>
                <div class="truncate">{{ $company }}</div>
            </div>

            <div class="flex flex-row items-center">
                <x-icon icon="mail-envelope-closed" class="pr-3 mt-1 -ml-[7px] [&_path]:fill-blue-300" />
                <div class="truncate">{{ $email }}</div>
            </div>

            <div class="flex flex-row items-center">
                <x-icon icon="phone" class="pr-3 [&_path]:fill-red-400"/>
                <div class="truncate">{{ $number }}</div>
            </div>

        </div>


</a>