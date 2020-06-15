<?php

class AdminOtherController extends AdminBase
{
	public function actionIndex()
	{
		self::checkAdmin();

		$otherList = Other::getOtherList();

		require_once(ROOT . '/views/admin_other/index.php');
		return true;
	}

	public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $otherList = Other::getOtherListAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $softOrder = $_POST['soft_order'];
            $status = $_POST['status'];

            // Флаг ошибок в форме
            $errors = false;


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = Other::createOther($name, $softOrder, $status);

                if ($id) {
                };

                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/other");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_other/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $otherList = Other::getOtherListAdmin();

        // Получаем данные о конкретном заказе
        $other = Other::getOtherById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $name = $_POST['name'];
            $softOrder = $_POST['soft_order'];
            $status = $_POST['status'];

            // Сохраняем изменения
            if (Other::updateOtherById($id, $name, $softOrder, $status))
            {
            }
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/other");

        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_other/update.php');
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
            Other::deleteOtherById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/other");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_other/delete.php');
        return true;
    }
}