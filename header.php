<?php
	session_start();
	require('connect.php');
	
	if(!isset($_SESSION['log_in'])){
		header("location:index.php");
	
	}
	
	$id = $_SESSION['user_id'];
	$res_user = mysqli_query($con,"SELECT * FROM users WHERE  id = '$id'");
	$assoc_user = mysqli_fetch_assoc($res_user);
	
	
	if($assoc_user['image'] == "no"){
		if($assoc_user['gender']=='male'){
			$src="images/default_avatar/male.jpg";
		
		}
		
		else if($assoc_user['gender']=='female'){
			$src="images/default_avatar/female.jpg";
		}
		
	}else{
		$src='images/'.$id.'/'.$assoc_user['image'];
	}


	if(isset($_POST['search'])){
		
		$search_user = $_POST['search_user'];
		
			
		$_SESSION['search_user '] = $search_user;
		header("Location:search.php");
		
		
		
	
		
	
	
	
	}
	
	
	$result_friend_query = mysqli_query($con,"SELECT * FROM friend WHERE  search_id = '$id' AND  add_friend = '0'");
	$friend_query_count = mysqli_num_rows($result_friend_query);
	
	
	
	
	
	
	
	
	
?>
	

		



<html>	
	
	
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="css/vendor/all.css">
		<link rel="stylesheet" href="css/app/app.css">
		<script  src="js/jquery-3.2.1.js"> </script>
		<script  src="js/main.js"> </script>
		<script  src="js/index.js"> </script>
		<script  src="js/bootstrap.min.js"> </script>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
				



      
	
	
	</head>

	<body class="breakpoint-1024">

  <!-- Wrapper required for sidebar transitions -->
  <div class="st-container">

    <!-- Fixed navbar -->
    <div class="navbar navbar-main navbar-primary navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		 
		   
		   <a href="#sidebar-chat" data-toggle="sidebar-menu" id="com_p" class="toggle pull-right visible-xs message_request"><strong class="chat_count chat_count_res" >1</strong><i class="fa fa-comments"></i></a>
		   
		   
		   <a href="#sidebar-chat" data-toggle="sidebar-menu" id="com_p" class="toggle pull-right visible-xs friend_requests"><strong class="friend_count fr_count_phone" ><?php if($friend_query_count !=0) echo $friend_query_count; ?></strong> <i class="fa fa-fw fa-users"></i></a>
         
          <a class="navbar-brand" href="users.php">Armface</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-nav">
          <ul class="nav navbar-nav">
            <li>
			
				<div id="users-filter-trigger" class="search_form">
					<form action="" method="post">
					  <div class="search-name">
						<div class="searche">
							<input type="text" class="form-control" name="search_user" placeholder="First Last Name" id="name" required>
						</div>
						
						<div class="searche">
							<button class="btn btn-default searche"  name="search" type="submit" id="user-search-name "><i class="fa fa-search"></i> Search</button>
						</div>	
					  </div>
					</form>  

                </div>
			
			
			</li>
           
          
            
				
          </ul>
          <ul class="nav navbar-nav  navbar-right ">
			<li class="hidden-xs friend_requests">
              <a href="#" id="com_t" data-toggle="sidebar-menu ">
                <i class="fa fa-fw fa-users"></i>
				
              </a>
			  <strong class="friend_count" ><?php if($friend_query_count !=0) echo $friend_query_count; ?></strong>
            </li>
			
            <li class="hidden-xs message_request">
              <a href="#sidebar-chat" id="com_t" data-toggle="sidebar-menu ">
                <i class="fa fa-comments"></i>
              </a>
			  <strong class="chat_count" ></strong>
            </li>
            
            <!-- User -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                <img src="<?php echo $src; ?>" alt="Bill" class="img-circle avatar_src" width="40"> <span class="firstnames"><?php echo $assoc_user['firstname']; ?></span> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                
                <li><a href="logout.php">Logout</a></li>
				
              </ul>
            </li>

          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
    </div>

	<div  class ="nav_f">
	</div>
  
    

    <div class="chat-window-container"></div>

    <!-- sidebar effects OUTSIDE of st-pusher: -->
    <!-- st-effect-1, st-effect-2, st-effect-4, st-effect-5, st-effect-9, st-effect-10, st-effect-11, st-effect-12, st-effect-13 -->

    <!-- content push wrapper -->
    <div class="st-pusher" id="content">

      <!-- sidebar effects INSIDE of st-pusher: -->
      <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

      <!-- this is the wrapper for the content -->
      <div class="st-content">

        <!-- extra div for emulating position:fixed of the menu -->
        <div class="st-content-inner" id="st-content_he">

         

          <div class="container">

            <div class="cover profile">
              <div class="wrapper">
                <div class="image" id="images_pading">
                  <img src="images/profile-cover.jpg" alt="people">
                </div>
               
              </div>
              <div class="cover-info">
                <div class="avatar">
                  <img src="<?php echo $src; ?>" class="avatar_src" alt="people">
                </div>
                <div class="name"><a href="#"><span class="firstnames"><?php echo $assoc_user['firstname']; ?></span> <?php echo $assoc_user['lastname']; ?></a></div>
                <ul class="cover-nav">

                  
                  <li><a href="timeline.php"><i class="fa fa-fw icon-ship-wheel"></i> Timeline</a></li>
                  <li><a href="about.php"><i class="fa fa-fw icon-user-1"></i> About</a></li>
                  <li><a href="friend_all.php"><i class="fa fa-fw fa-users"></i> Friends</a></li>
                  <li><a href="photo.php"><i class="fa fa-photo"></i> Photos</a></li>

                </ul>
              </div>
            </div>
          
            

          </div>

        </div>
        <!-- /st-content-inner -->

      </div>
      <!-- /st-content -->

    </div>
    <!-- /st-pusher -->

    

  </div>
  <!-- /st-container -->
  
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
				
              </ul>
            </div>
          </div>
        </div>
      </div>
    <div id="ascrail2000" class="nicescroll-rails" style="width: 5px; z-index: 2; cursor: default; position: absolute; top: 86px; left: 195px; height: 154px; display: block; opacity: 0;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 301px; background-color: rgb(22, 174, 159); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div></div>
	
	
	
	<div class="sidebar sidebar-chat sidebar_chat right sidebar-size-2 sidebar-offset-0 chat-skin-dark sidebar-visible-mobile st-effect-1" id="sidebar-chat" style="display: none;">
				  <div class="split-vertical">
					<div class="chat-search">
					  <input type="text" class="form-control" placeholder="Search">
					</div>

					<ul class="chat-filter nav nav-pills ">
						<li><a href="#" data-target=".online">Message request</a></li>
					  
					 
					</ul>
					<div class="split-vertical-body">
					  <div class="split-vertical-cell">
						<div data-scrollable="" style="overflow-y: hidden; outline: none;" tabindex="0">
							<ul class="chat-contacts">
								<?php $result_friend_chat = mysqli_query($con,"SELECT * FROM friend WHERE  search_id = '$id' AND  add_friend = '1'") ?>
								
								
								<?php while($fetch_assoc_chat = mysqli_fetch_assoc($result_friend_chat)){  ?>
										<?php $ids = $fetch_assoc_chat['user_id']; ?>
										
							 
											
										<?php $result_friend_chates = mysqli_query($con,"SELECT * FROM users WHERE  id = '$ids'"); ?>
									<?php  while($fetch_chats = mysqli_fetch_assoc($result_friend_chates)){?>
									
									
											
										<?php if($fetch_chats['image'] == "no"){ 

											if($fetch_chats['gender']=='male'){
												$src_chats="images/default_avatar/male.jpg";
											
											}
											
											else if($fetch_chats['gender']=='female'){
												$src_chats="images/default_avatar/female.jpg";
											}
										
										 }else{ 
											$src_chats='images/'.$fetch_chats['id'].'/'.$fetch_chats['image']; 
										 
										 }?>
							
											
										<li class="online away chat_box chat_window_b"  friend_id="<?php echo $fetch_chats['id'];  ?>" user_id="<?php echo $id; ?>">
										  <a href="#">

											<div class="media">
											  <div class="pull-left">
												<span class="status"></span>
												<img src="<?php echo $src_chats; ?>" width="40" height="40" class="img-circle">
											  </div>
											  <div class="media-body">
												<div class="contact-name"><?php echo $fetch_chats['firstname'] ?> <?php echo  $fetch_chats['lastname'] ?></div>
												
											  </div>
											</div>
										  </a>
										</li>
									<?php }?>	
								<?php } ?>
		
							</ul>
						</div>
					  </div>
					</div>
				  </div>
	<div id="ascrail2000" class="nicescroll-rails" style="width: 5px; z-index: 2; cursor: default; position: absolute; top: 86px; left: 195px; height: 222px; display: block; opacity: 0;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 301px; background-color: rgb(22, 174, 159); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div></div>
			
	<div class="chat-window-container chat_window" style="display:none;">
	
		<div class="panel panel-default" data-user-id="3"   id="chs" style="display: block;">
			<div class="panel-heading" data-toggle="chat-collapse" data-target="#chat-bill">
			  <a href="#" class="close"><i class="fa fa-times"></i></a>
			  <a href="#">
				<span class="pull-left">
						<img src=""  class="chat_img" width="40" height="40">
					</span>
				<span class="contact-name chat_name" ></span>
			  </a>
			</div>
			<div class="panel-body pan_bod" id="chat-bill chat01">
				

			  
			  
			 
			</div>
			<div class="form-group ">
				<input type="text" class="form-control chat_enter" user_id="<?php echo $id; ?>"
				placeholder="Type message..." receiver_id ="">
			</div>	
		</div>
	</div>
  
  
	<script>
		chat_count = $(".chat_enter").attr("user_id")
		
		setInterval(function(){
			$.ajax({
				url:'chat_count.php',
				method:'POST',
				data:{chat_count},
				dataType:"json",
				success:function(x){
					
					if(x['chat_num'] != 0){
						$(".chat_count").text(x['chat_num'])
					}else{
						$(".chat_count").text("")
					}
					
					
					
					
					
						
					
				
				
				}
		
		
			})
			
			user_id = $('.chat_enter').attr("user_id")
		
			$.ajax({
				url:'mess_count.php',
				method:'POST',
				data:{user_id},
				dataType:"json",
				success:function(z){
					
				}
			})
			
			
			
		},2000)
			
  
	</script>
	