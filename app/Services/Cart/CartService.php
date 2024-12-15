<?php 

namespace App\Services\Cart;

use App\Repositories\CartRepository;

class CartService {

	protected $cartRepo;

	public function __construct(CartRepository $cartRepo)
	{
		$this->cartRepo = $cartRepo;
	}

	public function get(): Object
	{
		$user = auth()->id();

		return $this->cartRepo->getByUser($user);
	}

	public function delete(object $carts): void
	{
		$carts->each(function ($cart)
		{
			$cart->delete();
		});
	}

}

 ?>