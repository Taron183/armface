<?php 
	require('connect.php');

	
		if($_POST['add_friend'] == 1){
			$user_id = $_POST['user_id'];
			$search_id = $_POST['search_id'];
			$add_friend = $_POST['add_friend'];
			
			
			$update  = mysqli_query($con, "UPDATE  friend  SET add_friend = '$add_friend' WHERE user_id = '$user_id' and  search_id = '$search_id'");
			
			if($update == true){
				mysqli_query($con, "INSERT INTO friend(user_id, search_id, add_friend)VALUES('$search_id', '$user_id', '$add_friend') ");
			}
			
		
			
			
			
				
			
			if($assoc_img_ser_id['user_id'] != null){
				mysqli_query($con,"UPDATE images SET friend_img = '1' WHERE user_id = '$search_id'");
			}
			
		
		
		
		}elseif($_POST['add_friend'] == "del"){
			$user_id = $_POST['user_id'];
			$search_id = $_POST['search_id'];
			
			$deleted = mysqli_query($con, "DELETE FROM friend WHERE user_id = '$user_id' and  search_id = '$search_id' ");
			
		}
		
		
	
	
	


?>