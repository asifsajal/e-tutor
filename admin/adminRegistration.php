<?php include 'libraries/session.php';
Session::checkSession(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
</head>
<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<?php include 'classes/registration.php';?>
	<?php 
		$reg= new registration();
		if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['adminReg'])){
		$adminReg = $reg ->adminReg($_POST,$_FILES);
		}
	?>



	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">

				<!-- Default Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">Admin Registration</h4>
						</div>&nbsp;&nbsp;&nbsp;&nbsp;
						<h3>
							<?php 
								if (isset($adminReg)){
											echo $adminReg;
							}?></h3>
					</div></br>

					<form class="form-horizontal"  method="post" action="" enctype="multipart/form-data">

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name:</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="adminName" type="text" placeholder="Enter admin name"required>
							</div>
							<input type="name" name="creator" id="name" class="col-xs-12 col-sm-6"required value="<?php echo"$newLoggedAdminInfo"?>" hidden/>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Phone Number:</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"name="adminphone" placeholder="Enter admin's phone number" type="text" required maxlength="11" pattern="^\d{11}$">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email:</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="adminemail" type="email" placeholder="Enter admin's email" maxlength="49"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password:</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"name="Password" placeholder="Enter admin's password" type="password" required>
							</div>
						</div>
					
						<div class="form-group">
							<label>Address:</label>
							<textarea name="Address" class="form-control" required></textarea>
						</div>

						<div class="form-group">
							<label>Photo (Size Max 500kb and only Jpg/jpeg file are allowed!):</label>
							<input type="file"name="image" class="form-control-file form-control height-auto" required>
						</div>
						<div class="clearfix">
						
						<div class="pull-right">
							
							<button class="btn btn-info" name="adminReg">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
							</button>
						</div>
						</div>
					</form>
				</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
</div>
	<?php include('include/script.php'); ?>
</body>
</html>