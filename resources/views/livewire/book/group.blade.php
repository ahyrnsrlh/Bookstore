<div>
    <ul class="heading">
        <li class="active">{{ $this->heading }}</li>
    </ul>
    <div class="row books">
    	@forelse ($books as $book)
    		<div class="col">
            <div class="book">
                <div class="cover">
                    <img src="{{ $book->cover_src }}">
                </div>
                <div class="body">
                    <h4><a href="{{ route('book', $book->slug) }}">{{ $book->title }}</a></h4>
                    <span class="category">{{ $book->category->name }}</span>
                    <div class="rating">
                        @for ($i = 0; $i < 5; $i++)
                            <i class="icon ion-md-star @if ($i < $book->reviews_avg_star) star @endif"></i>
                        @endfor
                    </div>
                    <span class="price">Rp {{ $book->price_converted }}</span>
                    <div>
                        <button class="action" wire:click="addToCart({{ $book->id }})">Add To Cart</button>
                    </div>
                </div>
            </div>
            </div>
    	@empty
            <div class="col">
                Empty
            </div>
    	@endforelse

    </div>
    
    <div class="mt-3">
        {{ $books->links('_partials.pagination') }}
    </div>

</div>