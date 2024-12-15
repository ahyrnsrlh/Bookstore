<?php 

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends Repository implements SearchInterface {

	public function __construct(Category $category)
	{
		$this->model = $category;
	}

	public function getTop(): Object
	{
		return $this->model->withCount('books')->latest('books_count')->take(10)->get();
	}

	public function findBySlug(string $slug): Object
	{
		return $this->model->whereSlug($slug)->firstOrFail();
	}

	public function search(string $search = null): Object
	{
		return $this->model->where('name', 'like', '%'.$search.'%')->latest()->paginate(5);
	}

}

 ?>