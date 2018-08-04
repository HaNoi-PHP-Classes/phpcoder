<?php
class Default_Models_tblCustomer extends Libs_Model{
    //object properties
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $contact_number;
    public $address;
    public $password;
    public $access_level;
    public $access_code;
    public $status;
    public $created;
    public $modified;

    public function __construct(){
        parent::__construct();
    }

    public function checkEmail(){
        $query = "SELECT id, firstname, lastname, access_level, password, status FROM customers WHERE email=? LIMIT 0,1";
        $stmt = $this->model->conn->prepare($query);

        $this->email = htmlspecialchars(strip_tags($this->email));
        $stmt->bindParam(1,$this->email);
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num>0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->firstname = $row['firstname'];
            $this->lastname = $row['lastname'];
            $this->access_level = $row['access_level'];
            $this->password = $row['password'];
            $this->status = $row['status'];

            return true;
        }
        return false;
    }

    public function createCustomer(){
        $this->created = date('Y-m-d H:i:s');
        $query = "INSERT INTO customers SET email=:email, password=:password, status=:status, access_level=:access_level, created=:created";
        $stmt = $this->model->conn->prepare($query);

        //Lam sach du lieu
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->access_level = htmlspecialchars(strip_tags($this->access_level));

        //bind value
        $stmt->bindParam(":email",$this->email);
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(":password",$password_hash);
        $stmt->bindParam(":access_level", $this->access_level);
        $stmt->bindParam(":created",$this->created);
        $stmt->bindParam(":status",$this->status);

        //Execute
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
