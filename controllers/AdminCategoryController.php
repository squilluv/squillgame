<?php

class AdminCategoryController extends AdminBase
{
	public function actionIndex()
	{
		self::checkAdmin();

		$categoriesList = Category::getCategoriesList();

		require_once(ROOT . '/views/admin_category/index.php');
		return true;
	}

	public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

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
                $id = Category::createCategory($name, $status);

                // Если запись добавлена
                if ($id) {
                };

                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/category");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_category/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        // Получаем данные о конкретном заказе
        $category = Category::getCategoryById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $name = $_POST['name'];
            $softOrder = $_POST['soft_order'];
            $status = $_POST['status'];

            // Сохраняем изменения
            if (Category::updateCategoryById($id, $name, $softOrder, $status))
            {
            }
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/category");

        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_category/update.php');
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
            Category::deleteCategoryById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/category");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_category/delete.php');
        return true;
    }
}