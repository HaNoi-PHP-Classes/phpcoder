<?php
class Default_Controllers_Customer extends Libs_Controller{


    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }

    public function login(){
    	if($_POST){
    		$customerObj = new Default_Models_tblCustomer();
			//$customer->email = $_POST['email'];
			//if($customer->emailExists()){
				$_SESSION['logged_in']=true;
    			$_SESSION['firstname'] = htmlspecialchars(strip_tags($_POST['email']));
    			$this->redir(URL_BASE."default/index");
    			//$this->view->render('customer/index');
			//}
    		
    	}
    }

}

?>