<?php
/** 
*
* acp_sql_engine [English]
*
* @author SA007 (http://sa007.cz.cc), imkingdavid (http://phpbbdevelopers.net)
* @package SQL Query Engine acp lang file
* @version [ALPHA] 0.0.1 "Kela"
* @copyright (c) SA007 (Michael Cullum), imkingdavid (David King)
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* DO NOT CHANGE
*/
if (empty($lang) || !is_array($lang))
{
    $lang = array();
}

$lang = array_merge($lang, array(
	'ACP_SQL_ENGINE'			=> 'SQL Query Engine',
	'SQL_ENGINE'				=> 'SQL Query Engine',
	'SQL_ENGINE_EXPLAIN'		=> 'This is a helpful tool and is used for executing SQL queries to your database. Queries should be formatted for use with your database type.',
	'SQL_ENGINE_DISCLAIMER'		=> 'This is a highly dangerous tool, and when used improperly, it can do unwanted actions your forum. This tool should only be used if you have been instructed to do so, or if you know what you are doing. Do NOT use this without first backing up your database, or you risk permanently damaging your database. If an error does occur, simply restore your backed up database.',
	'SQL_ENGINE_QUERY_PASS'		=> 'The query has sucesessfully been completed.',
	'SQL_ENGINE_QUERIES_PASS'	=> 'The queries have been successfully completed.',
	'SQL_ENGINE_RETURN'			=> 'Click here to return to the form.',
	'SQL_MUST_BE_FOUNDER'		=> 'Only board founders may access this module.',
	'SQL_QUERY_ENGINE_PROCESSING'	=> 'Processing SQL...',
	'SUCCESS'					=> 'Success',
	'FAIL'						=> 'Failed',
	'SQL_SUBMIT'				=> 'Submit',
));

?>