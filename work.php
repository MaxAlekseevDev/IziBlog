<?php
//error_reporting(E_ALL);
session_start();

require_once "session.php";
require_once "database.php";
require_once "user.php";
require_once "helper.php";
require_once "post.php";

$session = new Session($_SESSION['id']);
$session->init();
$database = new Database();
$user = new User($_SESSION['id']);
$name = $user->getName($database);
$posts = $user->getPosts($database);
$help = new Helper();
 

if(isset($_GET['action']) && $_GET['action'] == 'out'){
	$session->out();
	$help->changeLocation("index.php");
}elseif(isset($_GET['action']) && $_GET['action'] == 'change'){
	$_SESSION['post_id'] = $_GET['post'];
	$help->changeLocation("forms/change_form.php");
}elseif(isset($_GET['action']) && $_GET['action'] == 'delete'){
	$post= new Post();
	$deleteOfPost = $post->delete($database, $_GET['post']);
	$help->changeLocation("work.php");
}elseif(isset($_GET['action']) && $_GET['action'] == 'create'){
	$help->changeLocation("forms/create.html");
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Рабочая страница</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="container">
	<p>Здесь <b><?php echo $name['user_name'];?></b>  можете создавать, редактировать и удалять посты.</p>
	<a href="<?php echo $_SERVER['SCRIPT_NAME']."?action=out";?>" class="btn btn-danger">Выход</a>
	<a href="<?php echo $_SERVER['SCRIPT_NAME']."?action=create";?>" class="btn btn-info">Создать пост</a>
	<main style="margin-top: 10px;">
		<table class="table table-dark table-striped table-bordered table-hover">
			<tr>
				<th class="text-center">Название</th>
				<th class="text-center">Описание</th>
				<th class="text-center">Дата</th>
				<th colspan="2" class="text-center">Действие</th>
				
			</tr>
			<?php foreach ($posts as $post): ?>
				<tr>
					<td scope="row"><?php echo $post['post_title'];?></td>
					<td><?php echo $post['post_description'];?></td>
					<td><?php echo $post['published']?></td>
					<td><a class="btn btn-info" href="<?php echo "work.php?action=change&post={$post['post_id']}";?>">Редактировать</a></td>
					<td><a href="<?php echo "work.php?action=delete&post={$post['post_id']}";?>" class="btn btn-info">Удалить</a></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</main>
</body>
</html>