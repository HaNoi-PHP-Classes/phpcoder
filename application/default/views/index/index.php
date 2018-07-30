    <div class="container-fluid bg" style="background-image: url('<?php echo URL_BASE.'templates/default';?>/image/photo.jpg')">
        <div id="banner">
            Content
        </div>
    </div>
    <!--end #banner-->

    <script type="text/javascript">
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); 
          js.id = id;
          js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script> 
    <div class="container-fluid" id="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-9" id="main-content">
                    <div class="container-fluid">                    

                        <div class="row" id="main-content-new">
                            <div class="main-content-course-header">
                                <span><a href="#">Chủ đề mới nhất</a></span>
                            </div>
                            <?php
                            function subtext($text, $num = 50)
                            {
                                if (strlen($text) <= $num) {
                                    return $text;
                                }
                                $text = substr($text, 0, $num);
                                if ($text[$num - 1] == ' ') {
                                    return trim($text) . "...";
                                }
                                $x = explode(" ", $text);
                                $sz = sizeof($x);
                                if ($sz <= 1) {
                                    return $text . "...";}
                                $x[$sz - 1] = '';
                                return trim(implode(" ", $x)) . "...";
                            }

                            if($this->numCourse>0){
                                while ($row = $this->course->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                            ?>

                            <div class="col-sm-4">
                                <div class="course">
                                    <div class="course-img">
                                        <a href="<?php echo URL_BASE.'default/course/?id='.$course_id;?>"><img src="<?php echo URL_BASE . 'templates/admin/image/thumbnail/'.$image; ?>" alt="Khoa hoc 1" width="100%" height="inherit"></a>
                                    </div>
                                    <div class="course-social">
                                        <!--Like: <span class="glyphicon glyphicon-heart-empty"></span>
                                        Share: <i class="fa fa-share-alt" aria-hidden="true"></i>-->
                                        <div class="fb-like" data-href="<?php echo URL_BASE.'default/course/?id='.$course_id;?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                    </div>
                                    <div class="course-name"><a href="<?php echo URL_BASE.'default/course/?id='.$course_id;?>"><?php echo $name;?></a></div>
                                    <!--<div class="course-description"><?php //echo subtext($description);?></div>-->
                                    <div class="course-profile">
                                        <table>
                                            <tr>
                                                <?php 
                                                $category = new Default_Models_tblCategory();
                                                $category->id = $category_id;
                                                $category->getCategoryNameById();
                                                ?>
                                                <td><span class="glyphicon glyphicon-list"></span><br><?php echo $category->name;?></td>
                                                <td><span class="glyphicon glyphicon-comment"></span><br>300 comments</td>
                                                <td><span class="glyphicon glyphicon-eye-open"></span><br>200 views</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <?php 
                                }
                            }else{
								    echo "<div class='alert alert-info'>Không tìm thấy khóa học nào.</div>";
								}
                            ?>

                        </div>
                        <!--end #main-content-new-->
                        <?php
                        $categoryObj = new Default_Models_tblCategory();
                        $categories = $categoryObj->getCategory();
                        $numCategory = $categories->rowCount();
                        if($numCategory>0){
                            while ($row = $categories->fetch(PDO::FETCH_ASSOC)){
                                extract($row);
                                $courseObj = new Default_Models_tblCourse();
                                $courseObj->category_id = $category_id;
                                $course = $courseObj->getCourseByCategoryId();
                                if($course->rowCount()>0)
                                {

                                    $categoryObj->id = $category_id;
                                    $categoryObj->getCategoryNameById();
                                    while($rowCourse = $course->fetch(PDO::FETCH_ASSOC))
                                    {   
                        ?>
                                    <div class="row main-content-course">
                                        <div class="main-content-course-header">
                                            <span><a href="#"><?php echo $description;?></a></span>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="course">
                                                <div class="course-img">
                                                    <a href="<?php echo URL_BASE.'default/course/?id='.$rowCourse['course_id'];?>"><img src="<?php echo URL_BASE . 'templates/admin/image/thumbnail/'.$rowCourse['image']; ?>" alt="<?php echo $rowCourse['name'];?>" width="100%" height="inherit"></a>
                                                </div>
                                                <div class="course-social">
                                                    <!--Like: <span class="glyphicon glyphicon-heart-empty"></span>
                                                    Share: <i class="fa fa-share-alt" aria-hidden="true"></i>-->
                                                    <div class="fb-like" data-href="<?php echo URL_BASE.'default/course/?id='.$rowCourse['course_id'];?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                                </div>
                                                <div class="course-name">
                                                    <div class="course-name"><a href="<?php echo URL_BASE.'default/course/?id='.$rowCourse['course_id'];?>"><?php echo $rowCourse['name'];?></a></div>
                                                </div>
                                                <!--<div class="course-description">Mô tả tóm tắt bài học ...</div>-->
                                                <div class="course-profile">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <span class="glyphicon glyphicon-list"></span>
                                                                <br><?php echo $categoryObj->name;?></td>
                                                            <td>
                                                                <span class="glyphicon glyphicon-comment"></span>
                                                                <br>300 comments</td>
                                                            <td>
                                                                <span class="glyphicon glyphicon-eye-open"></span>
                                                                <br>200 views</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                        <!--end #main-content-course-->