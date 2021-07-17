<?php include('include/header.php');?>
<?php include"config/config2.php"?>


<head>
<meta charset="utf-8">
 <link rel="stylesheet" href="step/fonts/material-icon/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="step/css/style.css">
</head>
<?php include 'classes/registration.php';?>
    <?php 
        $reg= new registration();
        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['tutor_registration'])){
        $tutor_registration = $reg ->tutor_registration($_POST,$_FILES);
        }
    ?>
<div style="padding-bottom: 50px;">
 <div class="containerreg">
            <h2>REGISTER AS A TUTOR, IT'S FREE!! </h2>
            <form method="post" action="" enctype="multipart/form-data" id="signup-form" class="signup-form">
                <h3>
                    Account
                </h3>
                <fieldset>
                    <div class="form-row">
                        <div class="form-file">
                            <input type="file" class="inputfile" name="ppicture" id="your_picture"  onchange="readURL(this);" data-multiple-caption="{count} files selected" multiple  required />
                            <label for="your_picture">
                                <figure>
                                    <img src="step/images/your-picture.png" alt="" class="your_picture_image">
                                </figure>
                                <span class="file-button" style="color:red;">Profile picture (Maximum 2MB)*</span>
                            </label>
                        </div>
                        <div class="form-group-flex">
                            <div class="form-group">
                            <input type="text" name="tutor_name" class="form-control" placeholder="Name *"maxlength="100" required />
                            </div>

                            <div class="form-group">
                                <input type="email" name="tutor_email" class="form-control" placeholder="Email *" maxlength="190"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                            </div>

                            <div class="form-group">
                               <input type="phone"  maxlength="11"pattern="^\d{11}$" name="tutor_Phone" class="form-control" placeholder="Phone Number*" required />
                            </div>
                            <div class="form-group">
                               <input type="phone"  maxlength="11"pattern="^\d{11}$" name="alt_tutor_Phone" class="form-control" placeholder="Alternative Phone Number" />
                            </div>
                              <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" name="tutor_pass"  maxlength="20" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Confirm Password *" name="tutor_again_pass"  maxlength="20" required />
                                        </div>

                            <div class="row">
                            <div class="col-sm-6 form-group">
                                <div class="form-group">
                                           
                              <span>Select Gender: &nbsp;</span>
                               <div class="btn-group btn-toggle gender"> 
                              <input type="button" name="tutor_gender" class="btn btn-primary active" value="Male">
                              <input type="button" name="tutor_gender" class="btn btn-default" value="Female">
                            </div>
                            <script>
                                $('.gender').click(function() {
                                $(this).find('.btn').toggleClass('active');  
                                if ($(this).find('.btn-primary').length>0) {
                                    $(this).find('.btn').toggleClass('btn-primary');
                                }
                                $(this).find('.btn').toggleClass('btn-default');
                            });
                            </script>
                             </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Background Medium*</label>
                                <select name="medium" class="form-control"  required />
                                <option class="hidden"  selected disabled>Background Medium*</option>
                                    <option value="Bangla Medium">Bangla Medium</option>
                                    <option value="English Medium">English Medium</option>
                                    <option value="English Version">English Version</option>
                                    <option value="Arabic Medium">Arabic Medium</option>
                                  
                                 </select>
                            </div>
                        </div>
                        </div>
                    </div>
                </fieldset>

                <h3>
                    Information
                </h3>
            <fieldset>
                <div class="form-group">
            <input type="text" name="tutor_father_name" class="form-control" placeholder="Father Name*"  maxlength="100" required />
                </div>

                <div class="form-group">
                    <input type="text" name="tutor_mother_name" class="form-control" placeholder="Mother Name*"  maxlength="100" required />
                </div>

                <div class="form-group">
                    <input type="text" name="tutor_NID" class="form-control" placeholder="NID/Birth ID Number*"  maxlength="20" required />
                </div>

               <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Date of Birth*</label>
                                <input type="date" name="dob" placeholder="Date of birth" class="form-control" required >
                            </div>  
                            <div class="col-sm-4 form-group">
                                <label>Religion</label>
                                <select name="religion" class="form-control" >
                                <option class="hidden"  selected disabled>Select Religion</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddh">Buddh</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Other">Other</option>
                                  
                                 </select>
                            </div>  
                            <div class="col-sm-4 form-group">
                                <label>Blood Group</label>
                                <select name="blood" class="form-control">
                                   <option value="" selected disabled>Select Blood Group</option>
                                   <option value="A+">A+</option>
                                   <option value="A-">A-</option>
                                   <option value="B+">B+</option>
                                   <option value="B-">B-</option>
                                   <option value="O+">O+</option>
                                   <option value="O-">O-</option>
                                   <option value="AB+">AB+</option>
                                   <option value="AB-">AB-</option>
                                 </select>
                            </div>      
                        </div>
                <div class="form-row form-input-flex">
                        
                       <div class="form-group">
 
                            <label for=" Email1msg">Present Address *:</label>
                             
                    <textarea class="form-control" name="present_address" placeholder="Present Address *"  maxlength="200" required></textarea>
                             
                            </div>
                        
                        <div class="form-group">
 
                        <label for=" Email1msg">Permanent Address:</label>
                         
                <textarea class="form-control" name="permanent_address" placeholder="Permanent Address" maxlength="200"></textarea>
                         
                        </div>
                    </div>

            </fieldset>

                <h3>
                    Education
                </h3>
                <fieldset>
                  <div class="form-group"><label>Your Highest Qualification/Degree * :</label>
                    <input type="text" name="tutor_HEQ" class="form-control" placeholder="Your Highest Qualification/Degree*"  maxlength="100" required />
                </div>
                <div class="form-row form-input-flex ">
                    <div class="form-input"><label>Your Current institution *</label>
                    <input type="text" name="tutor_CIN" class="form-control" placeholder="Your Current institution *"  maxlength="100" required/>
                </div>
                <div class="form-input "><label>Name of the Subject you are studding on*</label>
                    <input type="text" name="tutor_CIN_SUB" class="form-control" placeholder="Name of the Subject you are studding on*"  maxlength="100"  required/>
                </div>
                </div>

