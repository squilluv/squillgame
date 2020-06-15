<?php

class Product
{
	const SHOW_BY_DEFAULT = 12;

	public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
	{
		$count = intval($count);

		$db = Db::getConnection();

		$productList = array();

		$result = $db->query("SELECT id, name, price, price_sale, image, is_new, is_sale, is_pre
								FROM product
								WHERE status = '1'
								ORDER BY id DESC
								LIMIT $count");

		$i = 0;
		while ($row = $result->fetch())
		 {
			$productList[$i]['id'] = $row['id'];
			$productList[$i]['name'] = $row['name'];
			$productList[$i]['image'] = $row['image'];
			$productList[$i]['price'] = $row['price'];
			$productList[$i]['price_sale'] = $row['price_sale'];
			$productList[$i]['is_new'] = $row['is_new'];
			$productList[$i]['is_sale'] = $row['is_sale'];
            $productList[$i]['is_pre'] = $row['is_pre'];
			$i++;
		}
		return $productList;
	}

	public static function getRecProducts()
	{

		$db = Db::getConnection();

		$recProductsList = array();

		$result = $db->query("SELECT id, name, price, image, is_recommended
								FROM product
								WHERE status = '1'
								ORDER BY id DESC");

		$i = 0;
		while ($row = $result->fetch())
		 {
			$recProductsList[$i]['id'] = $row['id'];
			$recProductsList[$i]['name'] = $row['name'];
			$recProductsList[$i]['image'] = $row['image'];
			$recProductsList[$i]['price'] = $row['price'];
			$recProductsList[$i]['is_recommended'] = $row['is_recommended'];
			$i++;
		}
		return $recProductsList;
	}

	public static function getTotalProductsInCategory($categoryId)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM product WHERE status="1" AND category_id = :category_id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getTotalProductsInTeg($tegId)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM product WHERE status="1" AND teg_id = :teg_id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':teg_id', $tegId, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getTotalProductsInRec($recId)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM product WHERE status="1" AND other_id = :other_id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':other_id', $recId, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

	public static function getProductsListByCategory($categoryId, $page = 1)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, name, price, price_sale, image, is_new, is_sale, is_pre FROM product '
                . 'WHERE status = 1 AND category_id = :category_id '
                . 'ORDER BY id DESC LIMIT :limit OFFSET :offset';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
			$products[$i]['name'] = $row['name'];
			$products[$i]['image'] = $row['image'];
			$products[$i]['price'] = $row['price'];
			$products[$i]['price_sale'] = $row['price_sale'];
			$products[$i]['is_new'] = $row['is_new'];
			$products[$i]['is_sale'] = $row['is_sale'];
            $products[$i]['is_pre'] = $row['is_pre'];
            $i++;
        }
        return $products;
    }

