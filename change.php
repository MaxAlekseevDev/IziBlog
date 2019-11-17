<?php
//error_reporting(E_ALL);
session_start();

require_once "session.php";
require_once "database.php";
require_once "post.php";
require_once "helper.php";

$session = new Session($_SESSION['id']);
$session->init();
$database = new Database();


if(isset($_POST)){
	$post = new Post();
	$post->init($_POST);
	$resultOfChange = $post->change($database, $_SESSION['post_id'], $_SESSION['id']);

	if($resultOfChange){
		$help = new Helper();
		$help->changeLocation("work.php");
	}
}
