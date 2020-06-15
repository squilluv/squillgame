<?php

class SeriesController
{
	public function actionIndex()
	{

		$categories = array();
        $categories = Category::getCategoriesList();

        $tegs = array();
        $tegs = Teg::getTegsList();

		$series = array();
		$series = Series::getSeriesList();

		require_once(ROOT . '/views/series/index.php');

		return true;
	}


	public function actionView($seriesId, $page = 1)
	{
		$categories = array();
        $categories = Category::getCategoriesList();

        $tegs = array();
        $tegs = Teg::getTegsList();

		$series = array();
		$series = Series::getSeriesList();

		$seriesProducts = array();
		$seriesProducts = Product::getProductsListBySeries($seriesId, $page);

		$total = Product::getTotalProductsInSeries($seriesId);

		$pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

		require_once (ROOT . '/views/series/view.php');

		return true;
	}
}