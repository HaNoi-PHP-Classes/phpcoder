<?php
class Default_Controllers_Index extends Libs_Controller{
    
    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }
    
    public function index(){
        $courseObj = new Default_Models_tblCourse();
        $course = $courseObj->getAllCourse();
        $numCourse = $course->rowCount();
        $this->view->numCourse = $numCourse;
        $this->view->course = $course;
        $this->view->render('index/index');
    }
    
    public function course(){
        if($_REQUEST['id'] != ""){
            $id = $_REQUEST['id'];
            //Khởi tạo đối tượng Default_Models_tblProduct
            //$objProduct = new Default_Models_tblProduct();
            //$this->view->itemProduct = $objProduct->getProductById($id);
            $this->view->id = $id;
            $this->view->render('index/course');
        }
    }
    
    public function listcourse(){
        if ($_REQUEST['id'] != "") {
            $this->view-> id = $id;
            $this->view->render("index/list");
        }
    }


}

?>
