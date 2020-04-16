
<?php require_once "template/header.php"; ?>

		<?php 


			if (isset($_GET['sl'])) {
				# code...
				$sl = $_GET['sl'];

				if (isset($_POST['submit'])) {
		 		# code...

		 		$id = $_POST['id'];
		 		$name = $_POST['name'];
		 		$batch = $_POST['batch'];
		 		$address = $_POST['address'];
		 		$cell = $_POST['cell'];

		 		$old_pic = $_POST['old_pic'];

		 		
		 		if( !empty($_FILES['new_photo']['name']) ){

                      $new_photo = $_FILES['new_photo']['name'];
                      $new_photot = $_FILES['new_photo']['tmp_name'];

                      
                      
                      $pic_ext_array =  explode('.', $new_photo);
                      $ext = end($pic_ext_array);
                      $update_image_name = md5(time().rand().$new_photo).'.'. strtolower(  $ext );

                      move_uploaded_file( $new_photot , 'stu_photos/'. $update_image_name );

                      unlink( 'stu_photos/' . $old_photo  );
                      

                    }else{
                      
                      $update_image_name = $old_pic;
                      

                    } 
		 		

		 		

		 		 $sql = "UPDATE students_info SET s_id='$id', s_name='$name', batch_no='$batch', s_cell='$cell', s_address='$address' WHERE SL='$sl'";
                    $conn -> query($sql);
		 		
		 		
		 	}


				$sql = "SELECT * FROM students_info WHERE SL = '$sl' ";
				$data = $conn -> query($sql);
				$single_data = $data -> fetch_assoc();
			}



		 ?>


		 




          <div class="row" style="min-height:500px;">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <p class="card-title">Student Information</p>



					<form action="<?php echo $_SERVER['PHP_SELF']; ?>?sl= <?php echo $sl; ?>" method="POST" enctype="maltipart/form-data">
					<table class="table table-striped">
						<tr>
							<td>ID</td>
							<td><input name="id" type="text" value="<?php echo $single_data['s_id']; ?>"></td>
						</tr>


						<tr>
							<td>Name</td>
							<td><input name="name" type="text" value="<?php echo $single_data['s_name']; ?>"></td>
						</tr>

						<tr>
							<td>Batch</td>
							<td><input name="batch" type="text" value="<?php echo $single_data['batch_no']; ?>"></td>
						</tr>

						<tr>
							<td>Address</td>
							<td><input name="address" type="text" value="<?php echo $single_data['s_address']; ?>"></td>
						</tr>

						<tr>
							<td>Cell</td>
							<td><input name="cell" type="text" value="<?php echo $single_data['s_cell']; ?>"></td>
						</tr>

						<tr>
							<td>Profile Picture</td>
							<td><img style="width: 150px; height: 150px;" class="img-fluid" src="stu_photos/<?php echo $single_data['s_photo']; ?>" alt=""></td>
							<input name="old_pic" type="hidden" value="<?php echo $single_data['s_photo']; ?>">
						</tr>

						 <tr>
                        <td>Upload Photo</td>
                        <td><input  name="new_photo" type="file"></td>
                      </tr>


						<tr>
							<td><input name="submit" class="btn btn-warning btn-block" type="submit" value="Update"></td>
						</tr>


					</table>
					</form>


                 




                </div>
              </div>
            </div>
          </div>


<?php require_once "template/footer.php"; ?>

