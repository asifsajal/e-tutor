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
								<h4>DataTable of Payments &nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#createpayment" data-whatever="@mdo"><button class="btn btn-primary icon-btn" ><i class="fa fa-fw fa-lg fa-check-circle"></i>ADD PAYMENT</button></a></h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Payment List List</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
<?php 
if (isset($_GET['deletepayment'])){
$deletepayid=$_GET['deletepayment'];
$deletepayment = $gnc->deletepayment($deletepayid);
}
?>
<?php 
	if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['submitdata'])){
	$submitpay = $gnc->submitpay($_POST,$_FILES);
	}?>

				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

					<div class="row">
						<table class="data-table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Tutor Name</th>
									<th>Paid Job ID</th>
									<th>Contact</th>
									<th>Amount</th>
									<th>Pay Type</th>
									<th>TXNID</th>
									<th>Date Time</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
				                $paymentlist= $gnc->paymentlist();
				                if($paymentlist){
				                while($result = $paymentlist->fetch_assoc()){
				                ?>
								<tr>
									<td class="table-plus"><?php echo $result['tutor_name'];?></td>
									<td><?php echo $result['paid_job_id'];?></td>
									<td><?php echo $result['tutor_phone'];?></td>
									<td><?php echo $result['paid_amount'];?></td>
									<td><?php echo $result['payment_method'];?></td>
									<td><?php echo $result['txnID'];?></td>
									<td><?php echo $result['dateTime'];?></td>
									<td>
										<a  onclick="return confirm('Are you sure to delete this Transection ?')" href="?deletepayment=<?php echo $result['payment_id'];?>"><i class="fa fa-trash"></i>&nbsp;Delete</a>
									</td>
								</tr>
							<?php }} ?>
								
							
								
							
							
	<?php 
    if (isset($deletepayment)){
    echo '<script type="text/javascript">alert("' . $deletepayment . '")</script>';
}?>	
	<?php 
    if (isset($submitpay)){
    echo '<script type="text/javascript">alert("' . $submitpay . '")</script>';
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
	<div class="modal fade" id="createpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> ADD PAYMENT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
     <form class="form-horizontal"  method="post"  enctype="multipart/form-data">
          <div class="form-group">
          </div>
		<label for="message-text" class="col-form-label">TUTOR ID *:</label>
          <input type="text" class="form-control"  name="payTutorID"  required  />
		<label for="message-text" class="col-form-label">Job ID *:</label>
          <input type="text" class="form-control"  name="payJobID" required />
		  <label for="message-text" class="col-form-label">Paid Amount *:</label>
          <input type="text" class="form-control"  name="payaAmount" required />
		  <label for="message-text" class="col-form-label">Payment Method *:</label>
          <input type="text" class="form-control"  name="payType" required />
		  <label for="message-text" class="col-form-label">TXNID :</label>
          <input type="text" class="form-control"  name="txnid"  />

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
       <input type="submit" name="submitdata" class="btn btn-primary" value="Submit"/>
      </div>
      </form>
    </div>

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