<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\SupplierRepository;

use Illuminate\Http\Request;

class SupplierController extends Controller implements SelectInterface
{

	protected $supplierRepo;

	public function __construct(SupplierRepository $supplierRepo)
	{
		$this->supplierRepo = $supplierRepo;
	}

	public function select(Request $request): Object
	{
		return $this->supplierRepo->select($request->name);
	}

}
