<?php

class UserController
{
	
	public function actionRegister()
	{
		$name = '';
		$email = '';
		$password = '';
		$result = false;

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			$errors = false;

			if (!User::checkName($name)) {
				$errors[] = 'Имя не должно быть короче 4х символов';
			}

			if (!User::checkEmail($email)) {
				$errors[] = 'Неправильный E-mail';
			}

			if (!User::checkPassword($password)) {
				$errors[] = 'Пороль не должен быть короче 6и символов';
			}

			if (!User::checkEmailExists($email)) {
				$errors[] = 'Такой E-mail уже используется';
			}

			if ($errors == false) {
				$result = User::register($name, $email, $password);
			}
		}

		require_once(ROOT . '/views/user/register.php');

		return true;
	}

	public function actionLogin()
	{
		$email = '';
		$password = '';

		if (isset($_POST['submit'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];

			$errors = false;

			if (!User::checkEmail($email)) {
				$errors[] = 'Неправильный email';
			}
			if (!User::checkPassword($password)) {
				$errors[] = 'Пароль не должен быть короче 6ти символов';
			}

			$userId = User::checkUserData($email, $password);

			if ($userId == false) {
				$errors[] = 'Неправильные данные для входа на сайт';
			} else {
				User::auth($userId);

				header("Location: /cabinet/");
			}
		}

		require_once(ROOT . '/views/user/login.php');

		return true;
	}

	public function actionLogout()
	{
		ob_start();
		unset($_SESSION["user"]);
		header("Location: /");

		require_once ROOT . '/views/user/logout.php';
		return true;
	}

	public function actionChat()
	{
		$userId = User::checkLogged();
		$user = User::getUserById($userId);

		$user_id = '';
		$text = '';

		if (isset($_POST['submit'])) {
			$user_id = $_POST['user_id'];
			$text = $_POST['text'];

			
			User::createChatLine($user_id, $text);

			header("Location: /chat");
		}	

		$chatLines = User::getChatLines();

		

		require_once ROOT . '/views/chat/index.php';
		return true;
	}

	public function actionCreatechat()
	{

	}

	public function actionChatr()
	{
		$userId = User::checkLogged();
		$user = User::getUserById($userId);

			
			User::createChatLine($user_id, $text);

	}

	public function actionUserslist()
	{
		$userList = array();
		$userList = User::getUsersList();

		require_once ROOT . '/views/user/users.php';
		return true;
	}

	public function actionUser($id)
  	{
		$userId = User::checkLogged();
		
		$user = User::getUserById($id);
		
		require_once(ROOT . '/views/user/view.php');

		return true;
  	}
}