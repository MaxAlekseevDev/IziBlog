<?php
class Registration
{
	private $name;
	private $login;
	private $password;
	public $errors = [];

	public function init($name, $login, $password)
	{
		if(isset($name) && (strlen($name) > 2 && strlen($name) <= 15)){
			$this->name = $name;
		}else{
			$this->errors[] = 'name';			
		}
		if(isset($login)&& (strlen($login) > 2 && strlen($login) <= 15)){
			$this->login = $login;
		}else{
			$this->errors[] = 'login';
		}
		if(isset($password) && (strlen($password) > 2 && strlen($password) <= 20)){
			$this->password = $password;
		}else{
			$this->errors[] = 'password';
		}

		return $this->errors;
	}

	public function checkUser($database)
	{
		$sql = "SELECT * FROM users WHERE user_name = '{$this->name}' AND user_login = '{$this->login}'";
		$result = $database->queryToDB($sql);
		return $result;
	}

	public function registrate($database)
	{
		$user = $this->checkUser($database);
		
		if($user->num_rows == 0){
			$passwordCorrect = md5($this->password . 'Max2019');
			$sql = "INSERT INTO users (user_name, user_login, user_password) VALUES ('$this->name',
				'$this->login', '$passwordCorrect')";
			$result = $database->queryToDB($sql);
			return $result;
		}else{
			$this->errors[] = 'user';
		}
		
		return $this->errors;
	}


}