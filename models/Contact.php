<?php

class Contact
{
	
	public static function save($userName, $userRealName, $userEmail, $userComment, $userId)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO contact (user_name, user_realname, user_email, user_comment, user_id)
        		VALUES (:user_name, :user_realname, :user_email, :user_comment, :user_id)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_realname', $userRealName, PDO::PARAM_STR);
        $result->bindParam(':user_email', $userEmail, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function getContactList()
    {
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, user_name, user_realname, user_email, user_comment, user_id
                            FROM contact 
                            ORDER BY id ASC');
        $contactList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $contactList[$i]['id'] = $row['id'];
            $contactList[$i]['user_name'] = $row['user_name'];
            $contactList[$i]['user_realname'] = $row['user_realname'];
            $contactList[$i]['user_email'] = $row['user_email'];
            $contactList[$i]['user_comment'] = $row['user_comment'];
            $contactList[$i]['user_id'] = $row['user_id'];
            $i++;
        }
        return $contactList;
    }

    public static function getContactById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query("SELECT *
                                    FROM contact
                                    WHERE id = $id");
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    public static function deleteContactById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM contact WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

}