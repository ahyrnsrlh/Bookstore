<div class="row">
	<div class="col profile">
		<img src="{{ image(auth()->user()->detail->photo ?? 'default.jpg', 'user') }}" class="rounded" alt="">
	</div>
	<form class="col profile" wire:submit.prevent="save">

		@if (session()->has('success'))
			<div class="alert green mb-4">
				{{ session('success') }}
			</div>
		@endif

		<div class="form">
			<label>Name</label>
			<input type="text" class="input @error('user.name') error @enderror" placeholder="Name" wire:model="user.name">

			@error('user.name')
				<small class="error">{{ $message }}</small>
			@enderror
		</div>
		<div class="form">
			<label>Gender</label>
			<select class="input @error('detail.gender') error @enderror" wire:model="detail.gender">
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>

			@error('detail.gender')
				<small class="error">{{ $message }}</small>
			@enderror
		</div>
		<div class="form">
			<label>Birthday</label>
			<input type="date" class="input @error('detail.birthday') error @enderror" placeholder="Birthday" wire:model="detail.birthday">

			@error('detail.birthday')
				<small class="error">{{ $message }}</small>
			@enderror
		</div>
		<div class="form">
			<label>Phone</label>
			<input type="number" class="input @error('detail.phone') error @enderror" placeholder="Phone" wire:model="detail.phone">

			@error('detail.phone')
				<small class="error">{{ $message }}</small>
			@enderror
		</div>
		<div class="form">
			<label>Address</label>
			<textarea class="input @error('detail.address') error @enderror" placeholder="Address" wire:model="detail.address"></textarea>

			@error('detail.address')
				<small class="error">{{ $message }}</small>
			@enderror
		</div>
		<div class="form">
			<label>Photo</label>
			<input type="file" class="input @error('photo') error @enderror" placeholder="Photo" wire:model="photo">

			@error('photo')
				<small class="error">{{ $message }}</small>
			@enderror
		</div>
		<button class="button blue" type="submit" wire:loading.attr="disabled" wire:target="save">Save</button>
	</form>
</div>