<?php 
include('include/header.php');
include 'classes/jobClass.php';
        $jc= new jobclass();

?>


<div style="background-color:#F4F4F4;">


  <div class="container" style="background-color: #F4F4F4;padding-top:3%;padding-bottom: 5%">
    <div class="pd-ltr-20 height-100-p xs-pd-20-10">
      <div class="min-height-200px">
        
        <div class="blog-wrap">
          <div class=" pd-0">
            <div class="row">
              <div class="col-md-8 col-sm-12">
                <div class="blog-list">


                <?php 
                $getallApprovedJobsWaiting= $jc->getallApprovedJobsWaiting();
                if($getallApprovedJobsWaiting){
                while($result = $getallApprovedJobsWaiting->fetch_assoc()){
                ?>








            <ul style="background-color: white;margin-right: 15px;padding-top:5%;margin-bottom:3%;">
              <li>
                <div class="row">
                  <div class="blog-caption" style="margin-left: 5%;margin-right: 5%;padding-bottom:2%;">
                      <p>Job ID: &nbsp;<b>

                        <?php echo $result['jobId'];?>
                          

                        </b>
                      <span style="float:right">Posted on: <b>

                        <?php echo $result['postTime'];?>
                          

                        </b></span></p>
                      <h5><span>Need a tutor for 

                        <?php echo $result['subCat_Name'];?>

                         student</span></h5>
                      <div class="blog-by">

                        <p> <b style=" color:#007BFF">Category:</b>
                            <span style="color:black;margin-left:1.5%;margin-right:1.5%">

                              <?php echo $result['category_name'];?>

                               </span>
                                    <b style=" color:#007BFF">Class:</b>
                            <span style="color:black;margin-left:1.5%;margin-right:1.5%">

                              <?php echo $result['subCat_Name'];?> 
                            </span>
                                    <b style=" color:#007BFF">Subject:</b>

                            <span style="color:black;margin-left:1.5%;margin-right:1.5%">

                              <?php echo $result['subjects'];?>
                                

                              </span>
                        </p>

                      <span style="font-size:14px;color:#000">

                        <b>

                          <?php echo $result['daysInAWeek'];?>

                           Days Per Week</b> /&nbsp;&nbsp;
                        <b>Salary : </b>

                        <?php echo $result['salary'];?>

                         &nbsp; TK. &nbsp;&nbsp;/&nbsp;&nbsp;
                        <b>Tutor Gender Prefer: &nbsp;</b>

                        <?php echo $result['tutorGender'];?>

                      </span></br>

                      <span style="font-size:14px;color:#000">
                        <b>Number of Student:&nbsp;&nbsp;</b>

                         <?php echo $result['studentNumber'];?>

                          &nbsp; /&nbsp;&nbsp;<b>Student Gender : &nbsp;</b>

                        <?php echo $result['studentGender'];?>

                        &nbsp;&nbsp;/&nbsp;&nbsp;
                        <b>Tutoring Time: &nbsp;</b>

                        <?php echo $result['tutoringTime'];?>

                      </span></br>

                      <i class="fa fa-map-marker" aria-hidden="true" style="font-size:25px;color:#007BFF"></i>
                        <span style="font-size:16px;color:#000">&nbsp;<b>

                          <?php echo $result['district_name'];?>

                          , 

                          <?php echo $result['area_name'];?>
                            

                          </b></span></br>

                        <span style="font-size:12px;color:#000">Other Requirements -&nbsp;<b>

                          <?php echo $result['requirments'];?>
                            

                          </b></span>

                              <div class="pt-10">
                                <a href="#" class="btn clever-btn" style="float:right">Apply</a>
                              </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>




            
<?php }} ?>
                    





                </div>
              </div>

              <div class="col-md-4 col-sm-12" style="background-color: #F4F4F4;">
                <div class="bg-white border-radius-4 box-shadow mb-30" style="padding-bottom: 1%">

                  <span class="list-group-item d-flex align-items-center justify-content-between active" style="color:white;font-size: 25px;padding-left: 30%;"><b>Job Search</b></span>

                                <h5 class="pd-20" style="text-align: center;padding-top:5%">Search by City</h5>
                                <div class="form-group" style="width:95%;padding-left: 5%">
                                    <select name="turor_prefer_medium" class="form-control" required>
                                      <option class="hidden"  selected disabled>Select Prefer medium *</option>
                                        <option value="B">Bengali</option>
                                        <option value="B">English</option>
                                    </select>
                                </div>
                    </div>





            <div class="bg-white border-radius-4 box-shadow mb-30" >

                 <h5 class="pd-20" style="text-align: center;padding-top: 2%">Categories</h5>

                  <div class="list-group" style="margin-right: 3%;margin-left: 3%">
                    <a href="#" class="list-group-item d-flex align-items-center justify-content-between">HTML <span class="badge badge-primary badge-pill">7</span></a>
                    <a href="#" class="list-group-item d-flex align-items-center justify-content-between">Css <span class="badge badge-primary badge-pill">10</span></a>
                    <a href="#" class="list-group-item d-flex align-items-center justify-content-between active">Bootstrap <span class="badge badge-primary badge-pill">8</span></a>
                    <a href="#" class="list-group-item d-flex align-items-center justify-content-between">jQuery <span class="badge badge-primary badge-pill">15</span></a>
                    <a href="#" class="list-group-item d-flex align-items-center justify-content-between">Design <span class="badge badge-primary badge-pill">5</span></a>
                  </div>
                </div>





              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div>

<?php include('include/footer.php');?>