Your SSC / O-Level Information *
                  <div class="row">
                    <div class="col-sm-2 form-group">
                                <input type="text" name="ssc[]" placeholder="Institute" class="form-control"  required />
                            </div> 
                            <div class="col-sm-2 form-group">
                                  <select name="ssc[]" class="form-control" required >
                                   <option value="" selected disabled>Group</option>
                                   <option value="Science">Science</option>
                                   <option value="Humanities">Humanities</option>
                                   <option value="Business Studies">Business Studies</option>
                                   <option value="Others">Others</option>
                                 </select>
                            </div>
                            <div class="col-sm-2 form-group">
                                <input type="text" name="ssc[]" placeholder="Result" class="form-control" pattern="[0-9]+\.+[0-9]{2}$" required />
                            </div>
                            <div class="col-sm-2 form-group">
                                <input type="text" name="ssc[]" placeholder="Roll"  pattern="[0-9]{4,}$" class="form-control" required />
                            </div>
                            <div class="col-sm-2 form-group">
                                <select name="ssc[]" class="form-control" required >
                                   <option value="" selected disabled>Board</option>
                                   <option value="Dhaka">Dhaka</option>
                                   <option value="Rajshahi">Rajshahi</option>
                                   <option value="Comilla">Comilla</option>
                                   <option value="Jessore">Jessore</option>
                                   <option value="Chittagong">Chittagong</option>
                                   <option value="Barisal">Barisal</option>
                                   <option value="Sylhet">Sylhet</option>
                                   <option value="Dinajpur">Dinajpur</option>
                                   <option value="Madrasah">Madrasah</option>
                                   <option value="Mymensingh">Mymensingh</option>
                                   <option value="Technical">Technical</option>
                                   <option value="Other">Other</option>
                                 </select>
                            </div> 
                            <div class="col-sm-2 form-group">
                                <input type="text" name="ssc[]" placeholder="Year" pattern="^\d{4}$" class="form-control" required >
                            </div>  
                         </div>

Your HSC / A-Level Information
                  <div class="row">
                    <div class="col-sm-2 form-group">
                                <input type="text" name="hsc[]" placeholder="Institute" class="form-control"  >
                            </div> 
                            <div class="col-sm-2 form-group">
                                <select name="hsc[]" class="form-control" required >
                                   <option value="" selected disabled>Group</option>
                                   <option value="Science">Science</option>
                                   <option value="Humanities">Humanities</option>
                                   <option value="Business Studies">Business Studies</option>
                                   <option value="Others">Others</option>
                                 </select>
                            </div>
                            
                            <div class="col-sm-2 form-group">
                                <input type="text" name="hsc[]" placeholder="Result" pattern="[0-9]+\.+[0-9]{2}$" class="form-control"  >
                            </div>
                            <div class="col-sm-2 form-group">
                                <input type="text" name="hsc[]" placeholder="Roll" pattern="[0-9]{4,}$" class="form-control"  >
                            </div> 
                             <div class="col-sm-2 form-group">
                                <select name="hsc[]" class="form-control">
                                   <option value="" selected disabled>Board</option>
                                   <option value="Dhaka">Dhaka</option>
                                   <option value="Rajshahi">Rajshahi</option>
                                   <option value="Comilla">Comilla</option>
                                   <option value="Jessore">Jessore</option>
                                   <option value="Chittagong">Chittagong</option>
                                   <option value="Barisal">Barisal</option>
                                   <option value="Sylhet">Sylhet</option>
                                   <option value="Dinajpur">Dinajpur</option>
                                   <option value="Madrasah">Madrasah</option>
                                   <option value="Mymensingh">Mymensingh</option>
                                   <option value="Technical">Technical</option>
                                   <option value="Other">Other</option>
                                 </select>
                            </div> 
                            <div class="col-sm-2 form-group">
                                <input type="text" name="hsc[]" placeholder="Year" pattern="^\d{4}$" class="form-control"  >
                            </div>  
                         </div>
