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
				<h5 class="card-title">Data Transaction</h5>
				<div>
					<button class="btn btn-sm btn-warning" data-toggle="collapse" data-target="#filter">Filter</button>
				</div>
			</div>
		</div>
		<div class="card-body border-bottom collapse" id="filter" wire:ignore.self>
			<div class="form-row">
				<div class="col-sm-3">
					<div class="form-group">
						<label>Invoice</label>
						<input type="search" class="form-control" wire:model="invoice" placeholder="Invoice">
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label>Date</label>
						<input type="date" class="form-control" wire:model="date" placeholder="Date">
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label>Payment Status</label>
						<select class="form-control custom-select" wire:model="payment_status">
							<option value="">Payment Status</option>
							<option value="1">Paid</option>
							<option value="0">Unpaid</option>
						</select>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<label>Status</label>
						<select class="form-control custom-select" wire:model="status">
							<option value="">Status</option>
							<option value="unconfirmed">Unconfirmed</option>
							<option value="confirmed">Confirmed</option>
							<option value="failed">Failed</option>
							<option value="success">Succedd</option>
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
							<th>Invoice</th>
							<th>User</th>
							<th>Date</th>
							<th>Total</th>
							<th>Payment Status</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($transactions as $transaction)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $transaction->invoice }}</td>
								<td>{{ $transaction->user->name }}</td>
								<td>{{ $transaction->local_date }}</td>
								<td>Rp {{ $transaction->total }}</td>
								<td>{!! $transaction->payment_badge_admin !!}</td>
								<td>{!! $transaction->status_badge_admin !!}</td>
								<td>
									<a href="{{ $transaction->payment->photo_src ?? '' }}" class="btn btn-sm btn-success @if(!$transaction->payment_status) disabled @endif"><i class="fa fa-money-bill"></i></a>
									<a href="{{ route('admin.transaction.show', $transaction->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
									<button class="btn btn-sm btn-danger" onclick="destroy({{ $transaction->id }})"><i class="fa fa-trash"></i></button>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="8" align="center">Empty</td>
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
			if (window.confirm('Delete this transaction?')) {
				Livewire.emit('destroy', id)
			}
		}
	</script>
@endpush