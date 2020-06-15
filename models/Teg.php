<?php

class Teg
{

	public static function getTegsList()
	{
		$db = Db::getConnection();

		$tegList = array();

		$result = $db->query("SELECT *
								FROM tegs
								ORDER BY soft_order ASC");

		$i = 0;
		while ($row = $result->fetch()) {
			$tegList[$i]['id'] = $row['id'];
			$tegList[$i]['name'] = $row['name'];
            $tegList[$i]['image'] = $row['image'];
            $tegList[$i]['status'] = $row['status'];
			$i++;
		}
		return $tegList;
	}

	public static function getTegsListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, name, soft_order, image, status FROM tegs ORDER BY soft_order ASC');

        // Получение и возврат результатов
        $tegList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $tegList[$i]['id'] = $row['id'];
            $tegList[$i]['name'] = $row['name'];
            $tegList[$i]['image'] = $row['image'];
            $tegList[$i]['soft_order'] = $row['soft_order'];
            $tegList[$i]['status'] = $row['status'];
            $i++;
        }
        return $tegList;
    }

    public static function deleteTegById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM tegs WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateTegById($id, $name, $softOrder, $status)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE tegs
            SET 
                name = :name, 
                soft_order = :soft_order, 
                status = :status
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':soft_order', $softOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getTegById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM tegs WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }

    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }

    public static function createTeg($name, $status)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO tegs (name, status) '
                . 'VALUES (:name, :status)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/tegs/';

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

}