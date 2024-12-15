<div class="row">
	
	<livewire:admin.supplier.form />

	<livewire:admin.supplier.modal />

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
					<h5 class="card-title m-0">Data Supplier</h5>
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
								<th>Address</th>
								<th>Phone</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($suppliers as $supplier)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $supplier->name }}</td>
									<td>{{ $supplier->address }}</td>
									<td>{{ $supplier->phone }}</td>
									<td>
										<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit" wire:click="$emit('edit', {{ $supplier->id }})">
											<i class="fa fa-edit"></i>
										</button>
										<button class="btn btn-sm btn-danger" onclick="destroy({{ $supplier->id }})">
											<i class="fa fa-trash"></i>
										</button>
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="5" align="center">Empty</td>
								</tr>
							@endforelse
						</tbody>
					</table>
					{{ $suppliers->links() }}
				</div>
			</div>
		</div>
	</div>

</div>

@push('js')
	<script>
		const destroy = id => {
			if (confirm('Delete this supplier?')) {
				Livewire.emit('destroy', id)
			}
		}
	</script>
@endpush