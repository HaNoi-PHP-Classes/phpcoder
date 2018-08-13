<?php
class Default_Models_tblSubscribe extends Libs_Model{
    //object properties
    public $id;
    public $fullname;
    public $email;
    public $status;
    public $access_code;

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
        $query = "INSERT INTO subscribe SET fullname=:fullname, email=:email, status=:status, access_code=:access_code";
        $stmt = $this->model->conn->prepare($query);

        //Lam sach du lieu
        $this->fullname = htmlspecialchars(strip_tags($this->fullname));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->status = 0;
        $this->access_code = htmlspecialchars(strip_tags($this->getToken()));

        //bind value
        $stmt->bindParam(":fullname",$this->fullname);
        $stmt->bindParam(":email",$this->email);
        $stmt->bindParam(":status",$this->status);
        $stmt->bindParam(":access_code",$this->access_code);
        
        //Execute
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getToken($length=32){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        for($i=0;$i<$length;$i++){
            $token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
        }
        return $token;
    }
     
    public function crypto_rand_secure($min, $max) {
        $range = $max - $min;
        if ($range < 0) return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    public function checkAccessCode(){
        $query = "SELECT id FROM subscribe WHERE access_code = ? LIMIT 0,1";
        $stmt = $this->model->conn->prepare($query);

        $this->access_code = htmlspecialchars(strip_tags($this->access_code)); 
        $stmt->bindParam(1, $this->access_code);
        $stmt->execute();
        $num = $stmt->rowCount();

        if($num>0){
            return true;
        }
        return false;
    }

    public function activeSubscribe(){
        $query = "UPDATE subscribe SET status=:status WHERE access_code=:access_code";
        $stmt = $this->model->conn->prepare($query);

        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->access_code = htmlspecialchars(strip_tags($this->access_code));

        $stmt->bindParam(":status",$this->status);
        $stmt->bindParam(":access_code",$this->access_code);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

}

?>