<?php
class acp_foo_info
{
    function module()
    {
        return array(
            'filename'    => 'acp_foo',
            'title'        => 'ACP_FOO',
            'version'    => '1.2.3',
            'modes'        => array(
                'index'        => array('title' => 'ACP_FOO_INDEX_TITLE', 'auth' => 'acl_a_foo_auth', 'cat' => array('')),
            ),
        );
    }

    function install()
    {
    }

    function uninstall()
    {
    }
}
?>