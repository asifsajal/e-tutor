<?php include('include/header.php');?>
<?php
$lgn= Session::get("stulogin"); 
 if($lgn==true) {?>
<?php include 'classes/registration.php';?>
		<?php 
		$reg= new registration();
		if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['updtsprofile'])){
			$sid=$student_id;
		$updtstpro = $reg ->updtstpro($_POST,$_FILES,$sid);
		}
	?>

    <?php 
        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['updtpassword'])){
            $sid=$student_id;
        $updtpassword = $reg ->updtpassword($_POST,$_FILES,$sid);
        }
    ?>


<style type="text/css">
	.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
#red{color:red;}
</style>


<div class="container emp-profile">
                <div class="row">
                    <div class="col-md-4">
                      <div class="profile-img">
                            <!--<img src="<?php echo"$student_image";?>" alt="<?php echo"$student_name";?>" />-->
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo"$student_name";?>
                                    </h5>
                                    <h6><?php echo "$Student_user_type";?></h6>
                                    <!--<p class="proile-rating">Profile Completation : <span>8/10</span></p>-->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <!--<li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                       
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateprofile" data-whatever="@mdo">Update Profile</button><br></br>
                       <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#propic">
                     Update Picture
                    </button><br></br>-->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cp">
                     Update Password
                    </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <!--<p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>-->
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">

                 <?php 
                $gettStudentdata= $gnc->gettStudentdata($student_id);
                if($gettStudentdata){
                while($result = $gettStudentdata->fetch_assoc()){
                ?>

                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Student Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result['student_id'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if($result['student_name'] !="") { echo $result['student_name'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?><span></p>
                                            </div>
                                        </div>
                                       
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if($result['student_email'] !="") {  echo $result['student_email'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?><span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if($result['student_phone'] !="") {  echo $result['student_phone'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?><span></p>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Permanent Address</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php if($result['student_address'] !="") {  echo $result['student_address'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?><span></p>
                                            </div>
                                        </div>
                                         
                            </div>

                        <?php }} ?>

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
        </div>
<div class="modal fade" id="updateprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
 				<?php 
                $gettStudentdata= $gnc->gettStudentdata($student_id);
                if($gettStudentdata){
                while($result = $gettStudentdata->fetch_assoc()){
                ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile of: <?php echo $result['student_name']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
        <form class="form-horizontal"  method="post"  enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="stnm" value="<?php echo $result['student_name']; ?>" />
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" id="recipient-name" name="stpn" value="<?php echo $result['student_phone']; ?>" />
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Address:</label>
            <textarea class="form-control" name="staddrs" id="message-text"><?php echo $result['student_address']; ?></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <input type="submit" name="updtsprofile" class="btn btn-primary" value="Save changes"/>
      </div>
      </form>
    </div>
<?php }}?>
  </div>
</div>
<?php 
	if (isset($updtstpro)){
	echo '<script type="text/javascript">alert("' . $updtstpro . '")</script>';
}?>
<?php 
    if (isset($updtpassword)){
    echo '<script type="text/javascript">alert("' . $updtpassword . '")</script>';
}?>

<!--<div class="modal fade" id="propic" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>-->



<div class="modal fade" id="cp" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal"  method="post"  enctype="multipart/form-data">
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Current Password:</label>
            <input type="text" class="form-control" id="recipient-name" name="curpass" required >
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">New Password:</label>
            <input type="text" class="form-control" id="recipient-name" name="newpass" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="updtpassword" class="btn btn-primary" value="Save changes"/>
      </div>
      </form>
    </div>
  </div>
</div>



<?php include('include/footer.php');?>
<?php }else{header("Location:login.php");} ?>

