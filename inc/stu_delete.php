<?php 

	require_once "../libs/config.php";



	if (isset($_GET['sl'])) {
				# code...
				$sl = $_GET['sl'];

				$stu_pic = $_GET['stu_pic'];

		}

		$sql = "DELETE FROM students_info WHERE SL='$sl' ";
		$conn -> query($sql);

		unlink('../stu_photos'.$stu_pic);
		
		header("location:../all_students.php");



 ?>