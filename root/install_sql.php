<?php
/**
*
* @author SA007 (http://sa007.cz.cc), imkingdavid (http://phpbbdevelopers.net)
* @package SQL Query Engine UMIL
* @version 1.0.1 "Kela"
* @copyright (c) SA007 (Michael Cullum), imkingdavid (David King)
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @ignore
*/
define('UMIL_AUTO', true);
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
$user->session_begin();
$auth->acl($user->data);
$user->setup();

if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
{
	trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

$mod_name = 'SQL Query Engine';

$version_config_name = 'sql_query_engine_version';

$language_file = 'mods/info_acp_sql_engine_install';

$versions = array(
	'1.0.1' => array(
		'module_add' => array(
			array('acp', 'ACP_GENERAL_TASKS', 'ACP_SQL_ENGINE'),
			array('acp', 'ACP_SQL_ENGINE', array(
					'module_basename'		=> 'sql_engine',
					'modes'					=> array('index'),
				),
			),
		),
	),
);
include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);