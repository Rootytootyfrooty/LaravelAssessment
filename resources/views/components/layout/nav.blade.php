@aware(['company'])
<div class="navbar bg-base-100 shadow-sm max-w-[1150px] px-5 mx-auto">
  <div class="navbar-start">

    @if (request()->is('companies/*'))
    <img 
      src="{{ asset('storage/icons/' . $company->id . '.png') }}" 
      alt="Company Logo for {{ $company->name }}"
      class="max-w-5 max-h-5"
    >
    <x-layout.nav-small-link href="/" :active="request()->is('/')">{{ $company->name }}</x-layout.nav-small-link>
    @else
    <x-layout.nav-small-link href="/" :active="request()->is('/')">Home</x-layout.nav-small-link>
    @endif
    
  </div>

  <div class="navbar-center">
    <div class="mx-4 hidden md:block">

      @if (request()->routeIs('company.index'))
      <button id="open-modal" class="btn btn-accent" data-test="open-company-modal">
        Add New Company
      </button>
      @endif
      @if (request()->routeIs('employee.index'))
      <button id="open-modal" class="btn btn-accent" data-test="open-modal">
        Add New Employee
      </button>
      @endif

    </div>
  </div>

  <div class="navbar-end">
    <div class="dropdown dropdown-end block md:hidden">
      
      <div tabindex="0" role="button" class="btn btn-ghost btn-circle">

        <svg
            class="text-base-content hover:text-base-content/70"
            viewBox="0 0 200 176"
            xmlns="http://www.w3.org/2000/svg"
        >
            <rect x="10" y="25" width="180" height="20" rx="15" fill="currentColor" />
            <rect x="10" y="85" width="180" height="20" rx="15" fill="currentColor" />
            <rect x="10" y="146" width="180" height="20" rx="15" fill="currentColor" />
        </svg>

      </div>

      <ul
        tabindex="-1"
        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-64 shadow gap-y-4">

        <li><x-layout.nav-small-link href="/" :active="request()->is('/')">Homepage</x-layout.nav-small-link></li>
        @guest
        <li><x-layout.nav-small-link href="/login" :active="request()->is('login')">Login</x-layout.nav-small-link></li>
        @endguest 
        @auth
        <li><x-layout.nav-small-link href="/companies" :active="request()->is('companies')">Companies</x-layout.nav-small-link></li>
        <li><x-layout.nav-small-link href="/employees" :active="request()->is('employees')">Employees</x-layout.nav-small-link></li>
        @if (request()->routeIs('company.index'))
        <li><button id="open-modal-small" class="text-xl">
          Add New Company
        </button></li>
        @endif
        @if (request()->routeIs('employee.index'))
        <li><button id="open-modal-small" class="p-3 text-xl rounded-sm">
          Add New Employee
        </button></li>
        @endif
        <form action="/logout" method="POST">
          @csrf
          <li><button type="submit" class="p-3 text-xl rounded-sm">Logout</button></li>
        </form>
        @endauth

      </ul>

    </div>
    @auth
    <x-layout.nav-link href="/companies" color="bg-primary" :active="request()->is('companies')" >
      Companies
    </x-layout.nav-link>
    <x-layout.nav-link href="/employees" color="bg-secondary" :active="request()->is('employees')" >
      Employees
    </x-layout.nav-link>
    @endauth

    @guest
    <x-layout.nav-link href="/login" color="bg-accent" :active="request()->is('login')">
      Login
    </x-layout.nav-link>
    @endguest
    
    @auth
    
    <div class="hidden md:block">
      <div class="dropdown dropdown-end">
        <a href="#" tabindex="0" role="button" data-bs-toggle="dropdown" class="btn btn-ghost dropdown-toggle">
          Admin
          <x-icon id="chevron" icon="chevron-down" class=" mt-1 -mr-1 [&_path]:fill-white [&_svg]:max-h-[10px]" />
        </a>
        <ul tabindex="-1" class="menu dropdown-content">
          <li class="-ml-2">
          <form action="/logout" method="POST" class="mx-4 hidden md:block flex flex-col justify-center bg-base-100 hover:bg-base-300 hover:pointer-cursor">
            @csrf
              <button type="submit" class="hover:cursor-pointer">
                Logout
              </button>
            </form>
          </li>
        <ul>
      </div>
    </div>
    @endauth

  </div>

</div>