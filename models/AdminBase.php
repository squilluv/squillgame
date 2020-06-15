<?php

abstract class AdminBase
{
	public function checkAdmin()
	{
		$userId = User::checkLogged();

		$user = User::getUserById($userId);

		if ($user['role'] == 'admin') {
		 	return true;
		 } 

		die('');
	}

	public function checkWorker()
	{
		$userId = User::checkLogged();

		$user = User::getUserById($userId);

		if ($user['role'] == 'work') {
			return true;
		}

	}
}