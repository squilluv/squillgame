<?php

class AdminUserController extends AdminBase
{
	public function actionIndex()
	{
		self::checkAdmin();

        $userList = User::getUsersList();

		require_once(ROOT . '/views/admin_user/index.php');
		return true;
	}

    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        $user = User::getUserById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            
            $options['role'] = $_POST['role'];

            // Сохраняем изменения
            if (User::updateUser($id, $options)) {
            }

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/user");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_user/update.php');
        return true;
    }
}