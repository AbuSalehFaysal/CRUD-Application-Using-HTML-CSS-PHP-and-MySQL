<?php  

    require_once "libs/config.php";
    require_once "libs/functions.php";


?>

<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sign Up Form</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>

    

    <?php  

      if( isset($_POST['submit']) ){

          // Form data  get 
          $fname = $_POST['fname'];


          // Username manage 
          $uname = $_POST['uname'];
          $username_check = userNameCheck($uname, $conn);



          // Email manage 
          $email = $_POST['email'];
          $email_check = emailCheck( $email , $conn);



          $cell = $_POST['cell'];



          // Password management 
          $pass = $_POST['pass'];
          $has_pass = password_hash( $pass , PASSWORD_DEFAULT);








          // Profile picture manage 
          $ppic_name = $_FILES['ppic']['name'];
          $ppic_tmp = $_FILES['ppic']['tmp_name'];

          $pic_ext_array =  explode('.', $ppic_name);

          $ext = end($pic_ext_array);

          $u_pic_name = md5(time().rand().$ppic_name).'.'. strtolower(  $ext );


          if( empty($fname) || empty($uname) || empty($email) || empty($pass) ){
            $mess = "<p class='alert alert-danger'>Field must not be empty !<button class='close' data-dismiss='alert'>&times;</button></p>";
          }else if( filter_var( $email, FILTER_VALIDATE_EMAIL ) == false ){

              $mess = "<p class='alert alert-danger'>Invaild Email Address!<button class='close' data-dismiss='alert'>&times;</button></p>";



          }else if( $username_check == false ){

              $mess = "<p class='alert alert-danger'> Username already exists !<button class='close' data-dismiss='alert'>&times;</button></p>";

          }else if( $email_check == false ){
              $mess = "<p class='alert alert-danger'> Email already exists !<button class='close' data-dismiss='alert'>&times;</button></p>";
          }else if( in_array($ext, ['jpg','jpeg','png','gif']) == false ){

              $mess = "<p class='alert alert-danger'> Invalid image format !<button class='close' data-dismiss='alert'>&times;</button></p>";

          }else{

            $sql = "INSERT INTO users ( fname, uname, email, cell, pass, photo, status ) VALUES ('$fname','$uname','$email','$cell','$has_pass','$u_pic_name','active')";
            $conn -> query($sql);

            move_uploaded_file( $ppic_tmp , 'users_photos/'. $u_pic_name  );

            $mess = "<p class='alert alert-success'>Data stable ! !<button class='close' data-dismiss='alert'>&times;</button></p>";

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
    
    <div class="login reg">
        <div class="card">
          <div class="card-body">
            <h2>Create an  account</h2>


            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

              <div class="form-group">
                <label for="">Full Name</label>
                <input name="fname" class="form-control" type="text">
              </div>

              <div class="form-group">
                <label for="">Username</label>
                <input name="uname" class="form-control" type="text">
              </div>
              

              <div class="form-group">
                <label for="">Email</label>
                <input name="email" class="form-control" type="text">
              </div>

              <div class="form-group">
                <label for="">Cell</label>
                <input name="cell" class="form-control" type="text">
              </div>

              <div class="form-group">
                <label for="">Password</label>
                <input name="pass" class="form-control" type="password">
              </div>

              <div class="form-group">
                <label for="">Profile Picture</label>
                <input name="ppic" class="" type="file">
              </div>


              <div class="form-group">
 
                <input name="submit" class="btn btn-success btn-block" type="submit" value="Sign Up">
              </div>

            </form>

            <p><a href="index.php">Log In now</a></p>
          </div>
        </div>
    </div>





  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>


</html>

