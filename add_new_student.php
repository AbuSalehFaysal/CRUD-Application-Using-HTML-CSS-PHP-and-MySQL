
<?php require_once "template/header.php"; ?>



          <div class="row" style="min-height:500px;">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <p class="card-title">Add New Student </p>


                  <?php 

                  		if ( isset( $_POST['submit'] ) ) {
                  			# code...
                  			$s_name = $_POST['s_name'];
                  			$s_id = $_POST['s_id'];
                  			$batch_no = $_POST['batch_no'];
                  			$s_cell = $_POST['s_cell'];
                  			$s_address = $_POST['s_address'];


                  			$s_photo = $_FILES['s_photo']['name'];
                  			$s_tphoto = $_FILES['s_photo']['tmp_name'];

                  			$pic_ext_array =  explode('.', $s_photo);

          					$ext = end($pic_ext_array);

          					$u_pic_name = md5(time().rand().$s_photo).'.'. strtolower(  $ext );	

          					if (empty($s_name) || empty($s_id) || empty($batch_no) || empty($s_cell) || empty($s_address) || empty($s_photo) == true) {
          						# code...
          						$mess = "<p class='alert alert-danger'>Please, fill the form properly!<button class='close' data-dismiss='alert'>&times;</button></p>";
          					} else {
          						# code...
          						$sql = "INSERT INTO students_info (	s_name,	s_id,	batch_no,	s_cell,	s_address,	s_photo,	status) VALUES ('$s_name','$s_id','$batch_no','$s_cell','$s_address','$u_pic_name','active')";
          						$conn -> query($sql);

          						move_uploaded_file($s_tphoto, 'stu_photos/'.$u_pic_name);

          						$mess = "<p class='alert alert-success'>Congratulations!<button class='close' data-dismiss='alert'>&times;</button></p>";
          					}
          					
                  			
                  		}


                   		?>

                        <div class="mess">
        					<?php  

          					if( isset($mess) ){
            				echo $mess;
          					}

        				?>
    					</div>
                  

                  <div class="card w-50 mx-auto">
                  	<div class="card-header">Please, fill the form</div>
                  	<div class="card-body">
                  		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                  			<div class="form-group">
                  				<label for="">Student Name</label>
                  				<input name="s_name" class="form-control" type="text">
                  			</div>

                  			<div class="form-group">
                  				<label for="">Student ID</label>
                  				<input name="s_id" class="form-control" type="text">
                  			</div>

                  			<div class="form-group">
                  				<label for="">Batch No</label>
                  				<input name="batch_no" class="form-control" type="text">
                  			</div>

                  			<div class="form-group">
                  				<label for="">Student Cell</label>
                  				<input name="s_cell" class="form-control" type="text">
                  			</div>

                  			<div class="form-group">
                  				<label for="">Address</label>
                  				<input name="s_address" class="form-control" type="text">
                  			</div>

                  			<div class="form-group">
                  				<label for="">Student Photo</label>
                  				<input name="s_photo" class="" type="file">
                  			</div>

                  			<div class="form-group">
                  				
                  				<input name="submit" class="btn btn-success" type="submit" value="Submit">
                  			</div>

                  		</form>
                  	</div>
                  	<div class="card-footer"></div>
                  </div>




                 




                </div>
              </div>
            </div>
          </div>


<?php require_once "template/footer.php"; ?>

