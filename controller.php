<?php
//error_reporting(E_ALL);
session_start();
require_once "database.php";
require_once "registration.php";
require_once "error.php";
require_once "input.php";
require_once "session.php";
require_once "helper.php";

$database = new Database();
$error = new Errors();

if(isset($_POST) && $_POST['action'] == 'Registration'){

	$registration = new Registration();
	
	$name = $_POST['name'];
	$login = $_POST['login'];
	$password = $_POST['password'];

	$registration->init($name, $login, $password);
	
	if(!empty($registration->errors)){
		
		if(in_array('name', $registration->errors)){
			$error->wrongName();
		}elseif(in_array('login', $registration->errors)){
			$error->wrongLogin();
		}elseif(in_array('password', $registration->errors)){
			$error->wrongPassword();
		}

	}elseif(empty($registration->errors)){
		
		$registration->registrate($database);

		if(in_array('user',$registration->errors)){
			$error->wrongUser();
		}else{
			echo "Вы успешно зарегистрировались.";
			echo "Для начала работы вам нужно <a href='forms/input.html'>войти</a>!";
		}
	}
}elseif(isset($_POST) && $_POST['action'] = "Input"){

	$input = new Input();

	$login = $_POST['login'];
	$password = $_POST['password'];

	$success = $input->authentication($login, $password, $database);
	
	if(in_array('exist', $input->error)){
		echo "Вы первый раз здесь. Прошу <a href='forms/registration.html'>зарегистрироваться</a>!";
	}

	$session = new Session($success);
	$help = new Helper();
	$help->changeLocation("work.php");
}