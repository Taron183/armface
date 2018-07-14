<?php 

	session_start();
	require('connect.php');
	
	if(isset($_SESSION['log_in'])){
		
		$id = $_SESSION['user_id'];
		$update = mysqli_query($con, "UPDATE  users  SET online = '0' WHERE id = '$id'");
		
		
		
		if($update == true){
			unset($_SESSION['log_in']);
			$_SESSION['user_id'] = $assoc['id'];
			header("location:index.php");
		}
		
		
	
	
	}else{
		header("location:index.php");
	}


?>