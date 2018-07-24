<?php
class Libs_Database{
  
    private $host = DB_HOST;
    private $db_name = DB_DATA;
    private $username = DB_USER;
    private $password = DB_PASS;
    public $conn;
  
    public function __construct(){
        $this->getConnection();
    }
    
    // get the database connection
    public function getConnection(){
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name .";charset=UTF8", $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Quá trình kết nối xảy ra lỗi: " . $exception->getMessage();
        }
    }
    
    
}
?>