<?php
class IndexController extends Zend_Controller_Action{

    public function init(){
        $this->_helper->layout->setLayout('admin');
    }
    public function indexAction(){

       $this->view->nghia = 'dosssssss';

    }
}