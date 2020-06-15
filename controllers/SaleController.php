<?php

class SaleController
{
	public function actionIndex()
	{
		$categories = array();
        $categories = Category::getCategoriesList();

        $tegs = array();
        $tegs = Teg::getTegsList();
		
		$saleProducts = array();
		$saleProducts = Product::getSaleProducts();

		require_once(ROOT . '/views/sale/index.php');

		return true;
	}
}