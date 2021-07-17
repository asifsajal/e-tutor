    <!-- ##### Best Tutors Start ##### -->
    <section class="best-tutors-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>What some awesome tutors says about us ?</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="tutors-slide owl-carousel wow fadeInUp" data-wow-delay="250ms">

                        <!-- Single Tutors Slide -->
                <?php 
                     $getTutorDafeddback= $gnc->getTutorDafeddback();
                     if($getTutorDafeddback){
                     while($result = $getTutorDafeddback->fetch_assoc()){
                ?>
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/users-image/<?php echo $result['tutor_image'];?>" alt="<?php echo $result['tutor_name'];?>">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5><?php echo $result['tutor_name'];?></h5>
                                 <?php
                                        $data=$result['graduation'];
                                        $lptp=explode(",",$data);
                                  ?>

                                <span><?php echo $lptp[0]?></span>


                                <p><?php echo $result['tutor_feedback'];?></p>
                                
                            </div>
                        </div>
                <?php }} ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Best Tutors End ##### -->