<?php
class acp_foo_info
{
    function module()
    {
        return array(
            'filename'    => 'acp_sql_query_engine',
            'title'        => 'ACP_SQL_ENGINE',
            'version'    => '1.0.0',
            'modes'        => array(
                'index'        => array('title' =>ACP_SQL_QUERY_ENGINE', 'auth' => 'acl_a_sql_eng_auth', 'sqlquery' => array('')),
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