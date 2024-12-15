<?php

namespace App\Http\Livewire\Admin\Supplier;

use App\Repositories\SupplierRepository;

use Livewire\Component;

class Form extends Component
{

	public $name, $address, $phone;

	protected $rules = [
		'name' => 'required|string|unique:suppliers',
		'address' => 'required|string',
		'phone' => 'required|numeric'
	];

	public function save(SupplierRepository $supplierRepo)
	{
		$data = $this->validate();

		$supplierRepo->create($data);

		$this->reset();
		$this->emitUp('reload');
	}

    public function render()
    {
        return view('livewire.admin.supplier.form');
    }
}
