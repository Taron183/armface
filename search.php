<?php 
	require('head.php');
	
	$num_search = mysqli_num_rows($result_search);
	
 
?>

<?php if($num_search != 0){?>
<?php  while($assoc_search = mysqli_fetch_assoc($result_search)){?>
	<?php if($assoc_search['image'] == "no"){ 
		
		if($assoc_search['gender']=='male'){
			$src="images/default_avatar/male.jpg";
		
		}
		
		else if($assoc_search['gender']=='female'){
			$src="images/default_avatar/female.jpg";
		}
	
	 }else{ 
		$src='images/'.$assoc_search['id'].'/'.$assoc_search['image']; 
	 
	 }?>
		
		
	<div class="col-md-12 col-lg-4 item" >
		<div class="panel panel-default">
		  <div class="panel-heading">
			<div class="media">
			  <div class="pull-left">
				<img src="<?php echo $src; ?>" class="media-object img-circle" width="120" height="120">
			  </div>
			  <div class="media-body">
				<h4 class="media-heading margin-v-5"><a href="#"><?php echo $assoc_search['firstname']; ?>  <?php echo $assoc_search['lastname']; ?></a></h4>
				<div class="profile-icons">
				<?php $search_id = $assoc_search['id']; ?>
				<?php $result =  mysqli_query($con,"SELECT * FROM friend  WHERE search_id = '$search_id' and user_id = '$id'"); ?>
				<?php $ass = mysqli_fetch_assoc($result); ?>
				
	
	
				  <span><button type="button" class="friend"  user_id="<?php echo $id; ?>"  search_id="<?php echo $assoc_search['id']; ?>"<?php if($ass['add_friend'] == "0"){echo "style='background-color: #26a69a; border-color:#26a69a'";} ?>><?php if($ass['add_friend'] == "1"){echo "Friends";}else{ echo "Add Friend";} ?></button></span>
				
				  
				</div>
			  </div>
			</div>
		  </div>
		</div>
	</div>
			
<?php }?>


	
	<div class="sidebar sidebar-chat  sidebar-friend right sidebar-size-2 sidebar-offset-0 chat-skin-dark sidebar-visible-mobile st-effect-1" id="sidebar-chat sidebar-friend" style="display: none;">
      <div class="split-vertical">
        <div class="chat-search">
          <input type="text" class="form-control" placeholder="Search">
        </div>

        <ul class="chat-filter nav nav-pills ">
          <li><a href="#" data-target=".online">Friend Requests</a></li>
        </ul>
        <div class="split-vertical-body">
          <div class="split-vertical-cell">
            <div data-scrollable="" style="overflow-y: hidden; outline: none;" tabindex="0">
              <ul class="chat-contacts">
				<?php while($fetch_assoc = mysqli_fetch_assoc($result_friend_query)){  ?>
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
						<li class="online" data-user-id="1">
						  <a href="#">
							<div class="media">
							  <div class="pull-left">
								
								<img src="<?php echo $src; ?>" width="40" height="40" class="img-circle">
							  </div>
							  <div class="media-body">

								<div class="contact-name"> <?php echo $fetch['firstname'] ?> <?php echo  $fetch['lastname'] ?> </div>
								<div>
									<span><button class="add_f add_rem" user_id="<?php echo $fetch['id']; ?>" search_id="<?php echo $id; ?>"  >Add friend</button></span>
									
									
									<span><button class="remove_f add_rem" user_id="<?php echo $fetch['id']; ?>" search_id="<?php echo $id; ?>" >Remove</button></span>
								</div>	
							  </div>
							</div>
						  </a>
						</li>
					<?php }?>	
				<?php } ?>	
			<?php }else{
				echo'
				<div class="col-md-12 col-lg-4 item">
					<div class="panel panel-default">
						<div class="panel-heading search_eror" id="search_eror">
							Nothing found by this name!!!
						</div>
					</div>
				</div>';
			} ?>	
              </ul>
            </div>
          </div>
        </div>
      </div>
    <div id="ascrail2000" class="nicescroll-rails" style="width: 5px; z-index: 2; cursor: default; position: absolute; top: 86px; left: 195px; height: 154px; display: block; opacity: 0;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 301px; background-color: rgb(22, 174, 159); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div></div>
  

<?php include('footer.php'); ?>