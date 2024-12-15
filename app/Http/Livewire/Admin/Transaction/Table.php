<?php

namespace App\Http\Livewire\Admin\Transaction;

use App\Repositories\TransactionRepository;

use Livewire\Component;

class Table extends Component
{

	public $invoice, $date, $status;
	public $payment_status = '';

	protected $queryString = [
		'invoice' => ['except' => ''],
		'date' => ['except' => ''],
		'status' => ['except' => ''],
		'payment_status' => ['except' => '']
	];
	protected $listeners = ['destroy'];

	public function destroy(TransactionRepository $transactionRepo, int $id)
	{
		$transactionRepo->delete($id);

		session()->flash('success', 'Transaction Deleted');
	}

	public function resetFilter()
	{
		$this->reset();
	}

  public function render(TransactionRepository $transactionRepo)
  {
  	$transactions = $transactionRepo->getFilter($this->invoice, $this->date, $this->payment_status, $this->status);
    return view('livewire.admin.transaction.table', compact('transactions'));
  }
}
