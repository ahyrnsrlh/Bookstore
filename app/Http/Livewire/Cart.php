<?php

namespace App\Http\Livewire;

use App\Services\Cart\CartService;
use App\Repositories\CartRepository;

use Livewire\Component;

class Cart extends Component
{

	public $book = [];

	protected $listeners = ['push-cart' => 'push', 'remove-cart' => 'remove'];

	public function getDataProperty(): Array
	{
		return collect($this->book)->map(function ($book)
		{
			return 'carts[]='.$book;
		})->all();
	}

	public function push($book)
	{
		if (is_array($book)) {
			$this->book = $book;
		} else {
			array_push($this->book, $book);
		}
	}

	public function remove($book)
	{
		$books = collect($this->book);

		$this->book = $books->reject(function ($item) use($book)
		{
			return $item === $book;
		})->all();
	}

	public function delete(CartRepository $cartRepo, int $id = null)
	{
		if ($id) {
			$cartRepo->delete($id);
		} else {
			$cartRepo->massDelete($this->book);
		}

		session()->flash('success', 'Cart Deleted');
	}

	public function checkout()
	{
		if (!auth()->user()->hasVerifiedEmail()) {
			session()->flash('error', 'Your account has not verified');
		} else {
			return redirect()->route('transaction.create', $this->data);
		}
	}

  public function render(CartService $cartService)
  {
  	$carts = $cartService->get();

    return view('livewire.cart', compact('carts'));
  }
}
