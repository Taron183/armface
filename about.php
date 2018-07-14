<?php 

	require('header.php');
	require('connect.php');
	
	
	$id = $_SESSION['user_id'];
	$res_user = mysqli_query($con,"SELECT * FROM users WHERE  id = '$id'");
	$assoc_user = mysqli_fetch_assoc($res_user);


?>
<div  class="container about_block">
	<div>
		<div class="col-md-12">
			<div class="panel panel-default">
			  <div class="panel-heading panel-heading-gray">
				<a href="#" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></a>
				<i class="fa fa-fw fa-info-circle"></i> About
			  </div>
			  <div class="panel-body">
				<ul class="list-unstyled profile-about margin-none">
				  <li class="padding-v-5">
					<div class="row">
					  <div class="col-sm-4"><span class="text-muted">Firstname</span></div>
					  <div class="col-sm-8">
						<span class="first_span"><?php echo $assoc_user['firstname'] ?></span> 
						<button class="btn btn-white btn-xs pull-right first_save" style="margin-left:5px; display:none;" user_id="<?php echo $id; ?>">
							Save <i class="fa fa-pencil"></i>
						</button >
						<button class="btn btn-white btn-xs pull-right edit_first">
							Edit 
						</button>
					  </div>
					</div>
				  </li>
				  <li class="padding-v-5">
					<div class="row">
					  <div class="col-sm-4"><span class="text-muted">Lastname</span></div>
					  <div class="col-sm-8">
						<?php echo $assoc_user['lastname'] ?> 
						
						<button class="btn btn-white btn-xs pull-right">
								Edit 
						</button>
					  </div>
					</div>
				  </li>
				  <li class="padding-v-5">
					<div class="row">
					  <div class="col-sm-4"><span class="text-muted">Date of Birth</span></div>
					  <div class="col-sm-8">
						<?php echo $assoc_user['day'] ?> 
						<?php echo $assoc_user['month'] ?> 
						<?php echo $assoc_user['year'] ?>
						<button class="btn btn-white btn-xs pull-right">
								Edit 
						</button>
					  </div>
					</div>
				  </li>
				  <li class="padding-v-5">
					<div class="row">
					  <div class="col-sm-4"><span class="text-muted">Job</span></div>
						<div class="col-sm-8">
							Specialist
							<button class="btn btn-white btn-xs pull-right">
								Edit
							</button>
						</div>
					</div>
				  </li>
				  <li class="padding-v-5">
					<div class="row">
					  <div class="col-sm-4"><span class="text-muted">Gender</span></div>
						<div class="col-sm-8">
							<?php echo $assoc_user['gender'] ?> 
							
							<button class="btn btn-white btn-xs pull-right">
								Edit 
							</button>
						</div>
					   
					</div>
				  </li>
				  <li class="padding-v-5">
					<div class="row">
					  <div class="col-sm-4"><span class="text-muted">Lives in</span></div>
					  <div class="col-sm-8">
						Erevan
						<button class="btn btn-white btn-xs pull-right">
							Edit 
						</button>
					  </div>
					</div>
				  </li>
				  
				</ul>
			  </div>
			</div>
		  </div>
	
	</div>
</div>

<?php include('footer.php'); ?>