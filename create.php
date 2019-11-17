<?php
//error_reporting(E_ALL);
session_start();

require_once "database.php";
require_once "session.php";
require_once "post.php";
require_once "helper.php";

$session = new Session($_SESSION['id']);
$session->init();
$database = new Database();

$post = new Post();
$post->init($_POST);
$resultOfCreate = $post->create($database, $_SESSION['id']);

if($resultOfCreate){

	$help = new Helper();
	$help->changeLocation("work.php");

}
