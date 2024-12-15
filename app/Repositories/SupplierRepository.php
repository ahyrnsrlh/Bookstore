<?php 

namespace App\Repositories;

use App\Models\Supplier;

class SupplierRepository extends Repository implements SearchInterface, SelectInterface {

	public function __construct(Supplier $supplier)
	{
		$this->model = $supplier;
	}

	public function search(string $search = null): Object
	{
		return $this->model->where('name', 'like', '%'.$search.'%')->latest()->paginate(5);
	}

	public function select(string $select = null): Object
	{
		return $this->model->where('name', 'like', '%'.$select.'%')->get(['id', 'name as text']);
	}

}

 ?>