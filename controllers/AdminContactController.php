<?php

class AdminContactController extends AdminBase
{
	public function actionIndex()
	{
		self::checkAdmin();

		$contactList = Contact::getContactList();

		require_once(ROOT . '/views/admin_contact/index.php');
		return true;
	}

    public function actionView($userId)
    {
        self::checkAdmin();

        $contactList = Contact::getContactList();

        $contact = Contact::getContactById($userId);

        require_once(ROOT . '/views/admin_contact/view.php');
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
            Contact::deleteContactById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/contact");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_contact/delete.php');
        return true;
    }
}