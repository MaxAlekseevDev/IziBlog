<?php

class Database
{
	protected $connect;

	public function __construct()
	{
		$host = '127.0.0.1';
		$user = 'root';
		$password = '';
		$name = 'blog';

		$this->connect = new mysqli($host, $user, $password, $name);

		if(!$this->connect) {
			echo "Соедиенние не произошло";
		}

		$this->connect->set_charset('utf8');
	}

	public function queryToDB($sql)
	{
		$correctSql = $this->connect->escape_string($sql);
		$result = $this->connect->query($sql);
		return $result;
	}

	public function __desctruct()
	{
		$this->connect->close();
	}

}