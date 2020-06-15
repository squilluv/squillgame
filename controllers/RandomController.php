<?php

class RandomController
{
	public function actionIndex()
	{
		$categories = array();
        $categories = Category::getCategoriesList();

        $tegs = array();
        $tegs = Teg::getTegsList();
		
		$randomProduct = array();
		$randomProduct = Product::getRandomProduct();

		require_once ROOT . '/views/random/index.php';
		return true;
	}
}