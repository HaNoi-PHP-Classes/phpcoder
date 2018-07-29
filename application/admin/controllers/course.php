<?php
class Admin_Controllers_Course extends Libs_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function add(){
        $categoryObj = new Admin_Models_tblCategory();
        $category = $categoryObj->getCategory();
        $this->view->category = $category;
        $this->view->render("course/add");
    }

    public function uploadImage($img){
        $result_message = "";

        if(!empty($img)){
            $target_directory = "templates/admin/image/thumbnail/";
            $target_file = $target_directory.$img;
            $file_type = pathinfo($target_file,PATHINFO_EXTENSION);

            // error message is empty
            $file_upload_error_messages="";
            // make sure that file is a real image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check!==false){
            // submitted file is an image
            }else{
                $file_upload_error_messages.="<div>Đây không phải là file ảnh.</div>";
            }
             
            // make sure certain file types are allowed
            $allowed_file_types=array("jpg", "jpeg", "png", "gif");
            if(!in_array($file_type, $allowed_file_types)){
                $file_upload_error_messages.="<div>Chỉ cho phép các định dạng: JPG, JPEG, PNG, GIF.</div>";
            }
             
            // make sure file does not exist
            if(file_exists($target_file)){
                $file_upload_error_messages.="<div>Ảnh này đã tồn tại. Vui lòng đổi tên khác.</div>";
            }
             
            // make sure submitted file is not too large, can't be larger than 1 MB
            if($_FILES['image']['size'] > (2048000)){
                $file_upload_error_messages.="<div>Kích thước ảnh không được quá 2 MB.</div>";
            }
             
            // make sure the 'uploads' folder exists
            // if not, create it
            if(!is_dir($target_directory)){
                mkdir($target_directory, 0777, true);
            }

            // if $file_upload_error_messages is still empty
            if(empty($file_upload_error_messages)){
                // it means there are no errors, so try to upload the file
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                    // it means photo was uploaded
                }else{
                    $result_message.="<div class='alert alert-danger'>";
                        $result_message.="<div>Unable to upload photo.</div>";
                        $result_message.="<div>Update the record to upload photo.</div>";
                    $result_message.="</div>";
                }
            }
             
            // if $file_upload_error_messages is NOT empty
            else{
                // it means there are some errors, so show them to user
                $result_message.="<div class='alert alert-danger'>";
                    $result_message.="{$file_upload_error_messages}";
                    $result_message.="<div>Update the record to upload photo.</div>";
                $result_message.="</div>";
            }
        }

        return $result_message;
    }

    public function addprocess(){
        //Lấy dữ liệu trên form người dùng nhập
        if ($_POST) {
            $course = new Admin_Models_tblCourse();
            $course->name = $_POST['name'];
            $course->price = $_POST['price'];
            $course->description = $_POST['description'];
            $course->content = $_POST['content'];
            $course->category_id = $_POST['category_id'];

            $image = !empty($_FILES['image']['name']) ? sha1_file($_FILES['image']['tmp_name'])."-".basename($_FILES['image']['name']) : "";
            //$image = $_FILES['image']['name'];
            $course->image = $image;

            if($course->createCourse()){
                echo "<script>
                        alert('Thêm mới khoá học thành công!');
                      </script>";

                echo $this->uploadImage($image);

                $this->redir(URL_BASE."admin/course/add");
            }else{
                $_SESSION['msg'] = "<div class='alert alert-success fade in'>Thêm mới khóa học thất bại.</div>";
                $this->redir(URL_BASE."admin/course/add");
            }
        }
    }

}

?>