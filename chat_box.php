<?php


	if(isset($_POST['friend_id'])){
		require('connect.php');
		$friends_id = $_POST['friend_id'];
		$users_id = $_POST['user_id'];
		
		mysqli_query($con,"UPDATE chat SET chek = '1' WHERE user_id = '$friends_id'");
		mysqli_query($con,"UPDATE users SET chat_count = '0' WHERE id = '$friends_id'");
		
		$result = mysqli_query($con,"SELECT * FROM users WHERE id = '$friends_id'");
		$assoc = mysqli_fetch_assoc($result);
		
		
		$friend_id = $assoc['id'];
		$friend_last = $assoc['lastname'];
		$friend_first = $assoc['firstname'];
		$friend_gender = $assoc['gender'];
		$friend_image = $assoc['image'];
		
		
		
		
		$res = mysqli_query($con,"SELECT * FROM users WHERE id = '$users_id'");
		$ass = mysqli_fetch_assoc($res);
		
		
		$us_id = $ass['id'];
		$us_last = $ass['lastname'];
		$us_first = $ass['firstname'];
		$us_gender = $ass['gender'];
		$us_image = $ass['image'];
		
		
		
		
		$user_chat = [
				"friend_id"=>$friend_id,
				"friend_last"=>$friend_last,
				"friend_first"=>$friend_first,
				"friend_gender"=>$friend_gender,
				"friend_image"=>$friend_image,
				"us_id"=>$us_id,
				"us_last"=>$us_last,
				"us_first"=>$us_first,
				"us_gender"=>$us_gender,
				"us_image"=>$us_image,
				 
				
				];
				
			
		
		
		
		
		$result_chat_user = mysqli_query($con,"SELECT * FROM chat WHERE (user_id = '$users_id' and receiver_id = '$friends_id') or (user_id = '$friends_id' and  receiver_id = '$users_id') ORDER BY ID");
		while($assoc_chat_user = mysqli_fetch_assoc($result_chat_user)){
			
			
			
		array_push( $user_chat, $assoc_chat_user );
		
			
		
			
		}
		
		
		
		
		
			echo json_encode($user_chat);
			
		
		
		
		
		
		
		
		
		
		
		
		
	}








?>