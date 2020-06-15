<?php

class User
{
	public static function register($name, $email, $password) {
		$db = Db::getConnection();

		$sql = "INSERT INTO user (name, email, password) 
				VALUES (:name, :email, :password)";

		$result = $db->prepare($sql);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);

		return $result->execute();
	}

	public static function checkName($name) {
		if (strlen($name) >= 4) {
			return true;
		}
		return false;
	}

	public static function checkPassword($password) {
		if (strlen($password) >=6) {
			return true;
		}
		return false;
	}

	public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }

	public static function checkEmail($email) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
	}
  
  	public static function checkComment($userComment) {
		if (strlen($userComment) >= 4) {
			return true;
		}
		return false;
	}

	public static function checkEmailExists($email) {
		$db = Db::getConnection();

		$sql = "SELECT COUNT(*) 
				FROM user 
				WHERE email = :email";

		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->execute();

		if($result->fetchColumn())
			return false;
		return true;
	}

	public static function checkUserData($email, $password)
	{
		$db = Db::getConnection();

		$sql = "SELECT *
				FROM user
				WHERE email = :email AND password = :password";

		$result = $db->prepare($sql);
		$result->bindParam(':email', $email, PDO::PARAM_INT);
		$result->bindParam(':password', $password, PDO::PARAM_INT);
		$result->execute();

		$user = $result->fetch();
		if($user) {
			return $user['id'];
		}
		return false;
	}

	public static function auth($userId)
	{
		$_SESSION['user'] = $userId;
	}

	public static function checkLogged()
	{

		if (isset($_SESSION['user'])) {
			return $_SESSION['user'];
		}

		header("Location: /user/login");
	}

	public static function checkLoggedButLook()
	{

		if (isset($_SESSION['user'])) {
			return $_SESSION['user'];
		}
	}

	public static function isGuest()
	{

		if (isset($_SESSION['user'])) {
			return false;
		}
		return true;
	}

	public static function getUserById($id)
	{
		$id = intval($id);

		if ($id) {
			$db = Db::getConnection();

			$result = $db->query("SELECT *
			FROM user
			WHERE id = $id");
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}

	public static function getUserByIdTheme($id)
	{
		$id = intval($id);

		if ($id) {
			$db = Db::getConnection();

			$result = $db->query("SELECT *
			FROM user
			WHERE id = $id AND theme = 'dark'");
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}

	public static function edit($id, $name, $password, $about)
	{
		$db = Db::getConnection();

		$sql = "UPDATE user
				SET name = :name, password = :password, about = :about
				WHERE id = :id";

		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_STR);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':password', $password, PDO::PARAM_STR);
		$result->bindParam(':about', $about, PDO::PARAM_STR);

		return $result->execute();
	}

	public static function getProductsByUserId($id)
	{
		$products = array();

		$db = Db::getConnection();


		$sql = "SELECT products
				FROM products_order
				WHERE user_id = :id";

		$result = $db->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);

		$result->setFetchMode(PDO::FETCH_ASSOC);
		$result->execute();

		$i = 0;
        
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
			$products[$i]['products'] = $row['products'];
            $i++;
        }
        return $products;
	}

	public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/users/';

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
	}
	
	public static function getImageRec($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/usersrec/';

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

    public static function getUsersList()
    {

    	$db = Db::getConnection();

    	$result = $db->query("SELECT id, name FROM user WHERE role != 'admin' ORDER BY id DESC");

    	$users = array();

    	$i = 0;
    	while($row = $result->fetch())
    	{
    		$users[$i]['id'] = $row['id'];
    		$users[$i]['name'] = $row['name'];
    		$i++;
    	}

    	return $users;
    }

    public static function updateUser($userId, $options)
    {
    	$db = Db::getConnection();

    	$sql = "UPDATE user SET name = :name, about = :about WHERE id = :userId";

    	$result = $db->prepare($sql);
    	$result->bindParam(':userId', $userId, PDO::PARAM_INT);
		$result->bindParam(':name', $options['name'], PDO::PARAM_STR);
		$result->bindParam(':about', $options['about'], PDO::PARAM_STR);

    	return $result->execute();
    }

    //listing
    public static function getProductsListByUserId($id)
    {
    	$db = Db::getConnection();

    	$result = $db->query("SELECT id, date, status FROM products_order WHERE user_id = $id");

    	$productsList = array();

    	$i = 0;
    	while($row = $result->fetch())
    	{
    		$productsList[$i]['id'] = $row['id'];
    		$productsList[$i]['date'] = $row['date'];
    		$productsList[$i]['status'] = $row['status'];
    		$i++;
    	}

    	return $productsList;
	}
	
	public static function getChatLines()
	{
		$db = Db::getConnection();

		$result = $db->query("SELECT chat_line.id, chat_line.user_id, chat_line.date, chat_line.text, user.name FROM chat_line, user WHERE chat_line.user_id = user.id");

		$chatLines = array();

		$i = 0;
		while($row = $result->fetch())
		{
			$chatLines[$i]['id'] = $row['id'];
			$chatLines[$i]['user_id'] = $row['user_id'];
			$chatLines[$i]['date'] = $row['date'];
			$chatLines[$i]['text'] = $row['text'];
			$chatLines[$i]['name'] = $row['name'];
			$i++;
		}
		return $chatLines;
	}

	public static function createChatLine($user_id, $text) {
		$db = Db::getConnection();

		$sql = "INSERT INTO chat_line (user_id, text) 
				VALUES (:user_id, :text)";

		$result = $db->prepare($sql);
		$result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$result->bindParam(':text', $text, PDO::PARAM_STR);

		return $result->execute();
	}

}