<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-user"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <span class="dropdown-item text-muted">{{ auth()->user()->name }}</span>
        <a href="{{ route('admin.setting') }}" class="dropdown-item">Setting</a>
        <form action="{{ route('admin.logout') }}" method="post">
          @csrf
          <button type="submit" class="dropdown-item">Logout</button>
        </form>
      </div>
    </li>
  </ul>
</nav>