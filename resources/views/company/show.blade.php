<x-layout :title="$company->name">
    <div class="max-w-8/10 mx-auto flex-col">
        <div class="flex items-center py-2 my-4 gap-x-4 justify-center">
            <div class="fill-white my-auto">
                <img 
                src="{{ asset('storage/icons/' . $company->id . '.png') }}" 
                alt="Company Logo for {{ $company->name }}"
                class="max-w-20 max-h-20">
            </div>
        </div>
        <div class="max-w-[750px] mx-auto flex flex-col gap-x-4 mb-6 break-words">
            <div>
                <div class="flex flex-col items-center justify-center text-xl gap-y-3">
                    
                    <x-cards.show
                        name="Email"
                        linkStart="mailto:"
                        :hrefValue="$company->email"
                        iconShow="mail-envelope-closed" 
                        iconHidden="mail-envelope-open"
                        color="[&_path]:fill-blue-300"
                        :spanValue="$company->email"
                        hiddenStyle=" -translate-y-1"
                    />
                    <x-cards.show
                        name="Website"
                        :hrefValue="$company->website"
                        iconShow="external-link-A" 
                        iconHidden="external-link-B"
                        color="[&_path]:fill-red-400"
                        :spanValue="$company->website"
                        target="_blank"
                        showStyle=" mb-1"
                        hiddenStyle=" mb-1"
                    />
                    
                </div>
                @auth
                <div class="w-full flex justify-end mt-3">
                    <button id="open-modal" class="btn btn-accent ml-auto mr-0">Edit</button>
                </div>
            </div>
            <div>
                <div class="p-2 w-full text-2xl mt-4">
                    <button id="employee-show" class="flex flex-row hover:cursor-pointer align-items">
                        {{ $company->employees_count }} employee{{ ($company->employees_count === 1) ? '' : 's' }}
                        <x-icon id="chevron" icon="chevron-down" class=" mt-2 ml-1 [&_path]:fill-white [&_svg]:max-h-[20px]" />
                    </button>
                </div>
                <div id="employee-all" class="mt-5 [&>*:nth-child(even)]:bg-gray-500 [&>*:nth-child(odd)]:bg-gray-700 overflow-hidden max-h-0 transition-[max-height] duration-300 ease-in-out">
                    @foreach ($company->employees as $employee)
                        <a href="/employees/{{ $employee->id }}" 
                            class="flex justify-center sm:justify-between gap-y-40 text-xl hover:brightness-[85%]">
                            <span class="p-2">{{ $employee->first_name }} {{ $employee->last_name }}</span>
                            <span class="hidden sm:inline p-2">{{ $employee->email }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <x-cards.modal :company="$company" />
        @endauth
    </div>
</x-layout>