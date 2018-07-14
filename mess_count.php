<?php 

	if(isset($_POST['user_id'])){
		require('connect.php');
		$user_id = $_POST['user_id'];
		
	
		
		$user = ["user_id" => $user_id,];
		
		
				
		$result_friend_chat = mysqli_query($con,"SELECT * FROM friend WHERE  search_id = '$user_id' AND  add_friend = '1'");
										
										
			while($fetch_assoc_chat = mysqli_fetch_assoc($result_friend_chat)){ 
				$ids = $fetch_assoc_chat['user_id'];
												
									 
				
				$result_friend_chates = mysqli_query($con,"SELECT id,firstname, lastname, gender,image, online,chat_count   FROM users WHERE  id = '$ids'");
				while($fetch_chats = mysqli_fetch_assoc($result_friend_chates)){

					array_push( $user, $fetch_chats);
						
					

						
					
				}	
			
			}
			
			
		
		$friendd = mysqli_query($con,"SELECT * FROM friend WHERE  search_id = '$user_id' AND  add_friend = '1'");
		
		while($assoc_friendd = mysqli_fetch_assoc($friendd)){ 
			$ids = $assoc_friendd['user_id'];
												
			$chat = mysqli_query($con,"SELECT * FROM chat WHERE user_id = '$ids' AND receiver_id = '$user_id' AND  chek = '0'");
				
			$ass_chat = mysqli_fetch_assoc($chat);
				$ids_u=$ass_chat['user_id'];
				
				
			$num =  mysqli_num_rows($chat);
			
			
			mysqli_query($con,"UPDATE users SET chat_count = '$num' WHERE id = '$ids_u'");
		
		}	
		
		
			
		echo json_encode($user);	
			
	}else{
		header("location:index.php");
	}
	
	
	
?>