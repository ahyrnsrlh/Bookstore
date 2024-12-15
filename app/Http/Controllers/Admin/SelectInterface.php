<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

interface SelectInterface {

	public function select(Request $request): Object;

}

 ?>