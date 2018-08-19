<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="<?php echo URL_BASE.'templates/default';?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo URL_BASE.'templates/default';?>/js/bootstrap.min.js"></script>
    <script src="<?php echo URL_BASE.'templates/default';?>/js/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="<?php echo URL_BASE.'templates/default';?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL_BASE.'templates/default';?>/css/layout.css">
    <link rel="stylesheet" href="<?php echo URL_BASE.'templates/default';?>/css/modal.css">
    <link rel="stylesheet" href="<?php echo URL_BASE.'templates/default';?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo URL_BASE.'templates/default';?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo URL_BASE.'templates/default';?>/css/owl.theme.default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript" src="<?php echo URL_BASE.'templates/default';?>/scripts-syntax/XRegExp.js"></script>
       
       <!-- Thư viện cơ bản của SyntaxHighlighter -->
      
     <script type="text/javascript" src="<?php echo URL_BASE.'templates/default';?>/scripts-syntax/shCore.js"></script>
   
   <!-- Thư viện Highlight cho Javascript -->
   <script type="text/javascript" src="<?php echo URL_BASE.'templates/default';?>/scripts-syntax/shBrushJScript.js"></script>
   <script type="text/javascript" src="<?php echo URL_BASE.'templates/default';?>/scripts-syntax/shBrushPhp.js"></script>
   <script type="text/javascript" src="<?php echo URL_BASE.'templates/default';?>/scripts-syntax/shBrushSql.js"></script>
   <script type="text/javascript" src="<?php echo URL_BASE.'templates/default';?>/scripts-syntax/shBrushCss.js"></script>
   <script type="text/javascript" src="<?php echo URL_BASE.'templates/default';?>/scripts-syntax/shBrushPlain.js"></script>
   
   <link type="text/css" rel="stylesheet" href="<?php echo URL_BASE.'templates/default';?>/styles-syntax/shCore.css"/>
   <!-- Sử dụng Style mặc định -->
   <link type="text/css" rel="stylesheet" href="<?php echo URL_BASE.'templates/default';?>/styles-syntax/shThemeDefault.css"/>
   
   <!-- Highlight tất cả các code -->   
   <script type="text/javascript">SyntaxHighlighter.all();</script>    

    <link rel="icon" href="<?php echo URL_BASE.'templates/default';?>/favicon.png">
    <script type="text/javascript">
        $(document).ready(function(){
            //Show | Hide main-right
            $(window).resize(function(){
                if ($(this).width()<1024) {
                    //An|Hien|Add|Remove class cho menu-right khi thay doi kich thuoc man hinh
                    $("#main-right").hide();
                    $("div#main-content").removeClass("col-sm-9");
                    $("div#main-content").addClass("col-sm-12");
                    $(".icon-bar").hide();
                }
                else
                {
                    $("#main-right").show();
                    $("div#main-content").removeClass("col-sm-12");
                    $("div#main-content").addClass("col-sm-9");
                    $(".icon-bar").show();
                }
            });

            //Fix menu on top
            var menu = $("#menu");
            var right = $("#main-right");
            var menu_pos = menu.position();
            var right_pos = right.position();
            $(window).scroll(function(){
                var window_pos = $(window).scrollTop();
                if(window_pos >= menu_pos.top){
                    menu.addClass("fixed-menu");
                }else{
                    menu.removeClass("fixed-menu");
                }

                if(window_pos >= right_pos.top){
                    right.addClass("fixed-right");
                }else{
                    right.removeClass("fixed-right");
                }
            });
        });

    </script>
    <title>PHP Coder</title>
