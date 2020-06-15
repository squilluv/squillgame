<?php

class AdminNewsController extends AdminBase
{
	public function actionIndex()
	{
		self::checkAdmin();

		$newsList = News::getNewsList();

		require_once(ROOT . '/views/admin_news/index.php');
		return true;
	}

	public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['title'] = $_POST['title'];
            $options['data'] = $_POST['data'];
            $options['shortcontent'] = $_POST['shortcontent'];
            $options['content'] = $_POST['content'];
            $options['autorname'] = $_POST['autorname'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['autorname']) || empty($options['autorname'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = News::createNews($options);

                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/news/{$id}.jpg");
                    }
                };

                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/news");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_news/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретном заказе
        $newsItem = News::getNewsItemById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['title'] = $_POST['title'];
            $options['data'] = $_POST['data'];
            $options['shortcontent'] = $_POST['shortcontent'];
            $options['content'] = $_POST['content'];
            $options['autorname'] = $_POST['autorname'];

            // Сохраняем изменения
            if (News::updateNewsById($id, $options)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/news/{$id}.jpg");
                }
            }

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/news");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_news/update.php');
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
            News::deleteNewsById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/news");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_news/delete.php');
        return true;
    }
}