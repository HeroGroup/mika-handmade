<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.users.index') }}">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">Users</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.categories.index') }}">
        <i class="mdi mdi-apps menu-icon"></i>
        <span class="menu-title">Categories</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.products.index') }}">
        <i class="mdi mdi-list-box menu-icon"></i>
        <span class="menu-title">Products</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.messages.index') }}">
        <i class="mdi mdi-message-badge menu-icon"></i>
        <span class="menu-title">Messages <b>({{ $messages_count }})</b></span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.abouts.index') }}">
        <i class="mdi mdi-account-group menu-icon"></i>
        <span class="menu-title">About Us</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.faqs.index') }}">
        <i class="mdi mdi-help menu-icon"></i>
        <span class="menu-title">FAQs</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.settings.index') }}">
        <i class="mdi mdi-cog menu-icon"></i>
        <span class="menu-title">Settings</span>
      </a>
    </li>
  </ul>
</nav>