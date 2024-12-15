<?php

namespace App\Http\Livewire\Auth;

use App\Services\Auth\AuthUserService;

use Livewire\Component;

class Login extends Component
{

	public $email, $password;

	protected $rules = [
		'email' => 'required|email|exists:users',
		'password' => 'required'
	];

	public function login(AuthUserService $auth)
	{
		$data = $this->validate();

		if ($auth->login($data, false)) {
			session()->flash('success', 'Login Success');

			return redirect('user');
		} else {
			$this->addError('password', 'Password Incorrect');
		}
	}

  public function render()
  {
      return view('livewire.auth.login');
  }
}
