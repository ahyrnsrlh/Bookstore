<?php

namespace App\Http\Livewire\Admin\Stock;

use App\Repositories\StockRepository;

use Livewire\Component;

class InTable extends Component
{

	protected $listeners = ['reload', 'destroy'];

	public function destroy(StockRepository $stockRepo, int $id)
	{
		$stockRepo->delete($id);

		$this->reload('History Removed');
	}

	public function reload(string $message = 'Stock Added')
	{
		session()->flash('success', $message);
	}

  public function render(StockRepository $stockRepo)
  {
  	$stocks = $stockRepo->getByType('in');

    return view('livewire.admin.stock.in-table', compact('stocks'));
  }
}
