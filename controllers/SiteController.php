<?php

class SiteController
{

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $tegs = array();
        $tegs = Teg::getTegsList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(12);

        $recProducts = array();
        $recProducts = Product::getRecProducts();

        $recs = array();
        $recs = Recomended::getRecList();

        $date = Product::getDateToday();
        
        $detect = new Mobile_Detect;
        
        $userId = User::checkLogged();

		$user = User::getUserByIdTheme($userId);
        
        require_once(ROOT . '/views/site/index.php');

        return true;
    }

    public function actionContact() {
        $userName = '';
        $userRealName = '';
        $userEmail = '';
        $userComment = '';
        $result = false;

        // Поля для формы
        $userName = false;
        $userRealName = false;
        $userEmail = false;
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
            $userRealName = $_POST['userRealName'];
            $userEmail = $_POST['userEmail'];
            $userComment = $_POST['userComment'];

            // ошиб
            $errors = false;

            // Валидация полей
            if (!User::checkName($userRealName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }
          	if (!User::checkComment($userComment)) {
                $errors[] = 'Напишите об ошибке';
            }


            if ($errors == false) {

                // Сохраняем заказ в базе данных
                $result = Contact::save($userName, $userRealName, $userEmail, $userComment, $userId);
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/site/contact.php');
        return true;
    }
}
