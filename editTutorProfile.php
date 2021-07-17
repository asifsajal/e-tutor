<?php include('include/header.php');?>
<?php
$lgn= Session::get("tlogin"); 
 if($lgn==true) {?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style type="text/css">
.styled-select {
   height: 29px;
   overflow: hidden;
   width: 100%;
}
.styled-select select {
   background: transparent;
   border: none;
   font-size: 14px;
   height: 29px;
  
   width: 100%;
}
.styled-select.slate {
  background-color: #fff;
   height: 34px;
   width: 100%;
}
.styled-select.slate select {
   border: 1px solid #ccc;
   font-size: 16px;
   height: 34px;
   width: 100%;
}
</style>


<body>

	<?php include 'classes/registration.php';?>
	<?php 
		$reg= new registration();
		if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['updateTutorProfile'])){

		$tuid=Session::get("tutor_id");
		$ssc=$_POST["ssc"];
		$hsc=$_POST["hsc"];
		$grad=$_POST["grad"];
		$master=$_POST["master"];

	$sscval = implode(",",$ssc);
	$hscval = implode(",",$hsc);
	$gradval = implode(",",$grad);
	$masterval = implode(",",$master);

	$tutorName=$_POST["tutorName"];
	$Dob=$_POST["Dob"];
	$Father=$_POST["Father"];
	$Mother=$_POST["Mother"];
  $tutor_gender=$_POST["gender"];
	$Citizenship=$_POST["Citizenship"];
	$Phone=$_POST["Phone"];
	$religion=$_POST["religion"];
	$Skills=$_POST["Skills"];
	$PresentAddress=$_POST["PresentAddress"];
	$PermanentAddress=$_POST["PermanentAddress"];
	$why=$_POST["why"];
  $extraActivities=$_POST["extraActivities"];

		$updateTutorProfile = $reg ->updateTutorProfile($tuid,$sscval,$hscval,$gradval,$masterval,$tutorName,$Dob,$Father,$Mother,$Citizenship,$Phone,$religion,$Skills,$PresentAddress,$PermanentAddress,$why,$tutor_gender,$extraActivities);
		}
	?>


