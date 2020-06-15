<?php

class PreorderController
{
	public function actionIndex()
	{
		$categories = array();
        $categories = Category::getCategoriesList();

        $tegs = array();
        $tegs = Teg::getTegsList();
		
		$preProducts = array();
		$preProducts = Product::getPreProducts();

		require_once(ROOT . '/views/preorder/index.php');

		return true;
	}
}