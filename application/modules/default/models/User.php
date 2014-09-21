<?php
/**
 * @Entity
 * @Table(name="user")
 */
class Model_User
{
    protected static $doctrine;
    public function __construct(){
        self::$doctrine = Zend_Registry::get('entitymanager');
    }
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $userId;

    /** @Column(type="string") */
    private $name;


    public function setName ($name)
    {
        $this->name = $name;
        return true;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getById($Id = 0){

        return self::$doctrine->createQuery("SELECT * FROM Model_User WHERE userId = $Id")->execute();
//        return self::$doctrine->createQuery()->create()->from(__CLASS__)->execute()->getFirst();
    }
}