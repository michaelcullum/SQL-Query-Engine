<?php
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
            $this->page_title = 'ACP SQL Query Engine';
            $this->tpl_name = 'acp_sql_engine';
            break;
      }

   }
}
?>