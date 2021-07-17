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
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Job Details</li>
								</ol>
							</nav>
						</div>

					</div>
				</div>

<?php
	if (!isset($_GET['jobID'])||$_GET['jobID']==NULL){
	echo "<script>window.location ='404.php';</script>";
	}else{$jobid = preg_replace('/[^-a-zA-Z0-9_]/','',$id = $_GET['jobID']);
	}

?>


				<div class="invoice-wrap">
					<div class="invoice-box">
						<div class="invoice-header">
							<div class="logo text-center">
								<img src="<?php echo "$app_slogo_path"?>" alt="">
							</div>
						</div>
						<h4 class="text-center mb-30 weight-600">Job Details</h4>

								<?php 
				                $getjobbyID= $gnc->getjobbyID($jobid);
				                if($getjobbyID){
				                while($result = $getjobbyID->fetch_assoc()){
				                ?>

						<div class="row pb-30">
							<div class="col-md-6">
								<h5 class="mb-15">Client Name: <?php echo $result['studentName'];?></h5>
								<p class="font-14 mb-5">Gender : <strong class="weight-600">
								    <?php $sg=$result['studentGender']; if($sg=='A'){echo"Any";}elseif($sg=='F'){echo"Female";}elseif($sg=='M'){echo"Male";}?>
								    </strong></p>
								<p class="font-14 mb-5">Date Issued: <strong class="weight-600"><?php echo $result['postTime'];?></strong></p>
								<p class="font-14 mb-5">Job ID No: <strong class="weight-600"><?php echo $result['jobNumber'];?></strong></p>
								<p class="font-14 mb-5">Tutor may Join: <strong class="weight-600"><?php echo $result['lookingDate'];?></strong></p>
							</div>
							<div class="col-md-6">
								<div class="text-right">
									<p class="font-14 mb-5">Address</p>
									<p class="font-14 mb-5 weight-600"><?php echo $result['studentAddress'];?></br><?php echo $result['area_name'];?></br><?php echo $result['district_name'];?></p>
								</div>
							</div>
						</div>
						<div class="invoice-desc pb-30">
							<div class="invoice-desc-head clearfix">
								<div class="invoice-sub">Requirments</div>
								<div class="invoice-subtotal"><span class="weight-600">Details</span></div>
							</div>
							<div class="invoice-desc-body">
								<ul>
									
									<li class="clearfix">
										<div class="invoice-sub">Category</div>
										<div class="invoice-subtotal"><span class="weight-600"><?php echo $result['category_name'];?></span></div>
									</li>
									<li class="clearfix">
										<div class="invoice-sub">Course</div>
										<div class="invoice-subtotal"><span class="weight-600"><?php echo $result['subCat_Name'];?></span></div>
									</li>
									<li class="clearfix">
										<div class="invoice-sub">Subject</div>
										<div class="invoice-subtotal"><span class="weight-600"><?php echo $result['subjects'];?></span></div>
									</li>
									
									<li class="clearfix">
										<div class="invoice-sub">Institute</div>
										<div class="invoice-subtotal"><span class="weight-600"><?php echo $result['StudentInstitute'];?></span></div>
									</li>
									<li class="clearfix">
										<div class="invoice-sub">Phone Number</div>
										<div class="invoice-subtotal"><span class="weight-600"><?php echo $result['phoneNumber'];?></span></div>
									</li>
									<li class="clearfix">
										<div class="invoice-sub">E-Mail</div>
										<div class="invoice-subtotal"><span class="weight-600"><?php echo $result['studentemail'];?></span></div>
									</li>
									<li class="clearfix">
										<div class="invoice-sub">Tutor Gender Prefer</div>
										<div class="invoice-subtotal"><span class="weight-600">
										    <?php $tg=$result['tutorGender']; if($tg=='A'){echo"Any";}elseif($tg=='F'){echo"Female";}elseif($tg=='M'){echo"Male";}?>
										    </span></div>
									</li>
									<li class="clearfix">
										<div class="invoice-sub">Days in a Week</div>
										<div class="invoice-subtotal"><span class="weight-600"><?php echo $result['daysInAWeek'];?></span></div>
									</li>
									<li class="clearfix">
										<div class="invoice-sub">Salary</div>
										<div class="invoice-subtotal"><span class="weight-600"><?php echo $result['salary'];?></span></div>
									</li>
									<li class="clearfix">
										<div class="invoice-sub">Tutoring Time</div>
										<div class="invoice-subtotal"><span class="weight-600"><?php echo $result['tutoringTime'];?></span></div>
									</li>
									<li class="clearfix">
										<div class="invoice-sub">Number of Student</div>
										<div class="invoice-subtotal"><span class="weight-600"><?php echo $result['studentNumber'];?></span></div>
									</li>
									<li class="clearfix">
										<div class="invoice-sub">Other Requirments</div>
										<div class=""><p class="font-14 mb-5 weight-600"><?php echo $result['requirments'];?></p></div>
									</li>

								</ul>
							</div>

							
						<?php }} ?>

						</div>
						<h4 class="text-center pb-20">Thank You!!</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>