<?php

class SearchController
{

    public function actionIndex()
    {        
        require_once(ROOT . '/views/search/index.php');

        return true;
    }

    public function actionResult()
    {
        require_once(ROOT . '/views/search/result.php');

        return true;
    }
}
