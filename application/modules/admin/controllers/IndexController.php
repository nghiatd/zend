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
//        die('admin');
    }
}