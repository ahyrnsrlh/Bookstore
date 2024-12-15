@extends('_layouts.app')

@section('title', 'Checkout')

@section('content')
	
	<h1 class="h2 mb-4">Checkout</h1>

	<div class="row">
		<div class="col profile">
			<div class="card">
				<div class="head">
					<h2 class="title">Data User</h2>
				</div>
				<div class="body">
					<div class="form">
						<label>Name</label>
						<input type="text" class="input" value="{{ auth()->user()->name }}" disabled>
					</div>
					<div class="form">
						<label>Email</label>
						<input type="text" class="input" value="{{ auth()->user()->email }}" disabled>
					</div>
					<div class="form">
						<label>Phone</label>
						<input type="text" class="input" value="{{ auth()->user()->detail->phone }}" disabled>
					</div>
					<div class="form">
						<label>Address</label>
						<textarea class="input" disabled>{{ auth()->user()->detail->address }}</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col profile">
			<div class="card">
				<div class="head">
					<h2 class="title">Data Books</h2>
				</div>
				<div class="body">
					<ul>
						@php
							$total = 0;
						@endphp
						@foreach ($carts as $cart)
							<li class="group">
								<img src="{{ $cart->book->cover_src }}" alt="" class="img">
								<div>
									<h3 class="title">{{ $cart->book->title }}</h3>
									<span class="price">Rp {{ $cart->book->price_converted }}</span>
									@php
										$total += $cart->book->price
									@endphp
								</div>
							</li>
						@endforeach
					</ul>
					<div class="border-t pt-4 text-lg">
						Total <strong class="text-green-500">Rp {{ number_format($total) }}</strong>
					</div>
				</div>
				<div class="foot">
					<form action="{{ route('transaction.store') }}" method="post">
						@csrf
						@foreach ($query as $cart)
							<input type="hidden" name="carts[]" value="{{ $cart }}">
						@endforeach
						
						<button type="submit" class="button sm blue">Konfirmasi</button>
						<a href="{{ route('cart.index') }}"><button class="button sm red">Cancel</button></a>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection