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
						<b>Thêm mới khóa học</b>
					</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<!-- HTML form for creating a course -->
							<form action="<?php echo htmlspecialchars(URL_BASE.'admin/course/addprocess');?>" method="post" enctype="multipart/form-data">
							 
							    <table class='table table-hover table-responsive table-bordered'>
							 
							        <tr>
							            <td>Tên khóa học</td>
							            <td><input type='text' name='name' class='form-control' /></td>
							        </tr>

							        <tr>
							            <td>Mô tả tóm tắt</td>
							            <td><input type='text' name='description' class='form-control' /></td>
							        </tr>
							 
							        <tr>
							            <td>Kinh phí</td>
							            <td><input type='text' name='price' class='form-control' /></td>
							        </tr>
							 
							 		<tr>
							            <td>Danh mục khóa học</td>
							            <td>
								            <!-- categories from database will be here -->
								            <?php
								            // put them in a select drop-down
											echo "<select class='form-control' name='category_id'>";
											    echo "<option>Chọn danh mục...</option>";
											 
											    while ($row_category = $this->category->fetch(PDO::FETCH_ASSOC)){
											        extract($row_category);
											        echo "<option value='{$category_id}'>{$name}</option>";
											    }
											 
											echo "</select>";
										?>
							            </td>
							        </tr>

							        <tr>
									    <td>Ảnh đại diện</td>
									    <td><input type="file" name="image"/></td>
									</tr>

							        <tr>
							            <td colspan="2">Nội dung khóa học<textarea id="content" name='content' class='form-control'></textarea></td>
							        </tr>
							 		<script type="text/javascript">
							 			CKEDITOR.replace('content',
							 				{
												filebrowserBrowseUrl : '<?php echo URL_BASE.'templates/admin/';?>ckfinder/ckfinder.html',
												filebrowserImageBrowseUrl : '<?php echo URL_BASE.'templates/admin/';?>ckfinder/ckfinder.html?type=Images',
												filebrowserFlashBrowseUrl : '<?php echo URL_BASE.'templates/admin/';?>ckfinder/ckfinder.html?type=Flash',
												filebrowserUploadUrl : '<?php echo URL_BASE.'templates/admin/';?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
												filebrowserImageUploadUrl : '<?php echo URL_BASE.'templates/admin/';?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
												filebrowserFlashUploadUrl : '<?php echo URL_BASE.'templates/admin/';?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
											});
							 		</script>
							        <tr>
							            <td></td>
							            <td>
							                <button type="submit" class="btn btn-primary">Lưu khóa học</button>
							            </td>
							        </tr>

							    </table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row main content-->