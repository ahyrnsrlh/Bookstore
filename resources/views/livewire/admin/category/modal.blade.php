<div wire:ignore.self class="modal" id="edit">
<div class="modal-dialog">
<form class="modal-content" wire:submit.prevent="save">
	<div class="modal-header">
		<h5 class="modal-title">Edit Category</h5>
		<button class="close" data-dismiss="modal">&times;</button>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control @error('category.name') is-invalid @enderror" placeholder="Name" wire:model="category.name" autofocus>

			@error('category.name')
				<span class="invalid-feedback">{{ $message }}</span>
			@enderror				
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-primary" type="submit" wire:loading.attr="disabled" wire:target="save">Save</button>
		<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	</div>
</form>
</div>
</div>

@push('js')
	<script>
		window.addEventListener('close-modal', () => $('#edit').modal('hide'))
	</script>
@endpush