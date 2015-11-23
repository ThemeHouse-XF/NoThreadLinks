<?php

/**
 *
 * @see XenForo_BbCode_Formatter_Base
 */
class ThemeHouse_NoThreadLinks_Extend_XenForo_BbCode_Formatter_Base extends XFCP_ThemeHouse_NoThreadLinks_Extend_XenForo_BbCode_Formatter_Base
{

    /**
     *
     * @see XenForo_BbCode_Formatter_Base::getTags()
     */
    public function getTags()
    {
        $tags = parent::getTags();

        $tags['blockedthread'] = array(
            'hasOption' => false,
            'replace' => array(
                '<a class="blocked" data-description="#blockedThreadTooltip">',
                '</a>'
            )
        );

        return $tags;
    } /* END getTags */
}