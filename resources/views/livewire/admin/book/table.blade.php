<div>

	@if (session()->has('success'))
		<div class="alert alert-success alert-dismissible">
			{{ session('success') }}
			<button class="close" data-dismiss="alert">&times;</button>
		</div>
	@endif

	<div class="card">
		<div class="card-header">
			<div class="d-flex align-items-center justify-content-between">
				<h5 class="card-title">Data Book</h5>
				<div>
					<a href="{{ route('admin.book.create') }}" class="btn btn-sm btn-primary">Add Book</a>
					<button class="btn btn-sm btn-warning" data-toggle="collapse" data-target="#filter">Filter</button>
				</div>
			</div>
		</div>
		<div class="card-body border-bottom collapse" id="filter" wire:ignore.self>
			<div class="form-row">
				<div class="col-sm-3">
					<div class="form-group">
						<label>Title</label>
						<input type="search" class="form-control" wire:model="title" placeholder="Title">
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label>ISBN</label>
						<input type="search" class="form-control" wire:model="isbn" placeholder="ISBN">
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label>Category</label>
						<select class="form-control custom-select" wire:model="category">
							<option value="">Category</option>
							@foreach ($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label>Stock</label>
						<select class="form-control custom-select" wire:model="stock">
							<option value="">Stock</option>
							<option value="1">Ready</option>
							<option value="0">Sold Out</option>
						</select>
					</div>
				</div>
			</div>
			<button class="btn btn-primary" wire:click="resetFilter">Reset</button>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Title</th>
							<th>Author</th>
							<th>Category</th>
							<th>Price</th>
							<th>Stock</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($books as $book)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $book->title }}</td>
								<td>{{ $book->author }}</td>
								<td>{{ $book->category->name }}</td>
								<td>{{ $book->price_converted }}</td>
								<td>{{ $book->stock }}</td>
								<td>
									<a href="{{ route('admin.book.show', $book->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
									<a href="{{ route('admin.book.edit', $book->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
									<button class="btn btn-sm btn-danger" onclick="destroy({{ $book->id }})"><i class="fa fa-trash"></i></button>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="7" align="center">Empty</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
			{{ $books->links() }}
		</div>
	</div>

</div>


@push('js')
	<script>
		const destroy = id => {
			if (window.confirm('Delete this book?')) {
				Livewire.emit('destroy', id)
			}
		}
	</script>
@endpush