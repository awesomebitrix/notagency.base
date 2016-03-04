<?

/**
 * @link https://bitbucket.org/notagency/notagency.base
 * @copyright Copyright © 2016 NotAgency
 */

namespace Notagency\Base;

class Tools
{
    /**
     * Получить размер файла в байтах в читабельных единицах измерения
     * @param int $size - размер файла в байтах
     * @return array
     */
    public static function formatFileSize($size)
    {
        $displaySize = [];
        if(intval($size)> 1048576)
        {
            $displaySize["SIZE"]= round($size / 1048576,2);
            $displaySize["UNIT"]= "Mb";
        }
        elseif(intval($size)> 1024)
        {
            $displaySize["SIZE"]= round($size / 1024,1);
            $displaySize["UNIT"]= "Kb";
        }
        else
        {
            $displaySize["SIZE"]= $size;
            $displaySize["UNIT"]= "b";
        }
        return $displaySize;
    }


    /**
     * Склонение
     * Пример вызова: Tools::declOfNum(123, ['товар', 'товары', 'товаров'])
     *
     * @param int $number
     * @param int $titles
     * @return string
     */
    function declOfNum($number, $titles)
    {
        $cases = array (2, 0, 1, 1, 1, 2);
        return $titles[ ($number%100>4 && $number%100<20)? 2 : $cases[min($number%10, 5)] ];
    }

}