</head>
<body>
    
    <div class="container-fluid" id="top">
        <div class="container">
            <div class="row">
                <div class="col-sm-12" id="top-right">
                    <!--<span class="glyphicon glyphicon-user" style="margin-right: 0px;"></span><a href="#" onclick="document.getElementById('id02').style.display='block'"> Đăng ký </a>
                    <span><i class="fa fa-sign-in" style="font-size:18px;margin-right: 2px;margin-left: 10px;"></i><a href="#" onclick="document.getElementById('id01').style.display='block'">Đăng nhập</a></span>-->
                    <span class="glyphicon glyphicon-phone-alt"> Hotline: 0989.910.898</span>
                </div>
            </div>
        </div>
    </div>
    <!--end #top-->

    <nav class="navbar navbar-inverse" id="menu">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="glyphicon glyphicon-align-justify"></span>
                    </button>
                    <a class="navbar-brand" style="padding-top:4px;" href="<?php echo URL_BASE;?>">
                        <img src="<?php echo URL_BASE.'templates/default';?>/image/logo.png" alt="logo" width="110px" height="40px">
                    </a>
                </div>
    
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo URL_BASE;?>">Trang chủ</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Các chủ đề
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo URL_BASE.'default/listcourse/?id=1';?>">Bắt đầu với lập trình web</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="<?php echo URL_BASE.'default/listcourse/?id=2';?>">Lập trình với PHP</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="<?php echo URL_BASE.'default/listcourse/?id=3';?>">Lập trình với Javascript</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <?php
        require TEMPLATE;
    ?>
                    
    <div class="container-fluid footer">
        <div class="container" style="padding-left: 0px;">
            <div class="row footer-main">
                <div class="col-sm-9">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 footer-item-header header">
                                <h3>Các chủ đề có trong tương lai</h3>
                            </div>
                            <center>
                            <div id="owl-demo" class="col-sm-12 owl-carousel owl-theme" style="opacity: 1; display: block; text-align:center; padding-left: 4px;">
                                <div class="owl-wrapper-outer">
                                    <div class="owl-wrapper" style="display: block;">
                                        <div class="owl-item" style="width: 20%; padding-right: 2%">
                                            <div class="item">
                                                <a target="_blank" title="PHP" href="#">
                                                    <img alt="PHP" title="PHP" src="<?php echo URL_BASE.'templates/default';?>/image/php.png">
                                                    <h6 style="background-color:#3fbf79; margin-top:-2px; padding-top:10px;height:35px; border-bottom-left-radius:5px;border-bottom-right-radius:5px;">
                                                        PHP Framework
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 20%; padding-right: 2%">
                                            <div class="item">
                                                <a target="_blank" title="Front-End" href="#">
                                                    <img alt="Front-End" title="Front-End" src="<?php echo URL_BASE.'templates/default';?>/image/front-end.jpg">
                                                    <h6 style="background-color:#3fbf79; margin-top:-2px; padding-top:10px;height:35px; border-bottom-left-radius:5px;border-bottom-right-radius:5px;">
                                                        Font-End
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 20%; padding-right: 2%">
                                            <div class="item">
                                                <a target="_blank" title="NodeJS" href="#">
                                                    <img alt="nodejs" title="nodejs" src="<?php echo URL_BASE.'templates/default';?>/image/nodejs.png">
                                                    <h6 style="background-color:#3fbf79; margin-top:-2px; padding-top:10px;height:35px; border-bottom-left-radius:5px;border-bottom-right-radius:5px;">
                                                        NodeJS
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 20%; padding-right: 2%">
                                            <div class="item">
                                                <a target="_blank" title="react-native" href="#">
                                                    <img alt="react-native" title="react-native" src="<?php echo URL_BASE.'templates/default';?>/image/react-native.png">
                                                    <h6 style="background-color:#3fbf79; margin-top:-2px; padding-top:10px;height:35px; border-bottom-left-radius:5px;border-bottom-right-radius:5px;">
                                                        React-Native
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <div class="owl-item" style="width: 20%; padding-right: 2%">
                                            <div class="item">
                                                <a target="_blank" title="IOS" href="#">
                                                    <img alt="IOS" title="IOS" src="<?php echo URL_BASE.'templates/default';?>/image/ioscoban.png">
                                                    <h6 style="background-color:#3fbf79; margin-top:-2px; padding-top:10px;height:35px; border-bottom-left-radius:5px;border-bottom-right-radius:5px;">
                                                        IOS cơ bản
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 info">
                    <div class="logo"><img src="<?php echo URL_BASE.'templates/default';?>/image/logo.png" width="50%"></div>
                    <div class="footer-info">
                        <span class="glyphicon glyphicon-user"></span> Tư vấn chuyên đề: 0989.910.898 <br>
                        <span class="glyphicon glyphicon-phone-alt"></span> Hỗ trợ kỹ thuật: 0929.708.998 <br>
                        <span class="glyphicon glyphicon-envelope"></span> Email: admin@phpcoder.vn <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid footer copyright">
        <div class="container">
            <div class="row footer-copyright">
                <div class="col-sm-12">@ Copyright 2018 by phpcoder.vn</div>
            </div>
        </div>
    </div>
    <!--end #footer-->

</body>
</html>
