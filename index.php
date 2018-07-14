<?php 
	
	session_start();
	require('connect.php');
	
	$border_1 = ""; 
	$border_2 = ""; 
	$border_3 = ""; 
	$border_4 = ""; 
	$border_5 = ""; 
	$border_6 = ""; 
	$border_7 = ""; 
	$border_8 = ""; 
	$font = "";
	$font_2 = "";
	$font_3 = "";
	$font_4 = "";
	$font_5 = "";
	$font_6 = "";
	$con_pass = "";
	$success = "";
	$email_error = "";
	$firstname = "";
	$lastname = "";
	$email = "";
	$log_error = "";
	
						//Registrated
	if(isset($_POST['reg'])){
		
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$con_password = $_POST['con_password'];
		$month = $_POST['month'];
		$day = $_POST['day'];
		$year = $_POST['year'];
		$gender = $_POST['gender'];
		
		
		
		if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($con_password) || empty($month) || empty($day) || empty($year)){
			if(empty($firstname)){
				$border_1 = 'style="border-color: red"';
				$font = '<i class="fa fa-exclamation-triangle  font_icon" aria-hidden="true"></i>';
			}

			if(empty($lastname)){
				$border_2 = 'style="border-color: red"';
				$font_2 = '<i class="fa fa-exclamation-triangle  font_icon" aria-hidden="true"></i>';
			}

			if(empty($email)){
				$border_3 = 'style="border-color: red"';
				$font_3 = '<i class="fa fa-exclamation-triangle   font_3 " aria-hidden="true"></i>';
			}
			
			if(empty($password)){
				$border_4 = 'style="border-color: red"';
				$font_4 = '<i class="fa fa-exclamation-triangle   font_4 " aria-hidden="true"></i>';
			}
			
			if(empty($con_password)){
				$border_5 = 'style="border-color: red"';
				$font_5 = '<i class="fa fa-exclamation-triangle   font_5 " aria-hidden="true"></i>';
			}	
			
			if($month == 'Month'){
				$border_6 = 'style="border-color: red"';
				$font_6 = '<i class="fa fa-exclamation-triangle   font_6 " aria-hidden="true"></i>';
		
			}

			if($month == 'Day'){
				$border_7 = 'style="border-color: red"';
				$font_6 = '<i class="fa fa-exclamation-triangle   font_6 " aria-hidden="true"></i>';
		
			}

			if($month == 'Year'){
				$border_8 = 'style="border-color: red"';
				$font_6 = '<i class="fa fa-exclamation-triangle   font_6 " aria-hidden="true"></i>';
		
			}	
		
		}else{
			if($password == $con_password){
				
				$result = mysqli_query($con,"SELECT * FROM users  WHERE  email = '$email' ");
				$assoc = mysqli_fetch_assoc($result);
				$num = mysqli_num_rows($result);
				
				if($num == 1){
					
					
					$email_error = '
							
							<div class="alert alert-warning">
							  <strong>Warning!</strong> User with such an  e-mail already exists!
							</div>
				
							';
						
				}else{
					
					$insert = mysqli_query($con,"INSERT INTO users(firstname, lastname, email, password, month, day, year, gender) VALUES ('$firstname', '$lastname', '$email', '$password', '$month', '$day', '$year', '$gender')");
					
					if($insert==true){
						$success = '

							<div class="alert alert-success">
								<strong>Success!</strong> You Are Registrated!!!.
							</div>
										';
										
						$firstname = "";
						$lastname = "";
						$email = "";				
			
					}	
					
				}
					
				
			}else{
				$con_pass = '
						<div class="alert alert-warning">
							<strong>Warning!</strong> Confirmation password doesnt match the .
						</div>
							';
			}
		}
		
	}
	
									//Log_in
									
									
	if(isset($_POST['log_in'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$res=mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$password'");
		$rows=mysqli_num_rows($res);
		$assoc=mysqli_fetch_assoc($res);
		
		
		if($rows == 1){
			$_SESSION['log_in']="log_in";
			$_SESSION['user_id'] = $assoc['id'];
			$id = $assoc['id'];
			
			mysqli_query($con, "UPDATE  users  SET online = '1' WHERE id = '$id'");

			mkdir("images/".$_SESSION['user_id']);
			header("location:users.php");
			
		
		
		
		}
		else{
			$log_error='
			
						<div class="alert alert-warning">
							<strong>Warning!</strong> Email оr password  combination incorrect.
						</div>
			
						';
		}
	
	}								


?>




<html>

	<head>
		<link rel="stylesheet" href="css/vendor/all.css">
		<link rel="stylesheet" href="css/app/app.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		
		<script  src="js/jquery-3.2.1.js"> </script>
		<script  src="js/main.js"> </script>
		<script  src="js/bootstrap.min.js"> </script>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	
	</head>
	
	
	
	<body>
		<div class="body_bg">
			<div  class="nav_bar">
				<div class="navbar navbar-default navbar-fixed-top nav_bg">
					<div class="container">
						<div class="navbar-header">
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand brands" href="#">Armface</a>
						</div>
						<center>
							<div class="navbar-collapse collapse nav_u" id="navbar-main">
								
								<form action="#" method="post" class="navbar-form navbar-right" role="search">
									<div class="form-group">
										<input type="email" class="form-control" name="email" placeholder="Your Email">
									</div>
									<div class="form-group">
										<input type="password" class="form-control" name="password" placeholder="Password">
									</div>
									<button type="submit" class="btn btn-default" name="log_in" >Log In</button>
								</form>
							</div>
							<?php echo $log_error; ?>
						</center>
					</div>
				</div>
				
			</div>
				
		
			<div class="container sign" >
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 well well-sm" style="float:right;">
						<legend><a href="http://www.jquery2dotnet.com"><i class="glyphicon glyphicon-globe"></i></a> Sign up!</legend>
						<form action="" method="post" class="form" >
							<div class=" form-group row">
								<div class="col-xs-6 col-md-6" >
									<input class="form-control" name="firstname" placeholder="First Name" type="text"
										<?php echo $border_1; ?> value="<?php echo $firstname; ?>"/>
										<?php echo $font; ?>
										
										
								</div>
								<div class="col-xs-6 col-md-6">
									<input class="form-control" name="lastname" placeholder="Last Name" type="text" <?php echo $border_2; ?> value="<?php echo $lastname; ?>"/>
									<?php echo $font_2; ?>
								</div>
							</div>
							<div class="form-group">
								<input class="form-control" name="email" placeholder="Your Email" type="email"  <?php echo $border_3; ?> value="<?php echo $email; ?>"/>
								<?php echo $font_3; ?>
							</div>	
							<div class="form-group">
								<input class="form-control" name="password" placeholder="Password" type="password" <?php echo $border_4; ?> />
								<?php echo $font_4; ?>
							</div>
							<div class="form-group">	
								<input class="form-control" name="con_password" placeholder="Password confirmation" type="password" <?php echo $border_5; ?> />
								<?php echo $font_5; ?>
							</div>	
						
							<label for="">
								Birth Date
							</label>
							<div class="row form-group">
								<div class="col-xs-4 col-md-4">
									<select name="month" class="form-control month" <?php echo $border_6; ?>>
									
										<option  value="Month" >Month</option>
										<script>
											monthNames = ["January", "February", "March", "April", "May", "June",
											"July", "August", "September", "October", "November", "December"];
											d = new Date();
											for(var i =0; i< monthNames.length; i++){
												$(".month").append("<option value="+monthNames[i]+">  "+monthNames[i]+" </option>")
											}
										</script>
									</select>
									<?php echo $font_6; ?>
									
									
								</div>
								
								<div class="col-xs-4 col-md-4">
									<select name="day" class="form-control day" <?php echo $border_7; ?>>
										<option value="Day">Day</option>
										<script>
											 myDate = new Date();
											 
											 day = ["1","2","3","4","5","6","7","8","9","10","11",
											 "12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32"];
											
											for(var i = 1; i< day.length; i++){
												$(".day").append("<option value="+i+">  "+i+" </option>")
											}

												
											
										</script>
									</select>
									<?php echo $font_6; ?>
								</div>
								<div class="col-xs-4 col-md-4">
									<select name="year" class="form-control year" <?php echo $border_8; ?>>
										<option value="Year">Year</option>
										<script>
											 myDate = new Date();
											 year = myDate.getFullYear();
											
											for(var i = 1900; i< year+1; i++){
												$(".year").append("<option value="+i+">  "+i+" </option>")
											}
										</script>
									</select>
									<?php echo $font_6; ?>
								</div>
							</div>
							<label class="radio-inline">
								<input type="radio" name="gender" value="male" checked>
								
								Male
							</label>
							<label class="radio-inline">
								<input type="radio" name="gender" value="female"/>
								Female
							</label>
							<br />
							<br />
							<button class="btn btn-lg btn-primary btn-block" name="reg" type="submit">
								Sign up
							</button>
						</form>
						<?php  echo $con_pass; ?>
						<?php  echo $email_error ; ?>
						<?php  echo $success ; ?>
					</div>
				</div>
			</div>
		</div>
		
		<?php include('footer.php'); ?>
		
	</body>

	


	



</html>