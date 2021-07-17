<style type="text/css">
.extrades{color:blue}
.extrades:hover {
  color:red;
}
.spacer{padding-top:1em;}
</style>


<style type="text/css">

.footer {
    background: #252525;
    color: #FFF;
}

.footer h1 {
    font-weight: 600;
    font-size: 16px;
    margin-bottom:20px;
    color:#4B4A47;
}

.footer ul li{
    margin:10px 0px;
}

.footer ul li a {
    color: #FFF;
    text-decoration:none;
}

.footer ul li a:hover {
    color: #08ad9e;
}

</style>

    <?php 
    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['submittutorfeedback'])){
    $submittutorfeedback = $gnc ->submittutorfeedback($_POST,$_FILES);
    }
  ?>

    <?php 
        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['submitStudentFeedback'])){

        $submitStudentFeedback = $gnc ->submitStudentFeedback($_POST,$_FILES);
        }
    ?>

<footer>
    <div class="footer">
      <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center spacer">
            <!--<h1>Useful Links</h1>-->
            <ul class="column list-unstyled">
              <li><a href="userProfile.php">My Profile</a></li>
              <li><a href="Faq.php">FAQ</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <!--<li><a href="blog.php">Blog</a></li>-->
              <?php
          
            if(Session::get("tlogin")==true ){ ?>
             <li><a  href="#"data-toggle="modal" data-target="#tutorfeedback" data-whatever="@mdo">Feedback</a></li>
            <?php }?>
  <li><a  href="#"data-toggle="modal" data-target="#studentfeedback" data-whatever="@mdo">Feedback</a></li>
            
            </ul>
          </div>
          
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center spacer">
            <!--<h1>Work With Us</h1>-->
            <ul class="column list-unstyled">
              <li><a href="hireTutor.php">Hire a Tutor</a></li>
              <li><a href="userRegistration.php">Registration</a></li>
            </ul>
          </div>
           
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center spacer">

            <h1>Facebook</h1>
            <ul class="column list-unstyled">
            
            </ul>


            

          </div>
        </div> 
      </div>
    </div>
</footer>
<!-- tutor feedback begin-->
<div class="modal fade" id="tutorfeedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Tutor Feedback</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
        <form class="form-horizontal"  method="post"  enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" required hidden class="form-control" id="recipient-name" name="tutorid" value="<?php echo "$tutor_id";?>" />
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Your Feedback:</label>
            <textarea class="form-control" required maxlength="300" name="tfeedback" id="message-text" placeholder="Your valuable feedback in maximum 300 characters"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <input type="submit" name="submittutorfeedback" class="btn btn-primary" value="Save changes"/>
      </div>
      </form>
    </div>

  </div>
</div>
 <!-- tutor feedback end-->

<!-- stuydentfeedback begin-->
<div class="modal fade" id="studentfeedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Student/Guardian Feedback</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
        <form class="form-horizontal"  method="post"  enctype="multipart/form-data">
          <div class="form-group">
          </div>
<label for="message-text" class="col-form-label">Name*:</label>
          <input type="text" class="form-control"  name="sname"  required  />
<label for="message-text" class="col-form-label">Occupation*:</label>
          <input type="text" class="form-control"  name="soccu" required />
<!--<label for="message-text" class="col-form-label">Picture:</label>
          <input type="file" class="form-control"  name="simg"  />-->

          <div class="form-group">
            <label for="message-text" class="col-form-label">Your Feedback*:</label>
            <textarea class="form-control" required maxlength="300" name="stfeedback" id="message-text" placeholder="Your valuable feedback , Maximum 300 characters"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <input type="submit" name="submitStudentFeedback" class="btn btn-primary" value="Save changes"/>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- tstudent feedback end-->


<?php 
  if (isset($submittutorfeedback)){
  echo '<script type="text/javascript">alert("' . $submittutorfeedback . '")</script>';
}?>
<?php 
    if (isset($submitStudentFeedback)){
    echo '<script type="text/javascript">alert("' . $submitStudentFeedback . '")</script>';
}?>



   <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <!-- Top Footer Area -->
        <div class="top-footer-area">
           
            <?php 
                $getAllcontact= $gnc->getAllcontact();
                if($getAllcontact){
                while($result = $getAllcontact->fetch_assoc()){
                ?>
        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area d-flex justify-content-between align-items-center">
            <!-- Contact Info -->
            <div class="contact-info">
                <a href="#"><span>Phone:&nbsp;</span><?php echo $result['contact_cell'];?></a>
                <a href="mailto:<?php echo $result['contact_mail'];?>"><span>Email:&nbsp;</span><?php echo $result['contact_mail'];?></a>
            </div>

<p><a href="#">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed by <i class="fa fa-code" aria-hidden="true"></i><a href="#" target="_blank" style="color:white"> Team Tutor</a></p>


            <!-- Follow Us -->
             <div class="follow-us">
                <span>Follow us</span>
                <a href="<?php echo $result['contact_facebook'];?>"target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="<?php echo $result['contact_twitter'];?>"target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="<?php echo $result['contact_youtube'];?>"target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i> </a>
            </div>
        </div></div>
        <?php }}?>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>