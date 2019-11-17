<?php

class Helper
{
	public function showInfo($information)
	{
		echo '<pre>';
		print_r($information);
		echo '</pre>';
	}

	public function changeLocation($location)
	{
		header("Location:$location");
	}
}