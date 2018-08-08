<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- set the page title, for seo purposes too -->
    <title></title>
 
    <!-- Bootstrap CSS -->
    <link href="<?php echo URL_BASE . 'templates/default/css/bootstrap.min.css';?>" rel="stylesheet" media="screen" />
 
    <!-- admin custom CSS -->
    <style type="text/css">
        .margin-bottom-1em{ margin-bottom:1em; }
        .width-30-percent{ width:30%; }
        .margin-1em-zero{ margin:1em 0; }
        .width-30-percent{ width:30%; }
        .width-70-percent{ width:70%; }
        .margin-top-40{ margin-top:40px; }
        .text-align-center{ text-align:center; }
        
        div#blueimp-gallery div.modal{ overflow: visible; }
        
        .photo-thumb{
            width:214px;
            height:214px;
            float:left;
            border: thin solid #d1d1d1;
            margin:0 1em 1em 0;
        }
        
        .form-signin{
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        
        .form-signin .form-control{
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        
        .form-signin .form-control:focus{ z-index: 2; }
        
        .form-signin input[type="text"]{
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        
        .form-signin input[type="password"]{
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        
        .account-wall{
            margin-top: 40px;
            padding: 40px 0px 20px 0px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.16);
        }
        
        .login-title{
            color: #555;
            font-size: 22px;
            font-weight: 400;
            display: block;
        }
        
        .profile-img{
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
        
        .select-img{
            border-radius: 50%;
            display: block;
            height: 75px;
            margin: 0 30px 10px;
            width: 75px;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
        
        .select-name{
            display: block;
            margin: 30px 10px 10px;
        }
        
        .logo-img{
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
    </style>
 
</head>
<body style="padding-top:0px;">
<!-- container -->
    <div class="container">
        <?php
        echo "<div class='col-sm-6 col-md-4 col-md-offset-4'>";

        // alert messages will be here
        if($_POST){
            $user = new Admin_Models_tblUser();
            $user->email = $_POST['email'];
            if($user->checkEmail() && password_verify($_POST['password'],$user->password) && $user->status==1){
                if($user->access_level == "Customer"){
                    echo "<div class='alert alert-danger'>Bạn không có quyền truy cập hệ thống.</div>";
                } else{
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_id'] = $user->id;
                    $_SESSION['access_level'] = $user->access_level;
                    $_SESSION['firstname'] = $user->firstname;
                    $_SESSION['lastname'] = $user->lastname;
                    $_SESSION['email'] = $user->email;

                    echo "<script language='javascript'>window.location.href='" . URL_BASE . "admin/index'</script>";
                    exit();
                }
            }
            else{
                echo "<div class='alert alert-danger'>Tên đăng nhập hoặc mật khẩu khôgn đúng.</div>";
            }
        }
        // actual HTML login form
            echo "<div class='account-wall'>";
            echo "<div id='my-tab-content' class='tab-content'>";
            echo "<div class='tab-pane active' id='login'>";
            echo "<img class='profile-img' src='".URL_BASE ."templates/admin/image/login-icon.png'>";
            echo "<form class='form-signin' action='' method='post'>";
            echo "<input type='text' name='email' class='form-control' placeholder='Tên đăng nhập' required autofocus />";
            echo "<input type='password' name='password' class='form-control' placeholder='Mật khẩu' required />";
            echo "<input type='submit' class='btn btn-lg btn-primary btn-block' value='Đăng nhập' />";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

        echo "</div>";
        ?>
    </div>
    <!-- /container -->
 
<!-- jQuery library -->
<script src="<?php echo URL_BASE.'templates/default/js/jquery-3.3.1.min.js'; ?>"></script>
 
<!-- Bootstrap JavaScript -->
<script src="<?php echo URL_BASE . 'templates/default/js//bootstrap.min.js'; ?>"></script>
 
<!-- end HTML page -->
</body>
</html>