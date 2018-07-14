<?php 
	
	if(isset($_POST['inp_val']) &&  !empty($_POST['inp_val'])){
		require('connect.php');
		
		$inp_val = $_POST['inp_val'];	
		$time = $_POST['time'];
		$date = $_POST['date'];
		$user_id = $_POST['user_id'];
		$receiver_id = $_POST['receiver_id'];
		
		
		$insert = mysqli_query($con, "INSERT INTO chat (inp_val, time, date, user_id, receiver_id) VALUES ('$inp_val', '$time', '$date', '$user_id', '$receiver_id')" );
		
		
	
		
		
		
		
		
		
		
		$result = mysqli_query($con, "SELECT * FROM chat WHERE  user_id = '$user_id' or receiver_id = '$receiver_id' ORDER BY ID DESC ");
		$assoc_chat = mysqli_fetch_assoc($result);
		$user_ida = $assoc_chat['user_id'];
		
		$result_user = mysqli_query($con, "SELECT * FROM users WHERE id = '$user_ida'");
		$assoc_user = mysqli_fetch_assoc($result_user);
		$firstname = $assoc_user['firstname'];
		$image = $assoc_user['image'];
		$gender = $assoc_user['gender'];
		$id = $assoc_user['id'];
		
		
		$chat =[
				"assoc_chat"=>$assoc_chat,	
				"firstname"=>$firstname,
				"image"=>$image,
				"gender"=>$gender,
				"id"=>$id
			
			
				];
		
		
		echo json_encode($chat);	
		
	
	
		
		
		
		
		
			
				
				
				
					
			
			
			 
		
		
		
		
				
		
		
	
		
		
		
		
		
	
	}






?>