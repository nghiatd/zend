<?php
//use Doctrine\Common\ClassLoader;
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
//    protected function _initDatabase() {
//        $db = $this->getPluginResource ( 'db' )->getDbAdapter ();
//
//        $dbOption = $this->getOption ( 'resources' );
//        $dbOption = $dbOption ['db'];
//
//
//
//        $db = Zend_Db::factory ( $dbOption ['adapter'], $dbOption ['params'] );
//
//        try {$db->setFetchMode ( Zend_Db::FETCH_OBJ );
//        }catch (Exception $e){
//            echo $e->getMessage();
//        }
//
//        // $db->query("SET NAMES 'utf8'");
//        // $db->query("SET CHARACTER SET 'utf8'");
//        Zend_Registry::set ( 'db', $db );
//
//        Zend_Db_Table::setDefaultAdapter ( $db );
//        return $db;
//    }

    protected function setConstants($constants)
    {
        foreach($constants as $name => $value)
        {
            if(!defined($name))
                define($name, $value);
        }

    }

    /**
     * generate registry
     * @return Zend_Registry
     */
    protected function _initRegistry(){
        $registry = Zend_Registry::getInstance();
        return $registry;
    }

    /**
     * Register namespace Default_
     * @return Zend_Application_Module_Autoloader
     */
    protected function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => 'Default_',
            'basePath'  => dirname(__FILE__),
        ));
        return $autoloader;
    }

    /**
     * Initialize Doctrine
     * @return Doctrine_Manager
     */
    /**
     * Initialize Doctrine
     * @return Doctrine_Manager
     */
    public function _initDoctrine() {

        require_once('../library/vendor/autoload.php');
        // include and register Doctrine's class loader
        require_once('../library/vendor/doctrine/common/lib/Doctrine/Common/ClassLoader.php');

        $entitiesPath = '/var/www/html/zend.com/application/domain/Entities';
        $proxiesPath = '/var/www/html/zend.com/application/domain/Proxies';
        $classLoader = new \Doctrine\Common\ClassLoader(
            'Doctrine',
            APPLICATION_PATH . '/../library/'
        );
        $classLoader->register();

        // create the Doctrine configuration
        $config = new \Doctrine\ORM\Configuration();

        // setting the cache ( to ArrayCache. Take a look at
        // the Doctrine manual for different options ! )
        $cache = new \Doctrine\Common\Cache\ArrayCache;
        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);

        //old//
//
//        // choosing the driver for our database schema
//        // we'll use annotations
//        $driver = $config->newDefaultAnnotationDriver(
//            APPLICATION_PATH . '/models'
//        );
//        $config->setMetadataDriverImpl($driver);
//
//        // set the proxy dir and set some options
//        $config->setProxyDir(APPLICATION_PATH . '/models/Proxies');
//        $config->setAutoGenerateProxyClasses(true);
//        $config->setProxyNamespace('App\Proxies');
    //old//

        $driverImpl = $config->newDefaultAnnotationDriver($entitiesPath);

        $config->setMetadataDriverImpl($driverImpl);
        $config->setQueryCacheImpl($cache);
        $config->setProxyDir($proxiesPath);
        $config->setProxyNamespace('domain\Proxies');

        // now create the entity manager and use the connection
        // settings we defined in our application.ini
        $connectionSettings = $this->getOption('doctrine');
        $conn = array(
            'driver'    => $connectionSettings['conn']['driv'],
            'user'      => $connectionSettings['conn']['user'],
            'password'  => $connectionSettings['conn']['pass'],
            'dbname'    => $connectionSettings['conn']['dbname'],
            'host'      => $connectionSettings['conn']['host']
        );

        $entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);

//    require_once '../application/modules/default/models/User.php';
//        $User = new Model_User();
//        $User->setName('create from bootstrap');
//
//        $entityManager->persist($User);
//        $entityManager->flush();
//        echo 'adfasf';die;
        // push the entity manager into our registry for later use
        $registry = Zend_Registry::getInstance();
        $registry->entitymanager = $entityManager;

        return $entityManager;
    }
}
