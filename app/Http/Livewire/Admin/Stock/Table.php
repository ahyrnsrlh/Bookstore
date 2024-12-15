<?php

namespace App\Http\Livewire\Admin\Stock;

use App\Repositories\StockRepository;

use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{

	use WithPagination;

	protected $paginationTheme = 'bootstrap';

  public function render(StockRepository $stockRepo)
  {
		$stocks = $stockRepo->get();

    return view('livewire.admin.stock.table', compact('stocks'));
  }
}
