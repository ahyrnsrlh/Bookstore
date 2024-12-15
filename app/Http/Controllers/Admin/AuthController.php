<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Auth\AuthAdminService;

use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{

	public function logout(AuthAdminService $auth): RedirectResponse
	{
		$auth->logout();

		return redirect('/');
	}

}
