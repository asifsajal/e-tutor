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

<script type="text/javascript">
    function detailViewFunction(name,msg){

        $("#name").html(name);
        $("#message").html(msg);

        $("#detailModal").modal('show');
    }
</script>

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
									<li class="breadcrumb-item active" aria-current="page">Student Feedback</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>


<?php 
if (isset($_GET['delfed'])){
$delfed=$_GET['delfed'];
$delfed = $gnc->delfed($delfed);
}
?>
<?php 
if (isset($_GET['confed'])){
$confed=$_GET['confed'];
$confed = $gnc->confed($confed);
}
?>
<?php 
if (isset($_GET['remfed'])){
$remfed=$_GET['remfed'];
$remfed = $gnc->remfed($remfed);
}
?>

				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">SL</th>
									<th>Name</th>
									<th>Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$student_feedbackall= $gnc->student_feedbackall();
									if($student_feedbackall){
									$i=0;
									while($value = $student_feedbackall->fetch_assoc()){
									$i++;
								?>
								<tr>
									<td class="table-plus"><?php echo $i;?></td>
									<td><?php echo $value['sname'];?></td>

									<td><?php $stst = $value['status']; if($stst=="0"){ ?> <i class="fa fa-user-times" aria-hidden="true" id="red"> <?php echo"Not Approved";}else{?><i class="fa fa-check" aria-hidden="true" id="green"><?php echo"Approved";}?></i>
									</td>
									<td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a href="#" class="dropdown-item" onclick= "detailViewFunction( <?php echo "'".$value["sname"]."','".$value["student_feedback"]."'" ?>)"><i class="fa fa-eye"></i> View</a>

												<?php $stst = $value['status']; if($stst=="0"){ ?>

												<a class="dropdown-item" onclick="return confirm('Are you sure to confirm this Feedback?')" href="?confed=<?php echo $value['id'];?>"><i class="fa fa-check"></i> Confirm</a> <?php } else if($stst=="1") { ?>

													<a class="dropdown-item" onclick="return confirm('Are you sure to Remove this Feedback?')" href="?remfed=<?php echo $value['id'];?>"><i class="fa icon-remove"></i> Remove</a> <?php } ?>


												<a class="dropdown-item" onclick="return confirm('Are you sure to delete this Feedback?')" href="?delfed=<?php echo $value['id'];?>"><i class="fa fa-trash"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
							<?php }} ?>
								
							
									
							</tbody>
						</table>
					</div>
				</div>







<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Feedback Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container2" style="width: 100%;">
            
            <div class="row">
              <div class="col-md-12">
                  <p style="font-size: 20px;font-weight: bold;color: maroon;">Name: <span id="name"> </span></p>
              </div>
                       
              <div class="col-md-12">
                  <textarea id="message" style="font-size: 20px;color: black;font-weight: bold;width: 100%;min-height: 100px;border-radius: 10px;background:white;" disabled></textarea>
              </div> 
            </div> 
      </div>
    </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>           
      </div>
    </div>
  </div>
</div>
				<!-- Simple Datatable End -->

<?php 
    if (isset($delfed)){
    echo '<script type="text/javascript">alert("' . $delfed . '")</script>';
}?>	
<?php 
    if (isset($confed)){
    echo '<script type="text/javascript">alert("' . $confed . '")</script>';
}?>	
<?php 
    if (isset($confed)){
    echo '<script type="text/javascript">alert("' . $remfed . '")</script>';
	
	error_reporting(0);
}?>	

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