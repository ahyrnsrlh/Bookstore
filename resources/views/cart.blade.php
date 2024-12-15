@extends('_layouts.app')

@section('title', 'Cart')

@section('content')
	
	<div class="flex justify-between">
		<h1 class="h2 mb-4">Cart</h1>
		<div>
			<input class="mr-1" type="checkbox" id="all">
			<label for="all">Select All</label>
		</div>
	</div>

	<livewire:cart />

@endsection