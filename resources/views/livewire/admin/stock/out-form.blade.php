<form class="card" wire:submit.prevent="out">
	<div class="card-header">
		<h5 class="card-title">Remove Stock</h5>
	</div>
	<div class="card-body">
		<div class="form-group" wire:ignore>
			<label>ISBN</label>
			<select class="form-control custom-select isbn" wire:model="book_id" required></select>
		</div>
		<div class="form-group">
			<label>Total</label>
			<input type="number" class="form-control @error('total') is-invalid @enderror" placeholder="Total" wire:model="total">

			@error('total')
				<span class="invalid-feedback">{{ $message }}</span>
			@enderror
		</div>
	</div>
	<div class="card-footer">
		<button class="btn btn-primary" type="submit" wire:loading.attr="disabled" wire:target="out">Remove</button>
	</div>
</form>

@push('css')
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@push('js')
	<script src="{{ asset('adminlte/plugins/select2/js/select2.min.js') }}"></script>
	<script>
		$('.isbn').select2({
			ajax: {
				url: '{{ route('admin.book.select') }}',
				data: params => ({
					isbn: params.term
				}),
				processResults: result => ({
					results: result
				}),
				cache: true
			},
			placeholder: 'ISBN'
		})
		$('.supplier').select2({
			ajax: {
				url: '{{ route('admin.supplier.select') }}',
				data: params => ({
					supplier: params.term
				}),
				processResults: result => ({
					results: result
				}),
				cache: true
			},
			placeholder: 'Supplier'
		})

		$('.isbn').on('change', function () {
			@this.set('book_id', this.value)
		})
		$('.isbn').on('select2:select', function (e) {
			@this.set('max', e.params.data.stock)
		})
		$('.supplier').on('change', function () {
			@this.set('supplier_id', this.value)
		})
	</script>
@endpush
