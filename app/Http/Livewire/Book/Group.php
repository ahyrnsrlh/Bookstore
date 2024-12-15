<?php

namespace App\Http\Livewire\Book;

use App\Repositories\BookRepository;
use App\Repositories\CartRepository;

use Livewire\Component;
use Livewire\WithPagination;

class Group extends Component
{

	use WithPagination;

	public $title;
	public $category;
	public $categoryName;

	protected $queryString = [
		'title' => ['except' => '']
	];
	protected $listeners = ['search'];

	public function getHeadingProperty(): String
	{
		if ($this->category) {
			if ($this->title) {
				return 'Search "'.$this->title.'" in Category '.$this->categoryName;
			} else {
				return 'Category '.$this->categoryName;
			}
		} else if ($this->title) {
			return 'Search "'.$this->title.'"';
		} else {
			return 'Top Books';
		}
	}

	public function search(string $title)
	{
		$this->title = $title;
	}

	public function addToCart(CartRepository $cartRepo, int $book)
	{
		if (auth()->check()) {
			$data = [
				'book_id' => $book,
				'user_id' => auth()->id()
			];

			$cartRepo->create($data);

			session()->flash('success', 'Cart Added');

			return redirect('cart');
		} else {
			return redirect('login');
		}
	}

  public function render(BookRepository $bookRepo)
  {
 		$books = $bookRepo->search($this->title, $this->category);
 		 	
    return view('livewire.book.group', compact('books'));
  }
}