<div class="container">
<div class="row">
<div class="col-md-10 ">
<form class="form-horizontal"  method="post" action="" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Update your Profile</legend>

		<?php 
		$tuid=Session::get("tutor_id");
		$gettutordata= $gnc->gettutordata($tuid);
		if($gettutordata){
		while($value = $gettutordata->fetch_assoc()){
		?>

<!-- name-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="tutorName">Name (Full name)</label>  
	  <div class="col-md-4">

	 <div class="input-group">
	       <div class="input-group-addon">
	        <i class="fa fa-user">
	        </i>
	       </div>
	       <input id="Name (Full name)" name="tutorName" type="text" placeholder="Name (Full name)" class="form-control input-md" value="<?php echo $value['tutor_name'];?>" maxlength="25" required />
	      </div>
	</div>
	</div>

<!-- File Button --> 
<!--<div class="form-group">
  <label class="col-md-4 control-label" for="Upload photo">Upload photo</label>
  <div class="col-md-4">
    <input id="Upload photo" name="Upload photo" class="input-file" type="file">
  </div>
</div>-->

<!-- DOB-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Dob">Date Of Birth</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-birthday-cake"></i>
        </div>
       <input id="Date Of Birth" name="Dob" type="date" placeholder="Date Of Birth" class="form-control input-md" value="<?php echo $value['dob'];?>">
      </div>
  </div>
</div>


<!-- father name-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Father">Father's name</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
      <i class="fa fa-male" style="font-size: 20px;"></i>
       </div>
      <input id="Father" name="Father" type="text" placeholder="Father's name" class="form-control input-md" value="<?php echo $value['fatherName'];?>" maxlength="100" />
    </div>
  </div>
</div>

<!-- mother name-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Mother">Mother's Name</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
      <i class="fa fa-female" style="font-size: 20px;"></i>
        
       </div>
  <input id="Mother" name="Mother" type="text" placeholder="Mother's Name" class="form-control input-md" value="<?php echo $value['motherName'];?>" maxlength="100" />
  </div>
  </div>
</div>

<!-- Nid/Bid-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Citizenship">NID / Birth ID Number :</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-sticky-note-o"></i>
        
       </div>
   <input id="Citizenship No." name="Citizenship" type="text" placeholder="NID or Birth Registration No." class="form-control input-md" value="<?php echo $value['NIDBID'];?>" maxlength="17" />
    </div>
  </div>
</div>

<!-- gender -->
<!--<div class="form-group">
  <label class="col-md-4 control-label" >Gender</label>
  <div class="col-md-4"> 
    <label class="radio-inline" >
      <input type="radio" name="Gender"  value="1" >
      Male
    </label> 
    <label class="radio-inline" >
      <input type="radio" name="Gender"  value="2">
      Female
    </label> 
  </div>
</div>-->

<!-- phone input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Phone">Phone number :</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-phone"></i>
       </div>
    <input id="Phone number " name="Phone" type="text" placeholder="Primary Phone number " class="form-control input-md"value="<?php echo $value['tutor_phone'];?>"maxlength="11"pattern="^\d{11}$" />
    </div>
  </div>
</div>
<!-- Gender -->
<div class="form-group"> <?php $r=$value['tutor_gender'];?>
  <label class="col-md-4 control-label" >Gender :</label>
  <div class="col-md-4"> 
    <label class="radio-inline" >
      <input type="radio"  name="gender" value="Male" <?php if($r=="Male"){?> checked <?php } ?> >
      Male
    </label> 
    <label class="radio-inline" >
      <input type="radio" name="gender" value="Female"<?php if($r=="Female"){?> checked <?php } ?>>
      Female
    </label> 
  </div>
</div>

<!-- religion -->
<div class="form-group"> <?php $r=$value['religion'];?>
  <label class="col-md-4 control-label" >Religion :</label>
  <div class="col-md-4"> 
    <label class="radio-inline" >
      <input type="radio"  name="religion" value="Islam" <?php if($r=="Islam"){?> checked <?php } ?> >
      Islam
    </label> 
    <label class="radio-inline" >
      <input type="radio" name="religion" value="Hindu"<?php if($r=="Hindu"){?> checked <?php } ?>>
      Hindu
    </label> 
    <label class="radio-inline" >
      <input type="radio"  name="religion" value="Buddh" <?php if($r=="Buddh"){?> checked <?php } ?>>
      Buddh
    </label> 
    <label class="radio-inline" >
      <input type="radio" name="religion" value="Christian" <?php if($r=="Christian"){?> checked <?php } ?>>
      Christian
    </label> 
    <label class="radio-inline" >
      <input type="radio" name="religion" value="Other" <?php if($r=="Other"){?> checked <?php } ?>>
      Other
    </label> 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Primary Occupation">SSC : </label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-graduation-cap"></i>
       </div>
       <?php
		$data=$value['ssc'];
		$ssc=explode(",",$data);
		?>
						
      <input id="Primary Occupation" name="ssc[]" type="text" placeholder="Institute name" class="form-control input-md"value="<?php echo $ssc[0] ?>" />
      <input id="Primary Occupation" name="ssc[]" type="text" placeholder="Group" class="form-control input-md" value="<?php echo $ssc[1] ?>" />
      <input id="Primary Occupation" name="ssc[]" type="text" placeholder="Result" class="form-control input-md"value="<?php echo $ssc[2] ?>" />
      <input id="Primary Occupation" name="ssc[]" type="text" placeholder="SSC Roll" class="form-control input-md" value="<?php echo $ssc[3] ?>" />
<!--<?php var_dump($ssc)?>-->
      <div class="styled-select slate" >
        <select name="ssc[]">

          <option <?php if($ssc[4]=="") {?> selected <?php }?> >Select Board</option>
		  <option <?php if($ssc[4]!="" && $ssc[4]=="Dhaka") {?> selected <?php }?> >Dhaka</option>
          <option <?php if($ssc[4]!="" && $ssc[4]=="Rajshahi") {?> selected <?php }?> >Rajshahi</option>
          <option <?php if($ssc[4]!="" && $ssc[4]=="Comilla") {?> selected <?php }?> >Comilla</option>
          <option <?php if($ssc[4]!="" && $ssc[4]=="Jessore") {?> selected <?php }?>>Jessore</option>
          <option <?php if($ssc[4]!="" && $ssc[4]=="Chittagong") {?> selected <?php }?> >Chittagong</option>
          <option <?php if($ssc[4]!="" && $ssc[4]=="Barisal") {?> selected <?php }?> >Barisal</option>
          <option <?php if($ssc[4]!="" && $ssc[4]=="Sylhet") {?> selected <?php }?> >Sylhet</option>
          <option <?php if($ssc[4]!="" && $ssc[4]=="Dinajpur") {?> selected <?php }?>>Dinajpur</option>
          <option <?php if($ssc[4]!="" && $ssc[4]=="Madrasah") {?> selected <?php }?> >Madrasah</option>
          <option <?php if($ssc[4]!="" && $ssc[4]=="Other") {?> selected <?php }?> >Other</option>
        </select>
      </div>

      <input id="Primary Occupation" name="ssc[]" type="text" placeholder="Passing year" class="form-control input-md"value="<?php echo $ssc[5] ?>" />
      </div>
    </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Primary Occupation">HSC :</label>  
  <div class="col-md-4">
 <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-graduation-cap"></i>
       </div>
       <?php
		$data=$value['hsc'];
		$hsc=explode(",",$data);
		?>
      <input id="Primary Occupation" name="hsc[]" type="text" placeholder="Institute name" class="form-control input-md"value="<?php echo $hsc[0] ?>" />
      <input id="Primary Occupation" name="hsc[]" type="text" placeholder="Group" class="form-control input-md"value="<?php echo $hsc[1] ?>" />
      <input id="Primary Occupation" name="hsc[]" type="text" placeholder="Result" class="form-control input-md"value="<?php echo $hsc[2] ?>" />
      <input id="Primary Occupation" name="hsc[]" type="text" placeholder="HSC Roll" class="form-control input-md"value="<?php echo $hsc[3] ?>" />

      <div class="styled-select slate" >
        <select name="hsc[]">

          <option <?php if($hsc[4]=="") {?> selected <?php }?> >Select Board</option>
		  <option <?php if($hsc[4]!="" && $hsc[4]=="Dhaka") {?> selected <?php }?> >Dhaka</option>
          <option <?php if($hsc[4]!="" && $hsc[4]=="Rajshahi") {?> selected <?php }?> >Rajshahi</option>
          <option <?php if($hsc[4]!="" && $hsc[4]=="Comilla") {?> selected <?php }?> >Comilla</option>
          <option <?php if($hsc[4]!="" && $hsc[4]=="Jessore") {?> selected <?php }?>>Jessore</option>
          <option <?php if($hsc[4]!="" && $hsc[4]=="Chittagong") {?> selected <?php }?> >Chittagong</option>
          <option <?php if($hsc[4]!="" && $hsc[4]=="Barisal") {?> selected <?php }?> >Barisal</option>
          <option <?php if($hsc[4]!="" && $hsc[4]=="Sylhet") {?> selected <?php }?> >Sylhet</option>
          <option <?php if($hsc[4]!="" && $hsc[4]=="Dinajpur") {?> selected <?php }?>>Dinajpur</option>
          <option <?php if($hsc[4]!="" && $hsc[4]=="Madrasah") {?> selected <?php }?> >Madrasah</option>
          <option <?php if($hsc[4]!="" && $hsc[4]=="Other") {?> selected <?php }?> >Other</option>
        </select>
      </div>

      <input id="Primary Occupation" name="hsc[]" type="text" placeholder="Passing year" class="form-control input-md"value="<?php echo $hsc[5] ?>" />
      </div>
    </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Primary Occupation">GRADUATION :</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-graduation-cap"></i>
       </div>
       <?php
		$data=$value['graduation'];
		$graduation=explode(",",$data);
		?>
      <input id="Primary Occupation" name="grad[]" type="text" placeholder="Institute Name" class="form-control input-md"value="<?php echo $graduation[0] ?>" />
      <input id="Primary Occupation" name="grad[]" type="text" placeholder="Subject Name" class="form-control input-md"value="<?php echo $graduation[1] ?>" />
      <input id="Primary Occupation" name="grad[]" type="text" placeholder="Result" class="form-control input-md"value="<?php echo $graduation[2] ?>" />
      <input id="Primary Occupation" name="grad[]" type="text" placeholder="Passing Year / Current Situation" class="form-control input-md"value="<?php echo $graduation[3] ?>" />
      </div>
    </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Primary Occupation">MASTERS :</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-graduation-cap"></i>
       </div>
       <?php
		$data=$value['masters'];
		$masters=explode(",",$data);
		?>
     <input id="Primary Occupation" name="master[]" type="text" placeholder="Institute Name" class="form-control input-md"value="<?php echo $masters[0] ?>" />
      <input id="Primary Occupation" name="master[]" type="text" placeholder="Subject Name" class="form-control input-md"value="<?php echo $masters[1] ?>" />
      <input id="Primary Occupation" name="master[]" type="text" placeholder="Result" class="form-control input-md"value="<?php echo $masters[2] ?>" />
      <input id="Primary Occupation" name="master[]" type="text" placeholder="Passing Year / Current Situation" class="form-control input-md"value="<?php echo $masters[3] ?>" />
      </div>
    </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Skills">Experience :</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-briefcase"></i>
        </div>
     <input id="Skills" name="Skills" type="text" placeholder="Experience/Others activity (If any)" class="form-control input-md" value="<?php echo $value['experience'];?>" maxlength="250">
      </div>
    </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Overview (max 200 words)">Extra Activities (max 200 letters) :</label>
  <div class="col-md-4">                     
    <textarea class="form-control" rows="10" maxlength="250" id="Overview (max 200 words)" name="extraActivities" ><?php echo $value['extraActivities'];?></textarea>
  </div>
</div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Overview (max 200 words)">Present Address (max 200 letters) :</label>
  <div class="col-md-4">                     
    <textarea class="form-control" rows="10" maxlength="250" id="Overview (max 200 words)" name="PresentAddress" ><?php echo $value['presentAddress'];?></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Overview (max 200 words)">Permanent Address (max 200 letters) :</label>
  <div class="col-md-4">                     
    <textarea class="form-control" rows="10" maxlength="250" id="Overview (max 200 words)" name="PermanentAddress"><?php echo $value['permanentAddress'];?></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Overview (max 200 words)">Why are you  best ? (max 200 letters) :</label>
  <div class="col-md-4">                     
    <textarea class="form-control" rows="10" maxlength="250" id="Overview (max 200 words)" name="why" ><?php echo $value['whyHire'];?></textarea>
  </div>
</div>
<?php }}?>

<div class="form-group">
  <label class="col-md-4 control-label" ></label>  
  <div class="col-md-4">
  
    <input type="submit" name="updateTutorProfile" class="btn btn-success" value="Update"/>
  </div>
</div>

</fieldset>

</form>

</div>
</div>
   </div>
			<?php 
				if (isset($updateTutorProfile)){
					echo '<script type="text/javascript">alert("' . $updateTutorProfile .'")</script>';
			}?>
</body>
<?php }else{header("Location:login.php");} ?>

<?php include('include/footer.php');?>
