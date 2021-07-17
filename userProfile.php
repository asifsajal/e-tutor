<?php include('include/header.php');?>
<?php
$lgn= Session::get("tlogin"); 
 if($lgn==true) {?>
<?php include 'classes/registration.php';
$reg= new registration();?>
    <?php 
        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['updtup'])){
            $sid=$tutor_id;
        $updtp = $reg ->updtp($_POST,$_FILES,$sid);
        }
    ?>
    <?php 
        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['uploade'])){
            $sid=$tutor_id;
        $uploadeimg = $reg ->uploadeimg($_POST,$_FILES,$sid);
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
    width: 270px;
    height: 180px;
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
    width: 95%;
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

 <?php 
    $gettutordata= $gnc->gettutordata($tutor_id);
    if($gettutordata){
    while($result = $gettutordata->fetch_assoc()){

     $tutor_name=$result['tutor_name'];
     $fatherName=$result['fatherName'];
     $motherName=$result['motherName'];
     $dob=$result['dob'];
     $tutor_gender=$result['tutor_gender'];
     $tutor_email=$result['tutor_email'];
     $tutor_phone=$result['tutor_phone'];
     $religion=$result['religion'];
     $NIDBID=$result['NIDBID'];
     $ssc=$result['ssc'];
     $hsc=$result['hsc'];
     $graduation=$result['graduation'];
     $presentAddress=$result['presentAddress'];
     $permanentAddress=$result['permanentAddress'];
     $whyHire=$result['whyHire'];
        }
} ?>
<?php 
if($tutor_name!=""){$va='5';}else{$va='0';}
if($fatherName!=""){$vb='5';}else{$vb='0';}
if($motherName!=""){$vc='5';}else{$vc='0';}
if($dob!=""){$vd='5';}else{$vd='0';}
if($tutor_gender!=""){$ve='5';}else{$ve='0';}
if($tutor_email!=""){$vf='10';}else{$vf='0';}
if($tutor_phone!=""){$vg='10';}else{$vg='0';}
if($religion!=""){$vh='5';}else{$vh='0';}
if($NIDBID!=""){$vi='10';}else{$vi='0';}
if($ssc!=""){$vj='10';}else{$vj='0';}
if($hsc!=""){$vk='10';}else{$k='0';}
if($graduation!=""){$vl='5';}else{$vl='0';}
if($presentAddress!=""){$vm='5';}else{$vm='0';}
if($permanentAddress!=""){$vn='5';}else{$vn='0';}
if($whyHire!=""){$vo='5';}else{$vo='0';}
?>
<?php $progressdata=($va+$vb+$vc+$vd+$ve+$vf+$vg+$vh+$vi+$vj+$vk+$vl+$vm+$vn+$vo);
$progressvalue=$progressdata.'%';
$progress=$progressvalue;
 ?>
<div class="container emp-profile">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <!--<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>-->
                            <img height="42" width="42" src="img/users-image/<?php echo"$tutor_image";?>" alt="<?php echo"$tutor_name";?>" />
                            <!--<div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>-->
                        </div>
<?php if($progressdata<100){?>
  <div class="progress" style="margin-top: 10px;">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress; ?>">
      <?php echo $progress; ?>
    </div>

  </div>Update your profile.

<?php }else{?> <img height="42" width="42" src="img/core-img/completation.png" alt="Profile is 100% completed." /> <?php }?>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo"$tutor_name";?>
                                    </h5>
                                    <h6><?php echo "$tutor_user_type";?></h6>
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
<a href="updateTutoringInfo.php"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Update Tutoring Info"/></a><br></br>
                        <a href="editTutorProfile.php"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/></a><br></br>
                        <a href="#"><input type="button" class="profile-edit-btn" data-toggle="modal" data-target="#cppic" value="Change Picture"/></a><br></br>
                        <a href="#"><input type="button" class="profile-edit-btn" data-toggle="modal" data-target="#cp" value="Change password"/></a>

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
                $gettutordata= $gnc->gettutordata($tutor_id);
                if($gettutordata){
                while($result = $gettutordata->fetch_assoc()){
                ?>

                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result['tutor_Prefer_medium'];?>-00-<?php echo $result['tutor_id'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if($result['tutor_name'] !="") { echo $result['tutor_name'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Father's Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if($result['fatherName'] !="") { echo $result['fatherName'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Mother's Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if($result['motherName'] !="") { echo $result['motherName'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date of Birth</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if($result['dob'] !="") { echo $result['dob'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if($result['tutor_gender'] !="") { echo $result['tutor_gender'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if($result['tutor_email'] !="") {  echo $result['tutor_email'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if($result['tutor_phone'] !="") {  echo $result['tutor_phone'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Religion</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if($result['religion'] !="") { echo $result['religion'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>NID / Birth ID</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if($result['NIDBID'] !="") {  echo $result['NIDBID'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>SSC / Equivalant</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p ><?php if($result['ssc'] !="") {  echo $result['ssc'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>HSC / Equivalant</label>
                                            </div>
                                            <div class="col-md-6">
                                              <p><?php if($result['hsc'] !="") {  echo $result['hsc'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Graduation / Equivalant</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if($result['graduation'] !="") { echo $result['graduation'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Masters / Equivalant</label>
                                            </div>
                                            <div class="col-md-6">
                                              <p><?php if($result['masters'] !="") {  echo $result['masters'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Present Address</label>
                                            </div>
                                            <div class="col-md-6">
                                             <p><?php if($result['presentAddress'] !="") {  echo $result['presentAddress'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Permanent Address</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php if($result['permanentAddress'] !="") {  echo $result['permanentAddress'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Prefer area</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php if($result['prefer_area'] !="") {  echo $result['prefer_area'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Expected salary</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php if($result['prefer_salary'] !="") {  echo $result['prefer_salary'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                              <p><?php if($result['experience'] !="") { echo $result['experience'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Extra Activities</label>
                                            </div>
                                            <div class="col-md-6">
                                              <p><?php if($result['extraActivities'] !="") { echo $result['extraActivities'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Why should we hire you</label>
                                            </div>
                                            <div class="col-md-6">
                                             <p><?php if($result['whyHire'] !="") {  echo $result['whyHire'];}else{ ?> <span id="red"><?php echo "No Data Available !";}?></span></p>
                                            </div>
                                        </div>
                            </div>

                        <?php }} ?>

                            <!--<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                            </div>-->
                        </div>
                    </div>
                </div>         
        </div>

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
            <input type="text" class="form-control" id="recipient-name" name="tcurpass">
          </div>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">New Password:</label>
            <input type="text" class="form-control" id="recipient-name" name="tnewpass">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="updtup" class="btn btn-primary" value="Save changes"/>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="cppic" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal"  method="post"  enctype="multipart/form-data">
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Select an image :</label>
            <input type="file" class="form-control" id="recipient-name" name="pcimage">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="uploade" class="btn btn-primary" value="Uploade"/>
      </div>
      </form>
    </div>
  </div>
</div>
</div></div>
<?php 
    if (isset($updtp)){
    echo '<script type="text/javascript">alert("' . $updtp . '")</script>';
}?>
<?php 
    if (isset($uploadeimg)){
    echo '<script type="text/javascript">alert("' . $uploadeimg . '")</script>';
}?>
<?php }else{header("Location:login.php");} ?>
<?php include('include/footer.php');?>