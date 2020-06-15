<?php

class RecomendedController
{
	public function actionIndex()
	{

		$categories = array();
        $categories = Category::getCategoriesList();

        $tegs = array();
        $tegs = Teg::getTegsList();

		$recs = array();
		$recs = Recomended::getRecList();

		require_once(ROOT . '/views/rec/index.php');

		return true;
	}


	public function actionView($recId, $page = 1)
	{
		$categories = array();
        $categories = Category::getCategoriesList();

        $tegs = array();
        $tegs = Teg::getTegsList();

		$recs = array();
		$recs = Recomended::getRecList();

		$recProducts = array();
		$recProducts = Product::getProductsListByRec($recId, $page);

		$total = Product::getTotalProductsInRec($recId);

		$pagination = new PaginationRec($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

		require_once (ROOT . '/views/rec/view.php');

		return true;
	}
}