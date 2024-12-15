<?php

namespace App\Http\Livewire\Admin\Category;

use App\Repositories\CategoryRepository;

use Livewire\Component;

class Form extends Component
{

	public $name;

	protected $rules = [
		'name' => 'required|string|unique:categories'
	];

	public function save(CategoryRepository $categoryRepo)
	{
		$this->validate();

		$data = [
			'name' => $this->name,
			'slug' => $this->name,
		];

		$categoryRepo->create($data);

		$this->reset();
		$this->emitUp('reload');
	}

    public function render()
    {
        return view('livewire.admin.category.form');
    }
}
