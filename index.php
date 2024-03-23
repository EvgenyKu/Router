<?php
require_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php"; //автозагрузка классов PSR-4 composer

$routes = require_once $_SERVER['DOCUMENT_ROOT']."/config/routes.php";//Подключаем конфигурацию роутов

$router = new Router\Router($routes); //Создаём экземпляр Роутера


$uri = $_SERVER['REQUEST_URI']; //URI запроса

$running = $router->getRunningClass($uri);//Получаем набор данных для запуска, либо false
if ($running){

    $className = $running['class']; //Имя класса
    $method = $running['method']; //Имя метода
    $params = $running['params']; //Параметры передаваемые в метод
    if (class_exists($className)){//Проеряем существует ли класс в нашей программе
        $object = new $className();
        if (method_exists($object, $method)){//Проверяем существует ли метод класса
            $object->{$method}(...$params);
        }else{
            die('Метод указанный по данному маршруту не существует.Пожалуйста проверьте конфигурацию');
        }
    }else{
        die('Класс указанный по данному маршруту не существует.Пожалуйста проверьте конфигурацию');
    }

} else {
    //Не найдены подходящий класс и метод для запуска
    //Ошибка 404
    die("Ошибка 404. Страница не найдена!");
}