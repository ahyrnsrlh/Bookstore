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
				<h5 class="card-title">Data User</h5>
				<div>
					<input type="search" class="form-control form-control-sm" placeholder="Search" wire:model="name">
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Email</th>
							<th>Name</th>
							<th>Active</th>
							<th>Register Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($users as $user)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->name }}</td>
								<td>{!! $user->active !!}</td>
								<td>{{ $user->local_date }}</td>
								<td>
									<button class="btn btn-sm btn-danger" onclick="destroy({{ $user->id }})"><i class="fa fa-trash"></i></button>
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
		</div>
	</div>

</div>

@push('js')
	<script>
		const destroy = id => {
			if (confirm('Delete this user?')) Livewire.emit('destroy', id)
		}
	</script>
@endpush