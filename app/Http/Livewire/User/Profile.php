<?php

namespace App\Http\Livewire\User;

use App\Traits\FileTrait;

use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{

	use WithFileUploads, FileTrait;

	public $user;
	public $detail;
	public $photo;

	protected $rules = [
		'user.name' => 'required|string',
		'detail.gender' => 'required|in:male,female',
		'detail.birthday' => 'required|date',
		'detail.phone' => 'required|numeric',
		'detail.address' => 'required|string',
		'photo' => 'image|nullable',
	];

	public function save()
	{
		$this->validate();

		$this->detail->photo = $this->upload($this->photo, 'user');

		$this->user->save();
		$this->detail->save();

		session()->flash('success', 'Profile Saved');
	}

	public function mount()
	{
		$this->user = auth()->user();
		$this->detail = auth()->user()->detail;
	}

  public function render()
  {
    return view('livewire.user.profile');
  }
}
