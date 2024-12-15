<div>
	
	@if (session()->has('success'))
		<div class="alert green mb-4">
			{{ session('success') }}
		</div>
	@endif
	
	@if (session()->has('error'))
		<div class="alert red mb-4">
			{{ session('error') }}
		</div>
	@endif

	@forelse ($carts as $cart)
		<div class="cart">
			<div class="item">
				<div class="left">
					<div class="image">
						<div class="checkbox">
							<input type="checkbox" class="checkCart" value="{{ $cart->id }}" @if ($cart->book->stock < 1) disabled @endif>
						</div>
						<img src="{{ $cart->book->cover_src }}">
					</div>
					<div class="text">
						@if ($cart->book->stock < 1)
							<small class="text-red-500">Out Of Stock</small>
						@endif
						<h3><a href="{{ route('book', $cart->book->slug) }}">{{ $cart->book->title }}</a></h3>
						<span class="price">Rp {{ $cart->book->price_converted }}</span>
					</div>
				</div>
				<div>
					<button class="button blue sm" @if ($cart->book->stock < 1)
						disabled
					@endif><i class="icon ion-md-cash"></i></button>
					<button class="button red sm" wire:click="delete({{ $cart->id }})"><i class="icon ion-md-trash"></i></button>
				</div>
			</div>
		</div>
	@empty
		<div class="mb-3">
			Empty
		</div>
	@endforelse

	<div class="border-t py-4 action">
		<button class="button blue" wire:click="checkout" wire:loading.attr="loading" wire:target="checkout" @if (!$book) disabled @endif>Checkout</button>
		<button class="button red" wire:click="delete" wire:loading.attr="loading" wire:targer="delete" @if (!$book) disabled @endif @if (!$book) disabled @endif>Delete</button>
	</div>
</div>

@push('js')
	<script>
		const checkboxes = document.querySelectorAll('input[type=checkbox]')
		const carts = document.querySelectorAll('.checkCart:not([disabled])')
		const actionBtn = document.querySelectorAll('.action button')
		const checkAll = document.querySelector('#all')

		const selectAll = function () {
			const carts = document.querySelectorAll('.checkCart:not([disabled])')
			const cartsArr = Array.from(carts)
			const allChecked = this.checked

			carts.forEach(cart => cart.checked = allChecked)

			Livewire.emit('push-cart', allChecked ? cartsArr.map(cart => cart.value) : [])
		}

		const check = function () {
			const countCarts = carts.length
			const countCheckedCarts = document.querySelectorAll('.checkCart:checked').length

			checkAll.checked = countCarts === countCheckedCarts

			this.checked ? Livewire.emit('push-cart', this.value) : Livewire.emit('remove-cart', this.value) 
		}

		actionBtn.forEach(button => button.disabled = true)
		checkboxes.forEach(checkbox => checkbox.checked = false)
		carts.forEach(cart => cart.onchange = check)
		checkAll.onchange = selectAll
	</script>
@endpush