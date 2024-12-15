<?php

namespace App\Http\Livewire\Admin\Stock;

use App\Repositories\StockRepository;

use Livewire\Component;

class OutTable extends Component
{

	protected $listeners = ['reload', 'destroy'];

	public function destroy(StockRepository $stockRepo, int $id)
	{
		$stockRepo->delete($id);

		$this->reload('History Removed');
	}

	public function reload(string $message = 'Stock Removed')
	{
		session()->flash('success', $message);
	}

  public function render(StockRepository $stockRepo)
  {
  	$stocks = $stockRepo->getByType('out');

    return view('livewire.admin.stock.out-table', compact('stocks'));
  }
}
