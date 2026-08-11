<x-layout title="Welcome">
    <div class="mx-auto flex-col items-center justify-center text-center p-5 mt-10">
        @guest
            <div class="my-auto text-2xl">
                <p>Please <a href="/login" class="underline">log in</a> to continue</p>
            </div>
        @endguest
        @auth
        <div class="flex flex-col lg:flex-row items-center justify-center gap-x-2 gap-y-2">
            <div class="flex flex-col gap-y-2 w-[350px] md:w-[450px] lg:w-[550px]">
                <h2 class="text-xl">Recently added companies</h2>
                <div class="mx-auto overflow-x-scroll border border-border rounded-t-md h-[500px] w-full">
                    <table class="border-collapse w-full">
                        <thead>
                            <tr class="h-[55px]">
                                <th scope="col" class="p-2" >Company Name</th>
                                <th scope="col" class="p-2 border-l border-r">Email</th>
                                <th scope="col" class="p-2">View More</th>
                            </tr>
                        </thead>
                        <tbody class="[&>*:nth-child(odd)]:bg-base-300">
                            @foreach ($companies as $company)
                                <tr class="border-t h-[75px]">
                                    <th scope="row" class="fill-white align-middle">
                                        <div class="fill-white flex flex-row gap-x-2 p-3 items-center">
                                            <img 
                                                src="{{ asset('storage/icons/' . $company->id . '.png') }}" 
                                                alt="Company Logo for {{ $company->name }}"
                                                class="max-w-5 max-h-5"
                                                >
                                                {{ $company->name }}
                                        </div>
                                    </th>

                                    <td scope="row" class="p-3 border-l border-r">
                                        <div>{{ $company->email }}</div>
                                    </td>

                                    <td scope="row" class="p-3 w-[65px]">
                                        <a href="/companies/{{ $company->id }}" class="flex justify-center items-center w-full h-full">
                                            <x-icon icon="external-link-b" class="[&_svg]:max-h-[25px] [&_path]:fill-red-400" />
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="/companies" class="w-full border rounded-md p-4 hover:underline mb-3 btn text-primary border border-primary">
                    Click here to view all {{ $companyCount }} companies
                </a>
            </div>

            <div class="flex flex-col gap-y-2 w-[350px] md:w-[450px] lg:w-[550px]">
                <h2 class="text-xl">Recently added employees</h2>
                <div class="mx-auto w-full overflow-x-scroll border border-border rounded-t-md h-[500px]">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="h-[55px]">
                                <th scope="col" class="p-2" >Employee Name</th>
                                <th scope="col" class="p-2 border-l border-r">Email</th>
                                <th scope="col" class="p-2">View More</th>
                            </tr>
                        </thead>
                        <tbody class="[&>*:nth-child(odd)]:bg-base-300">
                            @foreach ($employees as $employee)
                                <tr class="border-t h-[75px]">
                                    <th scope="row" class="fill-white align-middle">
                                        <div class="fill-white flex flex-row gap-x-2 p-3 items-center">
                                            {{ $employee->first_name }} {{ $employee->last_name }}
                                        </div>
                                    </th>

                                    <td scope="row" class="p-3 border-l border-r">
                                        <div>{{ $employee->email }}</div>
                                    </td>

                                    <td scope="row" class="p-3 w-[65px]">
                                        <a href="/employees/{{ $employee->id }}" class="flex justify-center items-center w-full h-full">
                                            <x-icon icon="external-link-b" class="[&_svg]:max-h-[25px] [&_path]:fill-red-400" />
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="/employees" class="w-full border rounded-md p-4 hover:underline mb-3 btn text-primary border border-primary">
                    Click here to view all {{ $employeeCount }} employees
                </a>
            </div>
        </div>
        @endauth
    </div>
</x-layout>
