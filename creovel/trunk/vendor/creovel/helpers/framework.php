<?php
/*
 * Framework functions.
 */

/**
 * AUTOLOAD ROUTINE
 *
 * @author Nesbert Hidalgo
 */
function __autoload($classname) {

	$folders = split('_', $classname);
	
	if ( count($folders) > 1 ) array_pop($folders);

	$path = implode(DS, $folders);
	
	switch ( true ) {
	
		case ( strstr($classname, '_controller') ):
			$path = CONTROLLERS_PATH.$classname.'.php';
			$controller = str_replace('_controller', '', $classname);
			$helper_path = HELPERS_PATH.$controller.'_helper.php';
			if ( file_exists($helper_path) ) require_once($helper_path);
		break;

		case ( strstr($classname, '_model') ):
		case ( strstr($classname, '_mailer') ):
			$path = MODELS_PATH.$classname.'.php';			
			if ( !file_exists($path) ) $path = CREOVEL_PATH.'models'.DS.$classname.'.php';
		break;
		
		case ( strstr($classname, '_interface') ):
			$path = CREOVEL_PATH.'interfaces'.DS.$classname.'.php';
		break;
		
		default:
			$path = CREOVEL_PATH.'classes'.DS.$classname.'.php';
			if ( !file_exists($path) ) $path = CREOVEL_PATH.'adapters'.DS.$classname.'.php';
			if ( !file_exists($path) ) $path = CREOVEL_PATH.'services'.DS.$classname.'.php';
			if ( !file_exists($path) ) $path = APP_PATH.'vendor'.DS.$classname.'.php';
			if ( !file_exists($path) ) $path = CREOVEL_PATH.'vendor'.DS.$classname.'.php';
		break;
		
	}
	
	try {
	
		if ( !file_exists($path) ) {
			throw new Exception("{$classname} not found...");
		} else {
			require_once($path);
		}
	
	} catch(Exception $e) {
		
		echo '<h1>Required File Not Found...</h1>';
		echo "<p>Looking for <b>{$classname}</b> at <b>{$path}</b></p>";
	 	
		foreach ( debug_backtrace() as $path ) {
			echo "<b>File:</b> {$path['file']}<br />";
			echo "<b>Line:</b> {$path['line']}<br />";
			echo "<b>Function:</b> {$path['function']}<br />";
			echo "<hr />";
		}
		
		die();
		
	}
	
}

/**
 * Returns the framework events (CONTORLLER & ACTION).
 *
 * @author Nesbert Hidalgo
 * @access public
 * @param string $event_to_return optional name of event to return
 * @return array
 */ 
function get_events($event_to_return = null)
{	
	return creovel::get_events($event_to_return); 
}

/**
 * Returns the current CONTORLLER.
 *
 * @author Nesbert Hidalgo
 * @access public
 * @return string
 */
function get_controller()
{
	return creovel::get_events('controller');
}

/**
 * Returns the current ACTION.
 *
 * @author Nesbert Hidalgo
 * @access public
 * @return string
 */

function get_action()
{
	return creovel::get_events('action');
}

/**
 * Returns the framework params.
 *
 * @author Nesbert Hidalgo
 * @access public
 * @param string $param_to_return optional name of param to return
 * @return array
 */
function get_params($param_to_return = null)
{
	return creovel::get_params($param_to_return);
}


/**
 * Returns the framework version.
 *
 * @author Nesbert Hidalgo
 * @access public
 * @return string
 */
function get_version()
{
	return VERSION; 
}

/**
 * Returns the framework release date.
 *
 * @author Nesbert Hidalgo
 * @access public
 * @return string
 */
function get_release_date()
{
	return RELEASE_DATE;
}
?>