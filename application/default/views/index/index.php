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
                                <span><a href="#">Chủ đề xem nhiều</a></span>
                            </div>
                            <div class="col-sm-4">
                                <div class="course">
                                    <div class="course-img">
                                        <a href="<?php echo URL_BASE.'course/?id=1';?>"><img src="<?php echo URL_BASE . 'templates/default'; ?>/image/img1.jpg" alt="Khoa hoc 1" width="100%" height="inherit"></a>
                                    </div>
                                    <div class="course-social">
                                        <!--Like: <span class="glyphicon glyphicon-heart-empty"></span>
                                        Share: <i class="fa fa-share-alt" aria-hidden="true"></i>-->
                                        <div class="fb-like" data-href="<?php echo URL_BASE.'course/?id=1';?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                    </div>
                                    <div class="course-name"><a href="<?php echo URL_BASE.'course/?id=1';?>">Làm thế nào để chạy một kịch bản PHP? Hướng dẫn từng bước</a></div>
                                    <div class="course-description">Mô tả tóm tắt bài học ...</div>
                                    <div class="course-profile">
                                        <table>
                                            <tr>
                                                <td><span class="glyphicon glyphicon-list"></span><br>PHP</td>
                                                <td><span class="glyphicon glyphicon-comment"></span><br>300 comments</td>
                                                <td><span class="glyphicon glyphicon-eye-open"></span><br>200 views</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="course">
                                    <div class="course-img">
                                        <a href="<?php echo URL_BASE.'course/?id=2';?>">
                                            <img src="<?php echo URL_BASE . 'templates/default'; ?>/image/img3.jpg" alt="Khoa hoc 1" width="100%" height="inherit">
                                        </a>
                                    </div>
                                    <div class="course-social">
                                        Like:
                                        <span class="glyphicon glyphicon-heart-empty"></span>
                                        Share:
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="course-name">
                                        <a href="<?php echo URL_BASE.'course/?id=2';?>">Làm thế nào để chạy một kịch bản PHP? Hướng dẫn từng bước</a>
                                    </div>
                                    <div class="course-description">Mô tả tóm tắt bài học ...</div>
                                    <div class="course-profile">
                                        <table>
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-list"></span>
                                                    <br>PHP</td>
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
                            <div class="col-sm-4">
                                <div class="course">
                                    <div class="course-img">
                                        <img src="<?php echo URL_BASE . 'templates/default'; ?>/image/img4.jpg" alt="Khoa hoc 1" width="100%" height="inherit">
                                    </div>
                                    <div class="course-social">
                                        Like:
                                        <span class="glyphicon glyphicon-heart-empty"></span>
                                        Share:
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="course-name">
                                        <a href="#">Làm thế nào để chạy một kịch bản PHP? Hướng dẫn từng bước</a>
                                    </div>
                                    <div class="course-description">Mô tả tóm tắt bài học ...</div>
                                    <div class="course-profile">
                                        <table>
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-list"></span>
                                                    <br>PHP</td>
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
                        <!--end #main-content-new-->
                        <div class="row main-content-course">
                            <div class="main-content-course-header">
                                <span><a href="#">Bắt đầu với lập trình web</a></span>
                            </div>
                            <div class="col-sm-4">
                                <div class="course">
                                    <div class="course-img">
                                        <img src="<?php echo URL_BASE . 'templates/default'; ?>/image/img4.jpg" alt="Khoa hoc 1" width="100%" height="inherit">
                                    </div>
                                    <div class="course-social">
                                        Like:
                                        <span class="glyphicon glyphicon-heart-empty"></span>
                                        Share:
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="course-name">
                                        <a href="#">Làm thế nào để chạy một kịch bản PHP? Hướng dẫn từng bước</a>
                                    </div>
                                    <div class="course-description">Mô tả tóm tắt bài học ...</div>
                                    <div class="course-profile">
                                        <table>
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-list"></span>
                                                    <br>PHP</td>
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
                            <div class="col-sm-4">
                                <div class="course">
                                    <div class="course-img">
                                        <img src="<?php echo URL_BASE . 'templates/default'; ?>/image/img4.jpg" alt="Khoa hoc 1" width="100%" height="inherit">
                                    </div>
                                    <div class="course-social">
                                        Like:
                                        <span class="glyphicon glyphicon-heart-empty"></span>
                                        Share:
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="course-name">
                                        <a href="#">Làm thế nào để chạy một kịch bản PHP? Hướng dẫn từng bước</a>
                                    </div>
                                    <div class="course-description">Mô tả tóm tắt bài học ...</div>
                                    <div class="course-profile">
                                        <table>
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-list"></span>
                                                    <br>PHP</td>
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
                            <div class="col-sm-4">
                                <div class="course">
                                    <div class="course-img">
                                        <img src="<?php echo URL_BASE . 'templates/default'; ?>/image/img4.jpg" alt="Khoa hoc 1" width="100%" height="inherit">
                                    </div>
                                    <div class="course-social">
                                        Like:
                                        <span class="glyphicon glyphicon-heart-empty"></span>
                                        Share:
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="course-name">
                                        <a href="#">Làm thế nào để chạy một kịch bản PHP? Hướng dẫn từng bước</a>
                                    </div>
                                    <div class="course-description">Mô tả tóm tắt bài học ...</div>
                                    <div class="course-profile">
                                        <table>
                                            <tr>
                                                <td>
                                                    <span class="glyphicon glyphicon-list"></span>
                                                    <br>PHP</td>
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
                        <!--end #main-content-course-->