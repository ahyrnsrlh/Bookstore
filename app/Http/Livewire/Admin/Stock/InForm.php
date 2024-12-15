<?php

namespace App\Http\Livewire\Admin\Stock;

use App\Repositories\StockRepository;

use Livewire\Component;

class InForm extends Component
{

	public $type = 'in';
	public $book_id, $supplier_id, $total;

	protected $rules = [
		'type' => '',
		'book_id' => 'required|exists:books,id',
		'supplier_id' => 'required|exists:suppliers,id',
		'total' => 'required|integer|min:1'
	];

	public function add(StockRepository $stockRepo): void
	{
		$data = $this->validate();

		$stockRepo->create($data);

		$this->emitUp('reload');
		$this->reset('total');
	}

  public function render()
  {
      return view('livewire.admin.stock.in-form');
  }
}
