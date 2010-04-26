<?php
/** 
*
* acp_sql_engine [English]
*
* @author SA007 (http://sa007.cz.cc), imkingdavid (http://phpbbdevelopers.net)
* @package SQL Query Engine acp lang file
* @version 1.0.1 "Kela"
* @copyright (c) SA007 (Michael Cullum), imkingdavid (David King)
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}


$lang = array_merge($lang, array(
	'INSTALL_SQL_ENGINE'				=> 'Install SQL Query Engine',
	'INSTALL_SQL_ENGINE_CONFIRM'		=> 'Are you ready to install SQL Query Engine?',

	'UNINSTALL_SQL_ENGINE'			=> 'Uninstall SQL Query Engine',
	'UNINSTALL_SQL_ENGINE_CONFIRM'	=> 'Are you ready to uninstall SQL Query Engine?  All settings and data saved by this mod will be removed! You will have to manually remove any files and undo any file edits, which can be found in the MOD\'s install.xml file.',
	
	'UPDATE_SQL_ENGINE'			=> 'Update SQL Query Engine',
	'UPDATE_SQL_ENGINE_CONFIRM'	=> 'Are you ready to update SQL Query Engine?',
));