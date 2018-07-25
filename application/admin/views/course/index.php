		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Khóa học</li>
			</ol>
		</div><!--/.row breadcrumb-->
        
        <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<b>Quản lý khóa học</b>
						<span class="pull-right clickable panel-button-tab-left">
							<a href='<?php echo URL_BASE?>admin/course/add' class='btn btn-primary pull-right'>
								<span class="glyphicon glyphicon-plus"></span> Thêm
							</a>
							<!--<a href='<?php //echo URL_BASE?>admin/course/deleteselect' class='btn btn-danger pull-right'>
								<span class="glyphicon glyphicon-remove"></span> Xóa
							</a>-->
						</span>
					</div>	
					
					<div class="panel-body">
						

						<div class="canvas-wrapper">
								<!--Lấy các bản ghi từ CSDL-->
								<?php
								if($this->numCourse>0){
								 	$course = $this->course;
								    echo "<table class='table table-hover table-responsive table-bordered'>";
								        echo "<tr>";
								        	echo "<th><input type='checkbox' name='chkall'/></th>";
								            echo "<th style='text-align:center'>Khóa học</th>";
								            echo "<th style='text-align:center'>Giá</th>";
								            echo "<th style='text-align:center'>Mô tả</th>";
								            echo "<th style='text-align:center'>Danh mục</th>";
								            echo "<th style='text-align:center'>Chức năng</th>";
								        echo "</tr>";
								 
								        while ($row = $course->fetch(PDO::FETCH_ASSOC)){
								 
								            extract($row);
								 			
								            echo "<tr>";
								            	echo "<td><input type='checkbox' name='chkall'/></td>";
								                echo "<td><a href='#'>{$name}</a></td>";
								                echo "<td>{$price}</td>";
								                echo "<td>{$description}</td>";
								                echo "<td>";
								                    $this->category->id = $category_id;
								                    $this->category->getCategoryNameById();
								                    echo $this->category->name;
								                echo "</td>";
								 
								                echo "<td align='center'>";
								                    // read one, edit and delete button will be here
								                	 
													// edit product button
													echo "<a href='update_product.php?id={$id}'>";
													    echo "<span class='glyphicon glyphicon-edit'></span>";
													echo "</a>&nbsp;&nbsp;&nbsp;";
													 
													// delete product button
													echo "<a href='delete-id='{$id}'>";
													    echo "<span class='glyphicon glyphicon-remove'></span>";
													echo "</a>";
								                echo "</td>";
								 
								            echo "</tr>";
								 
								        }
								 
								    echo "</table>";
								 
								    // paging buttons will be here
								    // the page where this paging is used
									$page_url = URL_BASE. "admin/course/?";
									 
									// count all courses in the database to calculate total pages
									$total_rows = $this->total_rows;

									echo "<ul class='pagination'>";
 
										// button for first page
										if($this->page>1){
										    echo "<li><a href='{$page_url}' title='Về trang đầu.'>";
										        echo "Đầu";
										    echo "</a></li>";
										}
										 
										// calculate total pages
										$total_pages = ceil($total_rows / $this->records_per_page);
										 
										// range of links to show
										$range = 2;
										 
										// display links to 'range of pages' around 'current page'
										$initial_num = $this->page - $range;
										$condition_limit_num = ($this->page + $range)  + 1;
										 
										for ($x=$initial_num; $x<$condition_limit_num; $x++) {
										 
										    // be sure '$x is greater than 0' AND 'less than or equal to the $total_pages'
										    if (($x > 0) && ($x <= $total_pages)) {
										 
										        // current page
										        if ($x == $this->page) {
										            echo "<li class='active'><a href=\"#\">$x <span class=\"sr-only\">(current)</span></a></li>";
										        } 
										 
										        // not current page
										        else {
										            echo "<li><a href='{$page_url}page=$x'>$x</a></li>";
										        }
										    }
										}
										 
										// button for last page
										if($this->page<$total_pages){
										    echo "<li><a href='" .$page_url. "page={$total_pages}' title='Last page is {$total_pages}.'>";
										        echo "Cuối";
										    echo "</a></li>";
										}
									 
									echo "</ul>";

								}
								 
								// tell the user there are no products
								else{
								    echo "<div class='alert alert-info'>Không tìm thấy khóa học nào.</div>";
								}
								
								?>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row main content-->