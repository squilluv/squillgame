<?php

class Router
{

    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath); #Присваив свойству массив 
    }

    //Возвращ строку запроса
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        } 
    }

    public function run()
    {
        // Получ строку запроса
        $uri = $this->getURI();

        // Провер наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {

            // Сравнив $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {
                
                // Получ внутренний путь из внешнего
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                                
                // Определ контроллер, action, параметры

                $segments = explode('/', $internalRoute);

                // Определ контроллер
                $controllerName = ucfirst(array_shift($segments)) . 'Controller';

                // Определ action
                $actionName = 'action' . ucfirst(array_shift($segments));
                         
                // Определ параметр    
                $parameters = $segments;
                
                // Подключ файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' .
                        $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                } 

                // Созд объект, вызвать метод 
                $controllerObject = new $controllerName;
                

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                
                
                if ($result != null) {
                    break;
                }
            }
        }
    }

}
