<?php
class Admin_Models_tblCourseAdmin extends Libs_Model{
    //database connection and table name
    
    private $table_name = "courses";

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
        $query = "SELECT course_id, name, description, price, category_id FROM ". $this->table_name . " ORDER BY name ASC LIMIT {$from_record_number}, {$records_per_page}";

        $stmt = $this->model->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }


}
