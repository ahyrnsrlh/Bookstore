<?php

namespace App\Http\Livewire\Admin\Book;

use App\Repositories\CategoryRepository;
use App\Repositories\BookRepository;

use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{

	use WithPagination;

	public $categories, $title, $isbn, $category, $stock;

	protected $paginationTheme = 'bootstrap';
	protected $listeners = ['destroy'];
	protected $queryString = [
		'title' => ['except' => ''],
		'category' => ['except' => ''],
		'isbn' => ['except' => ''],
		'stock' => ['except' => '']
	];

	public function destroy(BookRepository $bookRepo, int $id)
	{
		$bookRepo->delete($id);

		session()->flash('success', 'Book Deleted');
	}

	public function resetFilter()
	{
		$this->reset('title', 'isbn', 'category', 'stock');
	}

	public function mount(CategoryRepository $categoryRepo)
	{
		$this->categories = $categoryRepo->get();
	}

    public function render(BookRepository $bookRepo)
    {
    	$books = $bookRepo->filter($this->title, $this->isbn, $this->category, $this->stock);

        return view('livewire.admin.book.table', compact('books'));
    }
}
