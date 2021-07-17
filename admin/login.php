<?php include('include/head.php'); ?>
<?php include 'classes/loginClass.php';?>
<?php
$al = new login();
$db =new Database();
$fm =new Format();
if($_SERVER['REQUEST_METHOD']== 'POST'){
$adminUsername =$_POST['adminUsername'];
$adminPass = md5($_POST['adminPass']);//here pass will be md5
$loginChk = $al->adminLogin($adminUsername,$adminPass);
}?>
<!DOCTYPE html>
<html>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<img src="vendors/images/login-img.png" alt="login" class="login-img">
			<h2 class="text-center mb-30">Admin Login</h2>
											<div style="color:red;text-align: center;">
											<?php 
												  if(isset($loginChk))
												  {echo $loginChk;
											}?>
											</div>
			<form method="post">
				<div class="input-group custom input-group-lg">
					<input type="mail" name="adminUsername"class="form-control" placeholder="E-mail">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" name="adminPass"class="form-control" placeholder="**********">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group">
								<input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Sign In">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="forgot-password padding-top-10"><a href="forgot-password.php">Forgot Password</a></div>
					</div>
				</div>
			</form>

		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>