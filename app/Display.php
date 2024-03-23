<?php

namespace App;

class Display
{
    /**
     * Тестовый метод для демонстрации того, что мы дотагиваемся до нужного класса и его метода из Роутера
     * @return void
     */
    public function index()
    {
        echo "Вы попали в метод: ". __FUNCTION__ ."<br>Класса: ". __CLASS__;
    }

    /**
     * Тестовый метод для демонстрации того, что мы дотагиваемся до нужного класса и его метода из Роутера
     *  так же можем передать нужные параметры из uri
     * @param $id
     * @return void
     */
    public function getById($id)
    {
        echo "Вы попали в метод: ". __FUNCTION__ ."<br>Класса: ". __CLASS__;
        echo "<br>Переданные параметры id={$id}";
    }

    /**
     * Тестовый метод для демонстрации того, что мы дотагиваемся до нужного класса и его метода из Роутера
     *  так же можем передать нужные параметры из uri
     * @param $id
     * @param $name
     * @return void
     */
    public function getItemFromCategory($id, $name)
    {
        echo "Вы попали в метод: ". __FUNCTION__ ."<br>Класса: ". __CLASS__;
        echo "<br>Переданные параметры id={$id};name={$name}";
    }
}