<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;

class Search extends Component
{

	public $title;

	public function updatedTitle()
	{
		$this->emit('search', $this->title);
	}

	public function mount()
	{
		$this->title = request()->title;
	}

  public function render()
  {
      return view('livewire.book.search');
  }
}
