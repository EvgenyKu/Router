<?php
/**
 * Заадаём удобные маршруты для обработки запросов
 * ключом будет выступать маска для uri в формате '/', '/about/', '/post/{id}', '/post/{id}/{name}...'
 * значением - класс и его метод для выполнения в формате Class@Method
 */
return [
    '/' => '\App\Main@index',
    '/display' => '\App\Display@index',
    '/display/{id}' => '\App\Display@getById',
    '/category/{id}/item/{name}' => '\App\Display@getItemFromCategory'
];