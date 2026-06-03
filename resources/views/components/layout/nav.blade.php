<div class="navbar bg-base-100 shadow-sm">
  <div class="navbar-start">
    <a href="/companies" class="mx-4 btn hidden md:block pt-2 btn-primary">
      Companies
    </a>
    <a href="/employees" class="mx-4 btn hidden md:block pt-2 btn-secondary">
      Employees
    </a>
    <div class="dropdown block md:hidden">
      <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /> </svg>
      </div>
      <ul
        tabindex="-1"
        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
        <li><a href="/">Homepage</a></li>
        @guest
        <li><a href="/login">Admin</a></li>
        @endguest
        <li><a href="/companies">Companies</a></li>
        <li><a href="/employees">Employees</a></li>
        @auth
        <button class="mx-4 btn btn-warning">
          Add New
        </button>
        <form action="/logout" method="POST">
          @csrf
          <li><button type="submit">Logout</button></li>
        </form>
        @endauth
      </ul>
    </div>

  </div>
  <div class="navbar-center">
    <a href="/" class="btn btn-ghost text-xl text-white">Data Finder</a>
  </div>
  <div class="navbar-end gap-y-0">
    @guest
    <a href="/login" class="mx-4 btn hidden md:block pt-2 btn-accent">
      Admin
    </a>
    @endguest
    
    @auth
    <div class="mx-4 hidden md:block">

      @if (request()->routeIs('company.index'))
      <button id="open-modal" class="mx-4 btn btn-success">
        Add New Company
      </button>
      @endif
      @if (request()->routeIs('employee.index'))
      <button id="open-modal" class="mx-4 btn btn-success">
        Add New Employee
      </button>
      @endif

    </div>

    <form action="/logout" method="POST" class="mx-4 hidden md:block">
      @csrf
      <button type="submit" class="mx-4 btn btn-warning">
        Logout
      </button>
    </form>
    @endauth
  </div>
</div>