<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="<?php echo URL_BASE.'templates/default';?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo URL_BASE.'templates/default';?>/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo URL_BASE.'templates/default';?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL_BASE.'templates/default';?>/css/layout.css">
    <link rel="stylesheet" href="<?php echo URL_BASE.'templates/default';?>/css/modal.css">
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
                }
                else
                {
                    $("#main-right").show();
                    $("div#main-content").removeClass("col-sm-12");
                    $("div#main-content").addClass("col-sm-9");
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


        //Event call login page
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        var modal1 = document.getElementById('id02');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal1) {
                modal1.style.display = "none";
            }
        }

    </script>
    <title>PHP Coder</title>
</head>
<body>
    
    <div class="container-fluid" id="top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6" id="top-left">
                    <span class="glyphicon glyphicon-earphone" style="margin-right: 5px;"></span>Hotline: 0989.910.898
                </div>
                <div class="col-sm-6" id="top-right">
                    <span class="glyphicon glyphicon-user" style="margin-right: 5px;"></span><a href="#" onclick="document.getElementById('id02').style.display='block'"> Đăng ký </a>
                    <span><i class="fa fa-sign-in" style="font-size:18px;margin-right: 5px;margin-left: 10px;"></i><a href="#" onclick="document.getElementById('id01').style.display='block'">Đăng nhập</a></span>
                </div>
            </div>
        </div>
    </div>
    <!--end #top-->

    <nav class="navbar navbar-inverse" id="menu" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Khoá học
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
    <!--end nav-->
    
    <!--<div class="container-fluid bg" style="background-image: url('<?php //echo URL_BASE.'templates/default';?>/image/photo.jpg')">
        <div id="banner">
            Content
        </div>
    </div>
    <!--end #banner-->

    <!--<div class="container-fluid" id="main">
        <div class="container">
            <div class="row">
                <div class="col-sm-9" id="main-content">
                    <div class="container-fluid">
                    -->
                        <?php
                        require TEMPLATE;
                        ?>
                    </div>
                </div>
                <!--end .main-content-->
            
                <div class="col-sm-3" id="main-right">
                    <div class="course" style="box-shadow:none;">
                        <div class="container-fluid">
                            <div class="row" id="main-right-content">
                                <div class="main-right-content-header">TÌM KIẾM THEO CHỦ ĐỀ</div>
                                <div class="col-sm-12 main-right-content-search">
                                    <form action="#" method="GET">
                                            <div class="input-group">
                                              <input type="text" class="form-control" placeholder="Nhap tu khoa tim kiem" id="txtSearch"/>
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

    <div class="container-fluid footer">
        <div class="container">
            <div class="row footer-main">
                <div class="col-sm-9">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-4 footer-item">
                                <h3>Danh muc giam gia</h3>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, repudiandae corrupti molestias dolorum
                                    sunt adipisci obcaecati, alias delectus ipsa illo doloremque eum quam iusto atque debitis distinctio,
                                    natus qui! Cupiditate!</p>
                            </div>
                            <div class="col-sm-4 footer-item">
                                <h3>Danh muc giam gia</h3>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, repudiandae corrupti molestias dolorum
                                    sunt adipisci obcaecati, alias delectus ipsa illo doloremque eum quam iusto atque debitis distinctio,
                                    natus qui! Cupiditate!</p>
                            </div>
                
                            <div class="col-sm-4 footer-item">
                                <h3>Danh muc giam gia</h3>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, repudiandae corrupti molestias dolorum
                                    sunt adipisci obcaecati, alias delectus ipsa illo doloremque eum quam iusto atque debitis distinctio,
                                    natus qui! Cupiditate!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 info">
                    <div class="logo"><img src="<?php echo URL_BASE.'templates/default';?>/image/logo.png" width="50%"></div>
                    <div class="footer-info">
                        <span class="glyphicon glyphicon-user"></span> Tư vấn chuyên đề: 0989.910898 <br>
                        <span class="glyphicon glyphicon-phone-alt"></span> Hỗ trợ kỹ thuật: 0978.837.896 <br>
                        <span class="glyphicon glyphicon-envelope"></span> Email: thopn.hvcsnd@gmail.com <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid footer copyright">
        <div class="container">
            <div class="row footer-copyright">
                <div class="col-sm-12">@ Copyright 2018 by ThoPN</div>
            </div>
        </div>
    </div>
    <!--end #footer-->

    <div id="id01" class="modal">
        <form class="modal-content animate" action="/action_page.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="<?php echo URL_BASE.'templates/default'.'/image/img_avatar2.png';?>" alt="Avatar" class="avatar">
            </div>

            <div class="container-form">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Nhập địa chỉ email" name="email" required>

                <label for="psw"><b>Mật khẩu</b></label>
                <input type="password" placeholder="Nhập mật khẩu" name="psw" required>
            
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Ghi nhớ tài khoản
                </label>
                <button type="submit">Đăng nhập</button>
            </div>

            <div class="container-form" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Hủy</button>
                <span class="psw">Quên <a href="#">mật khẩu?</a></span>
            </div>
        </form>
    </div>

    <div id="id02" class="modal">
      <form class="modal-content" action="/action_page.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        <div class="container-form">
          <h1></h1>
          <p>Vui lòng điền thông tin để tạo tài khoản.</p>
          <hr>
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Nhập địa chỉ email" name="email" required>

          <label for="psw"><b>Mật khẩu</b></label>
          <input type="password" placeholder="Nhập mật khẩu" name="psw" required>

          <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
          <input type="password" placeholder="Nhập mật khẩu" name="psw-repeat" required>
          
          <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Ghi nhớ tài khoản
          </label>

          <p>Chính sách về tài khoản <a href="#" style="color:dodgerblue">Chính sách</a>.</p>

          <div class="clearfix">
            <button type="submit" class="signupbtn">Đăng ký</button>
          </div>
        </div>
      </form>
    </div>

</body>
</html>
