<div class="card">
	<div class="card-header">
		<h5 class="card-title">Add Book</h5>
	</div>
	<div class="card-body">
		<form class="col-sm-6 mx-auto" wire:submit.prevent="save">
			<div class="form-group">
				<label>Title</label>
				<input type="text" class="form-control @error('book.title') is-invalid @enderror" placeholder="Title" wire:model="book.title" autofocus>

				@error('category.title')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror		
			</div>
			<div class="form-row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>ISBN</label>
						<input type="text" class="form-control isbn @error('book.isbn') is-invalid @enderror" placeholder="ISBN" wire:model="book.isbn" autofocus>

						@error('category.isbn')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror		
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Category</label>
						<select class="form-control custom-select @error('category.category_id') is-invalid @enderror" wire:model="book.category_id">
							<option value="">Category</option>
							@foreach ($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>

						@error('category.category_id')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror		
					</div>
			</div>
			</div>
			<div class="form-row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Author</label>
						<input type="text" class="form-control @error('category.author') is-invalid @enderror" placeholder="Author" wire:model="book.author">

						@error('category.author')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror		
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Publisher</label>
						<input type="text" class="form-control @error('category.publisher') is-invalid @enderror" placeholder="Publisher" wire:model="book.publisher">

						@error('book.publisher')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror		
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Lang</label>
						<input type="text" class="form-control @error('book.lang') is-invalid @enderror" placeholder="Lang" wire:model="book.lang">

						@error('book.lang')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror		
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Total Pages</label>
						<input type="number" class="form-control @error('book.pages') is-invalid @enderror" placeholder="Total Pages" wire:model="book.pages">

						@error('book.pages')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror		
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Publish Date</label>
						<input type="date" class="form-control @error('book.publish_date') is-invalid @enderror" wire:model="book.publish_date">

						@error('book.publish_date')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror		
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Price</label>
						<input type="text" class="form-control price @error('book.price') is-invalid @enderror" placeholder="Price" wire:model="book.price">

						@error('book.price')
							<span class="invalid-feedback">{{ $message }}</span>
						@enderror		
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea class="form-control @error('book.description') is-invalid @enderror" placeholder="Description" wire:model="book.description"></textarea>

				@error('book.description')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror		
			</div>
			<div class="form-group">
				<label>Cover</label>
				<input type="file" class="form-control @error('cover') is-invalid @enderror" wire:model="cover">

				@error('cover')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror		
			</div>
			<button class="btn btn-primary" type="submit" wire:loading.attr="save" wire:target="save">Save</button>
			<a href="{{ route('admin.book.index') }}" class="btn btn-secondary">Back</a>
		</form>
	</div>
</div>

@push('js')
	<script src="{{ asset('adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
	<script>
		$('.isbn').inputmask('999-999-9999-99-9')
		$('.isbn').on('change', function () {
			@this.set('book.isbn', this.value)
		})
		$('.price').on('keyup', function () {
			const number = Number(this.value.replace(/\D/g, ''))
			const price = new Intl.NumberFormat().format(number)

			this.value = price
		})
	</script>
@endpush
