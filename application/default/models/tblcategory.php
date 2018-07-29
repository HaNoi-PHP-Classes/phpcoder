<?php
class Default_Models_tblCategory extends Libs_Model{

	public $id;
	public $name;
	public $description;
	public $timestamp;

	public function __construct(){
		parent::__construct();
	}

	public function getCategory(){
		$query = "SELECT category_id, name, description FROM categories ORDER BY category_id";

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
?>