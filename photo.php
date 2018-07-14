<?php
	
	require('header.php');
	require('connect.php');
	$id = $_SESSION['user_id'];
	$format_error = "";
		
	if(isset($_POST['btnSubmit'])) {
		$date = date("d F Y");
		$time = date("H:i:s");
		
		    
			$extension=array("jpeg","jpg");
			foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
                $file_name=$_FILES["files"]["name"][$key];
                $file_tmp=$_FILES["files"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension)){
                    
				   $filename=basename($file_name,$ext);
					$newFileName=$filename.time().".".$ext;
					$up_img = move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"images/".$id."/".$newFileName);
					
					
					
					if($up_img == true){
						mysqli_query($con,"INSERT INTO images(images, time, date, user_id ) VALUES ('$newFileName', '$time', '$date', '$id'  ) ");
							 
							  
							
					}
			   
                }
                else{
                   
					$format_error='
							<div class="alert alert-warning">
								<strong>Warning!</strong>The format of the image should be "jpg", ".jpeg".
							</div>
						
						';
				
				
				}
            
			
			}	
			
		
		
		
		
	}
	
	
	$result = mysqli_query($con, "SELECT * FROM images WHERE user_id = '$id'")
	
	
	
?>
<div class="container photo">
	<div class="tabbable">
              <ul class="nav nav-tabs" tabindex="0" style="overflow: hidden; outline: none;">
                <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-fw fa-picture-o"></i> Add avatar Photo</a></li>
                <li class=""><a href="#profile" data-toggle="tab"><i class="fa fa-fw fa-folder"></i> Albums</a></li>
              </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="home">
					<div>
						<img src="<?php echo $src; ?>" width="128" heigth="120" alt="image" class="avatar_src">
					</div>	
					<div>
						<label for="file" class="button-file-upload">
							<span class="fake-upload-button">Choose File</span>
							<span class="js-button-file-upload-text button-file-upload-text"></span>
							<input type="file" id="file" name="file" class="js-button-file-upload-input sortpicture">
						</label>
						<div class="form-group">
							<button type="button" class="btn btn-success upload">Add photo</button>
						</div>	
						<p id="eror"></p>
					</div>	
                </div>
				
                <div class="tab-pane fade" id="profile">
					<form action="" method="post" enctype="multipart/form-data">
						<div>
							<div class="form-group">
								<input type="file" name="files[]" multiple/>
							</div>	
							
							<div class="form-group">
								<button type="submit"  name="btnSubmit" class="btn btn-success">Add foto</button>
							</div>	
							<p id="eror"></p>
						</div>
					</form>		
						<?php  while($assoc = mysqli_fetch_assoc($result)){?>
							<img src="images/<?php echo  $id ?>/<?php echo $assoc['images'] ?>" width="120" heigth="120" alt="image">
							
						<?php }?>
                </div>
				<div class="marg">
					<?php echo $format_error; ?>
				</div>
               
                
            </div>
     </div>


</div>








<?php include('footer.php'); ?>