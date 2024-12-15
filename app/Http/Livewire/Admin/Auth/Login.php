<?php

namespace App\Http\Livewire\Admin\Auth;

use App\Services\Auth\AuthAdminService;

use Livewire\Component;

class Login extends Component
{

	public $email, $password, $remember;

	protected $rules = [
		'email' => 'required|email|exists:admins',
		'password' => 'required'
	];

	public function login(AuthAdminService $authService)
	{
		$credentials = $this->validate();
		$remember = !is_null($this->remember);

		if ($authService->login($credentials, $remember)) {
			session()->flash('success', 'Login Success');

			return redirect('admin');
		} else {
			$this->addError('password', 'Password Incorrect');
		}
	}

    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}
