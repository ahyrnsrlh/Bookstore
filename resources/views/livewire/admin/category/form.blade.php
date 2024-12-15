<div class="col-sm-4">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Add Category</h5>
		</div>
		<div class="card-body">
			<form wire:submit.prevent="save">
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" wire:model="name" autofocus>

					@error('name')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror				
				</div>
				<button class="btn btn-primary" type="submit" wire:loading.attr="disabled" wire:target="save">Save</button>
			</form>
		</div>
	</div>
</div>