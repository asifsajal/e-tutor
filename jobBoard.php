<?php include('include/header.php');?>

<?php if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['tutor_Login'])){
$tutor_email =$_POST['tutor_email'];
$tutor_pass = md5($_POST['tutor_pass']);//here pass will be md5
$tutorLogin = $login->tutorLogin($tutor_email,$tutor_pass);
}
?>

<?php include('config/database_connection.php'); ?>
<?php 
  if (!isset($_GET['applyJob'])||$_GET['applyJob']==NULL){
  echo "<script>window.location ='#';</script>";
  }else{ 
    $applyJob = preg_replace('/[^-a-zA-Z0-9_]/','',$applyJob = $_GET['applyJob']);
    $you = preg_replace('/[^-a-zA-Z0-9_]/','',$you = $_GET['you']);
    if($applyJob!="" && $you!=""){
    $applyJob = $gnc ->applyJob($applyJob,$you);}else {echo"n/a";}
  }
?>
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<div style="background-color:#F4F4F4;">
<div class="container" style="background-color: #F4F4F4;padding-top:3%;padding-bottom: 5%">
    <div class="pd-ltr-20 height-100-p xs-pd-20-10">
      <div class="min-height-200px">
        <div class="blog-wrap">
          <div class=" pd-0">
            <div class="row">

<!-- city select begin-->
              <div class="col-md-4 col-sm-12" style="background-color: #F4F4F4;" >
                <div class="bg-white border-radius-4 box-shadow mb-30" style="padding-bottom: 1%" >
<span class="list-group-item d-flex align-items-center justify-content-between active" style="color:white;font-size: 25px;padding-left: 30%;"><b>Job Search</b></span>
<h5 class="pd-20" style="text-align: center;padding-top:5%">Search by City</h5>
                      <div class="form-group" style="width:95%;padding-left: 5%">
                      <select name="turor_prefer_medium" class="form-control" >
                        <option disable selected value="">Select City</option>
                              <?php
                                //$query = "SELECT  DISTINCT(district) FROM application_job";
                            $query="SELECT DISTINCT (application_job.district),area_district.* FROM application_job INNER JOIN area_district
                            ON application_job.district =area_district.district_id ";
                                $statement = $connect->prepare($query);
                                $statement->execute();
                                $result = $statement->fetchAll();
                                foreach($result as $row)
                            {
                             ?>
                      <option  class="common_selector district" value="<?php echo $row['district'];?>"><?php echo $row['district_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                </div>
<!-- city select end-->
<!-- search by category begin-->
<div class="bg-white border-radius-4 box-shadow mb-30" >
                <h5 class="pd-20" style="text-align: center;padding-top: 2%">Categories</h5>
                  <div class="list-group" style="margin-right: 3%;margin-left: 3%">
                    <?php
                    $query="SELECT DISTINCT (application_job.category),application_category.* FROM application_job INNER JOIN application_category
                            ON application_job.category =application_category.cat_id";
                                $statement = $connect->prepare($query);
                                $statement->execute();
                                $result = $statement->fetchAll();
                                foreach($result as $row)
                            {
                             ?>
<a class="list-group-item  justify-content-between" style="font-size: 16px;">
                      <input type="checkbox" class="common_selector category" value="<?php echo $row['cat_id'];?>"><b style="margin-left: 3%"><?php echo $row['category_name']; ?></b></a>
                      <?php } ?>
</div>
                </div>
                <!-- search by category end-->
<!-- search by gender begin-->
            <div class="bg-white border-radius-4 box-shadow mb-30" >
                <h5 class="pd-20" style="text-align: center;padding-top: 2%">Prefer Tutor Gender</h5>
                  <div class="list-group" style="margin-right: 3%;margin-left: 3%">
                    <?php
                                $query = "SELECT  DISTINCT(tutorGender) FROM application_job";
                                $statement = $connect->prepare($query);
                                $statement->execute();
                                $result = $statement->fetchAll();
                                foreach($result as $row)
                            {
                             ?>
<a class="list-group-item  justify-content-between" style="font-size: 16px;">
                      <input type="checkbox" class="common_selector gender" value="<?php echo $row['tutorGender'];?>"><b style="margin-left: 3%"><?php $g=$row['tutorGender']; if($g=='M'){echo "MALE";}elseif($g=='F'){echo"Female";}elseif($g=='A'){echo"Any";} ?></b></a>
                      <?php } ?>
</div>
                </div>
              </div>
              <div class="col-md-8 col-sm-12">
                <div class="blog-list">
<div class="row filter_data">
</div>
    </div>
  </div>
<!-- search by gender end-->
<!-- tutor feedback begin-->
<div class="modal fade" id="loginapply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
         <form class="form-horizontal"  method="post"  enctype="multipart/form-data">
          <div class="form-group">
            <input type="text"  class="form-control" required id="recipient-name" name="tutor_email" placeholder="E-Mail or phone number *" maxlength="50"/>
          </div>
          <div class="form-group">
            <input class="form-control" type="password"required maxlength="16" name="tutor_pass" id="message-text" placeholder="Password *" />
          </div>
      </div>
      <div class="modal-footer">
          <a href="tutorRegistration.php" style="padding-right:25%;color:blue;">New? Please create an account first !</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <input name="tutor_Login"  type="submit"  class="btn btn-primary"  value="Tutor Login"/>
      </div>
      </form>
    </div>
</div>
</div>
 <?php 
        if (isset($tutorLogin)){
          echo '<script type="text/javascript">alert("' . $tutorLogin . '")</script>';
      }?>
<?php 
  if (isset($applyJob)){
  echo '<script type="text/javascript">alert("' . $applyJob . '")</script>';
}?>
<style>
#loading
{
  text-align:center; 
  background: url('loader.gif') no-repeat center; 
  height: 150px;
}
</style>
<script>
$(document).ready(function(){
filter_data();
function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var district = get_filter('district');
        var category = get_filter('category');
        var gender = get_filter('gender');
    $.ajax({
            url:"fetch_data.php",
            method:"POST",
      data:{action:action, district:district, category:category, gender:gender},
            success:function(data){
        console.log(data);
                $('.filter_data').html(data);
            }
        });
    }
function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

});
</script>
</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div>
<?php include('include/footer.php');?>