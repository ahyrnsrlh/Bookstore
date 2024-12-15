<form class="box login-box" wire:submit.prevent="register">
	<h1 class="h1">Register</h1>
	<hr class="my-4">
	<div class="form">
		<label>Name</label>
		<input class="input @error('name') error @enderror" type="text" placeholder="Name" wire:model="name">
		
		@error('name')
			<small class="error">{{ $message }}</small>
		@enderror
	</div>
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
		<label>Confirm Password</label>
		<input class="input" type="password" placeholder="Confirm Password" wire:model="password_confirmation">
	</div>
	<div class="form">
		<button class="button blue" wire:loading.attr="register" wire:target="register" type="submit">Register</button>
	</div>
	Already have account? <a class="link" href="{{ route('login') }}">Login here</a>
</form>