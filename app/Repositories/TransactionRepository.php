<?php 

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository extends Repository {

	public function __construct(Transaction $transaction)
	{
		$this->model = $transaction;
	}

	public function find(int $id): Object
	{
		return $this->model->with(['books', 'user.detail'])->findOrFail($id);
	}

	public function filter($invoice, $date, $payment_status, $status): Object
	{
		return $this->model->when($invoice, function ($transaction) use($invoice)
		{
			return $transaction->where('invoice', 'like', '%'.$invoice.'%');
		})->when($date, function ($transaction) use($date)
		{
			return $transaction->whereDate('created_at', $date);
		})->when($payment_status !== '', function ($transaction) use($payment_status)
		{
			return $transaction->wherePaymentStatus($payment_status);
		})->when($status, function ($transaction) use($status)
		{
			return $transaction->whereStatus($status);
		})->withSum('books', 'price');
	}

	public function getFilter($invoice = null, $date = null, $payment_status = null, $status = null): Object
	{
		return $this->filter($invoice, $date, $payment_status, $status)->with('user')->get();
	}

	public function getByUser(int $user, $invoice = null, $date = null, $payment_status = null, $status = null): Object
	{
		return $this->filter($invoice, $date, $payment_status, $status)->whereUserId($user)->get();
	}

	public function getNewOrders(): Int
	{
		return $this->model->whereDate('created_at', now())->count();
	}

}

 ?>