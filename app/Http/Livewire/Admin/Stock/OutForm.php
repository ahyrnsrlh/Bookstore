<?php

namespace App\Http\Livewire\Admin\Stock;

use App\Repositories\StockRepository;

use Livewire\Component;

class OutForm extends Component
{

	public $type = 'out';
	public $max = 0;
	public $supplier_id = 1;
	public $book_id, $total;

	protected $rules = [
		'type' => '',
		'supplier_id' => '',
		'book_id' => 'required|exists:books,id',
	];

	public function out(StockRepository $stockRepo): void
	{
		$data = $this->validate(array_merge($this->rules, [
			'total' => 'required|integer|max:'.$this->max
		]));

		$stockRepo->create($data);

		$this->emitUp('reload');
		$this->reset('total');
	}
  
  public function render()
  {
      return view('livewire.admin.stock.out-form');
  }
}
