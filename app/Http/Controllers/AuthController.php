<?php

namespace App\Http\Controllers;

use App\Services\Auth\AuthUserService;

use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{

	public function verify(EmailVerificationRequest $request): RedirectResponse
	{
		$request->fulfill();

		return redirect('/');
	}

	public function logout(AuthUserService $auth): RedirectResponse
	{
		$auth->logout();

		return redirect('/');
	}

}
