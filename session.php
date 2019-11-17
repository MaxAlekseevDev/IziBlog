<?php

class Session
{
	private $id;

	public function __construct($id)
	{
		$this->id = $id;
		$_SESSION['id'] = $this->id;
	}

	public function init()
	{
		if(!isset($this->id)){
			echo "Вы гость. Для работи зарегистрируйтесь или войдите!";
			require_once "index.php";
		}
	}

	public function out()
	{
		unset($_SESSION['id']);
		
	}
}