<?php

class CatalogController
{
	public function actionIndex()
	{
		$categories = array();
        $categories = Category::getCategoriesList();

        $tegs = array();
        $tegs = Teg::getTegsList();

		$latestProducts = array();
		$latestProducts = Product::getLatestProducts(99999);
		

		require_once(ROOT . '/views/catalog/index.php');

		return true;
	}

	public function actionCategory($categoryId, $page = 1)
	{

		$categories = array();
        $categories = Category::getCategoriesList();

        $tegs = array();
        $tegs = Teg::getTegsList();

		$categoryProducts = array();
		$categoryProducts = Product::getProductsListByCategory($categoryId, $page);
		// Общее количетсво товаров (необходимо для постраничной навигации)
		$total = Product::getTotalProductsInCategory($categoryId);

		// Создаем объект Pagination - постраничная навигация
		$pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

		require_once (ROOT . '/views/catalog/category.php');

		return true;
	}
}