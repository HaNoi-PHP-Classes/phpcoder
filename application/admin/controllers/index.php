<?php
class Admin_Controllers_Index extends Libs_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        //$objProduct = new Default_Models_tblProduct();
        //$this->view->arrProduct = $objProduct->getAllProduct();
        $this->view->render('index/index');
    }
    
}

?>
