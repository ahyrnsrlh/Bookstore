<?php

namespace App\Http\Controllers;

use App\Repositories\BookRepository;

use Illuminate\View\View;

class BookController extends Controller
{

	public function index(BookRepository $bookRepo, $slug): View
	{
		$book = $bookRepo->findBySlug($slug);
		$reviews = $book->reviews()->with('user.detail')->paginate(5);

		return view('book', compact('book', 'reviews'));
	}

}
