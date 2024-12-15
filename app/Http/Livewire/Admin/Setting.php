<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting as Model;
use App\Traits\FileTrait;

use Livewire\Component;
use Livewire\WithFileUploads;

class Setting extends Component
{

	use WithFileUploads, FileTrait;

	public $setting, $logo;

	protected $rules = [
		'setting.name' => 'required|string',
		'setting.description' => 'required|string',
		'logo' => 'image|nullable',
	];

	public function save()
	{
		$this->validate();

		if ($this->logo) {
			$this->setting->logo = $this->upload($this->logo, 'setting');
		}

		$this->setting->save();

		session()->flash('success', 'Setting Saved');
	}

	public function mount(Model $setting)
	{
		$this->setting = $setting->first();
	}

  public function render()
  {
      return view('livewire.admin.setting');
  }
}
