<?php

namespace App\Http\Livewire;

use App\Repositories\CategoryRepository;

use Livewire\Component;

class Category extends Component
{
    public function render(CategoryRepository $categoryRepo)
    {
			$categories = $categoryRepo->getTop();
    
      return view('livewire.category', compact('categories'));
    }
}
