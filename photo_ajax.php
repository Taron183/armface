<?php
	
	
	session_start();
	$id = $_SESSION['user_id'];
    require('connect.php');
	
	if (isset($_FILES['file']['name']) ) {
		
		
      
		$image = $_FILES['file']['name'];
		
		$format = ['jpeg','jpg'];
		$exp = explode('.', $image);
		$end = end($exp);
		$md5_img=md5($image .date("h/m/s/m/d/y")).'.'.$end;
		if(in_array($end,$format)== true){
		
			$tep_name = $_FILES['file']['tmp_name'];
			$src="images/".$id."/".$md5_img;
			$up_img = move_uploaded_file($tep_name , $src);
			
			if($up_img == true){
				
				$res = mysqli_query($con,"SELECT * FROM users WHERE  id = '$id'");
				$assoc = mysqli_fetch_assoc($res);
				if($assoc['image'] != "no"){
					unlink("images/".$id."/".$assoc['image']);
				}
				
				$update = mysqli_query($con, "UPDATE users SET image = '$md5_img'
					WHERE id= '$id'
				 ");
				 
				$res = mysqli_query($con,"SELECT * FROM users WHERE  id = '$id'");
				$assoc = mysqli_fetch_assoc($res);
				echo json_encode($assoc);
				 
				 
				
				
				
				
				
				
				
				
				
			}
		
		
		
		
		}else{
			echo "eror";
		}
    
	}else {
       echo "no";
    }

?>