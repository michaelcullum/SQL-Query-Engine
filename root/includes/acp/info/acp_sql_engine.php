<?php
/**
*
* @package acp
* @version $Id$
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package module_install
*/
class acp_bots_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_sql_engine',
			'title'		=> 'ACP_SQL_ENGINE',
			'version'	=> '1.0.0',
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