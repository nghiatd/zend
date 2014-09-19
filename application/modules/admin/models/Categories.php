<?php
class Admin_Model_Categories{

  protected static $db;

    public static function getAll(){
        if(!self::$db){
            self::$db = Zend_Registry::get('db');
        }

        $result = self::$db->query('SELECT * FROM tbl_danhmuc');

        return $result->fetchAll();
    }


}