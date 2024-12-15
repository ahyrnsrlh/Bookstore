@extends('_layouts.admin')

@section('title', 'Book')

@section('content')
	
	<div class="row">
		<div class="col-sm-6">
			<div class="card">
				<div class="card-body">
					<img src="{{ $book->cover_src }}" class="img-fluid">
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Book Detail</h5>
				</div>
				<div class="card-body">
					<dl class="row">
						<dt class="col-sm-3">Title</dt>
						<dd class="col-sm-1">:</dd>
						<dd class="col-sm-8">{{ $book->title }}</dd>
						<dt class="col-sm-3">ISBN</dt>
						<dd class="col-sm-1">:</dd>
						<dd class="col-sm-8">{{ $book->isbn }}</dd>
						<dt class="col-sm-3">Author</dt>
						<dd class="col-sm-1">:</dd>
						<dd class="col-sm-8">{{ $book->author }}</dd>
						<dt class="col-sm-3">Publisher</dt>
						<dd class="col-sm-1">:</dd>
						<dd class="col-sm-8">{{ $book->publisher }}</dd>
						<dt class="col-sm-3">Publih Date</dt>
						<dd class="col-sm-1">:</dd>
						<dd class="col-sm-8">{{ $book->publish_date_local }}</dd>
						<dt class="col-sm-3">Languange</dt>
						<dd class="col-sm-1">:</dd>
						<dd class="col-sm-8">{{ $book->lang }}</dd>
						<dt class="col-sm-3">Total Pages</dt>
						<dd class="col-sm-1">:</dd>
						<dd class="col-sm-8">{{ $book->pages }}</dd>
						<dt class="col-sm-3">Category</dt>
						<dd class="col-sm-1">:</dd>
						<dd class="col-sm-8">{{ $book->category->name }}</dd>
						<dt class="col-sm-3">Price</dt>
						<dd class="col-sm-1">:</dd>
						<dd class="col-sm-8">Rp {{ $book->price_converted }}</dd>
						<dt class="col-sm-3">Description</dt>
						<dd class="col-sm-1">:</dd>
						<dd class="col-sm-12 mt-2">{!! $book->description_formatted !!}</dd>
					</dl>
				</div>
				<div class="card-body">
					<a href="{{ route('admin.book.index') }}" class="btn btn-secondary">Back</a>
				</div>
			</div>
		</div>
	</div>

@endsection