<?php
	if(isset($_POST['friend_id'])){
		require('connect.php');
		$friends_id = $_POST['friend_id'];
		$users_id = $_POST['user_id'];
		
		
		$result = mysqli_query($con,"SELECT * FROM chat WHERE  user_id = '$friends_id' AND  receiver_id  = '$users_id'  ORDER BY ID DESC ");
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
		
		
		
		
		if($assoc_chat['chek']== 0){
			if($assoc_chat != null){
				echo json_encode($chat);
				
				mysqli_query($con,"UPDATE chat SET chek = '1'");
			}
		}
			
		
		
		
	}else{
		header("location:index.php");
	}	

?>