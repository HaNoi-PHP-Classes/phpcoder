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
		$query = "SELECT * FROM courses ORDER BY created DESC";
		$stmt = $this->model->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	public function getCategoryNameById(){
		$query = "SELECT name FROM categories WHERE category_id = ? LIMIT 0,1";
		$stmt = $this->model->conn->prepare($query);
		$stmt->bindParam(1, $this->id);

		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->name = $row['name'];
	}
}
