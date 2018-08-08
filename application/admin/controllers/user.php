<?php
class Admin_Controllers_User extends Libs_Controller{

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }

    public function index(){
    	$this->redir(URL_BASE . "admin/index");
    }

    public function login(){
    	if($_POST){
    		$user = new Admin_Models_tblUser();
			$user->email = $_POST['email'];
			if($user->checkEmail()==true && password_verify($_POST['password'],$user->password) && $user->status=1){
				$_SESSION['logged_in']=true;
				$_SESSION['user_id'] = $user->id;
				$_SESSION['access_level'] = $user->access_level;
				$_SESSION['firstname'] = $user->firstname;
				$_SESSION['lastname'] = $user->lastname;
				$_SESSION['email'] = $user->email;
				if($user->access_level == "Customer"){
					echo "<script>window.alert('Quá trình đăng nhập thành công.');</script>";
					$this->redir(URL_BASE . "admin/index");
				}else{
					echo "<script>window.alert('Quá trình đăng nhập không thành công.');</script>";
					$this->redir(URL_BASE . "admin/index");
				}
			}else{
				$access_denied = true;
				echo "<script>window.alert('Tài khoản này chưa tồn tại.');</script>";
				$this->redir(URL_BASE . "admin/index");
			}
    	}else{
    		$this->redir(URL_BASE . "admin/index");
    	}

    }

    public function logout(){
    	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
    		session_destroy();
    		$this->redir(URL_BASE . "admin/index");	
    	}else{
    		$this->redir(URL_BASE . "admin/index");
    	}
   	}

	public function register(){
		if($_POST){
			$user = new Admin_Models_tblUser();
			//Kiem tra email da ton tai trong CSDL
			$user->email = $_POST['email'];
			if($user->checkEmail()==false){
				$user->password = $_POST['password'];
				$user->access_level = "Admin";
				$user->status = 1;
				if($user->createUser()){
					echo "<script>window.alert('Đăng ký tài khoản thành công. <br> Mời bạn tiến hành đăng nhập');</script>";
					$this->redir(URL_BASE . "admin/index");
				}else{
					echo "<script>window.alert('Quá trình đăng ký thất bại!');</script>";
					$this->redir(URL_BASE . "admin/index");
				}
			}else{
				echo "<script>window.alert('Email này đã tồn tại.');</script>";
				$this->redir(URL_BASE . "admin/index");
			}
		}else {
			echo "<script>window.alert('Quá trình đăng ký thất bại.');</script>";
			$this->redir(URL_BASE."admin/index");
		}
	}
}

?>