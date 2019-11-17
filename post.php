<?php

class Post
{
	protected $title;
	protected $description;
	protected $published;

	public function init($postInfo)
	{
		$this->title = $postInfo['title'];
		$this->description = $postInfo['description'];
		$this->published = $this->getDate();
	}

	public function getDate()
	{
		$date = date("Y-m-d H:i:s");
		return $date;
	}

	public function create($database, $user_id)
	{
		$sql = "INSERT INTO posts(post_title, post_description, published, author) VALUES ('{$this->title}', '{$this->description}', '{$this->published}', '$user_id')";
		$result = $database->queryToDB($sql);
		return $result;
	}

	public function show($database)
	{
		$sql = "SELECT * FROM posts";
		$result = $database->queryToDB($sql);
		$posts = [];

		while($row = $result->fetch_array())
		{
			array_push($posts, $row);
		}

		return $posts;
	}

	public function change($database, $post_id, $user_id)
	{
		$sql = "UPDATE posts SET post_title = '{$this->title}', 
				post_description = '{$this->description}',   published = '{$this->published}'
				 WHERE post_id = '$post_id' AND author = '$user_id'";
		$result = $database->queryToDB($sql);
		return $result;
	}

	public function delete($database, $post_id)
	{
		$sql = "DELETE FROM posts WHERE post_id ='$post_id'";
		$result = $database->queryToDB($sql);
		return $result;
	}

	
}