<?php

namespace App\Http\Livewire\Admin\Category;

use App\Repositories\CategoryRepository;

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

	public function destroy(CategoryRepository $categoryRepo, int $id): void
	{
		$categoryRepo->delete($id);

		$this->reload('Category Deleted');
	}

	public function reload(string $message = 'Category Created'): void
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

    public function render(CategoryRepository $categoryRepo): View
    {
    	$categories = $categoryRepo->search($this->search);

        return view('livewire.admin.category.table', compact('categories'));
    }
}
