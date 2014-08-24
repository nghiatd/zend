<?php
define ( 'APPLICATION_PATH', realpath ( dirname ( __FILE__ ) . '/application' ) );
define ( 'MODULE_ADMIN_PATH', realpath ( dirname ( __FILE__ ) . '/application/modules/admin' ) );
define ( 'APPLICATION_ENV', 'production' );
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(dirname(__FILE__) . '/library'),
    get_include_path(),
)));
require_once 'Zend/Application.php';

$application = new Zend_Application ( APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini' );
$application->bootstrap ()->run ();