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
	if (!isset($_GET['aid'])||$_GET['aid']==NULL){
	echo "<script>window.location ='404.php';</script>";
	}else{$aid = preg_replace('/[^-a-zA-Z0-9_]/','',$aid = $_GET['aid']);
	}

?>


	<?php 
	if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['areaedit'])){
	$areaedit = $gnc->areaedit($_POST,$_FILES);
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
									<li class="breadcrumb-item active" aria-current="page">Edit Area</li>
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
							 $EA= $gnc->EA($aid);
							if($EA){
							while($result = $EA->fetch_assoc()){
						?>
						<div class="row">
							
									<div class="col-md-4">
										<div class="form-group">
											<label >Area Name :</label>
											<input name="areaName"type="text" class="form-control" required value="<?php echo $result['area_name'];?>" />
									</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label >Area Code :</label>
											<input name="areaCode" type="text" class="form-control" required value="<?php echo $result['area_code'];?>" />
											<input name="areaid" type="text" class="form-control" required value="<?php echo $result['area_id'];?>" hidden />
										</div>
									</div>
						</div>
					<input type="submit" name="areaedit" class="btn btn-primary" style="float:right;" value="Save" />
				<?php }}?>
					</form>

			<?php 
				if (isset($areaedit)){
					echo '<script type="text/javascript">alert("' . $areaedit . '")</script>';
			}?>

</div>

				</div>
			</div>
<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
