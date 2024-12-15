<?php 

namespace App\Services\Transaction;

use App\Repositories\TransactionRepository;
use App\Repositories\CartRepository;
use App\Services\Cart\CartService;

use Illuminate\Support\Str;

class TransactionService {

	protected $transactionRepo;

	public function __construct(TransactionRepository $transactionRepo)
	{
		$this->transactionRepo = $transactionRepo;
	}

	public function create(array $carts): void
	{
		$cartRepo = app(CartRepository::class);
		$cartService = app(CartService::class);

		$carts = $cartRepo->getById($carts);
		
		$books = $carts->map(function ($cart)
		{
			return $cart->book_id;
		})->all();

		$this->store($books);
		$cartService->delete($carts);
	}

	public function store(array $books): void
	{
		$data = [
			'invoice' => Str::upper(Str::random(8)),
			'user_id' => auth()->id()
		];

		$transaction = $this->transactionRepo->create($data);
		$transaction->books()->attach($books);
	}

	public function get($invoice, $date, $payment_status, $status): Object
	{
		$user = auth()->id();
		
		return $this->transactionRepo->getByUser($user, $invoice, $date, $payment_status, $status);
	}

}

 ?>