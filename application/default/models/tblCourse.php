<?php
class Default_Models_tblCourse extends Libs_Model{
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

	public function getAllCourse(){
		$query = "SELECT * FROM courses ORDER BY created DESC LIMIT 6";
		$stmt = $this->model->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	public function getCourseById(){
		$query = "SELECT * FROM courses WHERE course_id = ? LIMIT 0,1";
		$stmt = $this->model->conn->prepare($query);
		$stmt->bindParam(1, $this->id);

		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}

	public function getCourseByCategoryId(){
		$query = "SELECT * FROM courses WHERE category_id = ? LIMIT 0,1";
		$stmt = $this->model->conn->prepare($query);
		$stmt->bindParam(1, $this->category_id);

		$stmt->execute();
		return $stmt;
	}

}
