<div class="card">
	<div class="head flex justify-between items-center">
		<h2 class="title">Data Transaction</h2>
		<div>
			<button class="button sm blue button-collapse" target="#filter">Filter</button>
			<button class="button sm red button-collapse" wire:click="resetFilter">Reset Filter</button>
		</div>
	</div>
	<div class="body border-b collapse" id="filter" wire:ignore>
		<div class="row sm">
			<div class="col w-1/4">
				<div class="form">
					<label>Invoice</label>
					<input type="text" class="input" placeholder="Invoice" wire:model="invoice">
				</div>
			</div>
			<div class="col w-1/4">
				<div class="form">
					<label>Date</label>
					<input type="date" class="input" wire:model="date">
				</div>
			</div>
			<div class="col w-1/4">
				<div class="form">
					<label>Payment Status</label>
					<select class="input" wire:model="payment_status">
						<option value="">Payment Status</option>
						<option value="1">Paid</option>
						<option value="0">UnPaid</option>
					</select>
				</div>
			</div>
			<div class="col w-1/4">
				<div class="form">
					<label>Status</label>
					<select class="input" wire:model="status">
						<option value="">Status</option>
						<option value="unconfirmed">Unconfirmed</option>
						<option value="confirmed">Confirmed</option>
						<option value="failed">Failed</option>
						<option value="success">Success</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="body">
		<table class="table-auto">
			<thead>
				<tr>
					<th>Invoice</th>
					<th>Total</th>
					<th>Date</th>
					<th>Payment Status</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($transactions as $transaction)
					<tr>
						<td>{{ $transaction->invoice }}</td>
						<td>Rp {{ $transaction->total }}</td>
						<td>{{ $transaction->local_date }}</td>
						<td>{!! $transaction->payment_badge !!}</td>
						<td>{!! $transaction->status_badge !!}</td>
						<td>
							<a href="{{ route('transaction.payment', $transaction->id) }}"><button class="button sm green">
								<i class="icon ion-md-cash"></i>
							</button></a>
							<a href="{{ route('transaction.show', $transaction->id) }}"><button class="button sm blue">
								<i class="icon ion-md-eye"></i>
							</button></a>
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