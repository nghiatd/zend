<?php

define('APPLICATION_ENV', 'development');

define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

require_once('library/vendor/autoload.php');
require_once('library/vendor/doctrine/common/lib/Doctrine/Common/ClassLoader.php');
// Doctrine and Symfony Classes
//require_once 'Doctrine/Common/ClassLoader.php';
$classLoader = new \Doctrine\Common\ClassLoader('Doctrine', APPLICATION_PATH . '/../library');
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Symfony', APPLICATION_PATH . '/../library/Doctrine');
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Entities', APPLICATION_PATH . '/models');
$classLoader->setNamespaceSeparator('_');
$classLoader->register();

// Zend Components
require_once 'library/Zend/Application.php';

// Create application
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

// bootstrap doctrine
$application->getBootstrap()->bootstrap('doctrine');
$em = $application->getBootstrap()->getResource('doctrine');

// generate the Doctrine HelperSet
$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));

\Doctrine\ORM\Tools\Console\ConsoleRunner::run($helperSet);