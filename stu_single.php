
<?php require_once "template/header.php"; ?>

			<?php 

            if (isset($_GET['sl'])) {
                  # code...
                  $sl = $_GET['sl'];
                  $sql = "SELECT * FROM students_info WHERE SL = '$sl'";
                  $data = $conn -> query($sql);
                  $single_data = $data -> fetch_assoc();
                  

            }

             ?>



          <div class="row" style="min-height:500px;">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <p class="card-title">Student Information</p>



					<img style="width: 150px; height: 150px;" class="img-fluid" src="stu_photos/<?php echo $single_data['s_photo']; ?>" alt="">

					<table class="table table-striped">
						<tr>
							<td>ID</td>
							<td><?php echo $single_data['s_id']; ?></td>
						</tr>


						<tr>
							<td>Name</td>
							<td><?php echo $single_data['s_name']; ?></td>
						</tr>

						<tr>
							<td>Batch</td>
							<td><?php echo $single_data['batch_no']; ?></td>
						</tr>

						<tr>
							<td>Address</td>
							<td><?php echo $single_data['s_address']; ?></td>
						</tr>

						<tr>
							<td>Cell</td>
							<td><?php echo $single_data['s_cell']; ?></td>
						</tr>


					</table>

					<a class="btn btn-primary" href="all_students.php">Back</a>


                 




                </div>
              </div>
            </div>
          </div>


<?php require_once "template/footer.php"; ?>

