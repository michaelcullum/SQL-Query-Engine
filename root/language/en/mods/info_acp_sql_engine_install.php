<?php
/** 
*
* acp_sql_engine [English]
*
* @author SA007 (http://sa007.cz.cc), imkingdavid (http://phpbbdevelopers.net)
* @package SQL Query Engine acp lang file
* @version 1.0.0 "Kela"
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

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'INSTALL_SQL_ENGINE'				=> 'Install SQL Query Engine',
	'INSTALL_SQL_ENGINE_CONFIRM'		=> 'Are you ready to install SQL Query Engine?',

	'UNINSTALL_SQL_ENGINE'			=> 'Uninstall SQL Query Engine',
	'UNINSTALL_SQL_ENGINE_CONFIRM'	=> 'Are you ready to uninstall SQL Query Engine?  All settings and data saved by this mod will be removed! You will have to manually remove any files and undo any file edits, which can be found in the MOD\'s install.xml file.',
	
	'UPDATE_SQL_ENGINE'			=> 'Update SQL Query Engine',
	'UPDATE_SQL_ENGINE_CONFIRM'	=> 'Are you ready to update SQL Query Engine?',
));