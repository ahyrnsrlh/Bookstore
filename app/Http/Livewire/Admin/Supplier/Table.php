<?php

namespace App\Http\Livewire\Admin\Supplier;

use App\Repositories\SupplierRepository;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\View\View;

class Table extends Component
{

	use WithPagination;

	public $search;
	protected $queryString = [
		'search' => ['except' => ''],
		'page' => ['except' => 1]
	];
	protected $paginationTheme = 'bootstrap';
	protected $listeners = ['reload', 'destroy'];

	public function destroy(SupplierRepository $supplierRepo, int $id): void
	{
		$supplierRepo->delete($id);

		$this->reload('Supplier Deleted');
	}

	public function reload(string $message = 'Supplier Created'): void
	{
		session()->flash('success', $message);
	}

	public function updatingSearch(): void
	{
		$this->gotoPage(1);
	}

	public function mount(): void
	{
		$this->fill(request()->only('search', 'page'));
	}

    public function render(SupplierRepository $supplierRepo): View
    {
    	$suppliers = $supplierRepo->search($this->search);

        return view('livewire.admin.supplier.table', compact('suppliers'));
    }
}
