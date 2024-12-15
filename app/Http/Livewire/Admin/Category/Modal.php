<?php

namespace App\Http\Livewire\Admin\Category;

use App\Repositories\CategoryRepository;

use Livewire\Component;

class Modal extends Component
{

	public $category;

	protected $rules = [
		'category.name' => ''
	];

	protected $listeners = ['edit' => 'showModal'];

	public function showModal(CategoryRepository $categoryRepo, int $categoryId)
	{
		$this->category = $categoryRepo->find($categoryId);
		$this->resetValidation();
	}

	public function save()
	{
		$this->validate([
			'category.name' => 'required|string|unique:categories,name,'.$this->category->id
		]);

		$this->category->slug = $this->category->name;
		$this->category->save();

		$this->emitUp('reload', 'Category Edited');
		$this->dispatchBrowserEvent('close-modal');
	}

    public function render()
    {
        return view('livewire.admin.category.modal');
    }
}
