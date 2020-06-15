<?php

class AdminOrderController extends AdminBase
{
	public function actionIndex()
	{
		self::checkAdmin();

		$orderList = Order::getOrderList();

		require_once(ROOT . '/views/admin_order/index.php');
		return true;
	}

    public function actionView($orderId)
    {
        self::checkAdmin();

        $orderList = Order::getOrderList();

        $order = Order::getOrderById($orderId);

        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);

        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);

        // Получаем список товаров в заказе
        $products = Product::getProductsByIds($productsIds);


        require_once(ROOT . '/views/admin_order/view.php');
        return true;
    }

    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        $order = Order::getOrderById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $date = $_POST['date'];
            $status = $_POST['status'];

            // Сохраняем изменения
            Order::updateOrderById($id, $userName, $userPhone, $userComment, $date, $status);

            // Перенаправляем пользователя на страницу управлениями заказами
            header("Location: /admin/order/view/$id");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_order/update.php');
        return true;
    }

    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            Order::deleteOrderById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/order");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_order/delete.php');
        return true;
    }

    public function actionExportexceldoc()
    {
        require_once ROOT . '/views/admin_order/exportdoc.php';
        return true;
    }

    public function actionExportexcel()
    {
        require_once ROOT . '/views/admin_order/export.php';
        return true;
    }
}