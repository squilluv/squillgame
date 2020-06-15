<?php

class Recomended
{
	public static function getRecList()
	{
		$db = Db::getConnection();

		$recList = array();

		$result = $db->query("SELECT *
								FROM other 
								ORDER BY soft_order ASC");

		$i = 0;
		while ($row = $result->fetch()) {
			$recList[$i]['id'] = $row['id'];
			$recList[$i]['name'] = $row['name'];
            $recList[$i]['status'] = $row['status'];
			$i++;
		}
		return $recList;
	}

	public static function create($options)
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO other (name, soft_order, status) VALUES (:name, :soft_order, :status)";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':soft_order', $options['soft_order'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_STR);
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function getRecById($id)
	{
		$id = intval($id);

		if ($id) {
			$db = Db::getConnection();

			$result = $db->query("SELECT *
									FROM other
									WHERE id = $id");
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}

	public static function deleteRecById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM other WHERE id = :id';

        // Получение и возврат результатов.
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/rec/';

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

     public static function updateRecById($id, $options)
    {
        $db = Db::getConnection();
        $sql = "UPDATE other
            SET 
                name = :name, 
                soft_order = :soft_order, 
                status = :status 
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':soft_order', $options['soft_order'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }
}