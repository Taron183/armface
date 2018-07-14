<?php

	require('header.php');
	require('connect.php');



	$result = mysqli_query($con, "SELECT * FROM friend WHERE user_id = '$id' and  add_friend = '1'");
	
	
?>	
	
	
	
	<div class="st-pusher" id="content">

      <!-- sidebar effects INSIDE of st-pusher: -->
      <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

      <!-- this is the wrapper for the content -->
      <div class="st-content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner">

          <div class="container">
            

            <div class="timeline row" data-toggle="isotope" style="position: relative; height: 2774.86px;">
              <div class="col-xs-12 col-md-6 col-lg-4 item" style="position: absolute; left: 0px; top: 0px;">
                <div class="timeline-block">
                  <div class="panel panel-default share clearfix-xs">
                    <div class="panel-heading panel-heading-gray title">
                      What´s new
                    </div>
                    <div class="panel-body">
                      <textarea name="status" class="form-control share-text" rows="3" placeholder="Share your status..."></textarea>
                    </div>
                    <div class="panel-footer share-buttons">
                      <a href="#"><i class="fa fa-map-marker"></i></a>
                      <a href="#"><i class="fa fa-photo"></i></a>
                      <a href="#"><i class="fa fa-video-camera"></i></a>
                      <button type="submit" class="btn btn-primary btn-xs pull-right display-none" href="#">Post</button>
                    </div>
                  </div>
                </div>
              </div>
             
         
              
			  
			  
			<?php $i=0; while($assoc = mysqli_fetch_assoc($result)){ ?>
				<?php $friend_id = $assoc['search_id'] ?> 
				<?php $result_images = mysqli_query($con, "SELECT * FROM images WHERE user_id = '$friend_id'"); ?>
				<?php  while($assoc_images = mysqli_fetch_assoc($result_images)){ ?>
					
					<?php $result_users = mysqli_query($con, "SELECT * FROM users WHERE id = '$friend_id'"); ?>
					<?php $assoc_users = mysqli_fetch_assoc($result_users) ?>
					
						<?php if($assoc_users['image'] == "no"){ 
	
							if($assoc_users['gender']=='male'){
								$src="images/default_avatar/male.jpg";
							
							}
							
							else if($assoc_users['gender']=='female'){
								$src="images/default_avatar/female.jpg";
							}
						
						}else{ 
							$src='images/'.$assoc_users['id'].'/'.$assoc_users['image']; 
						 
						}?>
				
					  <div class="col-xs-12 col-md-6 col-lg-4 item"  style="position: absolute; left: 477px;  top:<?php  if($i==0){echo $i;}else{echo "470"*$i;} ?>px">
						<div class="timeline-block">
						  <div class="panel panel-default">

							<div class="panel-heading">
							  <div class="media">
								<div class="media-left">
								  <a href="">
									<img width="50" height="50" src="<?php echo $src; ?>" class="media-object">
								  </a>
								</div>
								<div class="media-body">
								  <a href="#" class="pull-right text-muted"></a>

								  <a href=""><?php echo $assoc_users['firstname']  ?></a>

								  <span><?php echo $assoc_images['date']; ?></span>
								  <span><?php echo $assoc_images['time']; ?></span>
								 
								</div>
							  </div>
							</div>

							<img src="images/<?php echo $assoc_users['id']; ?>/<?php echo $assoc_images['images'] ?>" style="width: 460px; height:360px;" class="img-responsive">
						   <div id="panel_footer">
								<strong>Time</strong><span><?php echo $assoc_images['time']; ?></span>
							</div>
						  </div>
							

						</div>
						
						
						
						
					  </div>
				<?php $i++; } ?>  
			<?php } ?>		  
					  
              
             
             
             
              
               
             
             
            </div>

          </div>

        </div>
        <!-- /st-content-inner -->

      </div>
      <!-- /st-content -->

    </div>
	
	
	
	
	
	
	







<?php include('footer.php'); ?>	