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

                        <div class="main-content-path">
                                <a href="<?php echo URL_BASE;?>">Trang chủ</span></a> > 
                                <a href="<?php echo URL_BASE;?>">PHP</span></a>
                        </div>
                        
                        <div class="row main-content-course">
                            <!--start brecrum | path-->
                            <div class="main-content-course-header">
                                <span><a href="#">Bắt đầu với lập trình web</a></span>
                            </div>
                            <div class="col-sm-4">
                                <div class="course">
                                    <div class="course-img">
                                        <a href="<?php echo URL_BASE.'default/course/?id=1';?>">
                                            <img src="<?php echo URL_BASE . 'templates/default'; ?>/image/img4.jpg" alt="Khoa hoc 1" width="100%" height="inherit">
                                        </a>
                                    </div>
                                    <div class="course-social">
                                        Like:
                                        <span class="glyphicon glyphicon-heart-empty"></span>
                                        Share:
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="course-name">
                                        <a href="<?php echo URL_BASE.'default/course/?id=1';?>">Làm thế nào để chạy một kịch bản PHP? Hướng dẫn từng bước</a>
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
                                        <a href="<?php echo URL_BASE.'default/course/?id=2';?>">
                                            <img src="<?php echo URL_BASE . 'templates/default'; ?>/image/img4.jpg" alt="Khoa hoc 1" width="100%" height="inherit">
                                        </a>
                                    </div>
                                    <div class="course-social">
                                        Like:
                                        <span class="glyphicon glyphicon-heart-empty"></span>
                                        Share:
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="course-name">
                                        <a href="<?php echo URL_BASE.'default/course/?id=2';?>">Làm thế nào để chạy một kịch bản PHP? Hướng dẫn từng bước</a>
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
                                        <a href="<?php echo URL_BASE.'default/course/?id=3';?>">
                                            <img src="<?php echo URL_BASE . 'templates/default'; ?>/image/img4.jpg" alt="Khoa hoc 1" width="100%" height="inherit">
                                        </a>
                                    </div>
                                    <div class="course-social">
                                        Like:
                                        <span class="glyphicon glyphicon-heart-empty"></span>
                                        Share:
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="course-name">
                                        <a href="<?php echo URL_BASE.'default/course/?id=3';?>">Làm thế nào để chạy một kịch bản PHP? Hướng dẫn từng bước</a>
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