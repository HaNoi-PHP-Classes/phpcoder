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
						Quản lý khóa học
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
								<!--Lấy các bản ghi từ CSDL-->
								<?php
								if($this->num>0){
								 	$stmt = $this->stmt;
								    echo "<table class='table table-hover table-responsive table-bordered'>";
								        echo "<tr>";
								            echo "<th>Khóa học</th>";
								            echo "<th>Giá</th>";
								            echo "<th>Mô tả</th>";
								            echo "<th>Danh mục</th>";
								            echo "<th>Chức năng</th>";
								        echo "</tr>";
								 
								        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
								 
								            extract($row);
								 
								            echo "<tr>";
								                echo "<td>{$name}</td>";
								                echo "<td>{$price}</td>";
								                echo "<td>{$description}</td>";
								                echo "<td>";
								                    //$category->id = $category_id;
								                    //$category->readName();
								                    //echo $category->name;
								                echo "</td>";
								 
								                echo "<td>";
								                    // read one, edit and delete button will be here
								                echo "</td>";
								 
								            echo "</tr>";
								 
								        }
								 
								    echo "</table>";
								 
								    // paging buttons will be here
								}
								 
								// tell the user there are no products
								else{
								    echo "<div class='alert alert-info'>No products found.</div>";
								}
								
								?>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row main content-->