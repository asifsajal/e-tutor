<?php include('include/header.php');?>

<?php include('include/hero.php');?>

<style type="text/css">
  #as:hover{background-color: #e3e5e8;}
  .sfa {
  display: inline-block;
  border-radius: 100px;
  box-shadow: 0px 0px 2px #888;
  padding: 0.6em 0.6em;
}

.sfa:hover{
color:white;
background-color:#0675C1; 
}
 </style>
</div>
    <!-- ##### Cool Facts Area Start ##### -->

    <section class="cool-facts-area section-padding-100-0">
        <div class="container">
            <!--<div class="row">
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center  wow fadeInUp" data-wow-delay="250ms" id="as">
                        <div class="icon">
                           <i class="sfa fa fa-bullhorn fa-4x" aria-hidden="true"></i>
                       </div>
                        <?php 
                            $sql = "SELECT * FROM `application_job`";
                             $connStatus = $con->query($sql);
                              $numberOfRows = mysqli_num_rows($connStatus);?>
                                <h2><span class="counter"><?php echo $numberOfRows;?></span></h2>
                                                <h5>Already Job Posted</h5>
                                            </div>
                                        </div>
                    
               
                <div class="col-12 col-sm-6 col-lg-3" >
                <div class="single-cool-facts-area text-center  wow fadeInUp" data-wow-delay="500ms" id="as">
                        <div class="icon">
                            <i class="sfa fa fa-user-circle-o fa-4x" aria-hidden="true"></i>
                        </div>
                        <?php 
                            $sql = "SELECT * FROM `application_tutor`";
                             $connStatus = $con->query($sql);
                              $numberOfRows = mysqli_num_rows($connStatus);?>
                                <h2><span class="counter"><?php echo $numberOfRows;?></span></h2>
                        <h5>Dedicated Tutors</h5>
                    </div>
                </div>

              
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center  wow fadeInUp" data-wow-delay="750ms" id="as">
                        <div class="icon">
                            <i class="sfa fa fa-smile-o fa-4x" aria-hidden="true"></i>
                        </div>
                        <?php 
                            $sql = "SELECT * FROM `application_student`";
                             $connStatus = $con->query($sql);
                              $numberOfRows = mysqli_num_rows($connStatus);?>
                                <h2><span class="counter"><?php echo $numberOfRows; ?></span></h2>
                        <h5>Happy Students</h5>
                    </div>
                </div>

              
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center  wow fadeInUp" data-wow-delay="1000ms" id="as">
                        <div class="icon">
                            <i class="sfa fa fa-book fa-4x" aria-hidden="true"></i>
                        </div>
                        <?php 
                            $sql = "SELECT * FROM `application_subject`";
                             $connStatus = $con->query($sql);
                              $numberOfRows = mysqli_num_rows($connStatus);?>
                                <h2><span class="counter"><?php echo $numberOfRows; $con->close(); ?></span></h2>
                        <h5>Available Courses</h5>
                    </div>
                </div>
            </div>-->
        </div>

    </section>
    <!-- ##### Cool Facts Area End ##### -->

     <section class="agileits-services text-center">
        <div class="container py-md-4 mt-md-3">
            <h3 class="w3ls-title text-uppercase">How it works for students/parents ?</h3>
            <!-- service grid row-->
            <div class="agileits-services-row row mt-md-3 pt-5">
                <div class="col-lg-4 col-md-6  agileits-services-grids  order-md-1 order-1">
                    <span class="sfa fa fa-file-text fa-4x" aria-hidden="true"></span>

                    <h4 class="mt-2 mb-2">Post Your Tutor Requirements</h4>
                    <p>Post your Tutor requirements. Our experts will analyze it and live your requirements to our job board.</p>
                </div>

                <div class="col-lg-4 col-md-6  agileits-services-grids order-md-2 order-2">
                    <span><i class="sfa fa fa-newspaper-o fa-4x" aria-hidden="true"></i></span>
                    <h4 class="mt-2 mb-2">Get the Maximum 5 Best Tutor CVs</h4>
                    <p>You'll receive the 5 (max) best Tutors' CVs in your account within 48 hours which closely match to your requirements.</p>
                </div>

                <div class="col-lg-4 col-md-6  agileits-services-grids order-md-3 order-3">
                    <span><i class="sfa fa fa-graduation-cap fa-4x" aria-hidden="true"></i></span>
                    <h4 class="mt-2 mb-2">Select the Best One & Start Learning</h4>
                    <p>Choose the best one among the 5 CV's. Offer the selected Tutor for few trial classes before taking the regular classes. Give us your feedback and start Learning.</p>
                </div>
            </div>
            <!-- // service grid row-->
        </div>
 </section>

<?php include('include/categoryDiv.php');?>
<?php include('include/bar2.php');?>
 <section class="agileits-services text-center">
        <div class="container py-md-4 mt-md-3">
            <h3 class="w3ls-title text-uppercase">A Few Words About Us</h3>
            <!-- service grid row-->
            
          <div class="agileits-services-row">  

        <p style="font-size:18px">E-Tutor is a premier tution agency specializing in the provision of home tutors for private home tution services in Bangladesh.</br>
        We have been helping parents find experienced and committed tutors.</br>
        We recognize that the task of finding a reliable and suitable home tutor is of vital importance to parents who need to entrust their children's academic improvement to home tutors.</br>
        We manage a sizeable list of tution tearches who share our vision in maintaining a high level of expertise and professionalism in home tution services.</br>
        Therefore our team at E-Tutor is dedicated to providing that solution with efficiency and due commitment.</br>
        As parents ourselves, we understand the importance of education, and we want the very best for our children. The same philosophy extends to our student - your children.  </p>
    </div>
            <!-- // service grid row-->
        </div>
 </section>


 <section class="agileits-services text-center">
        <div class="container py-md-4 mt-md-3">
            <h3 class="w3ls-title text-uppercase">How it works for tutors ?</h3>
            <!-- service grid row-->
            <div class="agileits-services-row row mt-md-3 pt-5">
                <div class="col-lg-4 col-md-6 mb-5 agileits-services-grids  order-md-1 order-1">
                    <span ><i class="sfa fa fa-user-o fa-4x" aria-hidden="true"></i></span>

                    <h4 class="mt-2 mb-2">Create a Free Account</h4>
                    <p>Make your profile in minutes. Add your preferred locations, classes/courses, expected salary and more.</p>
                </div>

                <div class="col-lg-4 col-md-6 mb-5 agileits-services-grids order-md-2 order-2">
                    <span><i class="sfa fa fa-bell fa-4x" aria-hidden="true"></i></span>
                    <h4 class="mt-2 mb-2">Get Free Tutoring Job Alerts</h4>
                    <p>Get updated tutoring jobs alerts via Email whenever new jobs are posted.</p>
                </div>

                <div class="col-lg-4 col-md-6 mb-5 agileits-services-grids order-md-3 order-3">
                    <span><i class="sfa fa fa-thumbs-up fa-4x" aria-hidden="true"></i></span>
                    <h4 class="mt-2 mb-2">Apply to Your Desired Job</h4>
                    <p>Apply to your preferred tutoring jobs that match your skills and get selected by the students/parents</p>
                </div>
            </div>
            <!-- // service grid row-->
        </div>
 </section>
 

<?php include('include/whatTheySay.php');?>
<?php include('include/bar.php');?>
<?php include('include/whatParentSay.php');?>
<?php include('include/footer.php');?>