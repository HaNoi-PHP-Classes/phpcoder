<?php
class Default_Models_tblSubscribe extends Libs_Model{
    //object properties
    public $id;
    public $fullname;
    public $email;

	public function __construct(){
		parent::__construct();
    }
    
    public function checkEmail(){
        $query = "SELECT id, fullname FROM subscribe WHERE email=? LIMIT 0,1";
        $stmt = $this->model->conn->prepare($query);

        $this->email = htmlspecialchars(strip_tags($this->email));
        $stmt->bindParam(1,$this->email);
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num>0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->fullname = $row['fullname'];
            return true;
        }
        return false;
    }

    public function createSubscribe(){
        $query = "INSERT INTO subscribe SET fullname=:fullname, email=:email";
        $stmt = $this->model->conn->prepare($query);

        //Lam sach du lieu
        $this->fullname = htmlspecialchars(strip_tags($this->fullname));
        $this->email = htmlspecialchars(strip_tags($this->email));

        //bind value
        $stmt->bindParam(":fullname",$this->fullname);
        $stmt->bindParam(":email",$this->email);
        
        //Execute
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}

?>