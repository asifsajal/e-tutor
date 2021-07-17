<?php 
include('config/database_connection.php');
include('include/header.php');
?>
<head>


      <script src="jquery-1.10.2.min.js"></script>
</head>



<div style="background-color:#F4F4F4;">


  <div class="container" style="background-color: #F4F4F4;padding-top:3%;padding-bottom: 5%">
    <div class="pd-ltr-20 height-100-p xs-pd-20-10">
      <div class="min-height-200px">
        
        <div class="blog-wrap">
          <div class=" pd-0">
            <div class="row">
              <div class="col-md-8 col-sm-12">
                <div class="blog-list">


               


          
                <div class="data-table row filter_data">

                </div>
    


                    





                </div>
              </div>




<!-- city select begin-->
              <div class="col-md-4 col-sm-12" style="background-color: #F4F4F4;">
                <div class="bg-white border-radius-4 box-shadow mb-30" style="padding-bottom: 1%">

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
                <h5 class="pd-20" style="text-align: center;padding-top: 2%">Gender</h5>
                  <div class="list-group" style="margin-right: 3%;margin-left: 3%">
                    
                      <?php
                                $query = "SELECT  DISTINCT(studentGender) FROM application_job";
                                $statement = $connect->prepare($query);
                                $statement->execute();
                                $result = $statement->fetchAll();
                                foreach($result as $row)
                            {
                             ?>

                    <a class="list-group-item  justify-content-between" style="font-size: 16px;">
                      <input type="checkbox" class="common_selector gender" value="<?php echo $row['studentGender'];?>"><b style="margin-left: 3%"><?php $g=$row['studentGender']; if($g=='M'){echo "MALE";}elseif($g=='F'){echo"Female";} ?></b></a>
                      <?php } ?>



                  </div>
                </div>
<!-- search by gender end-->


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