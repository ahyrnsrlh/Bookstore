<?php 

namespace App\Repositories;

use App\Models\Book;

class BookRepository extends Repository implements SelectInterface {

	public function __construct(Book $book)
	{
		$this->model = $book;
	}

	public function find(int $id): Object
	{
		return $this->model->with('category')->findOrFail($id);
	}

	public function findBySlug(string $slug): Object
	{
		return $this->model->with('category')->withAvg('reviews', 'star')->withCount('reviews')->whereSlug($slug)->firstOrFail();
	}

	public function filter($title = null, $isbn = null, $category = null, $stock = null): Object
	{
		return $this->model->when($title, function ($book) use($title)
		{
			return $book->where('title', 'like', '%'.$title.'%');
		})->when($isbn, function ($book) use($isbn)
		{
			return $book->where('isbn', 'like', '%'.$isbn.'%');
		})->when($category, function ($book) use($category)
		{
			return $book->whereCategoryId($category);
		})->when($stock, function ($book) use($stock)
		{
			if ($stock) {
				return $book->where('stock', '>', 1);
			} else {
				return $book->where('stock', '<', 1);
			}
		})->with('category')->latest()->paginate(10);
	}

	public function search($title = null, $category = null): Object
	{
		return $this->model->when($title, function ($book) use($title)
		{
			return $book->where('title', 'like', '%'.$title.'%');
		})->when($category, function ($book) use($category)
		{
			return $book->whereCategoryId($category);
		})->with('category')->withAvg('reviews', 'star')->latest()->paginate(4);
	}

	public function select(string $select = null): Object
	{
		return $this->model->where('isbn', 'like', '%'.$select.'%')->get(['id', 'isbn as text', 'stock']);
	}

}

 ?>