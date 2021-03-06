<?php
class Admin_Models_tblCourse extends Libs_Model{

    //object properties
    public $id;
    public $name;
    public $description;
    public $content;
    public $timestamp;
    public $price;
    public $category_id;
    public $image;

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
        $query = "INSERT INTO courses SET name=:name, price=:price, description=:description, content=:content, created=:created, category_id=:category_id, image=:image";
        //$query = "INSERT INTO courses SET price=:price, created=:created, category_id=:category_id";

        $stmt = $this->model->conn->prepare($query);

        //Làm sạch dữ liệu của người dùng trước khi tiến hành xử lý
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->content = $this->content;
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->timestamp = date('Y-m-d H:i:s');
        $this->image = htmlspecialchars(strip_tags($this->image));

        //bind values
        $stmt->bindParam(":name",$this->name);
        $stmt->bindParam(":price",$this->price);
        $stmt->bindParam(":description",$this->description);
        $stmt->bindParam(":content",$this->content);
        $stmt->bindParam(":created",$this->timestamp);
        $stmt->bindParam(":category_id",$this->category_id);
        $stmt->bindParam(":image",$this->image);

        if ($stmt->execute()) {
            return true;
        }else{
            return false;
        }
    }

    public function getCourseById(){
        $query = "SELECT course_id, name, description, content, price, category_id, user_id FROM courses WHERE course_id = ? LIMIT 0,1";
        $stmt = $this->model->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function updateproccess(){
        $query = "UPDATE courses SET name=:name, description=:description, price=:price, content=:content, category_id=:category_id, modified=:modified WHERE course_id=:id";
        $stmt = $this->model->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->content = $this->content;
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->timestamp = date('Y-m-d H:i:s');

        $stmt->bindParam(":name",$this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":modified",$this->timestamp);

        if($stmt->execute()){
            return true;
        }else {
            return false;
        }
    }

}
