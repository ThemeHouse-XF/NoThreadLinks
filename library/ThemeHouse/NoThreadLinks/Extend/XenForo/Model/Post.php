<?php

/**
 *
 * @see XenForo_Model_Post
 */
class ThemeHouse_NoThreadLinks_Extend_XenForo_Model_Post extends XFCP_ThemeHouse_NoThreadLinks_Extend_XenForo_Model_Post
{

    /**
     *
     * @see XenForo_Model_Post::preparePost()
     */
    public function preparePost(array $post, array $thread, array $forum, array $nodePermissions = null,
        array $viewingUser = null)
    {
        if (isset($post['message']) && !is_null($nodePermissions)) {
            $this->removeDisallowedForumLinksFromPost($post['message']);
        }

        return parent::preparePost($post, $thread, $forum, $nodePermissions, $viewingUser);
    } /* END preparePost */

    /**
     *
     * @param string $message
     */
    protected function removeDisallowedForumLinksFromPost(&$message)
    {
        $allowedNodeIds = XenForo_Application::get('options')->th_noThreadLinks_nodeIds;
        if (!empty($allowedNodeIds)) {
            $patterns = array(
                '/\[url=["\']?(.*?)["\']?\].*?\[\/url\]/is',
                '/\[url\](.*?)\[\/url\]/is'
            );
            $message = preg_replace_callback($patterns,
                array(
                    $this,
                    'callback'
                ), $message);
        }
    } /* END removeDisallowedForumLinksFromPost */

    public function callback(array $matches)
    {
        if (isset($matches[1]) && $this->_urlCheck($matches[1])) {
            $postMatches = array();
            if ($this->_postCheck($matches[1], $postMatches) && isset($postMatches[1])) {
                $postId = $postMatches[1];
                if (!$this->_isPostInAllowedThreadLinkNode($postId)) {
                    return "[blockedthread]" . str_repeat("*", strlen($matches[1])) . "[/blockedthread]";
                }
            }
            $threadMatches = array();
            if ($this->_threadCheck($matches[1], $threadMatches) && isset($threadMatches[1])) {
                $threadId = $threadMatches[1];
                if (!$this->_isThreadInAllowedThreadLinkNode($threadId)) {
                    return "[blockedthread]" . str_repeat("*", strlen($matches[1])) . "[/blockedthread]";
                }
            }
        }
        return $matches[0];
    } /* END callback */

    protected function _postCheck($link, array &$matches)
    {
        $pattern = '#posts/([0-9]*)/#Us';
        return preg_match($pattern, $link, $matches);
    } /* END _postCheck */

    protected function _threadCheck($link, array &$matches)
    {
        $pattern = '#threads/[a-z0-9-]*\.([0-9]*)/#Us';
        return preg_match($pattern, $link, $matches);
    } /* END _threadCheck */

    protected function _urlCheck($link)
    {
        if (strstr($link, XenForo_Application::get('options')->boardUrl)) {
            return true;
        }
        return false;
    } /* END _urlCheck */

    protected function _isPostInAllowedThreadLinkNode($postId)
    {
        $db = $this->_getDb();

        $nodeId = $db->fetchOne(
            '
            SELECT thread.node_id
            FROM xf_post AS post
            LEFT JOIN xf_thread AS thread ON (post.thread_id = thread.thread_id)
            WHERE post.post_id = ?
        ', $postId);

        return $this->_isAllowedThreadLinkNode($nodeId);
    } /* END _isPostInAllowedThreadLinkNode */

    protected function _isThreadInAllowedThreadLinkNode($threadId)
    {
        $db = $this->_getDb();

        $nodeId = $db->fetchOne(
            '
            SELECT thread.node_id
            FROM xf_thread AS thread
            WHERE thread.thread_id = ?
        ', $threadId);

        return $this->_isAllowedThreadLinkNode($nodeId);
    } /* END _isThreadInAllowedThreadLinkNode */

    protected function _isAllowedThreadLinkNode($nodeId)
    {
        $allowedNodeIds = XenForo_Application::get('options')->th_noThreadLinks_nodeIds;
        return !in_array($nodeId, $allowedNodeIds);
    } /* END _isAllowedThreadLinkNode */
}