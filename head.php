<?php
	session_start();
	require('connect.php');
	$id = $_SESSION['user_id'];
	$search = $_SESSION['search_user '];
	$res = mysqli_query($con,"SELECT * FROM users WHERE  id = '$id'");
	$assoc_user = mysqli_fetch_assoc($res);
	
	
	if(!isset($_SESSION['log_in'])){
		header("location:index.php");
	
	}
	
	
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


	if(isset($search)){
		$result_search = mysqli_query($con,"SELECT * FROM users WHERE firstname LIKE '$search%'");
		
		
		
		  
	}
	
	if(isset($_POST['search'])){
		
		unset($search);
		$search_user = $_POST['search_user'];
		$result_search = mysqli_query($con,"SELECT * FROM users WHERE firstname LIKE '$search_user%'");
		var_dump("jkl");
		
		
		
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
		  
          <a href="#sidebar-chat" data-toggle="sidebar-menu" id="com_p" class="toggle pull-right visible-xs"><i class="fa fa-comments"></i></a>
		  
		  <a href="#sidebar-chat" data-toggle="sidebar-menu" id="com_p" class="toggle pull-right visible-xs"> <i class="fa fa-fw fa-users"></i></a>
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
							<input type="text" class="form-control" name="search_user" placeholder="First Last Name" id="name" value = "<?php if(isset($search)){echo $search;}else echo $search_user ; ?>"  required>
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
			  <strong id="friend_count" ><?php if($friend_query_count !=0) echo $friend_query_count; ?></strong>
            </li>
            <li class="hidden-xs">
              <a href="#sidebar-chat"  id="com_t" data-toggle="sidebar-menu">
                <i class="fa fa-comments"></i>
              </a>
            </li>
            <!-- User -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                <img src="<?php echo $src; ?>" alt="Bill" class="img-circle avatar_src" width="40"> <?php echo $assoc_user['firstname']; ?> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="user-private-profile.html">Profile</a></li>
                <li><a href="user-private-messages.html">Messages</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>

          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
    </div>
 </div>
	<div  class ="nav_f">
	</div>

	

    

	