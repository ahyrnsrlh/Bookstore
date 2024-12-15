<?php 

namespace App\Repositories;

class Repository {

	public $model;

	public function get(): Object
	{
		return $this->model->get();
	}

	public function create(array $data): Object
	{
		return $this->model->create($data);
	}

	public function update(int $id, array $data): Object
	{
		$model = $this->find($id);
		$model->update($data);

		return $model;
	}

	public function delete(int $id): Object
	{
		$model = $this->find($id);
		$model->delete();

		return $model;
	}

	public function find(int $id): Object
	{
		return $this->model->findOrFail($id);
	}

	public function count(): Int
	{
		return $this->model->count();
	}

}

 ?>