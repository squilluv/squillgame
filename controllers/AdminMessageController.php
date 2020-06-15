<?php

class AdminMessageController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $userName = false;
        $userEmail = false;
        $message = false;
        
        $result = false;
        
        



        $users = array();
        $users = User::getUsersList();

        require_once ROOT . '/views/admin_message/create.php';
        return true;
    }
}