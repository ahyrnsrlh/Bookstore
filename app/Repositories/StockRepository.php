<?php 

namespace App\Repositories;

use App\Models\Stock;

class StockRepository extends Repository {

	public function __construct(Stock $stock)
	{
		$this->model = $stock;
	}

	public function get(): Object
	{
		return $this->model->with('book')->paginate(10);
	}

	public function getByType(string $type): Object
	{
		return $this->model->whereType($type)->with(['book', 'supplier'])->paginate(10);
	}

}

 ?>