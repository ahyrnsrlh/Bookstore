<?php 

namespace App\Traits;

trait FileTrait {

	public function upload(object $file, string $path = 'cover'): String
	{
		$fileName = $this->getFileName($file);
		$file->storeAs('public/'.$path, $fileName);

		return $fileName;
	}

	public function getFileName(object $file): String
	{
		$name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
		$extension = $file->extension();

		return $name.time().$extension;
	}

}

 ?>