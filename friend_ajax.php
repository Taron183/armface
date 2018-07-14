<?php
	
	require('connect.php');

	if($_POST['user_id']){
		
		$user_id = $_POST['user_id'];
		$search_id = $_POST['search_id'];
		$add_friend = $_POST['add_friend'];
		
		$result =  mysqli_query($con,"SELECT * FROM friend  WHERE user_id = '$user_id' AND search_id = '$search_id'");
		
		$num = mysqli_num_rows($result);
		if($num == 1){
			
		}else{
			if($user_id == $search_id){
				
			}else{
				mysqli_query($con, "INSERT INTO friend (user_id, search_id, add_friend)VALUES('$user_id','$search_id','$add_friend')");
				
				
			}
			
		}
		
		
		
	
	}else{
		header("Location:http://localhost/1/");
		
	}











?>