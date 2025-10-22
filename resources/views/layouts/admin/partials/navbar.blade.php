<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex justify-content-center">
    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
      <a class="navbar-brand brand-logo" href="/admin"><img src="/assets/admin/images/logo.svg"
          alt="logo" /></a>
      <a class="navbar-brand brand-logo-white" href="/admin"><img src="/assets/admin/images/logo-white.svg"
          alt="logo" /></a>
      <a class="navbar-brand brand-logo-mini" href="/admin"><img src="/assets/admin/images/logo-mini.svg"
          alt="logo" /></a>
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-sort-variant"></span>
      </button>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          <img src="/assets/admin/images/faces/face5.jpg" alt="profile" />
          <span class="nav-profile-name">{{ auth()?->user()?->name}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="{{ route('admin.profile') }}">
            <i class="mdi mdi-account text-primary"></i>
            Profile
          </a>
          <a class="dropdown-item" onclick="document.getElementById('logout-form').submit();">
            <i class="mdi mdi-logout text-primary"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
      data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>

<form method="POST" action={{ route('logout') }} id="logout-form">
  @csrf
</form>