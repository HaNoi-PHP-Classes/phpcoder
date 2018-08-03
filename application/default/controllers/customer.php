<?php
class Default_Controllers_Customer extends Libs_Controller{


    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
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
				if($customer->access_level == "Customer"){
					$this->redir(URL_BASE . "default/index");
				}
			}else{
				$access_denied = true;
			}
    	}
    }

}

?>