<?php
class Admin_Controllers_Course extends Libs_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
    	// Kiểm tra và lấy số trang trên URL, mặc định là 1
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		// Thiết lập số lượng bản ghi trên mỗi trang
		$records_per_page = 5;
		// Phục vụ mệnh đề LIMIT giới hạn dữ liệu cần lấy trên mỗi trang
		$from_record_num = ($records_per_page * $page) - $records_per_page;

    	$course = new Admin_Models_tblCourseAdmin();
        $stmt = $course->getAllCourse($from_record_num, $records_per_page);
    	$this->view->stmt = $stmt;
        $this->view->num = $stmt->rowCount();
        $this->view->render('course/index');
    }
    
}

?>