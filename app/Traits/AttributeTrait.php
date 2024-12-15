<?php 

namespace App\Traits;

trait AttributeTrait {

	public function getLocalDateAttribute(): String
	{
		return localDate($this->created_at);
	}

}

 ?>