<?php

class Errors
{
	public $message;

	public function wrongName()
	{
		$this->message = "Имя должно быть от 2 до 15 символов!";
		echo "<p style='margin-left:15px'>".$this->message. "</p>";
		require_once 'forms/registration.html';
	}

	public function wrongLogin()
	{
		$this->message = "Логин должно быть от 2 до 15 символов!";
		echo "<p style='margin-left:15px'>".$this->message. "</p>";
		require_once 'forms/registration.html';
	}

	public function wrongPassword()
	{
		$this->message = "Пароль должно быть от 2 до 20 символов!";
		echo "<p style='margin-left:15px'>".$this->message. "</p>";
		require_once 'forms/registration.html';
	}

	public function wrongUser()
	{
		$this->message = "Пользователь с таки именем существует";
		echo "<p style='margin-left:15px'>".$this->message. "</p>";
		require_once "forms/registration.html";
	}
	
}

