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
		switch($mode)
		{
			case 'index':
				$this->page_title = 'ACP_SQL_ENGINE';
				$this->tpl_name = 'acp_sql_engine';
				if(!$user->data['user_type'] == 3) // See if the user is a founder.
				{
					trigger_error($user->lang['SQL_MUST_BE_FOUNDER']);
				}
				if ($submit && $sql_data)
				{
					$sql_ary = str_replace("\n", ' ', $sql_data);
					$sql_data = str_replace('phpbb_', $table_prefix, $sql_data);
					$sql_ary = explode(';', $sql_data);
					
					// Loop through our sql queries
					for ($i = 0, $size = sizeof($sql_ary); $i < $size; $i++)
					{
					  $db->sql_query($sql_ary[$i]);
					}
					$number = count($sql_ary);
					
					$message = ($number === 1) ? $user->lang['SQL_ENGINE_QUERY_PASS'] : $user->lang['SQL_ENGINE_QUERIES_PASS'];
					$message .= '<br />';
					$message .= $user->lang['SQL_ENGINE_RETURN'] . adm_back_link($this->u_action);
					
					trigger_error($message);
				}	
				$template->assign_vars(array(
					'U_ACTION'		=> $this->u_action
				));
				break;
		}		
	}
}