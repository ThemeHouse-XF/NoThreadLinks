<?php

class ThemeHouse_NoThreadLinks_Option_NodeChooser
{

    /**
     * Renders the thread prefix chooser option as a group of <input
     * type="checkbox" />.
     *
     * @param XenForo_View $view View object
     * @param string $fieldPrefix Prefix for the HTML form field name
     * @param array $preparedOption Prepared option info
     * @param boolean $canEdit True if an "edit" link should appear
     *
     * @return XenForo_Template_Abstract Template object
     */
    public static function renderCheckbox(XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
    {
        return self::_render('option_list_option_checkbox', $view, $fieldPrefix, $preparedOption, $canEdit);
    } /* END renderCheckbox */

    /**
     * Fetches a list of node options.
     *
     * @param integer $selectedForum
     * @param mixed Include root forum (specify a phrase to represent the root
     * forum)
     * @param mixed Filter the options to allow only the specified type to be
     * selectable
     *
     * @return array
     */
    public static function getNodeOptions(array $selectedForums)
    {
        /* @var $nodeModel XenForo_Model_Node */
        $nodeModel = XenForo_Model::create('XenForo_Model_Node');

        $options = $nodeModel->getNodeOptionsArray($nodeModel->getAllNodes());

        foreach ($options as &$option) {
            if (!empty($option['node_type_id']) && !in_array($option['node_type_id'],
                array(
                    'Forum',
                    'SocialCategory'
                ))) {
                $option['disabled'] = 'disabled';
            }
            if (in_array($option['value'], $selectedForums)) {
                $option['selected'] = true;
            }

            unset($option['node_type_id']);
        }

        return $options;
    } /* END getNodeOptions */

    /**
     * Renders the node chooser option.
     *
     * @param string Name of template to render
     * @param XenForo_View $view View object
     * @param string $fieldPrefix Prefix for the HTML form field name
     * @param array $preparedOption Prepared option info
     * @param boolean $canEdit True if an "edit" link should appear
     *
     * @return XenForo_Template_Abstract Template object
     */
    protected static function _render($templateName, XenForo_View $view, $fieldPrefix, array $preparedOption, $canEdit)
    {
        $filter = isset($preparedOption['nodeFilter']) ? $preparedOption['nodeFilter'] : false;

        $preparedOption['formatParams'] = self::getNodeOptions($preparedOption['option_value']);

        return XenForo_ViewAdmin_Helper_Option::renderOptionTemplateInternal($templateName, $view, $fieldPrefix,
            $preparedOption, $canEdit, array(
                'class' => 'checkboxColumns'
            ));
    } /* END _render */
}