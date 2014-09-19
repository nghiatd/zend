<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();
//
////-------Doctrine------//
//require_once('../library/vendor/autoload.php');
//// include and register Doctrine's class loader
//require_once('../library/vendor/doctrine/common/lib/Doctrine/Common/ClassLoader.php');
//
//
//require_once '../library/vendor/symfony/console/Symfony/Component/Console/Helper/HelperSet.php';
//require_once '../library/vendor/symfony/console/Symfony/Component/Console/Application.php';
//
//include('schema_tool.php');