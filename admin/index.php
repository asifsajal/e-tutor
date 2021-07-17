<?php include 'libraries/session.php';
Session::checkSession(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
</head>
<style type="text/css">.blinking{
    animation:blinkingText 0.8s infinite;
}
@keyframes blinkingText{
    0%{     color: red;    }
    50%{    color: transparent; }
    100%{   color: red;    }
}
</style>
<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="row clearfix progress-box">


<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<a href="applied.php"><div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-blue text-white">
									<i class="fa fa-eercast"></i>
								</div>
							</div>

							<div class="project-info-right">
								<?php 
				                $getallappliedJobs= $gnc->getallappliedJobs();
				                if($getallappliedJobs){$ai=0;
				                while($result = $getallappliedJobs->fetch_assoc()){$ai++;
				                ?><?php }}?>
								<span class="no text-blue weight-500 font-24"><?php echo"$ai";?></span>
								<p class="weight-400 font-18">Jobs where Tutors Applied</p>
							</div>


						</div></a>
					</div>
				</div>



				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<a href="tutorslist.php"><div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-blue text-white">
									<i class="fa fa-briefcase"></i>
								</div>
							</div>

							<div class="project-info-right">
								<?php 
				                $getTutorData= $gnc->getTutorData();
				                if($getTutorData){$ai=0;
				                while($result = $getTutorData->fetch_assoc()){$ai++;
				                ?><?php }}?>
								<span class="no text-blue weight-500 font-24"><?php echo"$ai";?></span>
								<p class="weight-400 font-18">Registered Tutors</p>
							</div>


						</div></a>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<a href="tutorApproval.php">
							<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-green text-white">
									<i class="fa fa-bell"></i>
								</div>
							</div>
							<div class="project-info-right">
								<?php 
				                $getTutorDataUnapproved= $gnc->getTutorDataUnapproved();
				                if($getTutorDataUnapproved){ $iv=0;
				                while($result = $getTutorDataUnapproved->fetch_assoc()){
				                	$iv++;
				                ?>
				            <?php }}?>

								<span class="no text-light-green weight-500 font-24"><?php echo "$iv";?></span>
								<p class="weight-400 font-18">Unapproved Tutor</p>
								<?php if($iv!=0){?>
								<span class="blinking">Approval Required</span><?php } ?>
							</div>
						</div></a>
						
					</div>
				</div>

			
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 margin-5 height-100-p">
						<a href="unapprovedJobList.php">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-orange text-white">
									<i class="fa fa-podcast"></i>
								</div>
							</div>
							<div class="project-info-right">
								<?php 
				                $getJobsDataUnapproved= $gnc->getJobsDataUnapproved();
				                if($getJobsDataUnapproved){ $ic=0;
				                while($result = $getJobsDataUnapproved->fetch_assoc()){
				                	$ic++;
				                ?>
				            <?php }}?>
								<span class="no text-light-purple weight-500 font-24"><?php echo "$ic";?></span>
								<p class="weight-400 font-18">Pending Jobs</p>
								<?php if($ic!=0){?>
								<span class="blinking">Approval Required</span><?php } ?>
							</div>
						</div></a>
					</div>
				</div>


				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 margin-5 height-100-p">
						<a href="waitingJobs.php"><div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-purple text-white">
									<i class="fa fa-wifi"></i>
								</div>
							</div>
							<div class="project-info-right">
								<?php 
				                $getJobsDataposted= $gnc->getJobsDataposted();
				                if($getJobsDataposted){ $jo=0;
				                while($result = $getJobsDataposted->fetch_assoc()){
				                	$jo++;
				                ?>
				            <?php }}?>
								<span class="no text-light-purple weight-500 font-24"><?php echo "$jo";?></span>

								<p class="weight-400 font-18">Total Jobs in Website</p>
							</div></a>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 margin-5 height-100-p">
						<a href="allJobsinDB.php">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-purple text-white">
									<i class="fa fa-file-o"></i>
								</div>
							</div>
							<div class="project-info-right">
								<?php 
				                $getJobsDataAll= $gnc->getJobsDataAll();
				                if($getJobsDataAll){ $jol=0;
				                while($result = $getJobsDataAll->fetch_assoc()){
				                	$jol++;
				                ?>
				            <?php }}?>
								<span class="no text-light-purple weight-500 font-24"><?php echo "$jol";?></span>

								<p class="weight-400 font-18">Total Jobs Posted.</p>
							</div>
						</div></a>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 margin-5 height-100-p">
						<a href="tutorFeedback.php">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-orange text-white">
									<i class="fa fa-book"></i>
								</div>
							</div>
							<div class="project-info-right">
								<?php 
				                $getTutorfeddbackUap= $gnc->getTutorfeddbackUap();
				                if($getTutorfeddbackUap){ $icz=0;
				                while($result = $getTutorfeddbackUap->fetch_assoc()){
				                	$icz++;
				                ?>
				            <?php }}?>
								<span class="no text-light-purple weight-500 font-24"><?php echo "$icz";?></span>
								<p class="weight-400 font-18">Tutor Feedback</p>
								<?php if($icz!=0){?>
								<span class="blinking">Approval Required</span><?php } ?>
							</div>
						</div></a>
					</div>
				</div>


				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 margin-5 height-100-p">
						<a href="studentFeedback.php">
						<div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-light-orange text-white">
									<i class="fa fa-graduation-cap"></i>
								</div>
							</div>
							<div class="project-info-right">
								<?php 
				                $student_feedback= $gnc->student_feedback();
				                if($student_feedback){ $icc=0;
				                while($result = $student_feedback->fetch_assoc()){
				                	$icc++;
				                ?>
				            <?php }}?>
								<span class="no text-light-purple weight-500 font-24"><?php echo "$icc";?></span>
								<p class="weight-400 font-18">Student Feedback</p>
								<?php if($icc!=0){?>
								<span class="blinking">Approval Required</span><?php } ?>
							</div>
						</div></a>
					</div>
				</div>

				
			<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<a href="paymentlist.php"><div class="project-info clearfix">
							<div class="project-info-left">
								<div class="icon box-shadow bg-blue text-white">
									<i class="fa fa-money" aria-hidden="true"></i>
								</div>
							</div>

							<div class="project-info-right">
								<?php 
				                $countPayment= $gnc->countPayment();
				                if($countPayment){$payi=0;
				                while($result = $countPayment->fetch_assoc()){$payi++;
				                ?><?php }}?>
								<span class="no text-blue weight-500 font-24"><?php echo"$payi";?></span>
								<p class="weight-400 font-18">Tutors Paid.</p>
							</div>


						</div></a>
					</div>
				</div>
				
				
			</div>


			<!--<div class="row clearfix">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<h4 class="mb-20">Recent Messages</h4>
						<div class="notification-list mx-h-450 customscroll">
							<ul>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3 class="clearfix">John Doe <span>3 mins ago</span></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<h4 class="mb-30">To Do list</h4>
						<div class="to-do-list mx-h-450 customscroll">
							<ul>
								<li>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
									</div>
								</li>
								
							</ul>
						</div>
					</div>
				</div>-->
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>