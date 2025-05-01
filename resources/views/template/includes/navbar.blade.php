<!-- navbar -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background-color: #6A100C; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start" style="background-color: #6A100C;">
    <a class="navbar-brand brand-logo" href="index.html">
      <img src="{{ asset('images/logo.svg')}}" alt="logo" style="height: 60px; margin-left: 15px;" />
    </a>
    <a class="navbar-brand brand-logo-mini" href="index.html">
      <img src="{{ asset('images/logo-mini.svg')}}" alt="logo" style="widht: 60px;" />
    </a>
  </div>

  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize" style="color: #EDE4D5;">
      <span class="mdi mdi-menu" style="color: #EDE4D5;"></span>
    </button>

    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="nav-profile-img">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="image" style="border: 2px solid #EDE4D5; border-radius: 50%;">
            <span class="availability-status online"></span>
          </div>
          <div class="nav-profile-text">
            <p class="mb-1" style="color: #EDE4D5;">{{ Auth::user()->name }}</p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown" style="background-color: #fff8f0; border: 1px solid #6A100C;">
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
             style="color: #6A100C; font-family: 'Playfair Display', serif;">
            <i class="mdi mdi-logout me-2" style="color: #6A100C;"></i> Log out
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!-- end navbar -->
