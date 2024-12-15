<div class="row">
	
	<livewire:admin.category.form />

	<livewire:admin.category.modal />

	<div class="col-sm-8">

		@if (session()->has('success'))
			<div class="alert alert-success alert-dismissible">
				{{ session('success') }}
				<button class="close" data-dismiss="alert">&times;</button>
			</div>
		@endif

		<div class="card">
			<div class="card-header">
				<div class="d-flex align-items-center justify-content-between">
					<h5 class="card-title m-0">Data Category</h5>
					<div>
						<input type="search" class="form-control " placeholder="Search" wire:model="search">
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped w-100">
						<thead>
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($categories as $category)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $category->name }}</td>
									<td>
										<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit" wire:click="$emit('edit', {{ $category->id }})">
											<i class="fa fa-edit"></i>
										</button>
										<button class="btn btn-sm btn-danger" onclick="destroy({{ $category->id }})">
											<i class="fa fa-trash"></i>
										</button>
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="4" align="center">Empty</td>
								</tr>
							@endforelse
						</tbody>
					</table>
					{{ $categories->links() }}
				</div>
			</div>
		</div>
	</div>

</div>

@push('js')
	<script>
		const destroy = id => {
			if (confirm('Delete this category?')) {
				Livewire.emit('destroy', id)
			}
		}
	</script>
@endpush