Your HONOURS Information
                  <div class="row">
                    <div class="col-sm-3 form-group">
                                <input type="text" name="grad[]" placeholder="Institute" class="form-control"  >
                            </div> 
                            <div class="col-sm-3 form-group">
                                <input type="text" name="grad[]" placeholder="Subject" class="form-control"  >
                            </div>
                            
                            <div class="col-sm-3 form-group">
                                <input type="text" name="grad[]" placeholder="Result" pattern="[0-9]+\.+[0-9]{2}$" class="form-control"  >
                            </div>
                           
                            <div class="col-sm-3 form-group">
                                <input type="text" name="grad[]" placeholder="Year" pattern="^\d{4}$" class="form-control"  >
                            </div>  
                         </div>
Your MASTER'S Information
                  <div class="row">
                    <div class="col-sm-3 form-group">
                                <input type="text" name="master[]" placeholder="Institute" class="form-control"  >
                            </div> 
                            <div class="col-sm-3 form-group">
                                <input type="text" name="master[]" placeholder="Subject" class="form-control"  >
                            </div>
                            
                            <div class="col-sm-3 form-group">
                                <input type="text" name="master[]" placeholder="Result" pattern="[0-9]+\.+[0-9]{2}$" class="form-control"  >
                            </div>
                           
                            <div class="col-sm-3 form-group">
                                <input type="text" name="master[]" placeholder="Year" pattern="^\d{4}$" class="form-control"  >
                            </div>  
                         </div>
                         <div class="row">
                           <div class="col-sm-3 col-md-6 form-group">
 
                  <label for=" Email1msg">Extra Caricular Activities:</label>
                         
                        <textarea class="form-control" name="extraact" placeholder="Extra Caricular Activities" maxlength="200"></textarea>
                         
                   </div>
                         </div>

               <div class="row" style="float:right;"> <button class="btn btn-primary"name="tutor_registration">Complete Registration &nbsp;<i class="fa fa-paper-plane-o" aria-hidden="true"></i></div>
                </fieldset>

            </form>
        </div>

    </div>

    <!-- JS -->
    <script src="step/vendor/jquery/jquery.min.js"></script>
    <script src="step/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="step/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="step/vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="step/js/main.js"></script>
            <?php 
                if (isset($tutor_registration)){
                    echo '<script type="text/javascript">alert("' . $tutor_registration . '")</script>';
            }?>
<?php include('include/footer.php');?>
    <script type="text/javascript">
        function getStatesSelectList(){
            var country_select = document.getElementById("country-select");
            var city_select = document.getElementById("city-select");
            
            var country_id = country_select.options[country_select.selectedIndex].value;
            console.log('CountryId : ' + country_id);

            var xhr = new XMLHttpRequest();
            var url = 'fetchCourse.php?country_id=' + country_id;
            // open function
            xhr.open('GET', url, true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
            // check response is ready with response states = 4
            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    var text = xhr.responseText;
                    //console.log('response from fetchCourse.php : ' + xhr.responseText);
                    var state_select = document.getElementById("state-select");
                    state_select.innerHTML = text;
                    state_select.style.display='inline';
                    city_select.style.display='none';
                }
            }

            xhr.send();
        }

        function getCitySelectList(){
            var state_select = document.getElementById("state-select");

            var state_id = state_select.options[state_select.selectedIndex].value;
            console.log('StateId : ' + state_id);

            var xhr = new XMLHttpRequest();
            var url = 'fetchSubject.php?state_id=' + state_id;
            // open function
            xhr.open('GET', url, true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
            // check response is ready with response states = 4
            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    var text = xhr.responseText;
                    //console.log('response from cities.php : ' + xhr.responseText);
                    var city_select = document.getElementById("city-select");
                    city_select.innerHTML = text;
                    city_select.style.display='inline';
                }
            }

            xhr.send();
        }

        var country_select = document.getElementById("country-select");
        country_select.addEventListener("change", getStatesSelectList);

        var state_select = document.getElementById("state-select");
        state_select.addEventListener("change", getCitySelectList);
    </script>

        <script type="text/javascript">
        function getUpazillaSelectList(){
            var district_select = document.getElementById("district-select");
            
            var district_id = district_select.options[district_select.selectedIndex].value;
            console.log('DistrictId : ' + district_id);

            var xhr = new XMLHttpRequest();
            var url = 'fetchArea.php?district_id=' + district_id;
            // open function
            xhr.open('GET', url, true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
            // check response is ready with response states = 4
            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    var text = xhr.responseText;
                    //console.log('response from states.php : ' + xhr.responseText);
                    var area_select = document.getElementById("area-select");
                    area_select.innerHTML = text;
                    area_select.style.display='inline';
                }
            }

            xhr.send();
        }
        
        var district_select = document.getElementById("district-select");
        district_select.addEventListener("change", getUpazillaSelectList);

    </script>