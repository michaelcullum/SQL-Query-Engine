<?php
/** 
*
* @author SA007 (http://sa007.cz.cc)
* @package SQL Query Engine acp
* @version [ALPHA] 1.0.0 "Kela"
* @copyright (c) SA007 (Michael Cullum)
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package module_install
*/
class acp_sql_engine_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_sql_engine',
			'title'		=> 'ACP_SQL_ENGINE',
			'version'	=> '1.0.0 "Kela"',
			'modes'		=> array(
				'bots'		=> array('title' => 'ACP_SQL_ENGINE', 'auth' => 'acl_a_', 'cat' => array('ACP_GENERAL_TASKS')),
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