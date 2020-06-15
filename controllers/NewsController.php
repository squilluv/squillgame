<?php

class NewsController
{
	
	public function actionIndex()
	{
		$newsList = array();
		$newsList = News::getNewsList();

		require_once(ROOT . '/views/news/index.php');

		return true;
	}

	public function actionView($id)
	{
		if ($id) 
		{
		$news_id = $id;
		$name = '';
		$good = '';
		$bad = '';
		$commentt = '';
		$data = '';
		$result = false;

		if (!User::isGuest()) {

            // Получаем информацию о пользователе из БД
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $name = $user['name'];
        } else {

            // Если гость, поля формы останутся пустыми
            $userId = false;
        }

		if (isset($_POST['submit'])) {
			$news_id = $_POST['news_id'];
			$name = $_POST['name'];
			$commentt = $_POST['commentt'];
			$data = $_POST['data'];
			

			$errors = false;

			if ($errors == false) {
				$result = News::creat($news_id, $name, $commentt, $data); 
			}
		}

		$newsItem = News::getNewsItemById($id);
		$comment = News::getCommentById($id);
		$LatestComments = News::getLatestComments($id);

		require_once(ROOT . '/views/news/view.php');
		}
		return true;
		
	}
}