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

                    	<div class="main-content-path">
                                <a href="<?php echo URL_BASE;?>">Trang chủ</span></a> > 
                                <a href="<?php echo URL_BASE;?>">PHP</span></a>
                        </div>

                        <?php
                            extract($this->courseRow);
                        ?>
						<div class="row main-content-course">
                            <div class="main-content-course-header" style="border-bottom:1px solid #fff;">
                                <span style="background-color:#fff;padding-left:0px;"><a href="#" style="color:#000;">CURD - Tạo, Đọc, Cập nhật, Xóa dữ liệu các bản ghi trong cơ sở dữ liệu</a></span>
                            </div>
                            <div class="main-content-course-profile">
                                <div>Ngày cập nhật: 17/7/2018 | Ngày viết: 10/7/2018 | Tác giả: ThoPN</div>
                                
                                <div class="fb-like" data-href="<?php echo URL_BASE.'default/course/?id='.$course_id;?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

                            </div>
                            <div class="col-sm-12">
                                <div class="course-description"><?php echo $description;?></div>
                                <div class="course-content">
                                    <?php echo $content;?>
                                </div>
                            </div>
                        </div>
                        