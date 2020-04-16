<?php  

	require_once "config.php";


	// Username name check function 
	function userNameCheck($uname, $conn) {
		$sql = "SELECT * FROM users WHERE uname='$uname'";
		$data = $conn -> query($sql);
		$num = $data -> num_rows;

		if($num > 0){
			return false;
		}else{
			return true;
		}
	}


	// Email check functions 
	function emailCheck( $email , $conn) {

		$sql = "SELECT * FROM users WHERE email='$email'";
		$data = $conn -> query($sql);
		$num = $data -> num_rows;

		if($num > 0){
			return false;
		}else{
			return true;
		}


	}






?>