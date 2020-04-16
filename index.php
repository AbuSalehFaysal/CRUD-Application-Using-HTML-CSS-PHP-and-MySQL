<?php  

    require_once "libs/config.php";
    require_once "libs/functions.php";

    if( isset($_SESSION['fname']) || isset($_SESSION['uname']) || isset($_SESSION['email'])  ){

        header("location:dashboard.php");
    }

?>

<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Log In Form</title>
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
        $user_email = $_POST['user_email'];
        $pass = $_POST['pass'];

        if( empty($user_email) || empty($pass) ){
            $mess = "<p class='alert alert-danger'> Field Must not be Empty !<button class='close' data-dismiss='alert'>&times;</button></p>";
        }else{


          $sql = "SELECT * FROM users WHERE uname='$user_email' OR email='$user_email'";
          $data = $conn -> query($sql);

          $num = $data -> num_rows;


          if( $num == 1 ){

            $user_login_data = $data -> fetch_assoc();

            if( password_verify( $pass , $user_login_data['pass']  ) == false ){
              $mess = "<p class='alert alert-danger'> Incorrect Password !<button class='close' data-dismiss='alert'>&times;</button></p>";
            }else{

              $_SESSION['pic'] = $user_login_data['photo'];
              $_SESSION['fname'] = $user_login_data['fname'];
              $_SESSION['uname'] = $user_login_data['uname'];
              $_SESSION['cell'] = $user_login_data['cell'];
              $_SESSION['email'] = $user_login_data['email'];

              header("location:dashboard.php");

            }


          }else{

            $mess = "<p class='alert alert-danger'> Wrong Username or Email !<button class='close' data-dismiss='alert'>&times;</button></p>";

          }




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
    <div class="login">
        <div class="card">
          <div class="card-body">
            <h2>Login Now</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

              <div class="form-group">
                <label for="">Username / Email</label>
                <input name="user_email" class="form-control" type="text">
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input name="pass" class="form-control" type="password">
              </div>
              <div class="form-group">
 
                <input name="submit" class="btn btn-success btn-block" type="submit" value="Log In">
              </div>

            </form>

            <p><a href="reg.php">Create an account</a></p>
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

