<?php 

	require('connect.php');

	if($_POST['first_val']){
		
		$firstname = $_POST['first_val'];
		$user_id = $_POST['user_id'];
		
		
		$update = mysqli_query($con,"UPDATE users SET firstname = '$firstname' WHERE id = '$user_id'");
		
		if($update == true){
			$result = mysqli_query($con, "SELECT * FROM users WHERE id = '$user_id'");
			$assoc = mysqli_fetch_assoc($result);
			echo json_encode($assoc['firstname']);
			
		}
		
		
		
	
	}else{
		header("Location:http://localhost/1/");
		
	}



?>