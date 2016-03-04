<?

/**
 * @link https://bitbucket.org/notagency/notagency.base
 * @copyright Copyright © 2016 NotAgency
 */

namespace Notagency\Base;

class IblockTools
{
    private static $iblockId = [];
    private static $iblockPropertyEnumId = [];
    
    /**
     * Получить ID инфоблока по коду
     *
     * @param string $iblockCode
     * @return int|bool
     */
     public static function getIblockId($code)
     {
        if (!empty(self::$iblockId[$code]))
        {
            return self::$iblockId[$code];
        }
        if ($iblock = \CIBlock::GetList([], ['CODE' => $this->arParams['IBLOCK_USER_ANSWERS_CODE']])->fetch())
        {
            self::$iblockId[$code] = $iblock['ID'];
            return $iblock['ID'];
        }
        return false;
     }
    
    /**
     * Получить ID значения свойства типа "список" у инфоблока
     *
     * @param string $iblockCode
     * @param string $propertyCode
     * @param string $enumCode
     * @return int|bool
     */
    public static function getIblockPropertyEnumId($iblockCode, $propertyCode, $enumCode)
    {
        if (!empty(self::$iblockPropertyEnumId[$iblockCode][$propertyCode][$enumCode]))
        {
            return self::$iblockPropertyEnumId[$iblockCode][$propertyCode][$enumCode];
        }
        
        if (!$iblockId = self::getIblockId($iblockCode))
        {
            return false;
        }
        
        if ($enum = \CIBlockProperty::GetPropertyEnum($propertyCode, [], ['IBLOCK_ID' => $iblockId, 'EXTERNAL_ID' => $enumCode])->fetch())
        {
            self::self::$iblockPropertyEnumId[$iblockCode][$propertyCode][$enumCode] = $enum['ID'];
            return $enum['ID'];
        }
        return false;
    }
}