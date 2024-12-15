<div class="row">

	<div class="col-sm-4" wire:ignore>
		<livewire:admin.stock.out-form />
	</div>

	<div class="col-sm-8">

		@if (session()->has('success'))
			<div class="alert alert-success alert-dismissible">
				{{ session('success' )}}
				<button class="close" data-dismiss="alert">&times;</button>
			</div>
		@endif

		<div class="card">
			<div class="card-header">
				<h5 class="card-title">History</h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>ISBN</th>
								<th>Total</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($stocks as $stock)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $stock->book->isbn }}</td>
									<td>{{ $stock->total }}</td>
									<td>{{ $stock->local_date }}</td>
									<td>
										<button class="btn btn-sm btn-danger" onclick="destroy({{ $stock->id }})"><i class="fa fa-trash"></i></button>
									</td>
								</tr>
							@empty
								<tr>
									<td colspan="6" align="center">Empty</td>
								</tr>
							@endforelse
						</tbody>
					</table>
				</div>
				{{ $stocks->links() }}
			</div>
		</div>
	</div>

</div>

@push('js')
	<script>
		const destroy = id => confirm('Delete this data') && Livewire.emit('destroy', id)
	</script>
@endpush