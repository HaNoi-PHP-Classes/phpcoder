<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang quản trị</title>
    <!--Css link-->
    <link rel="stylesheet" href="<?php echo URL_BASE;?>templates/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL_BASE;?>templates/admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URL_BASE;?>templates/admin/css/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>templates/admin/css/font-google.css">
    <!--JS source-->
    <script src="<?php echo URL_BASE;?>templates/admin/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo URL_BASE;?>templates/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo URL_BASE;?>templates/admin/js/bootbox.min.js"></script>
    <script src="<?php echo URL_BASE;?>templates/admin/js/custom.js"></script>
    <script src="<?php echo URL_BASE;?>templates/admin/ckeditor/ckeditor.js"></script>
    <link rel="icon" href="<?php echo URL_BASE.'templates/admin';?>/favicon.png">
</head>
<body>
	<?php
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){

	
	?>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
                </button>
				<a class="navbar-brand" href="#"><span>PHPcoder</span></a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
                        </a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <em class="fa fa-bell"></em><span class="label label-info">5</span>
                        </a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="<?php echo URL_BASE.'templates/admin/image/user-icon.png';?>" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $_SESSION['firstname'];?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="<?php echo URL_BASE;?>admin"><em class="fa fa-dashboard">&nbsp;</em> Bảng điều khiển</a></li>
			<li><a href="<?php echo URL_BASE;?>admin/index/course"><em class="glyphicon glyphicon-th-list">&nbsp;</em> Khóa học</a></li>
			<li><a href="#"><em class="glyphicon glyphicon-list-alt">&nbsp;</em> Danh mục</a></li>
			<li><a href="#"><em class="glyphicon glyphicon-user">&nbsp;</em> Quản lý User</a></li>
			<!--<li class="parent "><a dat a-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
					</a></li>
				</ul>
			</li>-->

			<li><a href="<?php echo URL_BASE .'admin/user/logout';?>"><em class="fa fa-power-off">&nbsp;</em> Đăng xuất</a></li>
		</ul>
	</div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    	<?php
            require TEMPLATE;
        ?>
    </div>	<!--/.main-->
	<?php
		}
		else{
			require 'application/admin/views/login.php';
		}
	?>
</body>
</html>