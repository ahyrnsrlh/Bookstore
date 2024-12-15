<!DOCTYPE html>
<html>
<head>
  
  <title>Login</title>

  @include('_includes.admin.head') 

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('admin.home') }}"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <livewire:admin.auth.login />

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@include('_includes.admin.foot', ['some' => 'data'])

</body>
</html>
