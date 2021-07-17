<?php include 'libraries/session.php';
Session::checkSession(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
		<link rel="stylesheet" type="text/css" href="reset-fonts-grids.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="resume.css" media="all" />
</head>

<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>

<?php
	if (!isset($_GET['identificationID'])||$_GET['identificationID']==NULL){
	echo "<script>window.location ='404.php';</script>";
	}else{$identificationID = preg_replace('/[^-a-zA-Z0-9_]/','',$id = $_GET['identificationID']);
	}

?>


	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<button style="float:right" class="btn btn-success" onclick="printDiv('printableArea')">Download CV</button>
			<div class="min-height-200px" id="printableArea">

				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

<div id="doc2" class="yui-t7">
	<div id="inner">
<?php 
	 $tutorcv= $gnc->tutorcv($identificationID);
	if($tutorcv){
	while($result = $tutorcv->fetch_assoc()){
?>

	<!-- start cv from here-->
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h1><?php echo $result['tutor_name'];?></h1>
				</div>
<span><img src="../img/users-image/<?php echo $result['tutor_image'];?>" height="100px" width="100px" style="float:right"></span>
			</div>
		</div>

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Remarks</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge"><?php echo $result['whyHire'];?></p>
						</div>
					</div>

					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Educational Qualification</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">

							<div class="job">
								<h4>Last Degree:&nbsp; <?php echo $result['EHQ'];?></h4>
								<h4>Current Institute:&nbsp; <?php echo $result['CIN'];?></h4>
								<h4>Current Subject:&nbsp; <?php echo $result['CIN_SUB'];?> </h4>
							</div>

							<div class="job">
								<h3>SSC (Secondary School Certificate)</h3>
								<?php
						        $datassc=$result['ssc'];
						        $ssc=explode(",",$datassc);
						        ?>
								<h4>Institute:&nbsp; <?php echo $ssc[0]?></h4>
								<h4>Group:&nbsp; <?php echo $ssc[1]?></h4>
								<h4>Board:&nbsp; <?php echo $ssc[4]?> </h4>
								<h4>Result:&nbsp; <?php echo $ssc[2]?> </h4>
								<h4>Passing Year:&nbsp; <?php echo $ssc[5]?></h4>
							</div>

							<div class="job">
								<h3>HSC (Higher Secondary School Certificate)</h3>
								<?php
						        $datahsc=$result['hsc'];
						        $hsc=explode(",",$datahsc);
						        ?>
								<h4>Institute:&nbsp; <?php echo $hsc[0]?> </h4>
								<h4>Board:&nbsp; <?php echo $hsc[1]?></h4>
								<h4>Board:&nbsp; <?php echo $hsc[4]?> </h4>
								<h4>Result:&nbsp; <?php echo $hsc[2]?> </h4>
								<h4>Passing Year:&nbsp; <?php echo $hsc[5]?></h4>
							</div>

							<div class="job">
								<h3>Graduation</h3>
								<?php
						        $datagraduation=$result['graduation'];
						        $graduation=explode(",",$datagraduation);
						        ?>
								<h4>Institute:&nbsp; <?php echo $graduation[0]?></h4>
								<h4>Subject/Department:&nbsp; <?php echo $graduation[1]?></h4>
								<h4>Result:&nbsp; <?php echo $graduation[2]?></h4>
								<h4>Passing Year:&nbsp; <?php echo $graduation[3]?></h4>
							</div>

							<div class="job">
								<h3>Masters</h3>
								<?php
						        $datamasters=$result['masters'];
						        $masters=explode(",",$datamasters);
						        ?>
								<h4>Institute:&nbsp; <?php echo $masters[0]?></h4>
								<h4>Subject/Department:&nbsp; <?php echo $masters[1]?></h4>
								<h4>Result:&nbsp; <?php echo $masters[2]?></h4>
								<h4>Passing Year:&nbsp; <?php echo $masters[3]?></h4>
							</div>

						</div>
					</div>


					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Personal Information :</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">

							<div class="job">
								<h4>Father's Name : &nbsp;<?php echo $result['fatherName'];?></h4>
								<h4>Mother's Name: &nbsp;<?php echo $result['motherName'];?></h4>
								<h4>DOB: &nbsp;<?php echo $result['dob'];?></h4>
								<h4>Gender: &nbsp;<?php echo $result['tutor_gender'];?></h4>
								<h4>Religion:&nbsp;<?php echo $result['religion'];?></h4>
								<h4>NID / Birth ID:&nbsp;<?php echo $result['NIDBID'];?></h4>
								<h4>Permanent Address: &nbsp;<?php echo $result['permanentAddress'];?></h4>
							</div>

						</div>
					</div>


					<div class="yui-gf last">
						<div class="yui-u first">
							<h2>Others Experience</h2>
						</div>
						<div class="yui-u">
							<h3>&nbsp;<?php echo $result['experience'];?></h3>
						</div>
					</div>
					<div class="yui-gf last">
						<div class="yui-u first">
							<h2>Extra Carricular Activities</h2>
						</div>
						<div class="yui-u">
							<h3>&nbsp;<?php echo $result['extraActivities'];?></h3>
						</div>
					</div>


				
			</div>
		</div>
<?php }} ?>

	</div>


</div>

<!-- end cv here-->
</div>

<script type="text/javascript">function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}</script>


				</div>
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>