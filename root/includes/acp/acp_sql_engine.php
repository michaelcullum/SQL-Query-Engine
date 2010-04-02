<?php
/** 
*
* @author SA007 (http://sa007.cz.cc), imkingdavid (http://phpbbdevelopers.net)
* @package SQL Query Engine acp
* @version [ALPHA] 0.0.4 "Kela"
* @copyright (c) SA007 (Michael Cullum), imkingdavid (David King)
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* @package acp
*/
class acp_sql_engine
{
	var $u_action;
	var $new_config;
	function main($id, $mode)
	{
		global $db, $user, $auth, $template;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;
		global $table_prefix;
		switch($mode)
		{
			case 'index':
				// MOD Version -- Change when the MOD gets updated
				define('MOD_VERSION', '0.0.3');
				$info = $this->obtain_latest_mod_version_info();
				$info = explode("\n", $info);
				$modversion = trim($info[0]);
				if(!$modversion)
				{
					$version_message = sprintf($user->lang['SERVER_DOWN'], '<a href="' . $info[1] . '">', '</a>');
					$s_up_to_date = 0;
				}
				else
				{
					$s_up_to_date = (version_compare(MOD_VERSION, $modversion, '>=') == 1) ? 1 : 0;
					$version_message = ($s_up_to_date == 1) ? $user->lang['UP_TO_DATE'] : $user->lang['NOT_UP_TO_DATE'];
				}
				$template->assign_vars(array(
					'CURRENT_VERSION'	=> MOD_VERSION,
					'LATEST_VERSION'	=> $modversion,
					'VERSION_MESSAGE'	=> $version_message,
					'S_UP_TO_DATE'		=> $s_up_to_date,
					'UPDATE_TO'			=> sprintf($user->lang['UPDATE_TO'], $modversion),
					'S_VERSION_CHECK'	=> true,
					'U_DLUPDATE'		=> trim($info[1]),
				));
				$this->page_title = 'ACP_SQL_ENGINE';
				$this->tpl_name = 'acp_sql_engine';
				if(!$user->data['user_type'] == 3) // See if the user is a founder.
				{
					trigger_error($user->lang['SQL_MUST_BE_FOUNDER']);
				}
				$submit = (isset($_POST['submit'])) ? true : false;
				$sql_data = request_var('sql_data', '');
				if ($submit && $sql_data)
				{
					$sql_ary = htmlspecialchars_decode($sql_data);
					$sql_ary = str_replace("\n", ' ', $sql_ary);
					$sql_ary = str_replace('phpbb_', $table_prefix, $sql_ary);
					$sql_ary = explode(';', $sql_ary);
					// Loop through our sql queries
					$message = $user->lang['SQL_QUERY_ENGINE_PROCESSING'] . '<br />';
					foreach($sql_ary AS $query)
					{
					//	$result = $db->sql_query($query);
						$result = 1;
						$message .= (!empty($query)) ? $query . ' ... ' . (($result) ? '<span style="font-weight:bold;">' . $user->lang['SQL_SUCCESS'] . '</span>' : '<span style="color:red;font-weight:bold;">' . $user->lang['SQL_FAIL'] . '</span>') : '';
						$message .= '<br />';
					}
					$number = count($sql_ary);
					
					$message .= ($number === 1) ? $user->lang['SQL_ENGINE_QUERY_PASS'] : $user->lang['SQL_ENGINE_QUERIES_PASS'];
					$message .= '<br />';
					$message .= adm_back_link($this->u_action);
					trigger_error($message);
				}	
				$template->assign_vars(array(
					'U_ACTION'		=> $this->u_action
				));
				break;
		}		
	}
	function obtain_latest_mod_version_info()
	{
		$errstr = '';
		$errno = 0;

		$info = get_remote_file('www.phpbbdevelopers.net', '/modver',
				'sql_query_engine.txt', $errstr, $errno);
	
		if ($info === false)
		{
			return false;
		}
	
		return $info;
	}
}