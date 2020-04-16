
<?php require_once "template/header.php"; ?>





          <div class="row" style="min-height:500px;">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <p class="card-title">All Students</p>

                  <h2>All Students Information</h2>
                  <hr>

                  <table class="table table-striped">
                  	<thead>
                  		<tr>
                  			<th>SL</th>
                  			<th>Student ID</th>
                  			<th>Name</th>
                                    <th>Batch</th>
                  			<th>Address</th>
                  			<th>Cell</th>
                  			<th>Photo</th>
                  			<th>Action</th>
                  		</tr>
                  	</thead>
                  	<tbody>

                              <?php 

                                    $sql = "SELECT * FROM students_info";
                                    $data = $conn -> query($sql);

                                    
                                    $i = 1;
                                    while( $single_data = $data -> fetch_assoc()) :



                               ?>
                  		
                  		<tr>
                  			<td><?php echo $i; $i++; ?></td>
                  			<td><?php echo $single_data['s_id']; ?></td>
                  			<td><?php echo $single_data['s_name']; ?></td>
                                    <td><?php echo $single_data['batch_no']; ?></td>
                  			<td><?php echo $single_data['s_address']; ?></td>
                  			<td><?php echo $single_data['s_id']; ?></td>
                  			<td><img src="stu_photos/<?php echo $single_data['s_photo']; ?>" alt=""></td>
                  			<td>
                  				
                  				<a class="btn btn-success btn-sm" href="stu_single.php?sl=<?php echo $single_data['SL']; ?>">View</a>
                  				<a class="btn btn-primary btn-sm" href="stu_edit.php?sl=<?php echo $single_data['SL']; ?>">Update</a>
                  				<a class="btn btn-danger btn-sm" href="inc/stu_delete.php?sl=<?php echo $single_data['SL']; ?>&stu_pic=<?php echo $single_data['s_photo']; ?>">Delete</a>


                  			</td>	
                  		</tr>

                        <?php endwhile; ?>



                  	</tbody>
                  </table>




                 




                </div>
              </div>
            </div>
          </div>


<?php require_once "template/footer.php"; ?>

