<?php
class Default_Models_tblCourse extends Libs_Model{
    private $courseId;
    private $courseName;
    //....
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getAllCourse(){
        return $this->model->fetchAll("SELECT * FROM course");
    }
    
    public function getCourseById($id){
        return $this->model->fetchOne("SELECT * FROM course WHERE id=$id");
    }
    
    public function getCourseByName($name){
        
    }
    
    public function getCourseByCatId($catId)
    {
        
    }
    
    public function getCourseOptions($arrParam){
        
    }
    
    public function addCommentByCourseId($id){
        
    }
    
}
