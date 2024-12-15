<form class="card" wire:submit.prevent="save">
	<div class="head">
		<h2 class="title">Upload Payment Proof</h2>
	</div>
	<div class="body">
		<ul class="mb-3">
			<li><b>BCA</b> : 18272322399</li>
			<li><b>BRI</b> : 18272322399</li>
		</ul>
		<hr class="mb-3">
		<div class="form">
			<label>Photo</label>
			<input type="file" class="input @error('photo') error @enderror" wire:model="photo">

			@error('photo')
				<small class="error">{{ $message }}</small>
			@enderror
		</div>
	</div>
	<div class="foot">
		<button class="button blue" type="submit" wire:loading.attr="disabled" wire:target="save">Upload</button>
		<a href="{{ route('transaction.index') }}"><button type="button" class="button red">Cancel</button></a>
	</div>
</form>