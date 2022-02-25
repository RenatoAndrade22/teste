<?php

class userController
{

	private $name;
	private $code;
	private $birth_data;
	private $image;

	public function __construct(){
		$this->name = $_POST['nome'];
		$this->code = $_POST['code'];
		$this->birth_data = date('Y-m-d',strtotime($_POST['birth_data']));
		$this->image = $_FILES['files']['name'][0];
		$this->uploadImage();
		$this->store();
	}

	public function store()
	{
		$user = new User();
		$user->setCode($this->code);
		$user->setImage($this->name);
		$user->setBirthData($this->birth_data);
		$user->setImage($this->image);
		$user->save();
	}

	public function uploadImage()
	{

		// Location
		$target_file = 'upload/'.$this->image;

		// file extension
		$file_extension = pathinfo(
			$target_file, PATHINFO_EXTENSION);

		$file_extension = strtolower($file_extension);

		// Valid image extension
		$valid_extension = array("png","jpeg","jpg");

		if(in_array($file_extension, $valid_extension)) {

			// Upload file
			if(!move_uploaded_file(
				$_FILES['files']['tmp_name'][0],
				$target_file)
			) {
				echo "<script>alert('Erro ao salvar imagem.');history.back()</script>";
			}
		}
	}
}
