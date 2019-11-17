<?php


class User
{
	private $id;
	private $name;

	public function __construct($id)
	{
		$this->id = $id;
	}

	public function getName($database)
	{
		$sql = "SELECT user_name FROM users WHERE user_id = '{$this->id}'";
		$result = $database->queryToDB($sql);
		return $result->fetch_array();
		
	}

	public function getPosts($database)
	{
		$sql = "SELECT * FROM posts WHERE author = '{$this->id}'";
		$result = $database->queryToDB($sql);
		$posts = [];

		while($row = $result->fetch_array()){
			array_push($posts, $row);
		}

		return $posts;
	}

	public function getOnePost($database, $id_post)
	{
		$sql = "SELECT * FROM posts WHERE post_id = $id_post";
		$result = $database->queryToDB($sql);
		$post =[];

		while($row = $result->fetch_array())
		{
			array_push($post, $row);
		}

		return $post;
	}

}