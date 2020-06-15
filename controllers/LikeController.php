<?php  

class LikeController
{
	public function actionIndex()
	{
		$categories = array();
        $categories = Category::getCategoriesList();

        $tegs = array();
        $tegs = Teg::getTegsList();

		$userId = User::checkLogged();
        $user = User::getUserById($userId);

        $likeList = Product::getLikesListByUser($userId);


		require_once(ROOT . '/views/like/index.php');
		return true;
	}
}