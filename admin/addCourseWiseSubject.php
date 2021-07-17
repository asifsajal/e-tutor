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
	if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['subjectadd'])){
	$subjectadd = $gnc->subjectadd($_POST,$_FILES);
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
									<li class="breadcrumb-item active" aria-current="page">Add Subject</li>
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
									<label>Select a Category</label>
								<?php
									$sql = "SELECT * FROM application_category ORDER BY category_name";
										 try {
										 $stmt = $DB->prepare($sql);
										 $stmt->execute();
										$results = $stmt->fetchAll();
											} catch (Exception $ex) {
										 echo($ex->getMessage());
										 }
									?>

									<select class="selectpicker form-control" data-style="btn-outline-primary" name="Category" required id="platform" onChange="showcategory(this);">
										<optgroup label="Condiments" data-max-options="2">
											<option  value=""  >Select One</option>
											
								<?php foreach ($results as $rs) { ?>
								<option value="<?php echo $rs["cat_id"]; ?>"><?php echo $rs["category_name"]; ?></option>
										<?php } ?>
												
										</optgroup>
									</select>

								</div>
							</div>
									<div class="col-md-4">
										<div class="form-group">
											<label >Select Course :</label>
											<div id="output1"></div>
									</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label >Enter Subject Name :</label>
											<input name="subject" type="text" class="form-control" required placeholder="Enter a subject name">
										</div>
									</div>
						</div>

															<script>
																function showcategory(sel) {
																	var product_category = sel.options[sel.selectedIndex].value;
																	$("#output1").html("");
																	if (product_category.length > 0) {

																	$.ajax({
																		type: "GET",
																		url: "fetchCatAndCouse.php",
																		data: "product_category=" + product_category,
																		cache: false,
																		beforeSend: function() {
																			$('#output1').html('<img src="loader.gif" alt="" width="24" height="24">');
																		},
																		success: function(html) {
																			$("#output1").html(html);
																		}
																	});
																}
																}
															</script>



		<input type="submit" name="subjectadd" class="btn btn-primary" style="float:right;" value="Submit" />

					</form>

			<?php 
				if (isset($subjectadd)){
					echo '<script type="text/javascript">alert("' . $subjectadd . '")</script>';
			}?>

</div>

				</div>
			</div>
<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
