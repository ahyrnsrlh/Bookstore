<div>
	
	@if (session()->has('success'))
		<div class="alert alert-success alert-dismissible">
			{{ session('success') }}
			<button class="close" data-dismiss="alert">&times;</button>
		</div>
	@endif

	<div class="card">
		<div class="card-header">
			<div class="d-flex justify-content-between align-items-center">
				<h5 class="card-title">History Stock</h5>
				<div>
					<a href="{{ route('admin.stock.in') }}" class="btn btn-sm btn-primary">Add Stock</a>
					<a href="{{ route('admin.stock.out') }}" class="btn btn-sm btn-warning">Remove Stock</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>ISBN</th>
							<th>Type</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($stocks as $stock)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $stock->book->isbn }}</td>
								<td>{!! $stock->type_label !!}</td>
								<td>
									<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="4" align="center">Empty</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>

			{{ $stocks->links() }}
		</div>
	</div>

</div>