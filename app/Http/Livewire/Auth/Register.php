<?php

namespace App\Http\Livewire\Auth;

use App\Services\Auth\AuthUserService;

use Livewire\Component;

class Register extends Component
{

	public $name, $email, $password, $password_confirmation;

	protected $rules = [
		'name' => 'required|string',
		'email' => 'required|email|unique:users',
		'password' => 'required|confirmed'
	];

	public function register(AuthUserService $auth)
	{
		$data = $this->validate();

		$auth->register($data);

		session()->flash('success', 'Register Success');
		return redirect('user');
	}

  public function render()
  {
      return view('livewire.auth.register');
  }
}
