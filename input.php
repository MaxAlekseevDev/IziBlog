<?php

class Input
{
	private $login;
	private $password;
	public $error =[];
	private $id;


	public function authentication($login, $password, $database)
	{
		$this->login = $login;
		$this->password = $password;

		$passwordCorrect = md5($this->password . "Max2019");
		$sql = "SELECT * FROM users WHERE user_login = '{$this->login}' AND user_password = '{$passwordCorrect}'";
		$result = $database->queryToDB($sql);
		
		if($result->num_rows == 0){
			$this->error[] = 'exist';
			return $this->error;
		}else{
			$rows = [];
			while($row = $result->fetch_array()){
				array_push($rows, $row);
			}
			
			$this->id = $rows[0]['user_id'];
			return $this->id;
		}
	}

}