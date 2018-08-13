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
            $courseObj = new Default_Models_tblCourse();
            $courseObj->id = $id;
            $this->view->course = $courseObj->getCourseById();
            $this->view->render('index/course');
        }
    }
    
    public function listcourse(){
        if ($_REQUEST['id'] != "") {
            $category_id = $_REQUEST['id'];
            
            $courseObj = new Default_Models_tblCourse();
            $courseObj->category_id = $category_id;
            $course = $courseObj->getCourseByCategoryId();
            $numCourse = $course->rowCount();

            $this->view->numCourse = $numCourse;
            $this->view->course = $course;
            $this->view->render('index/list');
        }
    }

    public function search(){
            $name = $_REQUEST['name'];
            $courseObj = new Default_Models_tblCourse();
            //$courseObj->name = $_REQUEST['name'];
            $course = $courseObj->getCourseByName($name);
            $numCourse = $course->rowCount();

            $this->view->numCourse = $numCourse;
            $this->view->course = $course;
            $this->view->render("index/search");
    }

    public function login(){
        if($_POST){
            $userObj = new Default_Models_tblUser();
            $userObj->email = $_POST['email'];
            $email_exists = $userObj->emailExists();
            $this->render('index/index');
            /*if($email_exists){
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $userObj->id;
                $_SESSION['access_level'] = $userObj->access_level;
                $_SESSION['firstname'] = htmlspecialchars($userObj->firstname, ENT_QUOTES, 'UTF-8');
                $_SESSION['lastname'] = htmlspecialchars($userObj->lastname, ENT_QUOTES, 'UTF-8');

                if($userObj->access_level == 'Customer'){
                    //$this->redir(URL_BASE."default/action=login_success");
                    //header("Location: {URL_BASE}default?action=login_success");
                    $this->render('index/index');
                }
                else{
                    $this->redir(URL_BASE."admin/action=login_success");
                    //header("Location: {URL_BASE}admin/?action=login_success");
                    $this->render('index/index');
                }
            }
            else
            {
                $access_denied = true; 
            }*/
        }
    }

    public function addSubcribe(){
        if($_POST){
            $subscribe = new Default_Models_tblSubscribe();
            $subscribe->email = $_POST['email'];

            //Kiem tra ton tai email trong bang 'subscribe'
            if(!$subscribe->checkEmail()){
                $subscribe->fullname = $_POST['fullname'];
                if($subscribe->createSubscribe()){
                    require 'application/default/models/phpmailer.php';
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = "ssl";
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = 465;
                    $mail->Username = "thopn.hvcsnd@gmail.com";
                    $mail->Password = "Ngoctho1277601352011";

                    $mail->SetFrom("thopn.hvcsnd@gmail.com", "phpcoder.vn");
                    $mail->AddAddress($subscribe->email, "Thành viên phpcoder.vn");
                    //$mail->AddReplyTo("thopn.hvcsnd@gmail.com", "phpcoder.vn");

                    $mail->Subject = "Xác nhận thông tin để nhận được những chủ đề mới có từ phpcoder.vn";
                    $mail->CharSet = "utf-8";
                    //$body = "<h3>Chào mừng bạn đến với PHPMailer</h3>";
                    $content = "<div style='padding:5px 0px;'>Xin chào Coder!</div>
                                <h3 style='padding:5px 0px;'>I. XÁC NHẬN EMAIL CỦA BẠN</h3>
                                <div style='padding:5px 0px;'>Để xác nhận email subcribe, vui lòng kích liên kết dưới đây:</div>
                                <div style='padding:5px 0px;'><a href='".URL_BASE."default/index/verify/?access_code=".$subscribe->access_code."'>".URL_BASE."default/index/verify/?access_code=".$subscribe->access_code."</a></div>

                                <h3 style='padding:5px 0px;'>II. CÁC CHỦ ĐỂ HAY TẠI phpcoder</h3>
                                <div style='padding:5px 0px;'><a href='http://www.phpcoder.vn/default/listcourse/?id=1'>Bắt đầu với lập trình web</div>
                                <div style='padding:5px 0px;'><a href='http://www.phpcoder.vn/default/listcourse/?id=2'>Lập trình PHP</div>
                                <div style='padding:5px 0px;'><a href='http://www.phpcoder.vn/default/listcourse/?id=3'>Lập trình với Javascript</div>

                                <h3 style='padding:5px 0px;'>III. LIÊN HỆ VỚI CHÚNG TÔI</h3>
                                <div>Facebook: </div>
                                <div>Google: </div>
                                <div>LinkedIn: </div>
                                <div>Instagram: </div>

                                <h3 style='padding:5px 0px;'>IV. CẢM ƠN CÁC BẠN!</h3>
                                <div style='padding:5px 0px;'>Chúc các bạn những điều tốt đẹp trong sự nghiệp và cuộc sống!</div>
                                <div>Trân trọng,</div>
                                <div>Phạm Ngọc Thọ - Người sáng lập và là tác giả phpcoder.vn</div>";

                    $mail->msgHTML($content);
                    //$mail->Body = $content;

                    if($mail->Send())
                    {
                        //Chuyen huong sang thong bao ket qua
                        $this->view->render("index/subscribe");
                    }else{
                        $this->redir(URL_BASE."default/index");
                    }
                    

                }else{
                    //Chuyen huong ve trang chu
                    $this->redir(URL_BASE."default/index");
                }
            }else{
                //Chuyen huong ve trang chu
                $this->redir(URL_BASE."default/index");
            }
        }
            
    }

}

?>
