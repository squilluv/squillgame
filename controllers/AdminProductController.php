<?php

class AdminProductController extends AdminBase
{
	public function actionIndex()
	{
		self::checkAdmin();

		$productsList = Product::getProductsList();

		require_once(ROOT . '/views/admin_product/index.php');
		return true;
	}

    public function actionExport()
    {
        self::checkAdmin();

        $productsList = Product::getProductsList();

        require_once(ROOT . '/views/admin_product/export.php');
        return true;
    }

	public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();
        
        $tegsList = Teg::getTegsList();

        $recList = Recomended::getRecList();

        $seriesList = Series::getSeriesList();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['price_sale'] = $_POST['price_sale'];
            $options['category_id'] = $_POST['category_id'];
            $options['teg_id'] = $_POST['teg_id'];
            $options['other_id'] = $_POST['other_id'];
            $options['series_id'] = $_POST['series_id'];
            $options['developer'] = $_POST['developer'];
            $options['publisher'] = $_POST['publisher'];
            $options['date'] = $_POST['date'];
            $options['info'] = $_POST['info'];
            $options['series'] = $_POST['series'];
            $options['description'] = $_POST['description'];
            $options['os_min'] = $_POST['os_min'];
            $options['cp_min'] = $_POST['cp_min'];
            $options['op_min'] = $_POST['op_min'];
            $options['vk_min'] = $_POST['vk_min'];
            $options['pd_min'] = $_POST['pd_min'];
            $options['os_max'] = $_POST['os_max'];
            $options['cp_max'] = $_POST['cp_max'];
            $options['op_max'] = $_POST['op_max'];
            $options['vk_max'] = $_POST['vk_max'];
            $options['pd_max'] = $_POST['pd_max'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_sale'] = $_POST['is_sale'];
            $options['is_pre'] = $_POST['is_pre'];
            $options['is_recommended'] = $_POST['is_recommended'];
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
                $id = Product::createProduct($options);

                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    }

                    if (is_uploaded_file($_FILES["imagerec"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["imagerec"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/rec/products/{$id}.jpg");
                    }
                };


                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/product");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_product/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        $tegsList = Teg::getTegsListAdmin();

        $recList = Recomended::getRecList();

        $seriesList = Series::getSeriesList();

        // Получаем данные о конкретном заказе
        $product = Product::getProductById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['price_sale'] = $_POST['price_sale'];
            $options['category_id'] = $_POST['category_id'];
            $options['teg_id'] = $_POST['teg_id'];
            $options['other_id'] = $_POST['other_id'];
            $options['series_id'] = $_POST['series_id'];
            $options['developer'] = $_POST['developer'];
            $options['publisher'] = $_POST['publisher'];
            $options['date'] = $_POST['date'];
            $options['info'] = $_POST['info'];
            $options['series'] = $_POST['series'];
            $options['description'] = $_POST['description'];
            $options['os_min'] = $_POST['os_min'];
            $options['cp_min'] = $_POST['cp_min'];
            $options['op_min'] = $_POST['op_min'];
            $options['vk_min'] = $_POST['vk_min'];
            $options['pd_min'] = $_POST['pd_min'];
            $options['os_max'] = $_POST['os_max'];
            $options['cp_max'] = $_POST['cp_max'];
            $options['op_max'] = $_POST['op_max'];
            $options['vk_max'] = $_POST['vk_max'];
            $options['pd_max'] = $_POST['pd_max'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['is_sale'] = $_POST['is_sale'];
            $options['is_pre'] = $_POST['is_pre'];
            $options['status'] = $_POST['status'];

            // Сохраняем изменения
            if (Product::updateProductById($id, $options)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                }

                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["imagerec"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["imagerec"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/rec/products/{$id}.jpg");
                }
            }

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_product/update.php');
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
            Product::deleteProductById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_product/delete.php');
        return true;
    }

    public function actionExportexceldoc()
    {
        require_once ROOT . '/views/admin_product/exportdoc.php';
        return true;
    }

    public function actionExportexcel()
    {
        require_once ROOT . '/views/admin_product/export.php';
        return true;
    }
}