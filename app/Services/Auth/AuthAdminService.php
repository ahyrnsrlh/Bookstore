<?php 

namespace App\Services\Auth;

use Auth;

class AuthAdminService implements AuthInterface {

	public function login(array $credentials, bool $remember): Bool
	{
		return Auth::guard('admin')->attempt($credentials, $remember);
	}

	public function logout()
	{
		Auth::guard('admin')->logout();
	}

}

 ?>