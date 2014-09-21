<?php
class IndexController extends Zend_Controller_Action{

    public function init(){
        $this->_helper->layout->setLayout('layout');
        $instance = Zend_Registry::getInstance();
        $this->em = $instance->entitymanager;
    }
    public function indexAction(){
        $User = new Model_User();
        $getUser = $this->em->getRepository('Model_User')->find(array('name' => 'asdf'));
print_r(get_class($getUser));die;
//        print_r('asdf');die;
//        $User->setName('repository');
        $this->em->persist($User);
        $this->em->flush();
       $this->view->nghia = 'dosssssss';

    }

    public function newsAction(){
        $this->view->News = 'this is latest news';
    }
}