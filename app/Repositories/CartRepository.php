<?php 

namespace App\Repositories;

use App\Models\Cart;

class CartRepository extends Repository {

	public function __construct(Cart $cart)
	{
		$this->model = $cart;
	}

	public function create(array $data): Object
	{
		return $this->model->updateOrCreate($data);
	}

	public function massDelete(array $ids)
	{
		$this->model->whereIn('id', $ids)->delete();
	}

	public function getById(array $ids): Object
	{
		return $this->model->whereIn('id', $ids)->with('book', function ($book)
		{
			$book->select('id', 'title', 'cover', 'price');
		})->get();
	}

	public function getByUser(int $user): Object
	{
		return $this->model->whereUserId($user)->with('book', function ($book)
		{
			$book->select('id', 'title', 'cover', 'price', 'stock', 'slug');
		})->paginate(10);
	}

}

 ?>