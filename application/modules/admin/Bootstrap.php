<?php
class Admin_Bootstrap extends Zend_Application_Module_Bootstrap{
    protected  function _initAutoLoad(){
       Zend_Layout::startMvc();
        $layout = Zend_Layout::getMvcInstance();
        $layout->setLayout('admin');
//        echo get_class($layout);die;
    }
}