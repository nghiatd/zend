<?php
class Admin_IndexController extends Zend_Controller_Action{
    public function init(){
        $this->_helper->_layout->setLayout('admin');
    }
    public function indexAction(){

    }
}