<?php

class AdminSeriesController extends AdminBase
{
    

	public function actionIndex()
	{
		self::checkAdmin();

		$series = Series::getSeriesList();

		require_once(ROOT . '/views/admin_series/index.php');
		return true;
	}

	public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        $series = Series::getSeriesList();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name'] = $_POST['name'];
            $options['soft_order'] = $_POST['soft_order'];
            $options['status'] = $_POST['status'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = Series::create($options);

                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/series/{$id}.jpg");
                    }
                };


                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/series");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_series/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретном заказе
        $series = Series::getSeriesById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $_POST['name'];
            $options['soft_order'] = $_POST['soft_order'];
            $options['status'] = $_POST['status'];

            // Сохраняем изменения
            if (Series::updateSeriesById($id, $options)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/series/{$id}.jpg");
                }
            }

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/series");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_rec/update.php');
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
            Product::deleteSeriesById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/series");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_series/delete.php');
        return true;
    }
}