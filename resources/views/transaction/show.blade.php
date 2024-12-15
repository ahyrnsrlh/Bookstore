@extends('_layouts.app')

@section('title', 'Detail Transaction')

@section('content')
	
	<h1 class="h2 mb-4">Detail Transaction</h1>

	<div class="card">
		<div class="body">
			<div class="row justify-between mb-4">
					<ul class="col">
						<li class="mb-2"><b>To</b> : {{ $transaction->user->name }}</li>
						<li class="mb-2"><b>Address</b> :  {{ $transaction->user->detail->address }}</li>
						<li class="mb-2"><b>Phone</b> :  {{ $transaction->user->detail->phone }}</li>
					</ul>
					<ul class="col text-right">
						<li class="mb-2"><b>Invoice</b> : {{ $transaction->invoice }}</li>
						<li class="mb-2"><b>Date</b> :  {{ $transaction->local_date }}</li>
						<li class="mb-2"><b>Payment Status</b> :  {!! $transaction->payment_badge !!}</li>
						<li class="mb-2"><b>Status</b> :  {!! $transaction->status_badge !!}</li>
					</ul>
			</div>
			<table class="strip">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					@php
						$total = 0;
					@endphp
					@foreach ($transaction->books as $book)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $book->title }}</td>
							<td>Rp {{ $book->price_converted }}</td>
						</tr>
						@php
							$total += $book->price;
						@endphp
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="2" align="right">Total</td>
						<td>Rp {{ number_format($total) }}</td>
					</tr>
				</tfoot>
			</table>
		</div>
		<div class="foot">
			<a href="{{ route('transaction.index') }}"><button class="button blue">Back</button></a>
		</div>
	</div>

@endsection