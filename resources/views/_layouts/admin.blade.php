<!DOCTYPE html>
<html>
<head>
  
  @include('_includes.admin.head')

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  
  @include('_partials.admin.navbar')

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  
  @include('_partials.admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>@yield('title')</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
      
      @yield('content')

    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('_partials.admin.footer')
</div>
<!-- ./wrapper -->

@include('_includes.admin.foot')

</body>
</html>
