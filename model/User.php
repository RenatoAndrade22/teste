<?php
include "../database/connect.php";

class User
{
	private $name;
	private $code;
	private $birth_data;
	private $image;

	//Metodos Set
	public function setName($name){
		$this->name = $name;
	}
	public function setCode($code){
		$this->code = $code;
	}
	public function setBirthData($birth_data){
		$this->birth_data = $birth_data;
	}
	public function setImage($image){
		$this->image = $image;
	}

	public function save()
	{
		$query = "INSERT INTO users (code,name,birth_data,image) VALUES(?,?,?,?)";
		$statement = $conn->prepare($query)->execute([$this->code, $this->name, $this->birth_data, $this->image]);
		return $statement;
	}
}
