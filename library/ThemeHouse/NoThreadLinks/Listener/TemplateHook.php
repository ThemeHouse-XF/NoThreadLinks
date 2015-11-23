<?php

class ThemeHouse_NoThreadLinks_Listener_TemplateHook extends ThemeHouse_Listener_TemplateHook
{

    protected function _getHooks()
    {
        return array(
            'thread_view_pagenav_before'
        );
    } /* END _getHooks */

    public static function templateHook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
    {
        $templateHook = new ThemeHouse_NoThreadLinks_Listener_TemplateHook($hookName, $contents, $hookParams, $template);
        $contents = $templateHook->run();
    } /* END templateHook */

    /**
     *
     * @see ThemeHouse_Listener_TemplateHook::_threadViewPagenavBefore()
     */
    protected function _threadViewPagenavBefore()
    {
        $this->_append(
            '
		    <blockquote id="blockedThreadTooltip">
		    ' .
                 new XenForo_Phrase('th_thread_has_been_removed_nothreadlinks') . '
		    <span class="arrow"></blockquote>
		');
    } /* END _threadViewPagenavBefore */
}