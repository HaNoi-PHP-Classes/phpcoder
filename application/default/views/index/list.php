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
    <style type="text/css">
    .icon-bar {
    position: fixed;
    top: 45%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    }

    .icon-bar a {
        display: block;
        text-align: center;
        padding: 13px;
        transition: all 0.3s ease;
        color: white;
        font-size: 23px;
    }
    .icon-bar span{
        font-size:14px;
    }

    .icon-bar a:hover {
        background-color: #000;
    }

    .facebook {
        background: #3B5998;
        color: white;
    }

    .twitter {
        background: #55ACEE;
        color: white;
    }

    .google {
        background: #dd4b39;
        color: white;
    }

    .linkedin {
        background: #007bb5;
        color: white;
    }

    .youtube {
        background: #bb0000;
        color: white;
    }
    </style>

    <div class="icon-bar">
        <a href="#" class="facebook"><i class="fa fa-facebook"><br><span>200</span></i></a> 
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> 
        <a href="#" class="google"><i class="fa fa-google"></i></a> 
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
        <a href="#" class="youtube"><i class="fa fa-youtube"></i></a> 
    </div>

     <div class="container-fluid" id="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-9" id="main-content">
                    <div class="container-fluid">

                        <?php
                            if(isset($_REQUEST['id'])){
                                $id = $_REQUEST['id'];
                                $catObj = new Default_Models_tblCategory();
                                $catObj->id = $id;
                                $catObj->getCategoryNameById();
                        }
                            
                        ?>
                        <div class="main-content-path">
                                <a href="<?php echo URL_BASE;?>">Trang chủ</span></a> > 
                                <a href="<?php echo URL_BASE.'default/listcourse/?id='.$_REQUEST['id'];?>"><?php echo $catObj->name;?></span></a>
                        </div>
                        
                        <div class="row main-content-course">
                            <!--start brecrum | path-->
                            
                            <div class="main-content-course-header">
                                <span><?php echo $catObj->description; ?></span>
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
                                    $catObj->id = $category_id;
                                    $catObj->getCategoryNameById();
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
                                                <td><span class="glyphicon glyphicon-list"></span><br><?php echo $catObj->name;?></td>
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

                         </div>
                </div>
                <!--end .main-content-->
            
                <div class="col-sm-3" id="main-right">
                    <div class="course" style="box-shadow:none;">
                        <div class="container-fluid">
                            <div class="row" id="main-right-content">
                                <div class="main-right-content-header">TÌM KIẾM THEO CHỦ ĐỀ</div>
                                <div class="col-sm-12 main-right-content-search">
                                    <form action="<?php echo URL_BASE.'default/search/'?>" method="GET">
                                            <div class="input-group">
                                              <input type="text" class="form-control" placeholder="Nhap tu khoa tim kiem" id="name" name="name" />
                                              <div class="input-group-btn">
                                                <button class="btn btn-primary" style="background-color:#000;" type="submit">
                                                  <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                              </div>
                                            </div>
                                      </form>
                                </div>
                                <!--end main-right-content-search-->
                                
                                <div class="main-right-content-header">Các chủ đề có tại php coder</div>
                                <div class="col-sm-12 main-right-content-category">
                                    <?php
                                    $categoryObj = new Default_Models_tblCategory();
                                    $categories = $categoryObj->getCategory();
                                    $numCategory = $categories->rowCount();
                                    if($numCategory>0){
                                        while ($row = $categories->fetch(PDO::FETCH_ASSOC)){
                                             
                                    ?>
                                            <div class="category">
                                                <span class="glyphicon glyphicon-ok"></span><a href="<?php echo URL_BASE.'default/listcourse/?id='.$row['category_id']; ?>"><?php echo $row['description'];?></a>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end #main-right-->
            </div>
        </div>
    </div>
    <!--end #main-->