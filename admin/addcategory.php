<?php include 'libraries/session.php';
Session::checkSession(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
</head>


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
									<li class="breadcrumb-item active" aria-current="page">Add Category</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

<?php 
	if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['cateadd'])){
	$cateadd = $gnc->cateadd($_POST,$_FILES);
	}?>	

				
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<!-- Select-2 Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					
					<form method="post" enctype="multipart/form-data" >
						<div class="row">
							
									<div class="col-md-4">
										<div class="form-group">
											<label >Category Name :</label>
											<input name="cateName"type="text" class="form-control" required >
									</div>
									</div>
						</div>
					<input type="submit" name="cateadd" class="btn btn-primary" style="float:right;" value="Submit" />

					</form>

			<?php 
				if (isset($cateadd)){
					echo '<script type="text/javascript">alert("' . $cateadd . '")</script>';
			}?>

</div>

				</div>
			</div>
<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
