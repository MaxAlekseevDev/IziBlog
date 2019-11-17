<?php
//error_reporting();
require_once "database.php";
require_once "post.php";

$database = new Database();

$post = new Post();
$posts = $post->show($database);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Главная</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="container">
	<header class="navbar">
		<div class="navbar-brand text-muted">Блог для записи мыслей</div>

	</header>
	<a class="btn btn-success" href="forms/input.html">Вход</a>
	<a href="forms/registration.html" class="btn btn-primary">Регистрация</a>
	<main>
		<?php foreach ($posts as $post): ?>
			<article class="">
				<h3><?php echo $post['post_title'];?></h3>
				<p class="lead"><?php echo $post['post_description'];?></p>
				<span><?php echo $post['published'] ?></span>
			</article>
		<?php endforeach; ?>	
	</main>
</body>
</html>



