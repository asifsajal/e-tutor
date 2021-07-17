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

<?php
	if (!isset($_GET['jobID'])||$_GET['jobID']==NULL){
	echo "<script>window.location ='404.php';</script>";
	}else{$jobidz = preg_replace('/[^-a-zA-Z0-9_]/','',$id = $_GET['jobID']);
	}

?>


	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="container pd-0">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Applied tutor list</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="contact-directory-list">
						<ul class="row">

								<?php 
				                $galli= $gnc->galli($jobidz);
				                if($galli){
				                while($result = $galli->fetch_assoc()){
				                ?>

							<li class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
								<div class="contact-directory-box">
									<div class="contact-dire-info text-center">
										<div class="contact-avatar">
											<span><?php $filepath=realpath (dirname(__FILE__));?>
												<img src="../img/users-image/<?php echo $result['tutor_image'];?>" alt="">
											</span>
										</div>
										<div class="contact-name">
											<h4><?php echo $result['tutor_name'];?></h4>
											<p><i class="fa fa-graduation-cap"></i>&nbsp;<?php echo $result['graduation'];?></p>
											<div class="work text-success"><i class="fa fa-mobile"></i>&nbsp;<?php echo $result['tutor_phone'];?></div>
											<div class="work text-success"><i class="fa fa-envelope"></i>&nbsp;<?php echo $result['tutor_email'];?></div>
										</div>
										<div class="profile-sort-desc"><i class="fa fa-map-marker"></i>&nbsp;
											<?php echo $result['presentAddress'];?>
										</div>
									</div>
									<div class="view-contact">
										<a href="viewCV.php?identificationID=<?php echo $result['tutor_id']; ?>" target="_blank">View Full Profile</a>
									</div>
								</div>
							</li>
							<?php }} ?>
							
							
						
							
							
							
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>