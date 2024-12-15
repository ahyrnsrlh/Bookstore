<?php

namespace App\Http\Livewire\Transaction;

use App\Traits\FileTrait;
use App\Repositories\PaymentRepository;

use Livewire\Component;
use Livewire\WithFileUploads;

class Payment extends Component
{

	use WithFileUploads, FileTrait;

	public $photo, $transaction;

	protected $rules = [
		'photo' => 'required|image'
	];

	public function save(PaymentRepository $paymentRepo)
	{
		$data = $this->validate();

		$paymentRepo->create([
			'transaction' => ['transaction_id' => $this->transaction],
			'data' => ['photo' => $this->upload($this->photo, 'proof')]
		]);

		session()->flash('success', 'Sukses Make Payment');

		return redirect('transaction');
	}

  public function render()
  {
      return view('livewire.transaction.payment');
  }
}
