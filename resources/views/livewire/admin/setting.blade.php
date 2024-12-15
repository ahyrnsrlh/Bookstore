<form class="col-sm-6 mx-auto" wire:submit.prevent="save">

	@if (session()->has('success'))
		<div class="alert alert-success alert-dismissible">
			{{ session('success') }}
			<button class="close" data-dismiss="alert">&times;</button>
		</div>
	@endif

	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Setting</h5>
		</div>
		<div class="card-body">
			<div class="form-group">
				<label>Site Name</label>
				<input type="text" class="form-control @error('setting.name') is-invalid @enderror" placeholder="Site Name" wire:model="setting.name">

				@error('setting.name')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea class="form-control @error('setting.description') is-invalid @enderror" placeholder="Description" wire:model="setting.description"></textarea>

				@error('setting.description')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
			<div class="form-group">
				<label>Site Logo</label>
				<input type="file" class="form-control @error('logo') is-invalid @enderror" placeholder="Site Logo" wire:model="logo">
				<small class="form-text text-muted">{{ $setting->logo }}</small>

				@error('logo')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary" wire:loading.attr="save" wire:target="save">Save</button>
		</div>
	</div>

</form>