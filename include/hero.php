    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area bg-img bg-overlay-2by5" style="background-image: url(<?php echo "$hoverimg";?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Hero Content -->
                    <?php 
                $getAllcontact= $gnc->getAllcontact();
                if($getAllcontact){
                while($result = $getAllcontact->fetch_assoc()){
                ?>
                    <div class="hero-content text-center">
                        <h2>FIND A TUTOR TODAY </br>IT'S EASY ! IT'S FREE !</h2>
                        <?php if($uts=="Tutor"){?>
                                <a href="jobBoard.php" class="btn clever-btn">CHECK TUTION POSTS</a>
                            <?php } elseif($uts=="Student"){?>
                               <a href="hireTutor.php" class="btn clever-btn">HIRE A TUTOR</a>
                                 <?php }else{?>

                            <a href="hireTutor.php" class="btn clever-btn">HIRE A TUTOR</a>&nbsp;&nbsp;
                            <a href="userRegistration.php" class="btn clever-btn">BECOME A TUTOR</a>
                        <?php }?>
                        <!--<a href="hireTutor.php" class="btn clever-btn">HIRE A TUTOR</a>&nbsp;&nbsp;
                        <a href="userRegistration.php" class="btn clever-btn">BECOME A TUTOR</a>-->
                    </div>
                </div>
            </div>
            <div style="text-align: center;background: #0675C1;color:white;font-size: calc(1em + 1vw)">
                <span>We Have Many Qualified Home Tutors In Bangladesh.</span></br>
                <span>Call:&nbsp;<b><?php echo $result['contact_cell'];?></b>&nbsp; For Any Kind of Assistance !</span>
                <?php }}?>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### --> 