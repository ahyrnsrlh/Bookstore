@extends('_layouts.app')

@section('title', $book->title)

@section('content')
	
	<div class="book-detail">
		<img src="{{ $book->cover_src }}" alt="">
		<div class="px-3">
			<div class="mb-4">
				<a href="{{ route('category.list', $book->category->slug) }}"><span class="badge blue">{{ $book->category->name }}</span></a>
			</div>
			<h1>{{ $book->title }}</h1>
			<p class="my-3">
				<span class="text-gray-400">Author:</span> <span class="text-base">{{ $book->author }}</span>
			</p>
			<p class="desc">
				{{ $book->description_more }}...
			</p>
			<form action="{{ route('cart.store') }}" class="flex items-center justify-between" method="post">
				@csrf
				<input type="hidden" name="book_id" value="{{ $book->id }}">
				<button @if($book->stock < 1) disabled @endif>{{ $book->stock ? 'Buy Now' : 'Out Of Stock' }}</button>
				<p class="price">Rp {{ $book->price_converted }}</p>
			</form>
		</div>
	</div>
	<div class="mt-6">
		<div class="border-b">
			<ul class="flex">
				<li class="tab active" target="#desc">Deskripsi</li>
				<li class="tab" target="#detail">Detail</li>
				<li class="tab" target="#review">Review ({{ $book->reviews_count }})</li>
			</ul>
		</div>
		<div>
			<div class="tab-content body active" id="desc">
				{!! $book->description_formatted !!}
			</div>
			<div class="tab-content" id="detail">
				<dl>
					<dt class="w-2/12">ISBN</dt>
					<dd class="w-1/12">:</dd>
					<dd class="w-9/12">{{ $book->isbn }}</dd>
					<dt class="w-2/12">Publish Date</dt>
					<dd class="w-1/12">:</dd>
					<dd class="w-9/12">{{ $book->publish_date_local }}</dd>
					<dt class="w-2/12">Publisher</dt>
					<dd class="w-1/12">:</dd>
					<dd class="w-9/12">{{ $book->publisher }}</dd>
					<dt class="w-2/12">Author</dt>
					<dd class="w-1/12">:</dd>
					<dd class="w-9/12">{{ $book->author }}</dd>
					<dt class="w-2/12">Pages</dt>
					<dd class="w-1/12">:</dd>
					<dd class="w-9/12">{{ $book->pages }}</dd>
					<dt class="w-2/12">Stock</dt>
					<dd class="w-1/12">:</dd>
					<dd class="w-9/12">{{ $book->stock }}</dd>
				</dl>
			</div>
			<div class="tab-content" id="review">

				<div class="mb-4 pb-4 border-b">
					<h2 class="h2">Rating</h2>
					<div class="flex items-center">
						<div class="rating text-xl">
						    @for ($i = 0; $i < 5; $i++)
						        <i class="icon ion-md-star @if ($i < round($book->reviews_avg_star)) star @endif"></i>
						    @endfor
						</div>
						<span class="ml-3">{{ round($book->reviews_avg_star, 2) }} from {{ $book->reviews_count }} reviews</span>
					</div>
				</div>

				<div>
					@foreach ($reviews as $review)
						<div class="comment">
							<div class="img">
								<img src="{{ $review->user->photo_src }}">
							</div>
							<div class="ml-4">
								<h3>{{ $review->user->name }}</h3>
								<time>22 Mei 2020</time>
								<p>
									{{ $review->content }}
								</p>
								<ul class="rating">
									@for ($i = 0; $i < 5; $i++)
										<li><i class="icon ion-md-star @if($i < $review->star) star @endif"></i></li>
									@endfor
								</ul>
							</div>
						</div>
					@endforeach
					<div class="mt-6 mb-4 pb-2 border-b">
						{{ $reviews->links() }}
					</div>
				</div>

				<div>
					@auth
						<livewire:review book="{{ $book->id }}" />
					@endauth
					@guest
						<div class="mb-4">
							<strong>Login To Review</strong>
						</div>
						<a href="" class="button blue">Login</a>
					@endguest
				</div>

			</div>
		</div>
	</div>

@endsection