<?php include 'libraries/session.php';
Session::checkSession(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
</head>

	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>

	<?php
	if (!isset($_GET['couid'])||$_GET['couid']==NULL){
	echo "<script>window.location ='404.php';</script>";
	}else{$couid = preg_replace('/[^-a-zA-Z0-9_]/','',$couid = $_GET['couid']);
	}

?>


	<?php 
	if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['courseedit'])){
	$courseedit = $gnc->courseedit($_POST,$_FILES);
	}?>	


	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Course</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<!-- Select-2 Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					
					<form method="post" enctype="multipart/form-data" >
						<?php 
							 $EC= $gnc->EC($couid);
							if($EC){
							while($result = $EC->fetch_assoc()){
						?>
						<div class="row">
							
									<div class="col-md-4">
										<div class="form-group">
											<label >Course Name :</label>
											<input name="courseName"type="text" class="form-control" required value="<?php echo $result['subCat_Name'];?>" />
									</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input name="couid" type="text" class="form-control" required value="<?php echo $result['subCat_id'];?>" hidden />
										</div>
									</div>
						</div>
					<input type="submit" name="courseedit" class="btn btn-primary" style="float:right;" value="Save" />
				<?php }}?>
					</form>

			<?php 
				if (isset($courseedit)){
					echo '<script type="text/javascript">alert("' . $courseedit . '")</script>';
			}?>

</div>

				</div>
			</div>
<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
