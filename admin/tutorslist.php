<?php include 'libraries/session.php';
Session::checkSession(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
</head>
<style type="text/css">
	#green{color:green;}
	#red{color:red;}
</style>

<body>
	<?php include('include/header.php'); ?>
	<?php include('include/sidebar.php'); ?>
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>DataTable</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Tutor List</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
<?php 
if (isset($_GET['delt'])){
$tidd=$_GET['delt'];
$delt = $gnc->delt($tidd);
}
?>


				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Name</th>
									<th>Gender</th>
									<th>Medium</th>
									<th>E-mail</th>
									<th>Contact</th>
									<th>Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
				                $getTutorData= $gnc->getTutorData();
				                if($getTutorData){
				                while($result = $getTutorData->fetch_assoc()){
				                ?>
								<tr>
									<td class="table-plus"><?php echo $result['tutor_name'];?></td>
									<td><?php echo $result['tutor_gender'];?></td>
									<td><?php $rem = $result['tutor_Prefer_medium']; if($rem=="B"){echo"Bangla";}else{echo"English";}?></td>
									<td><?php echo $result['tutor_email'];?></td>
									<td><?php echo $result['tutor_phone'];?></td>
									<td><?php $stst = $result['user_access']; if($stst=="0"){ ?> <i class="fa fa-user-times" aria-hidden="true" id="red"> <?php echo"Pending";}else{?><i class="fa fa-check" aria-hidden="true" id="green"><?php echo"Approved";}?></i>
									</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="viewCV.php?identificationID=<?php echo $result['tutor_id']; ?>"><i class="fa fa-eye"></i> &nbsp;View CV</a>
												<a class="dropdown-item" onclick="return confirm('Are you sure to delete this Tutor ?')" href="?delt=<?php echo $result['tutor_id'];?>"><i class="fa fa-trash"></i>&nbsp;Delete Tutor</a>
											</div>
										</div>
									</td>
								</tr>
							<?php }} ?>
								
							
								
							
							
	<?php 
    if (isset($delt)){
    echo '<script type="text/javascript">alert("' . $delt . '")</script>';
}?>							
							
							
								
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
				

			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<?php include('include/script.php'); ?>
	<script src="src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
	<script src="src/plugins/datatables/media/js/dataTables.responsive.js"></script>
	<script src="src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.print.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.html5.js"></script>
	<script src="src/plugins/datatables/media/js/button/buttons.flash.js"></script>
	<script src="src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
	<script>
		$('document').ready(function(){
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
			});
			$('.data-table-export').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'pdf', 'print'
				]
			});
			var table = $('.select-row').DataTable();
			$('.select-row tbody').on('click', 'tr', function () {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			});
			var multipletable = $('.multiple-select-row').DataTable();
			$('.multiple-select-row tbody').on('click', 'tr', function () {
				$(this).toggleClass('selected');
			});
		});
	</script>
</body>
</html>