<?php 

namespace App\Repositories;

interface SearchInterface {

	public function search(string $search = null): Object;

}

 ?>