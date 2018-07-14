<?php 

	if(isset($_POST['chat_count'])){
		require('connect.php');
		$chat_count = $_POST['chat_count'];
		
		$result_chat = mysqli_query($con,"SELECT * FROM chat WHERE  receiver_id = '$chat_count ' AND  chek = '0'");
		$assoc_chat = mysqli_fetch_assoc($result_chat);
		$chat_num = mysqli_num_rows($result_chat);
		
		
		$chat =[
				"chat_num"=>$chat_num,
				"assoc_chat"=>$assoc_chat	
				
				
			
			
				];
		
		
			echo json_encode($chat);
		
			
		
		
		
	}else{
		header("location:http://localhost/1/");
	}




?>