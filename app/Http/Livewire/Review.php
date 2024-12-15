<?php

namespace App\Http\Livewire;

use App\Repositories\ReviewRepository;

use Livewire\Component;

class Review extends Component
{

	public $content, $book_id;
	public $star = 0;

	protected $rules = [
		'content' => 'required|string',
		'star' => '',
		'book_id' => ''
	];

	public function save(ReviewRepository $reviewRepo)
	{
		$data = $this->validate();
		$data['user_id'] = auth()->id();

		$reviewRepo->create($data);

		$this->dispatchBrowserEvent('reload');
	}

	public function mount(int $book)
	{
		$this->book_id = $book;
	}

  public function render()
  {
      return view('livewire.review');
  }
}
