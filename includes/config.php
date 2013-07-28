<?php
	//Security
	defined('ACCESS') or die('You do not have access to this page');
	ini_set('display_errors', 1);
	//Constants 
	define('CURRENT_PAGE','http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	define('BASE_URL','http://lamp.cse.fau.edu/~kshambli/MP2');


	define('INDEX_PAGE',BASE_URL.DS.'index.php');
	define('ROOT_DIR',realpath(dirname(__FILE__).'/..'));
	define('CURR_DIR',getcwd());
	define('TEMPLATE','main');

	//helper functions
	require_once('functions.helper.php');
