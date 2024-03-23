<?php

namespace Router;

class Router
{
    private array $routes;

    /**
     * Принимает конфигурацию роутов и записывает в своё поле
     * @param array $configRoutes
     */
    public function __construct(array $configRoutes)
    {
        $this->routes = $configRoutes;
    }

    /**
     * Используя заданный в кофигурации шаблон роутов, обходит каждый шаблон роута переделывая его в полноценное
     * регулярное выражение, после чего сравнивает его с uri запроса
     * Возвращает массив с названием класса, метода и параметрами, либо возвращает false при ненахождении
     * @param $uri
     * @return array|false
     */
    public function getRunningClass($uri): array|false
    {
        foreach ($this->routes as $pattern => $path) {
            $regEx = $this->getRegEx($pattern);
            if (preg_match($regEx, $uri, $matches)){
                $params = $this->delIntKeys($matches);
                $pathArray = explode('@', $path);
                return [
                    'class' => $pathArray[0],
                    'method' => $pathArray[1],
                    'params' => $params
                ];
            }
        }
        return false;
    }

    /**
     * Делает полноценную регулярку из шаблона роута
     * @param $pattern
     * @return string
     */
    private function getRegEx($pattern): string
    {
        return "#^". preg_replace('#{(.+?)}#', "(?<$1>[^/]+)", $pattern) . "(?:/*?)$#";
    }

    /**
     * Удаляет из массива элементы, которые имеют числовые ключи
     * @param $array
     * @return array
     */
    private function delIntKeys($array): array
    {
        foreach ($array as $key => $item) {
            if (is_int($key)){
                unset($array[$key]);
            }
        }
        return $array;
    }
}