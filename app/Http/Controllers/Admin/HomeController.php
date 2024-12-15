<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\TransactionRepository;
use App\Repositories\BookRepository;
use App\Repositories\UserRepository;

use Illuminate\View\View;

class HomeController extends Controller
{

	public function index(TransactionRepository $transactionRepo, BookRepository $bookRepo, UserRepository $userRepo): View
	{
		$newOrders = $transactionRepo->getNewOrders();
		$totalBooks = $bookRepo->count();
		$totalUsers = $userRepo->count();
		$totalOrders = $transactionRepo->count();

		return view('admin.home', compact('newOrders', 'totalBooks', 'totalUsers', 'totalOrders'));
	}

}