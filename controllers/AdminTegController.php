<?php

class AdminTegController extends AdminBase
{
	public function actionIndex()
	{
		self::checkAdmin();

		$tegsList = Teg::getTegsList();

		require_once(ROOT . '/views/admin_teg/index.php');
		return true;
	}

	public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $tegsList = Teg::getTegsListAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $status = $_POST['status'];

            // Флаг ошибок в форме
            $errors = false;


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = Teg::createTeg($name, $status);

                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/teg");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_teg/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $tegsList = Teg::getTegsListAdmin();

        // Получаем данные о конкретном заказе
        $teg = Teg::getTegById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $name = $_POST['name'];
            $softOrder = $_POST['soft_order'];
            $status = $_POST['status'];

            // Сохраняем изменения
            if (Teg::updateTegById($id, $name, $softOrder, $status))
            {
            }
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/teg");

        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_teg/update.php');
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
            Teg::deleteTegById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/teg");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_teg/delete.php');
        return true;
    }
}