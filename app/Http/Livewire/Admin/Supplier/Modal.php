<?php

namespace App\Http\Livewire\Admin\Supplier;

use App\Repositories\SupplierRepository;

use Livewire\Component;

class Modal extends Component
{

	public $supplier;

	protected $rules = [
		'supplier.name' => '',
		'supplier.address' => 'required|string',
		'supplier.phone' => 'required|numeric'
	];

	protected $listeners = ['edit' => 'showModal'];

	public function showModal(SupplierRepository $supplierRepo, int $categoryId)
	{
		$this->supplier = $supplierRepo->find($categoryId);
		$this->resetValidation();
	}

	public function save()
	{
		$this->validate(array_merge($this->rules, [
			'supplier.name' => 'required|string|unique:suppliers,name,'.$this->supplier->id
		]));

		$this->supplier->save();

		$this->emitUp('reload', 'Supplier Edited');
		$this->dispatchBrowserEvent('close-modal');
	}

    public function render()
    {
        return view('livewire.admin.supplier.modal');
    }
}
