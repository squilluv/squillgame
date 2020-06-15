<?php

class News
{

	public static function getNewsItemById($id)
	{
		$id = intval($id);

		if ($id) {
			$db = Db::getConnection();

			$result = $db->query('SELECT * FROM news WHERE id=' . $id);

			$result->setFetchMode(PDO::FETCH_ASSOC);

			$newsItem = $result->fetch();

			return $newsItem;
		}

	}

	public static function getNewsList() {

		$db = Db::getConnection();
		$newsList = array();

		$result = $db->query("SELECT id, title, data, autorname, shortcontent FROM news ORDER BY id DESC LIMIT 10");

		$i = 0;
		while($row = $result->fetch()) {
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['data'] = $row['data'];
			$newsList[$i]['autorname'] = $row['autorname'];
			$newsList[$i]['shortcontent'] = $row['shortcontent'];
			$i++;
		}

		return $newsList;
	}

    public static function creat($news_id, $name, $commentt, $data) 
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO comments (news_id, name, comment, data) 
                VALUES (:news_id, :name, :comment, NOW())";

        $result = $db->prepare($sql);
        $result->bindParam(':news_id', $news_id, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':comment', $commentt, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function getCommentById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query("SELECT *
                                    FROM comments
                                    WHERE news_id = $id");
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    public static function getLatestComments($id)
    {

        $db = Db::getConnection();

        $commentList = array();

        $result = $db->query("SELECT *
                                FROM comments
                                WHERE news_id =  $id
                                ORDER BY reviews_id DESC");

        $i = 0;
        while ($row = $result->fetch())
         {
            $commentList[$i]['reviews_id'] = $row['reviews_id'];
            $commentList[$i]['news_id'] = $row['news_id'];
            $commentList[$i]['name'] = $row['name'];
            $commentList[$i]['comment'] = $row['comment'];
            $commentList[$i]['data'] = $row['data'];
            $i++;
        }
        return $commentList;
    }

	public static function createNews($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO news (title, data, shortcontent, content, autorname) VALUES (:title, :data, :shortcontent, :content, :autorname)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':data', $options['data'], PDO::PARAM_STR);
        $result->bindParam(':shortcontent', $options['shortcontent'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_INT);
        $result->bindParam(':autorname', $options['autorname'], PDO::PARAM_STR);
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function updateNewsById($id, $options)
    {
        $db = Db::getConnection();
        $sql = "UPDATE news
            SET 
                title = :title, 
                data = :data, 
                shortcontent = :shortcontent, 
                content = :content, 
                autorname = :autorname
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':data', $options['data'], PDO::PARAM_STR);
        $result->bindParam(':shortcontent', $options['shortcontent'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_INT);
        $result->bindParam(':autorname', $options['autorname'], PDO::PARAM_STR);
        return $result->execute();
    }

    public static function deleteNewsById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM news WHERE id = :id';

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
        $path = '/upload/images/news/';

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