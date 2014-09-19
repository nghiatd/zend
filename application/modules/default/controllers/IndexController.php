<?php
class IndexController extends Zend_Controller_Action{

    public function init(){
        $this->_helper->layout->setLayout('layout');
        $instance = Zend_Registry::getInstance();
        $this->em = $instance->entitymanager;
    }
    public function indexAction(){
//        print_r($this->em->getMetadataDriverImpl());die;
//       $doctrine = new Entities_User();

//        $User->setName('dit me thang cho nghia');
        $User = new User();
       $this->view->nghia = 'dosssssss';

    }

    public function newsAction(){
        $this->view->News = 'this is latest news';
    }
}