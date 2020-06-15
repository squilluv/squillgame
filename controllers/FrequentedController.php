<?php

class FrequentedController
{
	public function actionIndex()
	{
		$lookAllProducts = array();
        $lookAllProducts = Product::getMostLookAllProducts();

        $lookTodayProducts = array();
        $lookTodayProducts = Product::getMostLookTodayProducts($date);

		require_once(ROOT . '/views/frequented/index.php');
		return true;
	}
}