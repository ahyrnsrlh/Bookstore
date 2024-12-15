<?php

namespace App\Http\Livewire\Admin\Book;

use App\Traits\FileTrait;
use App\Repositories\CategoryRepository;
use App\Repositories\BookRepository;

use Illuminate\Support\Str;

use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

	use WithFileUploads, FileTrait;

	public $isbn, $title, $category_id, $author, $publisher, $lang, $pages, $price, $publish_date, $description, $cover;

	protected $rules = [
		'isbn' => 'required|unique:books',
		'title' => 'required|string|unique:books',
		'category_id' => 'required|exists:categories,id',
		'author' => 'required|string',
		'publisher' => 'required|string',
		'lang' => 'required|string',
		'pages' => 'required|integer',
		'price' => 'required',
		'publish_date' => 'required|date',
		'description' => 'required|string',
		'cover' => 'required|image'
	];

	public function save(BookRepository $categoryRepo)
	{
		$data = $this->validate();

		$data['isbn'] = intval(str_replace('-', '', $this->isbn));
		$data['price'] = intval(str_replace(',', '', $this->price));
		$data['slug'] = Str::slug($this->title);
		$data['cover'] = $this->upload($this->cover);

		$categoryRepo->create($data);

		session()->flash('success', 'Book Created');

		return redirect('/admin/book');
	}

    public function render(CategoryRepository $categoryRepo)
    {
    	$categories = $categoryRepo->get();

        return view('livewire.admin.book.create', compact('categories'));
    }
}
