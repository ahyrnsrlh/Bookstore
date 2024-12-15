<?php

namespace App\Http\Livewire\Transaction;

use App\Services\Transaction\TransactionService;

use Livewire\Component;

class Table extends Component
{

	public $invoice, $date, $status;
	public $payment_status = '';

	protected $queryString = [
		'invoice' => ['except' => ''],
		'date' => ['except' => ''],
		'payment_status' => ['except' => ''],
		'status' => ['except' => '']
	];

	public function resetFilter()
	{
		$this->reset();
	}

  public function render(TransactionService $transactionService)
  {
  	$transactions = $transactionService->get($this->invoice, $this->date, $this->payment_status, $this->status);

    return view('livewire.transaction.table', compact('transactions'));
  }
}
