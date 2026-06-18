<x-layout :title="$employee->first_name . ' ' . $employee->last_name">
    <div class="max-w-8/10 mx-auto flex-col mt-20">
        <div class="max-w-[750px] mx-auto">
            <div class="flex flex-col items-center justify-center text-xl gap-y-3">               
                <x-cards.show
                    name="Email"
                    linkStart="mailto:"
                    :hrefValue="$employee->email"
                    iconShow="mail-envelope-closed" 
                    iconHidden="mail-envelope-open"
                    color="[&_path]:fill-blue-300"
                    :spanValue="$employee->email"
                    hiddenStyle=" -translate-y-1"
                />
                
                <x-cards.show
                    name="Telephone"
                    linkStart="tel:"
                    :hrefValue="$employee->number"
                    iconShow="phone" 
                    iconHidden="phone_in_talk"
                    color="[&_path]:fill-red-500"
                    :spanValue="$employee->number"

                />
                
                <x-cards.show
                    name="Company"
                    linkStart="/companies/"
                    :hrefValue="$employee->company->id"
                    iconShow="building-o" 
                    iconHidden="building"
                    color="[&_path]:fill-gray-200"
                    :spanValue="$employee->company->name"

                />
            </div>
            @auth
            <div class="w-full flex justify-end mt-3">
                <button id="open-modal" class="btn btn-accent ml-auto mr-0">Edit</button>
            </div>
        </div>
        <x-cards.modal :companies="$companies" :employee="$employee"/>
            @endauth
    </div>
</x-layout>