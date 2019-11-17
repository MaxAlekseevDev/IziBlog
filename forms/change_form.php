<?php
session_start();

require_once "../session.php";
require_once "../database.php";
require_once "../user.php";
require_once "../helper.php";

$session = new Session($_SESSION['id']);
$session->init();
$database = new Database();
$user = new User($_SESSION['id']);
$post = $user->getOnePost($database, $_SESSION['post_id']);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Редатирование статьи</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="col-6">
	<h4>Редактирование поста</h4>
	<form action="../change.php" method="post">  
		<div class="form-group">
		    <label for="exampleFormControlInput1">Title </label>
		    <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $post[0]['post_title'];?>" name='title'>
		  </div>
		 
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Description</label>
		    <textarea class="form-control" name='description' id="exampleFormControlTextarea1" rows="9"
		    ><?php echo $post[0]['post_description'];?></textarea>
		 </div>
		 
		 	<input type="submit" name="Change" class="btn btn-primary">
	</form>

</body>
</html>