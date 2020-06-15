<?php

class CartController
{
	public function actionAdd($id)
	{
		Cart::addProduct($id);

		$referrer = $_SERVER['HTTP_REFERER'];
		header("Location: $referrer");
	}

	public function actionAddAjax($id)
	{
		echo Cart::addProduct($id);
        return true;
	}

    public function actionDelete($id)
    {
        Cart::deleteProduct($id);

        header("Location: /cart");
    }

	public function ActionIndex()
	{
		$categories = Category::getCategoriesList();

		$productsInCart = Cart::getProducts();

		if ($productsInCart) {
			$productsIds = array_keys($productsInCart);

			$products = Product::getProductsByIds($productsIds);

			$totalPrice = Cart::getTotalPrice($products);
		}

		require_once(ROOT . '/views/cart/index.php');

		return true;
	}

	public function actionCheckout()
    {
        $userName = '';
        $userPhone = '';
        $userComment = '';
        $result = false;

        // Получ данные из корзины      
        $productsInCart = Cart::getProducts();

        // Если товаров нет
        if ($productsInCart == false) {
            header("Location: /");
        }

        // Список категорий
        $categories = Category::getCategoriesList();

        // Наход общ стоимость
        $productsIds = array_keys($productsInCart);
        $products = Product::getProductsByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);

        // Количество
        $totalQuantity = Cart::countItems();

        // Поля для формы
        $userName = false;
        $userPhone = false;
        $userComment = false;

        // Статус успешного оформления заказа
        $result = false;

        // Проверяем является ли пользователь гостем
        if (!User::isGuest()) {

            // Получаем информацию о пользователе из БД
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
        } else {

            // Если гость, поля формы останутся пустыми
            $userId = false;
        }

        // Обработка формы
        if (isset($_POST['submit'])) {

            // Получаем данные из формы
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];

            // ошиб
            $errors = false;

            // Валидация полей
            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }


            if ($errors == false) {

                // Сохраняем заказ в базе данных
                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);
            }

            if ($result) {

                    // Оповещаем администратора о новом заказе по почте                
                    $adminEmail = 'squilluv@gmail.com';
                    $message = '<a href="/views/admin/orders">Список заказов</a>';
                    $subject = 'Новый заказ!';
                    mail($adminEmail, $subject, $message);

                    // Очищаем корзину
                    Cart::clear();
                }
        }

        // Подключаем вид
        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }
}