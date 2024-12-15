<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;

use Illuminate\View\View;

class CategoryController extends Controller
{

	protected $categoryRepo;

	public function __construct(CategoryRepository $categoryRepo)
	{
		$this->categoryRepo = $categoryRepo;
	}

	public function index(): View
	{
		$categories = $this->categoryRepo->get();

		return view('category.index', compact('categories'));
	}

	public function list($slug): View
	{
		$category = $this->categoryRepo->findBySlug($slug);

		return view('category.list', compact('category'));
	}

}
