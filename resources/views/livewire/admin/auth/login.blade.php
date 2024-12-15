<form wire:submit.prevent="login">
<div class="input-group mb-3">
  <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" wire:model="email" autofocus>
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-envelope"></span>
    </div>
  </div>
  @error('email')
  	<span class="invalid-feedback">{{ $message }}</span>
  @enderror
</div>
<div class="input-group mb-3">
  <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" wire:model="password">
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-lock"></span>
    </div>
  </div>
  @error('password')
  	<span class="invalid-feedback">{{ $message }}</span>
  @enderror
</div>
<div class="row">
  <div class="col-8">
    <div class="icheck-primary">
      <input type="checkbox" id="remember" wire:model="remember">
      <label for="remember">
        Remember Me
      </label>
    </div>
  </div>
  <!-- /.col -->
  <div class="col-4">
    <button type="submit" class="btn btn-primary btn-block" wire:loading.attr="disabled" wire:target="login">Sign In</button>
  </div>
  <!-- /.col -->
</div>
</form>