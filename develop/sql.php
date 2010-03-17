<?php
/**
* @package SQL Query Engine
* @version 1.0.0
* @copyright (c) 2007 eviL3
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

// Check if the user is logged in and an admin
if (!$auth->acl_get('a_'))
{
   if ($user->data['user_id'] != ANONYMOUS)
   {
      redirect(append_sid($phpbb_root_path . "index.$phpEx"));
   }
   
   login_box("{$phpbb_root_path}sql.$phpEx");
}

$submit      = request_var('submit', false);
$sql_data   = request_var('sql_data', '');

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
   
   $message = 'Queries executed successfully!';
   $message .= '<br /><br />';
   $message .= sprintf('%sClick here to return to the query form%s', '<a href="' . append_sid($phpbb_root_path . 'sql.' . $phpEx) . '">', '</a>');
   
   trigger_error($message);
}

?>
<form action="<?php echo append_sid($phpbb_root_path . 'sql.' . $phpEx); ?>" method="post">
   <textarea style="width: 80%; height: 200px;" name="sql_data"></textarea><br />
   <input type="submit" name="submit" value="<?php echo $user->lang['SUBMIT']; ?>" />
</form>