<?php

class GameController
{
  public function actionView($productId)
  {
    $products_id = $productId;
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
      $products_id = $_POST['products_id'];
      $name = $_POST['name'];
      $good = $_POST['good'];
      $bad = $_POST['bad'];
      $commentt = $_POST['commentt'];
      $data = $_POST['data'];
      

      $errors = false;

      if (!Product::checkGood($good)) {
        $errors[] = 'Поле "достоинства" должно быть заполненно.';
      }

      if (!Product::checkBad($bad)) {
        $errors[] = 'Поле "недостатки" должно быть заполненно';
      }

      if ($errors == false) {
        $result = Product::creat($products_id, $name, $good, $bad, $commentt, $data); 
      }
    }

    $product_id = $productId;
    $user_id = '';
    $countlike = '';
    $resultInsert = false;

    if (!User::isGuest()) {

            // Получаем информацию о пользователе из БД
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $user_id = $user['id'];
        } else {

            // Если гость, поля формы останутся пустыми
            $userId = false;
        }

    if (isset($_POST['submitlike'])) {
      $product_id = $_POST['product_id'];
      $user_id = $_POST['user_id'];
      
        $resultInsert = Product::likeinsert($product_id, $userId); 

        header("Location: /game/$productId");   
      }

    if (isset($_POST['submitdel'])) {
            $product_id = $_POST['product_id'];
      $user_id = $_POST['user_id'];

            $resultDel = Product::deleteLikeByProductAndUser($product_id, $user_id);
        }
        
        $user = User::checkLoggedButLook($userId);

    $categories = array();
        $categories = Category::getCategoriesList();

        $tegs = array();
        $tegs = Teg::getTegsList();

    $product = Product::getProductById($productId);
    $product = Product::getProductById($productId);
    $comment = Product::getCommentById($productId);
    $looksProductLike = Product::getLooksLikeProduct($productId);
    $looksProductLikeLimit = Product::getLooksLikeProductLimit($productId);
    $LatestComments = Product::getLatestComments($productId);

    $like = Product::getLikeById($productId);
    $countLike = Product::getCountLikeById($productId);
    $likes = Product::getLikeByProduct($productId);
    $checkLike = Product::checkLikeExists($userId, $productId);
    
    $productFree = Product::getLikeProductFree($productId);
    $productSale = Product::getLikeProductSale($productId);
    $productPre = Product::getLikeProductPre($productId);
    $productMin = Product::getLikeProductMin($productId);
    $productMid = Product::getLikeProductMid($productId);
    $productMax = Product::getLikeProductMax($productId);

    Product::counter($productId);
    $all = Product::viewsSeeAll($productId);
    $date = Product::getDateToday();
    $see = Product::viewsSeeToday($productId, $date);

    require_once(ROOT . '/views/product/view.php');

    return true;
  }

  public function actionAddAjax($productId)
	{
    $product_id = $productId;

    if (!User::isGuest()) {

      // Получаем информацию о пользователе из БД
      $userId = User::checkLogged();
      $user = User::getUserById($userId);
      $user_id = $user['id'];
      } else {

          // Если гость, поля формы останутся пустыми
          $userId = false;
      }
        echo count(Product::likeinsert($product_id, $userId)); 
   
  }
  
  public function actionDelAjax($productId)
	{
    $product_id = $productId;

    if (!User::isGuest()) {

      // Получаем информацию о пользователе из БД
      $userId = User::checkLogged();
      $user = User::getUserById($userId);
      $user_id = $user['id'];
      } else {

          // Если гость, поля формы останутся пустыми
          $userId = false;
      }
        echo count(Product::deleteLikeByProductAndUser($product_id, $user_id)); 
   
	}
}