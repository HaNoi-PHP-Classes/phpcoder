<?php
class Default_Controllers_Customer extends Libs_Controller{

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }

    public function index(){
    	$this->redir(URL_BASE . "default/index");
    }

    public function login(){
    	if($_POST){
    		$customer = new Default_Models_tblCustomer();
			$customer->email = $_POST['email'];
			if($customer->checkEmail()==true && password_verify($_POST['password'],$customer->password) && $customer->status=1){
				$_SESSION['logged_in']=true;
				$_SESSION['user_id'] = $customer->id;
				$_SESSION['access_level'] = $customer->access_level;
				$_SESSION['firstname'] = $customer->firstname;
				$_SESSION['lastname'] = $customer->lastname;
				$_SESSION['email'] = $customer->email;
				if($customer->access_level == "Customer"){
					echo "<script>window.alert('Quá trình đăng nhập thành công.');</script>";
					$this->redir(URL_BASE . "default/index");
				}else{
					echo "<script>window.alert('Quá trình đăng nhập không thành công.');</script>";
					$this->redir(URL_BASE . "default/index");
				}
			}else{
				$access_denied = true;
				echo "<script>window.alert('Tài khoản này chưa tồn tại.');</script>";
				$this->redir(URL_BASE . "default/index");
			}
    	}else{
    		$this->redir(URL_BASE . "default/index");
    	}

    }

    public function logout(){
    	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
    		session_destroy();
    		$this->redir(URL_BASE . "default/index");	
    	}else{
    		$this->redir(URL_BASE . "default/index");
    	}
   	}

	public function register(){
		if($_POST){
			$customer = new Default_Models_tblCustomer();
			//Kiem tra email da ton tai trong CSDL
			$customer->email = $_POST['email'];
			if($customer->checkEmail()==false){
				$customer->password = $_POST['password'];
				$customer->access_level = "Customer";
				$customer->status = 1;
				if($customer->createCustomer()){
					echo "<script>window.alert('Đăng ký tài khoản thành công. <br> Mời bạn tiến hành đăng nhập');</script>";
					$this->redir(URL_BASE . "default/index");
				}else{
					echo "<script>window.alert('Quá trình đăng ký thất bại!');</script>";
					$this->redir(URL_BASE . "default/index");
				}
			}else{
				echo "<script>window.alert('Email này đã tồn tại.');</script>";
				$this->redir(URL_BASE . "default/index");
			}
		}else {
			echo "<script>window.alert('Quá trình đăng ký thất bại.');</script>";
			$this->redir(URL_BASE."default/index");
		}
	}
}

?>