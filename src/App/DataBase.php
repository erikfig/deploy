<?php

namespace App;

class DataBase
{

	private $data = [
		[
			'id'=>1,
			'name'=>'Erik',
			'email'=>'erik@novatec.com.br',
			'password'=>'123'
		],
		[
			'id'=>2,
			'name'=>'Felipe',
			'email'=>'felipe@novatec.com.br',
			'password'=>'321'
		],
		[
			'id'=>3,
			'name'=>'Rodolfo',
			'email'=>'rodolfo@novatec.com.br',
			'password'=>'231'
		],
	];

	public function find()
	{
		return $this->data;
	}

	public function findById($id)
	{
		$id -= 1;
		return $this->data[$id];
	}

	public function update($id, $data)
	{
		$id -= 1;
		$this->data[$id] = array_merge($this->data[$id], $data);
		return $this->data;
	}

	public function insert($data)
	{
		$id = count($this->data) + 1;

		$data['id']=$id;
		$this->data[] = $data;
		return $data;
	}

	public function delete($id)
	{
		$id -= 1;
		unset($this->data[$id]);
	}
}