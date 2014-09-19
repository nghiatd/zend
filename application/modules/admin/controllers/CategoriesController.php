<?php
class Admin_CategoriesController extends Zend_Controller_Action{
    public  function init(){
        $this->_helper->layout->setLayout('admin');
        $this->view->headLink()->appendStylesheet('http://zend.com/skin/admin/css/categories.css', 'screen');
        $this->view->headScript()->appendFile('http://zend.com/skin/admin/js/easyui/jquery.easyui.min.js');
    }
    public function indexAction(){
//        $categories = Admin_Model_Categories::getAll();
//        $this->view->Categories = $categories;

//        $this->view->tdn = 'news';
    }
}
