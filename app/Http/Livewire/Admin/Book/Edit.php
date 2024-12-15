<?php

namespace App\Http\Livewire\Admin\Book;

use App\Repositories\CategoryRepository;
use App\Repositories\BookRepository;
use App\Traits\FileTrait;

use Illuminate\Support\Str;

use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{

	use WithFileUploads, FileTrait;

	public $book, $cover;

	protected $rules = [
		'book.title' => '',
		'book.isbn' => '',
		'book.category_id' => 'required|exists:categories,id',
		'book.author' => 'required|string',
		'book.publisher' => 'required|string',
		'book.publish_date' => 'required|string',
		'book.lang' => 'required|string',
		'book.pages' => 'required|integer',
		'book.price' => 'required',
		'book.description' => 'required|string',
		'cover' => 'image|nullable'
	];

	public function save()
	{
		$this->validate(array_merge($this->rules, [
			'book.title' => 'required|string|unique:books,title,'.$this->book->id,
			'book.title' => 'required|unique:books,title,'.$this->book->id,
		]));

		$this->book->slug = Str::slug($this->book->title);
		$this->book->price = intval(str_replace(',', '', $this->book->price));
		$this->book->isbn = intval(str_replace(',', '', $this->book->isbn));

		if ($this->cover) {
			$this->book->cover = $this->upload($this->cover);
		}

		$this->book->save();

		session()->flash('success', 'Book Edited');


		return redirect('admin/book');
	}

	public function mount(BookRepository $bookRepo)
	{
		$id = request()->book;

		$this->book = $bookRepo->find($id);
	}

    public function render(CategoryRepository $categoryRepo)
    {
    	$categories = $categoryRepo->get();

        return view('livewire.admin.book.edit', compact('categories'));
    }
}
