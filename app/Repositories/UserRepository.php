<?php 

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository {

	public function __construct(User $user)
	{
		$this->model = $user;
	}

	public function search($name = null): Object
	{
		return $this->model->where('name', 'like', '%'.$name.'%')->paginate(10);
	}

}

 ?>