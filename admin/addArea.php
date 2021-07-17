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
	if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['areaadd'])){
	$areaadd = $gnc->areaadd($_POST,$_FILES);
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
									<li class="breadcrumb-item active" aria-current="page">Add Area</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<!-- Select-2 Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					
					<form method="post" enctype="multipart/form-data" >
						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label>Select a District</label>
								

									<select class="selectpicker form-control" data-style="btn-outline-primary" name="districtIdInArea">
										<optgroup label="Condiments" data-max-options="2">
											<option  value=""  >Select One</option>
											<?php 
							                $getallDistrict= $gnc->getallDistrict();
							                if($getallDistrict){
							                while($result = $getallDistrict->fetch_assoc()){
							                ?>
											<option value="<?php echo $result['district_id'];?>">
												<?php echo $result['district_name'];?></option>
											<?php }} ?>
										</optgroup>
									</select>

								</div>
							</div>
									<div class="col-md-4">
										<div class="form-group">
											<label >Area Name :</label>
											<input name="areaName"type="text" class="form-control" required >
									</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label >Area Code :</label>
											<input name="areaCode" type="text" class="form-control" >
										</div>
									</div>
						</div>
					<input type="submit" name="areaadd" class="btn btn-primary" style="float:right;" value="Submit" />

					</form>

			<?php 
				if (isset($areaadd)){
					echo '<script type="text/javascript">alert("' . $areaadd . '")</script>';
			}?>

</div>

				</div>
			</div>
<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
