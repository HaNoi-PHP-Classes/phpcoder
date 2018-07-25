<?php
class Admin_Models_tblCourseAdmin extends Libs_Model{

    //object properties
    public $id;
    public $name;
    public $description;
    public $timestamp;
    public $price;
    public $category_id;

    public function __construct(){
        parent::__construct();
    }

    public function getAllCourse($from_record_number, $records_per_page){
        $query = "SELECT course_id, name, description, price, category_id FROM courses ORDER BY name ASC LIMIT {$from_record_number}, {$records_per_page}";

        $stmt = $this->model->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // used for paging course
    public function countAll(){
     
        $query = "SELECT course_id FROM courses";
    
        $stmt = $this->model->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
    }

    public function createCourse(){
        $query = "INSERT INTO courses SET name=:name, price=:price, description=:description, created=:created, category_id=:category_id";
        //$query = "INSERT INTO courses SET price=:price, created=:created, category_id=:category_id";

        $stmt = $this->model->conn->prepare($query);

        //Làm sạch dữ liệu của người dùng trước khi tiến hành xử lý
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->description = $this->description;
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->timestamp = date('Y-m-d H:i:s');

        //bind values
        $stmt->bindParam(":name",$this->name);
        $stmt->bindParam(":price",$this->price);
        $stmt->bindParam(":description",$this->description);
        $stmt->bindParam(":created",$this->timestamp);
        $stmt->bindParam(":category_id",$this->category_id);

        if ($stmt->execute()) {
            return true;
        }else{
            return false;
        }
    }


}
