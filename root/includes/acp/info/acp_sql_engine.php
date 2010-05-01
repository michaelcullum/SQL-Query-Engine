<?php
/** 
*
* @author SA007 (http://sa007.cz.cc), imkingdavid (http://phpbbdevelopers.net)
* @package SQL Query Engine acp
* @version 1.0.1 "Kela"
* @copyright (c) SA007 (Michael Cullum), imkingdavid (David King)
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/
if (!defined('IN_PHPBB'))
{
	exit;
}
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
			'version'	=> '1.0.1 "Kela"',
			'modes'		=> array(
				'index'		=> array('title' => 'ACP_SQL_ENGINE', 'auth' => 'acl_a_', 'cat' => array('ACP_GENERAL_TASKS')),
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