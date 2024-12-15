<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.home') }}" class="brand-link">
    <img src="{{ image(site('logo'), 'setting') }}"
         alt=""
         class="brand-image img-circle"
         style="opacity: .8; width: 36px; height: 50px; object-fit: cover;">
    <span class="brand-text font-weight-light">{{ site('name') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header pl-3">SITE</li>
        <li class="nav-item">
          <a href="{{ route('admin.home') }}" class="nav-link {{ active('admin') }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.setting') }}" class="nav-link {{ active('admin/setting') }}">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Setting
            </p>
          </a>
        </li>
        <li class="nav-header">MASTER</li>
        <li class="nav-item has-treeview {{ active('admin/book', 'menu-open', 'group') }}">
          <a href="#" class="nav-link {{ active('admin/book', 'active', 'group') }}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Book
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.book.index') }}" class="nav-link {{ active('admin/book') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Book</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.book.create') }}" class="nav-link {{ active('admin/book/create') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Book</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.category') }}" class="nav-link {{ active('admin/category') }}">
            <i class="nav-icon fas fa-tag"></i>
            <p>
              Category
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.supplier') }}" class="nav-link {{ active('admin/supplier') }}">
            <i class="nav-icon fas fa-truck"></i>
            <p>
              Supplier
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.user') }}" class="nav-link {{ active('admin/user') }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              User
            </p>
          </a>
        </li>
        <li class="nav-header">MENU</li>
        <li class="nav-item has-treeview {{ active('admin/stock', 'menu-open', 'group') }}">
          <a href="#" class="nav-link {{ active('admin/stock', 'active', 'group') }}">
            <i class="nav-icon fas fa-box"></i>
            <p>
              Stock
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.stock.index') }}" class="nav-link {{ active('admin/stock') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Stock History</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.stock.in') }}" class="nav-link {{ active('admin/stock/in') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Stock In</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.stock.out') }}" class="nav-link {{ active('admin/stock/out') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Stock Out</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.transaction.index') }}" class="nav-link {{ active('admin/transaction', 'active', 'group') }}">
            <i class="nav-icon fas fa-money-bill"></i>
            <p>
              Transaction
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>