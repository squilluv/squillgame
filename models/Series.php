<?php

class Series
{
	public static function getSeriesList()
	{
		$db = Db::getConnection();

		$recList = array();

		$result = $db->query("SELECT *
								FROM series 
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

        $sql = "INSERT INTO series (name, soft_order, status) VALUES (:name, :soft_order, :status)";

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

    public static function getSeriesById($id)
	{
		$id = intval($id);

		if ($id) {
			$db = Db::getConnection();

			$result = $db->query("SELECT *
									FROM series
									WHERE id = $id");
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}

	public static function deleteSeriesById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM series WHERE id = :id';

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
        $path = '/upload/images/series/';

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

     public static function updateSeriesById($id, $options)
    {
        $db = Db::getConnection();
        $sql = "UPDATE series
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