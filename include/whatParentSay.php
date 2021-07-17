    <!-- ##### Best Tutors Start ##### -->
    <section class="best-tutors-area" style="padding-top: 20px;padding-bottom: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>What some parents/ students says about us ?</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="tutors-slide owl-carousel wow fadeInUp" data-wow-delay="250ms">
                        <?php 
                        $student_feedback= $gnc->student_feedback();
                        if($student_feedback){
                        while($result = $student_feedback->fetch_assoc()){
                        ?>

                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="img/student_feed_img/<?php echo $result['simage'];?>" alt="<?php echo $result['sname'];?>">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5><?php echo $result['sname'];?></h5>
                                <span><?php echo $result['soccupation'];?></span>
                                <p><?php echo $result['student_feedback'];?></p>
                                
                            </div>
                        </div>

                   <?php }} ?>

                     

                      


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Best Tutors End ##### -->