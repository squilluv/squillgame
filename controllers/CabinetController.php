<?php

class CabinetController extends AdminBase
{
	
	public function actionIndex()
	{

		$userId = User::checkLogged();
		
		$user = User::getUserById($userId);

		$products = User::getProductsListByUserId($userId);

		require_once(ROOT . '/views/cabinet/index.php');

		return true;
	}

	public function actionEdit()
	{
		$userId = User::checkLogged();

		$user = User::getUserById($userId);

		
		if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $_POST['name'];
            $options['password'] = $_POST['password'];
			$options['about'] = $_POST['about'];

            // Сохраняем изменения
            if (User::updateUser($userId, $options)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["IMAGE"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["IMAGE"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/users/{$userId}.jpg");
				}
				
				if (is_uploaded_file($_FILES["IMAGErec"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["IMAGErec"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/usersrec/{$userId}.jpg");
                }
            }

            header("Location: /cabinet");
        }

		require_once(ROOT . '/views/cabinet/edit.php');

		return true;
	}

	public function actionHistory($orderId)
	{
		$userId = User::checkLogged();
		
		$user = User::getUserById($userId);

		$orderList = Order::getOrderList();

        $order = Order::getOrderById($orderId);

        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);

        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);

        // Получаем список товаров в заказе
        $products = Product::getProductsByIds($productsIds);
        
        $totalPrice = Cart::getTotalPrice($products);

		require_once(ROOT . '/views/cabinet/history.php');
		return true;
	}
}
