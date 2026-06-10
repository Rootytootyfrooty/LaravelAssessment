<div class="navbar bg-base-100 shadow-sm">

  <div class="navbar-start">

    <x-layout.nav-link href="/companies" style="mx-4 btn hidden md:block pt-2" color="primary" :active="request()->is('companies')">
      Companies
    </x-layout.nav-link>
    <x-layout.nav-link href="/employees" style="mx-4 btn hidden md:block pt-2" color="secondary" :active="request()->is('employees')">
      Employees
    </x-layout.nav-link>

    <div class="dropdown block md:hidden">
      
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
        <li><x-layout.nav-small-link href="/companies" :active="request()->is('companies')">Companies</x-layout.nav-small-link></li>
        <li><x-layout.nav-small-link href="/employees" :active="request()->is('employees')">Employees</x-layout.nav-small-link></li>
        @auth
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

  </div>

  <div class="navbar-center flex flex-col">
    <a href="/" class="btn btn-ghost border border-border text-xl text-white">Home</a>
  </div>

  <div class="navbar-end">

    @guest
    <x-layout.nav-link href="/login" style="mx-4 btn hidden md:block pt-2" color="accent" :active="request()->is('login')">
      Login
    </x-layout.nav-link>
    @endguest
    
    @auth
    <div class="mx-4 hidden md:block">

      @if (request()->routeIs('company.index'))
      <button id="open-modal" class="btn bg-success text-success-content" data-test="open-company-modal">
        Add New Company
      </button>
      @endif
      @if (request()->routeIs('employee.index'))
      <button id="open-modal" class="btn text-success-content bg-success" data-test="open-employee-modal">
        Add New Employee
      </button>
      @endif

    </div>

    <form action="/logout" method="POST" class="mx-4 hidden md:block">
      @csrf

      <button type="submit" class="btn btn-warning">
        Logout
      </button>

    </form>

    @endauth

  </div>

</div>