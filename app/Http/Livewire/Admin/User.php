<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\UserRepository;

use Livewire\Component;

class User extends Component
{

	public $name;

	protected $queryString = [
		'name' => ['except', '']
	];
	protected $listeners = ['destroy'];

	public function destroy(UserRepository $userRepo, int $id)
	{
		$userRepo->delete($id);

		session()->flash('success', 'User Deleted');
	}

  public function render(UserRepository $userRepo)
  {
  	$users = $userRepo->search($this->name);

    return view('livewire.admin.user', compact('users'));
  }
}
