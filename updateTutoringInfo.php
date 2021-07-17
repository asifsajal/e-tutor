<?php include('include/header.php');?>
<?php
$lgn= Session::get("tlogin"); 
 if($lgn==true) {?>


<?php
include('config/database_connection.php');
$zella = '';
$query = "SELECT * FROM area_district ORDER BY district_name ASC";//" SELECT * FROM application_category ORDER BY cat_id ASC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
  $zella .= '<option value="'.$row["district_id"].'">'.$row["district_name"].'</option>';
}
?>
<?php include 'classes/registration.php';
$reg= new registration();?>
    <?php 
        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['updateinfo'])){
            $sid=$tutor_id;
             $areaNames=$_POST["areaNames"];
    $areaNames = implode(",",$areaNames);
        $updateinfo = $reg ->updateinfo($_POST,$_FILES,$sid,$areaNames);
        }
    ?>
<head>
    <link rel="stylesheet" type="text/css" href="wizard/jquery-steps/build/jquery.steps.css">
</head>
<body>
    <div class="container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="min-height-200px">

                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <div class="clearfix" style="text-align: center;">
                        <h4 class="text-blue">Fill up your tutoring information</h4>
                    </div>
                    <div class="wizard-content">
    <form class="tab-wizard wizard-circle wizard" method="post" action="" enctype="multipart/form-data">
                            <h5>Prefer Area</h5>
                            <section>
                                <div class="row">
									 <div class="col-md-6">
									     <div class="form-group">
					  <head>
					<script src="js/jquery.lwMultiSelect.js"></script>
					<link rel="stylesheet" href="css/jquery.lwMultiSelect.css" />
					  </head>
														    
									   <label>Select District* :</label>
									        <select name="district" required id="zella" class="form-control action" required >
									          <option disabled selected>Select district*</option>
									          <?php echo $zella; ?>
									        </select>
									      </div>
									</div>   
                                 
                                  
                                </div>



									<div class="row">
									  <div class="col-md-12">
									    <label>Select Area* :</label>
									     <div class="form-group">
									        <select name="areaNames[]" id="city" multiple class="form-control" required > 
									        </select>



									</div>
									</div>
									</div>
						<script>
						$(document).ready(function(){

						  $('#city').lwMultiSelect();

						  $('.action').change(function(){
						    if($(this).val() != '')
						    {
						      var action = $(this).attr("id");
						      var query = $(this).val();
						      var result = '';
						      if(action == 'zella')
						      {
						        result = 'city';
						      }
						      $.ajax({
						        url:'fetchareafortutor.php',
						        method:"POST",
						        data:{action:action, query:query},
						        success:function(data)
						        {
						          $('#'+result).html(data);
						          if(result == 'city')
						          {
						            $('#city').data('plugin_lwMultiSelect').updateList();
						          }
						        }
						      })
						    }
						  });

						  $('#insert_data').on('submit', function(event){
						    event.preventDefault();
						    if($('#zella').val() == '')
						    {
						      alert("Please Select District");
						      return false;
						    }
						    else if($('#city').val() == '')
						    {
						      alert("Please Select Area(s)");
						      return false;
						    }
						    else
						    {
						      $('#hidden_city').val($('#city').val());
						      $('#action').attr('disabled', 'disabled');
						      var form_data = $(this).serialize();
						      $.ajax({
						        url:"insert.php",
						        method:"POST",
						        data:form_data,
						        success:function(data)
						        {
						          $('#action').attr("disabled", "disabled");
						          if(data == 'done')
						          {
						            $('#city').html('');
						            $('#city').data('plugin_lwMultiSelect').updateList();
						            $('#city').data('plugin_lwMultiSelect').removeAll();
						            $('#insert_data')[0].reset();
						            alert('Data Inserted');
						          }
						        }
						      });
						    }
						  });

						});
						</script>



                            </section>
                            <!-- Step 2 -->
                            <h5>Others</h5>
                            <section>
                            <?php 
    $gettutordata= $gnc->gettutordata($tutor_id);
    if($gettutordata){
    while($result = $gettutordata->fetch_assoc()){

 $prefer_salary=$result['prefer_salary'];
  $experience=$result['experience'];
   $whyHire=$result['whyHire'];
           }
} ?>      
							<div class="row">
                                   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Salary/Month (in Taka)* :</label>
                                      <input type="text" class="form-control" name="expsalary" required placeholder="Enter Salary/Month Amount *" value="<?php echo "$prefer_salary";?>" maxlength="6">
                                        </div>
                                    </div>
                                  
                           </div>
                               
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Experience :</label>
                                            <textarea class="form-control" name="experience"placeholder="Experience" maxlength="200"><?php echo "$experience";?></textarea>
                                        </div>
                                    </div>
                                  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Why should you are best? :</label>
                                            <textarea class="form-control" name="whyhire" placeholder="Why should you are best?" maxlength="200"><?php echo "$whyHire";?></textarea>
                                        </div>
                                    </div>
                                </div>    
                            </section>
                      </div></div>    
                    <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body text-center font-18">
                                <h3 class="mb-20">Are you sure to submit ?</h3>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Submit" name="updateinfo"/>
                            </div>
                        </div>
                    </div>
                </div>

            </form></div></div></div>
       

<?php }else{header("Location:login.php");} ?>
<?php include('include/footer.php');?>
<?php 
                if (isset($updateinfo)){
                    echo '<script type="text/javascript">alert("' . $updateinfo . '")</script>';
            }?>
    <script src="wizard/jquery-steps/build/jquery.steps.js"></script>
    <script>
        $(".tab-wizard").steps({
            headerTag: "h5",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Submit"
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
                $('.steps .current').prevAll().addClass('disabled');
            },
            onFinished: function (event, currentIndex) {
                $('#success-modal').modal('show');
            }
        });
    </script>
   