<?php 

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository extends Repository {

	public function __construct(Payment $payment)
	{
		$this->model = $payment;
	}

	public function create(array $data): Object
	{
		return $this->model->updateOrCreate($data['transaction'], $data['data']);
	}

}

 ?>