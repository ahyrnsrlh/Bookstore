@extends('_layouts.app')

@section('title', 'Payment')

@section('content')
	
	<h1 class="h2 mb-4">Payment</h1>

	<div class="row">
		
		@if ($transaction->payment_status)
			<div class="col profile">
				<img src="{{ $transaction->payment->photo_src }}" alt="" style="height: auto;">
			</div>
		@endif

		<div class="col {{ $transaction->payment_status ? 'profile' : 'w-full' }}">
			<livewire:transaction.payment transaction="{{ $transaction->id }}" />
		</div>

	</div>

@endsection