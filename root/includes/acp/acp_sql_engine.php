<?php
/** 
*
* @author SA007 (http://sa007.cz.cc), imkingdavid (http://phpbbdevelopers.net)
* @package SQL Query Engine acp
* @version [ALPHA] 0.0.1 "Kela"
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
					$sql_ary = str_replace("\n", ' ', $sql_data);
					$sql_ary = str_replace('phpbb_', $table_prefix, $sql_ary);
					$sql_ary = str_replace('&quot;', '"', $sql_ary);
					$sql_ary = explode(';', $sql_ary);
					// Loop through our sql queries
					$message = $user->lang['SQL_QUERY_ENGINE_PROCESSING'] . '<br />';
					foreach($sql_ary AS $query)
					{
					//	$result = $db->sql_query($query);
						$result = 1;
						$message .= (!empty($query)) ? $query . ' ... ' . (($result) ? '<span style="font-weight:bold;">' . $user->lang['SUCCESS'] . '</span>' : '<span style="color:red;font-weight:bold;">' . $user->lang['FAIL'] . '</span>') : '';
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
}