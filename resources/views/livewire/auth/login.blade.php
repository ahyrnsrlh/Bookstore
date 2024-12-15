<form class="box login-box" wire:submit.prevent="login">
	<h1 class="h1">Login</h1>
	<hr class="my-4">
	<div class="form">
		<label>Email</label>
		<input class="input @error('email') error @enderror" type="email" placeholder="Email" wire:model="email">
		
		@error('email')
			<small class="error">{{ $message }}</small>
		@enderror
	</div>
	<div class="form">
		<label>Password</label>
		<input class="input @error('password') error @enderror" type="password" placeholder="Password" wire:model="password">
		
		@error('password')
			<small class="error">{{ $message }}</small>
		@enderror
	</div>
	<div class="form">
		<button class="button blue" wire:loading.attr="login" wire:target="login" type="submit">Login</button>
	</div>
	Doesn't have account? <a class="link" href="{{ route('register') }}">register here</a>
</form>