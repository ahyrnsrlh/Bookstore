<?php 

namespace App\Services\Auth;

interface AuthInterface {

	public function login(array $credentials, bool $remember): Bool;

	public function logout();

}

 ?>