<form wire:submit.prevent="save">
	<div class="form">
		<label>Review</label>
		<textarea class="input lg @error('content') error @enderror" placeholder="Comment" wire:model="content"></textarea>

		@error('content')
			<small class="error">{{ $message }}</small>
		@enderror
	</div>
	<div class="form" wire:ignore>
		<label>Rating</label>
		<ul class="rating">
			@for ($i = 1; $i < 6; $i++)
				<li>
					<label for="{{ $i }}"><i class="icon ion-ios-star text-xl" target="{{ $i }}"></i></label>
				</li>
			@endfor
		</ul>
	</div>
	<button class="button blue" type="submit" wire:loading.attr="loading" wire:target="save">Add</button>
</form>

@push('js')
	<script>
		const ratings = document.querySelectorAll('#review form .rating i')

		const star = function () {
			const target = +this.getAttribute('target')
			const countStar = document.querySelectorAll('#review form .rating i.star').length

			@this.set('star', target === countStar ? 0 : target)

			for(let i = 0; i < 5; i++) {
				const starClass = ratings[i].classList
				
				if (target === countStar) starClass.remove('star')
				else if (i < target) starClass.add('star')
				else starClass.remove('star')
			}
		}

		ratings.forEach(rating => rating.onclick = star)

		window.addEventListener('reload', () => window.location.reload())
	</script>
@endpush