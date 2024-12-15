<?php 

namespace App\Services\Auth;

use App\Repositories\UserRepository;

use Auth;

class AuthUserService implements AuthInterface {

	public function login(array $credentials, bool $remember): Bool
	{
		return Auth::attempt($credentials, $remember);
	}

	public function logout() 
	{
		return Auth::logout();
	}

	public function register(array $data)
	{
		$userRepo = app(UserRepository::class);

		$user = $userRepo->create($data);

		Auth::login($user);
	}

}

 ?>