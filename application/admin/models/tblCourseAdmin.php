<?php
class Admin_Models_tblCourseAdmin extends Libs_Model{

    //object properties
    public $id;
    public $name;
    public $description;
    public $timestamp;
    public $price;

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

}
