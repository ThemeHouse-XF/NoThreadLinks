<?php

class ThemeHouse_NoThreadLinks_Listener_LoadClass extends ThemeHouse_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'ThemeHouse_NoThreadLinks' => array(
                'model' => array(
                    'XenForo_Model_Post'
                ), /* END 'model' */
                'bb_code' => array(
                    'XenForo_BbCode_Formatter_Base'
                ), /* END 'bb_code' */
            ), /* END 'ThemeHouse_NoThreadLinks' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassModel($class, array &$extend)
    {
        $loadClassModel = new ThemeHouse_NoThreadLinks_Listener_LoadClass($class, $extend, 'model');
        $extend = $loadClassModel->run();
    } /* END loadClassModel */

    public static function loadClassBbCode($class, array &$extend)
    {
        $loadClassBbCode = new ThemeHouse_NoThreadLinks_Listener_LoadClass($class, $extend, 'bb_code');
        $extend = $loadClassBbCode->run();
    } /* END loadClassBbCode */
}