<?php

namespace App\Http\Controllers;

use App\Repositories\CartRepository;
use App\Http\Requests\Cart\CreateCartRequest;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{

	public function store(CreateCartRequest $request, CartRepository $cartRepo): RedirectResponse
	{
		$request->merge([
			'user_id' => auth()->id()
		]);

		$cartRepo->create($request->except('_token'));

		return redirect('/cart')->withSuccess('Cart Addedd');
	}

}
