<?php

namespace App;

class Main
{
    /**
     * Тестовый метод для демонстрации того, что мы дотагиваемся до нужного класса и его метода из Роутера
     * @return void
     */
    public function index()
    {
        echo "Вы попали в метод: ". __FUNCTION__ ."<br>Класса: ". __CLASS__;
    }
}