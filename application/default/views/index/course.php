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

    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); 
          js.id = id;
          js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        $(function(){
            var url = window.location.href;
            var apiUrl = 'https://graph.facebook.com/?ids='+url;

            $.ajax({url: apiUrl, success: function(result){

                $.each( result, function( key, val ) {
                    console.log(key + ' - ' + val['share']['share_count']);
                    var shareCount = val['share']['share_count'];
                    $(".share-count").html(shareCount);
                });
            }});
        });
    </script>

    <div class="icon-bar">
        <a href="#" class="facebook"><i class="fa fa-facebook"><br><span class="share-count"></span></i></a> 
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
                            extract($this->course);

                            //Get category name and all category by category_id
                            $categoryObj = new Default_Models_tblCategory();
                            $categories = $categoryObj->getCategory();
                            $numCategory = $categories->rowCount();

                            $categoryObj->id = $category_id;
                            $categoryObj->getCategoryNameById();
                        ?>
                    	<div class="main-content-path">
                                <a href="<?php echo URL_BASE;?>">Trang chủ</span></a> > 
                                <a href="<?php echo URL_BASE.'default/listcourse/?id='.$category_id;?>"><?php echo $categoryObj->name; ?></span></a>
                        </div>

						<div class="row main-content-course">
                            <div class="main-content-course-header" style="border-bottom:1px solid #fff;">
                                <span style="background-color:#fff;padding-left:0px;color:#000;">
                                    <?php echo $name;?>
                                </span>
                            </div>
                            <div class="main-content-course-profile">
                                <div>Ngày cập nhật: <?php echo date_format($modified,'d/m/Y');?> | Ngày viết: 10/7/2018 | Tác giả: ThoPN</div>
                                
                                <div class="fb-like" data-href="<?php echo URL_BASE.'default/course/?id='.$course_id;?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

                            </div>
                            <div class="col-sm-12">
                                <div class="course-description"><?php echo $description;?></div>
                                <div class="course-content">
                                    <?php echo $content;?>
                                </div>
                            </div>
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

                                <div class="main-right-content-header">Chủ đề liên quan</div>
                                <div class="col-sm-12 main-right-content-category">
                                    <?php
                                    $courseObj = new Default_Models_tblCourse();
                                    $courseObj->category_id = $category_id;
                                    $courseRows = $courseObj->getCourseByCategoryId();
                                    $numCourse = $courseRows->rowCount();
                                    if($numCourse>0){
                                        while ($row = $courseRows->fetch(PDO::FETCH_ASSOC)){
                                             
                                    ?>
                                            <div class="category">
                                                <a href="<?php echo URL_BASE.'default/course/?id='.$row['course_id']; ?>"><?php echo $row['name'];?></a>
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