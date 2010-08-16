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
				define('MOD_VERSION', '1.0.1');
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
				if($user->data['user_type'] != USER_FOUNDER) // See if the user is a founder.
				{
					trigger_error($user->lang['SQL_MUST_BE_FOUNDER']);
				}
				$submit = (isset($_POST['ready'])) ? true : false;
				$sql_data = request_var('sql_data', '', true);
				if ($submit && $sql_data)
				{
					$sql_ary = htmlspecialchars_decode($sql_data);
					$sql_ary = str_replace("\n", ' ', $sql_ary);
					$sql_ary = str_replace('phpbb_', $table_prefix, $sql_ary);
					$sql_ary = explode(';', $sql_ary);

					$message = $user->lang['SQL_QUERY_ENGINE_PROCESSING'] . '<br />';
					$number = count($sql_ary);
					if(confirm_box(true))
					{
						
						foreach($sql_ary AS $key => $query)
						{
							$query = trim($query); // remove leading and trailing white space.
							//Dont do empty or blank queries:
							if(!empty($query))
							{
								$result = $db->sql_query($query);
								$message .= $query . ';'; // add the query and append a semi-colon
								$message .= ($result) ? ' ...<span style="color:white;font-weight:bold;">' . $user->lang['PASS'] . '</span>' : ' ...<span style="color:white;font-weight:bold;">' . $user->lang['FAIL'] . '</span>';
								$message .= '<br />';
								
								$db->sql_freeresult($result);
							}
						}
						$message .= adm_back_link($this->u_action);
						trigger_error($message);
					}
					else
					{
						$s_hidden_fields = build_hidden_fields(array(
							'submit'    => true,
							'sql_data' => $sql_data,
							'ready'		=> true,
							)
						);
						$sql_data = implode('<br />', $sql_ary);
						confirm_box(false, sprintf($user->lang['QUERY_CONFIRM'], $sql_data), $s_hidden_fields);
					}
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

		$info = get_remote_file('www.phpbbdevelopers.net', '/modver/sa007',
				'sql_query_engine.txt', $errstr, $errno);
	
		if ($info === false)
		{
			return false;
		}
	
		return $info;
	}
}