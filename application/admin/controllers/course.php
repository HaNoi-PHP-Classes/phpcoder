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

    	$courseObj = new Admin_Models_tblCourseAdmin();
        
        $course = $courseObj->getAllCourse($from_record_num, $records_per_page);
    	$this->view->course = $course;
        $this->view->numCourse = $course->rowCount();
        $this->view->total_rows = $courseObj->countAll();
        $this->view->page = $page;
        $this->view->records_per_page = $records_per_page;

        $categoryObj = new Admin_Models_tblCategoryAdmin();
        $this->view->category = $categoryObj;

        $this->view->render('course/index');
    }

    public function add(){
        $categoryObj = new Admin_Models_tblCategoryAdmin();
        $category = $categoryObj->getCategory();
        $this->view->category = $category;
        $this->view->render("course/add");
    }

    public function addprocess(){
        //Lấy dữ liệu trên form người dùng nhập
        if ($_POST) {
            $course = new Admin_Models_tblCourseAdmin();
            $course->name = $_POST['name'];
            $course->price = $_POST['price'];
            $course->description = $_POST['description'];
            $course->category_id = $_POST['category_id'];

            if($course->createCourse()){
                echo "<script>
                        alert('Thêm mới khoá học thành công!');
                      </script>";
                $this->redir(URL_BASE."admin/course/add");
            }else{
                $_SESSION['msg'] = "<div class='alert alert-success fade in'>Thêm mới khóa học thất bại.</div>";
                $this->redir(URL_BASE."admin/course/add");
            }
        }
    }

}

?>