    public static function getProductsListByTeg($tegId, $page = 1)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, name, price, price_sale, image, is_new, is_sale, is_pre FROM product '
                . 'WHERE status = 1 AND teg_id = :teg_id '
                . 'ORDER BY id DESC LIMIT :limit OFFSET :offset';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':teg_id', $tegId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['image'] = $row['image'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['price_sale'] = $row['price_sale'];
            $products[$i]['is_new'] = $row['is_new'];
            $products[$i]['is_sale'] = $row['is_sale'];
            $products[$i]['is_pre'] = $row['is_pre'];
            $i++;
        }
        return $products;
    }

	public static function getProductsListByOther($otherId = false, $page = 1)
	{
		if ($otherId) {

			$page = intval($page);
			$offset = ($page - 1) * self::SHOW_BY_DEFAULT;

			$db = Db::getConnection();
			$products = array();
			$result = $db->query("SELECT id, name, price, price_sale, image, is_new, is_sale FROM product 
									WHERE status = '1' AND other_id = $otherId 
									ORDER BY id DESC
									LIMIT " . self::SHOW_BY_DEFAULT);


			$i = 0;
			while ($row = $result->fetch())
		 	{
				$products[$i]['id'] = $row['id'];
				$products[$i]['name'] = $row['name'];
				$products[$i]['image'] = $row['image'];
				$products[$i]['price'] = $row['price'];
				$products[$i]['price_sale'] = $row['price_sale'];
				$products[$i]['is_new'] = $row['is_new'];
				$products[$i]['is_sale'] = $row['is_sale'];
				$i++;
			}
			return $products;
		}
	}

	public static function getProductById($id)
	{
		$id = intval($id);

		if ($id) {
			$db = Db::getConnection();

			$result = $db->query("SELECT *
									FROM product
									WHERE id = $id");
			$result->setFetchMode(PDO::FETCH_ASSOC);

			return $result->fetch();
		}
	}

    public static function getLooksLikeProduct($id)
    {
        $db = Db::getConnection();

        $promResult = $db->query("SELECT price, teg_id, category_id FROM product WHERE id = $id");
        $promPrdouct = array();
        $i = 0;
        while ($row = $promResult->fetch()) {
        $rangePrice = 300;
        $minProdLike = $row['price'] - $rangePrice;
        $maxProdLike = $row['price'] + $rangePrice;
        $tegProductLooks = $row['teg_id'];
        $categoryProductLooks = $row['category_id'];


        $result = $db->query("SELECT id, name, price, price_sale, is_sale FROM product WHERE price > '$minProdLike' AND price < '$maxProdLike' AND teg_id = '$tegProductLooks' AND category_id = '$categoryProductLooks' LIMIT 4, 999");
        $looksProductLike = array();
        $j = 0;
        while ($row1 = $result->fetch()) {
            $looksProductLike[$j]['id'] = $row1['id'];
            $looksProductLike[$j]['name'] = $row1['name'];
            $looksProductLike[$j]['price'] = $row1['price'];
            $j++;
        }
        }
        return $looksProductLike;

    }

    public static function getLooksLikeProductLimit($id)
    {
        $db = Db::getConnection();

        $promResult = $db->query("SELECT price, teg_id, category_id FROM product WHERE id = $id");
        $promPrdouct = array();
        $i = 0;
        while ($row = $promResult->fetch()) {
        $rangePrice = 300;
        $minProdLike = $row['price'] - $rangePrice;
        $maxProdLike = $row['price'] + $rangePrice;
        $tegProductLooks = $row['teg_id'];
        $categoryProductLooks = $row['category_id'];


        $result = $db->query("SELECT id, name, price, price_sale, is_sale FROM product WHERE price > '$minProdLike' AND price < '$maxProdLike' AND teg_id = '$tegProductLooks' AND category_id = '$categoryProductLooks' LIMIT 4");
        $looksProductLike = array();
        $j = 0;
        while ($row1 = $result->fetch()) {
            $looksProductLike[$j]['id'] = $row1['id'];
            $looksProductLike[$j]['name'] = $row1['name'];
            $looksProductLike[$j]['price'] = $row1['price'];
            $j++;
        }
        }
        return $looksProductLike;

    }

	public static function getProductsList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, name, price, code, is_sale FROM product ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['is_sale'] = $row['is_sale'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }

	public static function getCommentById($id)
	{
		$id = intval($id);

		if ($id) {
			$db = Db::getConnection();

			$result = $db->query("SELECT *
									FROM comments
									WHERE products_id = $id");
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
								WHERE products_id =  $id
								ORDER BY reviews_id DESC");

		$i = 0;
		while ($row = $result->fetch())
		 {
			$commentList[$i]['reviews_id'] = $row['reviews_id'];
			$commentList[$i]['products_id'] = $row['products_id'];
			$commentList[$i]['name'] = $row['name'];
			$commentList[$i]['good'] = $row['good'];
			$commentList[$i]['bad'] = $row['bad'];
			$commentList[$i]['comment'] = $row['comment'];
			$commentList[$i]['data'] = $row['data'];
			$i++;
		}
		return $commentList;
	}

	public static function creat($products_id, $name, $good, $bad, $commentt, $data) 
	{
		$db = Db::getConnection();

		$sql = "INSERT INTO comments (products_id, name, good, bad, comment, data) 
				VALUES (:products_id, :name, :good, :bad, :comment, NOW())";

		$result = $db->prepare($sql);
		$result->bindParam(':products_id', $products_id, PDO::PARAM_STR);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':good', $good, PDO::PARAM_STR);
		$result->bindParam(':bad', $bad, PDO::PARAM_STR);
		$result->bindParam(':comment', $commentt, PDO::PARAM_STR);

		return $result->execute();
	}

	public static function checkGood($good) {
		if (strlen($good) >= 3) {
			return true;
		}
		return false;
	}

	public static function checkBad($bad) {
		if (strlen($bad) >= 3) {
			return true;
		}
		return false;
	}

	public static function getProductsByIds($idsArray) 
	{
		$products = array();

		$db = Db::getConnection();

		$idsString = implode(',', $idsArray);

		$sql = "SELECT *
				FROM product
				WHERE status = '1' AND id IN ($idsString)";

		$result = $db->query($sql);
		$result->setFetchMode(PDO::FETCH_ASSOC);

		$i = 0;
		while ($row = $result->fetch()) {
			$products[$i]['id'] = $row['id'];
			$products[$i]['code'] = $row['code'];
			$products[$i]['name'] = $row['name'];
			$products[$i]['price'] = $row['price'];
			$i++;
		}

		return $products;
	}

	public static function deleteProductById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM product WHERE id = :id';

        // Получение и возврат результатов.
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateProductById($id, $options)
    {
        $db = Db::getConnection();
        $sql = "UPDATE product
            SET 
                name = :name, 
                code = :code, 
                price = :price, 
                price_sale = :price_sale, 
                category_id = :category_id, 
                teg_id = :teg_id, 
                other_id = :other_id, 
                series_id = :series_id, 
                developer = :developer, 
                publisher = :publisher, 
                date = :date,
                info = :info,
                series = :series,
                description = :description,
                os_min = :os_min, 
                cp_min = :cp_min, 
                op_min = :op_min, 
                vk_min = :vk_min, 
                pd_min = :pd_min, 
                os_max = :os_max, 
                cp_max = :cp_max, 
                op_max = :op_max, 
                vk_max = :vk_max, 
                pd_max = :pd_max, 
                is_new = :is_new, 
                is_recommended = :is_recommended, 
                is_sale = :is_sale, 
                is_pre = :is_pre, 
                status = :status
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':price_sale', $options['price_sale'], PDO::PARAM_INT);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':teg_id', $options['teg_id'], PDO::PARAM_INT);
        $result->bindParam(':other_id', $options['other_id'], PDO::PARAM_INT);
        $result->bindParam(':series_id', $options['series_id'], PDO::PARAM_INT);
        $result->bindParam(':developer', $options['developer'], PDO::PARAM_STR);
        $result->bindParam(':publisher', $options['publisher'], PDO::PARAM_INT);
        $result->bindParam(':date', $options['date'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':info', $options['info'], PDO::PARAM_INT);
        $result->bindParam(':series', $options['series'], PDO::PARAM_STR);
        $result->bindParam(':os_min', $options['os_min'], PDO::PARAM_INT);
        $result->bindParam(':cp_min', $options['cp_min'], PDO::PARAM_INT);
        $result->bindParam(':op_min', $options['op_min'], PDO::PARAM_INT);
        $result->bindParam(':vk_min', $options['vk_min'], PDO::PARAM_INT);
        $result->bindParam(':pd_min', $options['pd_min'], PDO::PARAM_INT);
        $result->bindParam(':os_max', $options['os_max'], PDO::PARAM_INT);
        $result->bindParam(':cp_max', $options['cp_max'], PDO::PARAM_INT);
        $result->bindParam(':op_max', $options['op_max'], PDO::PARAM_INT);
        $result->bindParam(':vk_max', $options['vk_max'], PDO::PARAM_INT);
        $result->bindParam(':pd_max', $options['pd_max'], PDO::PARAM_INT);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':is_sale', $options['is_sale'], PDO::PARAM_INT);
        $result->bindParam(':is_pre', $options['is_pre'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    public static function createProduct($options)
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO product 
        (name, code, price, price_sale, category_id, teg_id, other_id, series_id, developer, publisher, date, info, series, description, os_min, cp_min, op_min, vk_min, pd_min, os_max, cp_max, op_max, vk_max, pd_max, is_new, is_recommended, is_sale, is_pre, status) 
        VALUES 
        (:name, :code, :price, :price_sale, :category_id, :teg_id, :other_id, :series_id, :developer, :publisher, :date, :info, :series, :description, :os_min, :cp_min, :op_min, :vk_min, :pd_min, :os_max, :cp_max, :op_max, :vk_max, :pd_max,  :is_new, :is_recommended, :is_sale, :is_pre, :status)";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':price_sale', $options['price_sale'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':teg_id', $options['teg_id'], PDO::PARAM_INT);
        $result->bindParam(':other_id', $options['other_id'], PDO::PARAM_INT);
        $result->bindParam(':series_id', $options['series_id'], PDO::PARAM_INT);
        $result->bindParam(':developer', $options['developer'], PDO::PARAM_STR);
        $result->bindParam(':publisher', $options['publisher'], PDO::PARAM_INT);
        $result->bindParam(':date', $options['date'], PDO::PARAM_INT);
        $result->bindParam(':info', $options['info'], PDO::PARAM_INT);
        $result->bindParam(':series', $options['series'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':os_min', $options['os_min'], PDO::PARAM_INT);
        $result->bindParam(':cp_min', $options['cp_min'], PDO::PARAM_INT);
        $result->bindParam(':op_min', $options['op_min'], PDO::PARAM_INT);
        $result->bindParam(':vk_min', $options['vk_min'], PDO::PARAM_INT);
        $result->bindParam(':pd_min', $options['pd_min'], PDO::PARAM_INT);
        $result->bindParam(':os_max', $options['os_max'], PDO::PARAM_INT);
        $result->bindParam(':cp_max', $options['cp_max'], PDO::PARAM_INT);
        $result->bindParam(':op_max', $options['op_max'], PDO::PARAM_INT);
        $result->bindParam(':vk_max', $options['vk_max'], PDO::PARAM_INT);
        $result->bindParam(':pd_max', $options['pd_max'], PDO::PARAM_INT);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':is_sale', $options['is_sale'], PDO::PARAM_INT);
        $result->bindParam(':is_pre', $options['is_pre'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/products/';

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

    public static function getImageRec($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/rec/products/';

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

    public static function getInfo($info)
    {
        switch ($info) {
        	case '3':
                return '<a class="black-text" href="/teg/2">Онлайн игра</a>';
                break;
        	case '2':
                return '<a class="black-text" href="/teg/1">Кооперативная игра</a>';
                break;
            case '1':
                return '<a class="black-text" href="/teg/3">Одиночная игра</a>';
                break;
            case '0':
                return ' ';
                break;
        }
    }

    public static function getOther($other)
    {
        switch ($other) {
        	case '4':
                return '<a class="black-text" href="/other/2"></a>';
                break;
            case '3':
                return '<a class="black-text" href="/other/3"></a>';
                break;
        	case '2':
                return '<a class="black-text" href="/other/1"></a>';
                break;
            case '1':
                return '<a class="black-text" href="/other/3"></a>';
                break;
            case '0':
                return '';
                break;
        }
    }

    public static function getPreProducts()
    {

        $db = Db::getConnection();

        $preProductsList = array();

        $result = $db->query("SELECT id, name, price, image, is_pre, is_sale, is_new
                                FROM product
                                WHERE status = '1' AND is_pre = '1'
                                ORDER BY id DESC");

        $i = 0;
        while ($row = $result->fetch())
         {
            $preProductsList[$i]['id'] = $row['id'];
            $preProductsList[$i]['name'] = $row['name'];
            $preProductsList[$i]['image'] = $row['image'];
            $preProductsList[$i]['price'] = $row['price'];
            $preProductsList[$i]['is_pre'] = $row['is_pre'];
            $preProductsList[$i]['is_sale'] = $row['is_sale'];
            $preProductsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $preProductsList;
    }

    public static function getSaleProducts()
    {

        $db = Db::getConnection();

        $saleProductsList = array();

        $result = $db->query("SELECT id, name, price, price_sale, image, is_sale, is_new, is_pre
                                FROM product
                                WHERE status = '1' AND is_sale = '1'
                                ORDER BY id DESC");

        $i = 0;
        while ($row = $result->fetch())
         {
            $saleProductsList[$i]['id'] = $row['id'];
            $saleProductsList[$i]['name'] = $row['name'];
            $saleProductsList[$i]['image'] = $row['image'];
            $saleProductsList[$i]['price'] = $row['price'];
            $saleProductsList[$i]['price_sale'] = $row['price_sale'];
            $saleProductsList[$i]['is_sale'] = $row['is_sale'];
            $saleProductsList[$i]['is_new'] = $row['is_new'];
            $saleProductsList[$i]['is_pre'] = $row['is_pre'];
            $i++;
        }
        return $saleProductsList;
    }

    public static function getProductsListByRec($recId, $page = 1)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, name, price, price_sale, image, is_new, is_sale, is_pre FROM product '
                . 'WHERE status = 1 AND other_id = :other_id '
                . 'ORDER BY id DESC LIMIT :limit OFFSET :offset';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':other_id', $recId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['image'] = $row['image'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['price_sale'] = $row['price_sale'];
            $products[$i]['is_new'] = $row['is_new'];
            $products[$i]['is_sale'] = $row['is_sale'];
            $products[$i]['is_pre'] = $row['is_pre'];
            $i++;
        }
        return $products;
    }

    public static function getRandomProduct()
    {

        $db = Db::getConnection();

        $randomProduct = array();

        $result = $db->query("SELECT id, name, price, price_sale, image
                                FROM product
                                WHERE is_pre = 0
                                ORDER BY RAND() LIMIT 1");

        $i = 0;
        while ($row = $result->fetch())
         {
            $randomProduct[$i]['id'] = $row['id'];
            $randomProduct[$i]['name'] = $row['name'];
            $randomProduct[$i]['image'] = $row['image'];
            $randomProduct[$i]['price'] = $row['price'];
            $randomProduct[$i]['price_sale'] = $row['price_sale'];
            $i++;
        }
        return $randomProduct;
    }

    public static function getLikeProductFree($id)
    {
        $db = Db::getConnection();

        $likeProductFree = array();

        $result = $db->query("SELECT id, name, price, price_sale, image
                            FROM product
                            WHERE price = 0 AND id != $id");

        $i = 0;
        while ($row = $result->fetch())
         {
            $likeProductFree[$i]['id'] = $row['id'];
            $likeProductFree[$i]['name'] = $row['name'];
            $likeProductFree[$i]['image'] = $row['image'];
            $likeProductFree[$i]['price'] = $row['price'];
            $likeProductFree[$i]['price_sale'] = $row['price_sale'];
            $i++;
        }
        return $likeProductFree;
    }

    public static function getLikeProductSale($id)
    {
        $db = Db::getConnection();

        $likeProductSale = array();

        $result = $db->query("SELECT id, name, price, price_sale, image, is_sale
                            FROM product
                            WHERE is_sale = 1 AND id != $id");

        $i = 0;
        while ($row = $result->fetch())
         {
            $likeProductSale[$i]['id'] = $row['id'];
            $likeProductSale[$i]['name'] = $row['name'];
            $likeProductSale[$i]['image'] = $row['image'];
            $likeProductSale[$i]['price'] = $row['price'];
            $likeProductSale[$i]['price_sale'] = $row['price_sale'];
            $likeProductSale[$i]['is_sale'] = $row['is_sale'];
            $i++;
        }
        return $likeProductSale;
    }

    public static function getLikeProductPre($id)
    {
        $db = Db::getConnection();

        $likeProductPre = array();

        $result = $db->query("SELECT id, name, price, price_sale, image, is_pre
                            FROM product
                            WHERE is_pre = 1 AND id != $id");

        $i = 0;
        while ($row = $result->fetch())
         {
            $likeProductPre[$i]['id'] = $row['id'];
            $likeProductPre[$i]['name'] = $row['name'];
            $likeProductPre[$i]['image'] = $row['image'];
            $likeProductPre[$i]['price'] = $row['price'];
            $likeProductPre[$i]['price_sale'] = $row['price_sale'];
            $i++;
        }
        return $likeProductPre;
    }

    public static function getLikeProductMin($id)
    {
        $db = Db::getConnection();

        $likeProductMin = array();

        $result = $db->query("SELECT id, name, price, price_sale, image
                            FROM product
                            WHERE price >= 100 AND price <= 500 AND id != $id");

        $i = 0;
        while ($row = $result->fetch())
         {
            $likeProductMin[$i]['id'] = $row['id'];
            $likeProductMin[$i]['name'] = $row['name'];
            $likeProductMin[$i]['image'] = $row['image'];
            $likeProductMin[$i]['price'] = $row['price'];
            $likeProductMin[$i]['price_sale'] = $row['price_sale'];
            $i++;
        }
        return $likeProductMin;
    }

    public static function getLikeProductMid($id)
    {
        $db = Db::getConnection();

        $likeProductMid = array();

        $result = $db->query("SELECT id, name, price, price_sale, image
                            FROM product
                            WHERE price >= 501 AND price <= 1000 AND id != $id");

        $i = 0;
        while ($row = $result->fetch())
         {
            $likeProductMid[$i]['id'] = $row['id'];
            $likeProductMid[$i]['name'] = $row['name'];
            $likeProductMid[$i]['image'] = $row['image'];
            $likeProductMid[$i]['price'] = $row['price'];
            $likeProductMid[$i]['price_sale'] = $row['price_sale'];
            $i++;
        }
        return $likeProductMid;
    }

    public static function getLikeProductMax($id)
    {
        $db = Db::getConnection();

        $likeProductMax = array();

        $result = $db->query("SELECT id, name, price, price_sale, image
                            FROM product
                            WHERE price >= 1001 AND price <= 3000 AND id != $id");

        $i = 0;
        while ($row = $result->fetch())
         {
            $likeProductMax[$i]['id'] = $row['id'];
            $likeProductMax[$i]['name'] = $row['name'];
            $likeProductMax[$i]['image'] = $row['image'];
            $likeProductMax[$i]['price'] = $row['price'];
            $likeProductMax[$i]['price_sale'] = $row['price_sale'];
            $i++;
        }
        return $likeProductMax;
    }

    public static function getLikeByProduct($id)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT id FROM vote2product WHERE product_id = $id");

        $like = array();

        $i = 0;
        while($row = $result->fetch())
        {
            $like[$i]['id'] = $row['id'];
            $i++;
        }

        return $like;
    }

    public static function likeupdate($product_id, $user_id, $countlike) 
    {
        $db = Db::getConnection();

        $sql = "UPDATE vote2product set product_id = :product_id, user_id = :user_id, countlike = :countlike+1 WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $result->bindParam(':countlike', $countlike, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function likeinsert($product_id, $user_id) 
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO vote2product (product_id, user_id) VALUES (:product_id, :user_id)";

        $result = $db->prepare($sql);
        $result->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $result->execute();

        return self::getLikeByProduct($product_id);
    }

    public static function getLikeById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query("SELECT *
                                    FROM vote2product
                                    WHERE product_id = $id");
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    public static function getCountLikeById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query("SELECT COUNT(*)
                                    FROM vote2product
                                    WHERE product_id = $id");
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    public static function checkLikeExists($user_id, $product_id) {
        $db = Db::getConnection();

        $sql = "SELECT *
                FROM vote2product 
                WHERE product_id = :product_id AND user_id = :user_id";

        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $result->execute();

        if($result->fetchColumn())
            return false;
        return true;
    }
        //Дополни SELECT
    public static function getLikesListByUser($userId)
    {
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "SELECT product.name, product.id FROM product, vote2product, user WHERE vote2product.user_id = :userId AND user.id = :userId AND product.id = vote2product.product_id";

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $wishList = array();
        while ($row = $result->fetch()) {
            $wishList[$i]['id'] = $row['id'];
            $wishList[$i]['name'] = $row['name'];
            $i++;
        }
        return $wishList;
    }

    public static function deleteLikeByProductAndUser($product_id, $user_id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM vote2product WHERE product_id = :product_id AND user_id = :user_id';

        // Получение и возврат результатов.
        $result = $db->prepare($sql);
        $result->bindParam('product_id', $product_id, PDO::PARAM_INT);
        $result->bindParam('user_id', $user_id, PDO::PARAM_INT);
        $result->execute();

        return self::getLikeByProduct($product_id);
    }
    
    public static function getDateToday()
    {
        $dateTimeString = date('d.m.Y');

        $dtElements = explode(' ',$dateTimeString);
        $dateElements = explode('.',$dtElements[0]);

        $date = trim($dateElements[0].'.'.$dateElements[1].'.'.$dateElements[2]);

        return $date;
    }

    public static function checkSee($id, $date) 
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM counter WHERE product_id = :product_id AND date= :date';

        $result = $db->prepare($sql);
        $result->bindParam(':product_id', $id, PDO::PARAM_INT);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->execute();

        $art = $result->fetch();

        if ($art) return true;
        else return false;
    }

    public static function viewsSeeToday($id, $date) 
    {
        $db = Db::getConnection();

        $result = $db->prepare('SELECT see FROM counter WHERE product_id = :product_id AND date= :date');

        $result->bindParam(':product_id', $id, PDO::PARAM_INT);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->execute();

        $see = $result->fetchColumn();

        return $see;
    }

    public static function viewsSeeAll($id) 
    {
        $db = Db::getConnection();

        $result = $db->prepare('SELECT sum(see) FROM counter WHERE product_id = :product_id');

        $result->bindParam(':product_id', $id, PDO::PARAM_INT);
        $result->execute();
        $all = $result->fetchColumn();

        return $all;
    }

    public static function counter($id) 
    {
        $product_id = $id;
        $date = self::getDateToday();
        $check = self::checkSee($id, $date);

        if (!$check)
        {
            $db = Db::getConnection();

            $see = 1;
            $sql = 'INSERT INTO counter (see, product_id, date) VALUES (:see, :product_id, :date)';
            $result = $db->prepare($sql);
            $result->bindParam(':see', $see, PDO::PARAM_INT);
            $result->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $result->bindParam(':date', $date, PDO::PARAM_STR);
            return $result->execute();
        }
        else 
        {
            $db = Db::getConnection();

            $sql = "UPDATE counter SET see = `see` + 1 WHERE product_id =:product_id AND date =:date";
            $result = $db->prepare($sql);
            $result->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $result->bindParam(':date', $date, PDO::PARAM_STR);
            return $result->execute();
        }
    }

    //будущее 
    #улучшить звапрос
    public static function getMostLikeProducts()
    {
        $db = Db::getConnection();

        $sql = "SELECT product.name, product.id FROM product, vote2product WHERE vote2product.product_id = product.id";

        $result = $db->prepare($sql);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);

        $result->execute();

        $i = 0;
        $mostLikeProducts = array();
        while ($row = $result->fetch()) {
            $mostLikeProducts[$i]['id'] = $row['id'];
            $mostLikeProducts[$i]['name'] = $row['name'];
            $i++;
        }
        return $mostLikeProducts;
    }
    
    //
    public static function getMostLookAllProducts()
    {
        $db = Db::getConnection();

        $sql = "SELECT product.name, product.id, product.price, product.price_sale, product.image, product.is_new, product.is_sale, product.is_pre FROM product, counter WHERE counter.see > 10 AND counter.product_id = product.id GROUP BY product.name LIMIT 12";

        $result = $db->prepare($sql);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);

        $result->execute();

        $i = 0;
        $mostLookProducts = array();
        while ($row = $result->fetch()) {
            $mostLookProducts[$i]['id'] = $row['id'];
            $mostLookProducts[$i]['name'] = $row['name'];
            $mostLookProducts[$i]['price'] = $row['price'];
			$mostLookProducts[$i]['price_sale'] = $row['price_sale'];
			$mostLookProducts[$i]['image'] = $row['image'];
			$mostLookProducts[$i]['is_new'] = $row['is_new'];
			$mostLookProducts[$i]['is_sale'] = $row['is_sale'];
            $mostLookProducts[$i]['is_pre'] = $row['is_pre'];
            $i++;
        }
        return $mostLookProducts;
    }

    //
    public static function getMostLookTodayProducts($date)
    {
        $db = Db::getConnection();

        $date = self::getDateToday();

        $sql = "SELECT product.name, product.id, product.price, product.price_sale, product.image, product.is_new, product.is_sale, product.is_pre FROM product, counter WHERE counter.see > 10 AND counter.product_id = product.id AND counter.date = :date GROUP BY product.name LIMIT 12";

        $result = $db->prepare($sql);
        $result->bindParam(':date', $date, PDO::PARAM_INT);

        $result->execute();

        $i = 0;
        $mostLookProducts = array();
        while ($row = $result->fetch()) {
            $mostLookProducts[$i]['id'] = $row['id'];
            $mostLookProducts[$i]['name'] = $row['name'];
            $mostLookProducts[$i]['price'] = $row['price'];
			$mostLookProducts[$i]['price_sale'] = $row['price_sale'];
			$mostLookProducts[$i]['image'] = $row['image'];
			$mostLookProducts[$i]['is_new'] = $row['is_new'];
			$mostLookProducts[$i]['is_sale'] = $row['is_sale'];
            $mostLookProducts[$i]['is_pre'] = $row['is_pre'];
            $i++;
        }
        return $mostLookProducts;
    }

    public static function getProductsListBySeries($seriesId, $page = 1)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, name, price, price_sale, image, is_new, is_sale, is_pre FROM product '
                . 'WHERE status = 1 AND series_id = :series_id '
                . 'ORDER BY id DESC LIMIT :limit OFFSET :offset';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':series_id', $seriesId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['image'] = $row['image'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['price_sale'] = $row['price_sale'];
            $products[$i]['is_new'] = $row['is_new'];
            $products[$i]['is_sale'] = $row['is_sale'];
            $products[$i]['is_pre'] = $row['is_pre'];
            $i++;
        }
        return $products;
    }

    public static function getTotalProductsInSeries($seriesId)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM product WHERE status="1" AND series_id = :series_id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':series_id', $seriesId, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }
}