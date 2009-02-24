<?php
/*

	Scripts: initialize
	
	This file includes all core libraries and intializes framework.

*/

// Include database connection settings.
require_once CONFIG_PATH . 'database.php';

// Include base helpers library.
require_once 'constants/common.php';

// Include base helpers library.
require_once 'helpers/ajax.php';
require_once 'helpers/datetime.php';
require_once 'helpers/form.php';
require_once 'helpers/framework.php';
require_once 'helpers/general.php';
require_once 'helpers/html.php';
require_once 'helpers/text.php';
require_once 'helpers/server.php';
require_once 'helpers/utility.php';
require_once 'helpers/validation.php';

// Include base classes library.
require_once 'classes/controller.php';
require_once 'classes/creovel.php';
require_once 'classes/error.php';
require_once 'classes/inflector.php';
require_once 'classes/routing.php';
require_once 'classes/view.php';

// Include environment specific file.
require_once CONFIG_PATH . 'environments' . DS . ( $_ENV['mode'] = ( isset($_ENV['mode']) ? $_ENV['mode'] : 'development' ) ) . '.php';

// Set routing object.
$_ENV['routing'] = new routing;

// Set default routes
mapper::connect();
mapper::connect( 'index/error', array( 'name' => 'error', 'controller' => 'index', 'action' => 'error' ));

// Set error object.
$_ENV['error'] = new error('_application');

// Session logic.
if ($_ENV['sessions']) {
	
	if ( $_ENV['sessions'] === 'table' ) {
		// include/create session db object
		require_once 'classes/session.php';
		$_session = new session();
		// include session helpers
		require_once 'helpers/session.php';
	}
	
	// Fix for PHP 5.05
	// http://us2.php.net/manual/en/function.session-set-save-handler.php#61223
	register_shutdown_function('session_write_close');
	
	session_start();
}

// Include custom routes.
require_once CONFIG_PATH . 'routes.php';
?>