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
    
    public function course(){
    	// Kiểm tra và lấy số trang trên URL, mặc định là 1
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		// Thiết lập số lượng bản ghi trên mỗi trang
		$records_per_page = 5;
		// Phục vụ mệnh đề LIMIT giới hạn dữ liệu cần lấy trên mỗi trang
		$from_record_num = ($records_per_page * $page) - $records_per_page;

    	$courseObj = new Admin_Models_tblCourse();
        
        $course = $courseObj->getAllCourse($from_record_num, $records_per_page);
    	$this->view->course = $course;
        $this->view->numCourse = $course->rowCount();
        $this->view->total_rows = $courseObj->countAll();
        $this->view->page = $page;
        $this->view->records_per_page = $records_per_page;

        $categoryObj = new Admin_Models_tblCategory();
        $this->view->category = $categoryObj;

        $this->view->render('index/course');
    }
}

?>
