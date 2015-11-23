<?php

class ThemeHouse_NoThreadLinks_Listener_TemplateCreate extends ThemeHouse_Listener_TemplateCreate
{

    protected function _getTemplates()
    {
        return array(
            'thread_view'
        );
    } /* END _getTemplates */

    public static function templateCreate(&$templateName, array &$params, XenForo_Template_Abstract $template)
    {
        $templateCreate = new ThemeHouse_NoThreadLinks_Listener_TemplateCreate($templateName, $params, $template);
        list ($templateName, $params) = $templateCreate->run();
    } /* END templateCreate */

    protected function _threadView()
    {
        $this->_template->addRequiredExternal('js', 'js/themehouse/nothreadlinks/blocked_thread_tooltip.js');
        $this->_template->addRequiredExternal('css', 'th_nothreadlinks');
    } /* END _threadView */
}