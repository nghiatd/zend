<?php
class Admin_IndexController extends Zend_Controller_Action{
    public function init(){

        $layout = Zend_Layout::getMvcInstance();
        $layout->setLayout('layout12');
//        var_dump($this);die;
        $this->_helper->layout->setLayout('admin');
//        var_dump($layout);die;
    }
    public function indexAction(){
//        echo get_class($this);
//        echo '121212';die;

//        echo APPLICATION_PATH.'/layouts/scripts/';die;
//        $this->_helper->layout->setLayout(APPLICATION_PATH.'/layouts/scripts/');
//        die('admin');
    }
}