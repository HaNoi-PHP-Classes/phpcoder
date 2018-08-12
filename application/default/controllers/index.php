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

                    //$mail->Body = $body;
                    $mail->msgHTML("<h3>Chào các bạn đến với PHPMailer</h3>");
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
