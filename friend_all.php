<?php
	require('header.php');


	$result_friend_all = mysqli_query($con,"SELECT * FROM friend WHERE  search_id = '$id' AND  add_friend = '1'");
	
	
	
		
	
	
	
?>




<div class="container friend_all">


	<div class="row"> 
	
	
	
		<?php while($fetch_assoc = mysqli_fetch_assoc($result_friend_all)){  ?>
				<?php $ids = $fetch_assoc['user_id']; ?>
	 
					
				<?php $result_friend = mysqli_query($con,"SELECT * FROM users WHERE  id = '$ids'"); ?>
			<?php  while($fetch = mysqli_fetch_assoc($result_friend)){?>
					
				<?php if($fetch['image'] == "no"){ 

					if($fetch['gender']=='male'){
						$src="images/default_avatar/male.jpg";
					
					}
					
					else if($fetch['gender']=='female'){
						$src="images/default_avatar/female.jpg";
					}
				
				 }else{ 
					$src='images/'.$fetch['id'].'/'.$fetch['image']; 
				 
				 }?>
					
				
				<div class="col-md-6 col-lg-4 item">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="media">
							  <div class="pull-left"> 
								<img src="<?php echo $src; ?>" width="40" height="40" alt="people" class="media-object img-circle">
							  </div>
							  <div class="media-body">
								<h4 class="media-heading margin-v-5"><a href="#"><?php echo $fetch['firstname'] ?> <?php echo  $fetch['lastname'] ?></a></h4>
								<div class="profile-icons">
								  <span><i class="fa fa-users"></i></span>
								  <span><i class="fa fa-photo"></i> </span>
								  <span><i class="fa fa-video-camera"></i></span>
								</div>
							  </div>
							</div>
						</div>
						<div class="panel-body">
							<p class="common-friends">Common Friends</p>
							<div class="user-friend-list">
							 
							</div>
						</div>

					</div>
				</div>
				
					
					
					
			<?php }?>	
		<?php } ?>
	
		
		
		
	
	
	
	
	</div>



</div>

<?php include('footer.php'); ?>