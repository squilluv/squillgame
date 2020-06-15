<?php

class TegController
{
	public function actionIndex()
	{

		$categories = array();
		$categories = Category::getCategoriesList();

		$tegs = array();
		$tegs = Teg::getTegsList();

		require_once(ROOT . '/views/teg/index.php');

		return true;
	}


	public function actionTeg($tegId, $page = 1)
	{

		$categories = array();
        $categories = Category::getCategoriesList();

        $tegs = array();
        $tegs = Teg::getTegsList();

		$tegProducts = array();
		$tegProducts = Product::getProductsListByTeg($tegId, $page);

		$total = Product::getTotalProductsInTeg($tegId);

		$pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

		require_once (ROOT . '/views/teg/view.php');

		return true;
	}
}