<?php include('include/header.php');?>
<?php include"config/config2.php"?>
    <?php 
    include 'classes/jobClass.php';
        $jc= new jobclass();
        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['JobPost'])){
     $subjectNames=$_POST["subjectNames"];
    $subjectNamesarr = implode(",",$subjectNames);
        $JobPost = $jc ->JobPost($_POST,$_FILES,$subjectNamesarr);
        }
    ?>
	
<?php
include('config/database_connection.php');
$country = '';
$query = " SELECT * FROM application_category ORDER BY cat_id ASC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
  $country .= '<option value="'.$row["cat_id"].'">'.$row["category_name"].'</option>';
}
?>
<head>
    <link rel="stylesheet" type="text/css" href="wizard/jquery-steps/build/jquery.steps.css">
</head>
<body>
    <div class="container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="min-height-200px">

                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <div class="clearfix" style="text-align: center;">
                        <h4 class="text-blue">Fill up your tutor requirements for free</h4>
                        <p class="mb-30 font-14">Fill up  requirements form. Over 5000+ Parents/Students have already found qualified tutors through our platform.</p>
                    </div>
                    <div class="wizard-content">
                        <form class="tab-wizard wizard-circle wizard" method="post" action="" enctype="multipart/form-data">
                            <h5>Basic Info</h5>
                            <section>
                                <div class="row">
                                   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select City* :</label>
                                            <select class="form-control" id="district-select" name="districtName" required >
                                               <option disabled selected>Please Select District*:</option>
                                                <?php
                                                $sql = "SELECT * FROM area_district ORDER BY district_name ASC";
                                                $result = mysqli_query($connection, $sql);
                                                while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                            <option value="<?php echo $row['district_id'] ?>"><?php echo $row['district_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Location*:</label>
                                            <select class="form-control" id="area-select" name="areaName" required>
                                              <option disabled selected>Please Select Area Location*:</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                 <!--<div class="row">
                                   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Category:</label>
                                            <select class="form-control" id="country-select" name="categoryName" required>
                                                <option disabled selected >Please Select Category *</option>
                                                    <?php
                                                        $sql = "SELECT * FROM application_category ORDER BY cat_id ASC";
                                                        $result = mysqli_query($connection, $sql);
                                                        while($row = mysqli_fetch_assoc($result)){
                                                    ?>
                                                    <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['category_name'] ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Course :</label>
                                            <select class="form-control" id="state-select" name="courseName" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>-->

  <head>
<script src="js/jquery.lwMultiSelect.js"></script>
<link rel="stylesheet" href="css/jquery.lwMultiSelect.css" />
  </head>

<div class="row">
  <div class="col-md-6">
     <div class="form-group">

    
   <label>Select Category* :</label>
        <select name="categoryName" required id="country" class="form-control action">
          <option disabled selected>Select Category*</option>
          <?php echo $country; ?>
        </select>
      </div>
</div>   
      <div class="col-md-6">
     <div class="form-group"> 
     <label>Select Course* :</label>   
        <select name="courseName" required id="state" class="form-control action">
          <option disabled selected>Select Course*</option>
        </select>
          </div>
</div>

</div>






                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Student Gender* :</label>
                                            <select class="form-control" name="studentGender" required>
                                                <option value="" disable selected >Select Student Gender *</option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                <option value="A">Any</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php 
                                    $loginselc= (Session::get("stulogin"));
                                            if($loginselc!=false){?>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Student Name* :</label>
                                            <input type="text" class="form-control" name="studentName" maxlength="75" value="<?php echo"$student_name";?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Number* :</label>
                                            <input type="text" class="form-control" name="studentPhone" maxlength="11"  required value="<?php echo"$student_phone";?>">
                                        </div>
                                    </div>

                                <?php } else{?>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Student Name* :</label>
                                            <input type="text" class="form-control" name="studentName" maxlength="75" placeholder="Student Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Number* :</label>
                                            <input type="tel" class="form-control" name="studentPhone" maxlength="11"pattern="^\d{11}$" required placeholder="Contact Number*">
                                        </div>
                                    </div>

                                <?php } ?>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Institute Name :</label>
                                            <input type="text" class="form-control" name="studentInstitute" maxlength="100" placeholder="Institute Name">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 2 -->
                            <h5>Requirments</h5>
                            <section>
                                 <!--<div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Subject :</label>
                                             <select multiple class="form-control" id="city-select" name="subjectNames[]" required >
                                             
                                             </select> 
                                        </div>
                                    </div>
                                </div>-->
<!-- below style for dependent input by checkbox-->
<style type="text/css">
  .control:checked ~ .conditional {
        clip: auto;
        height: auto;
        margin: 0;
        overflow: visible;
        position: static;
        width: auto;
      }

      .control:not(:checked) ~ .conditional {
        border: 0;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
      }
</style>
<!-- below style for checkbox-->
<style type="text/css">

@keyframes click-wave {
  0% {
    height: 30px;
    width: 30px;
    opacity: 0.35;
    position: relative;
  }
  100% {
    height: 200px;
    width: 200px;
    margin-left: -80px;
    margin-top: -80px;
    opacity: 0;
  }
}

.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  top: 10.33333px;
  right: 0;
  bottom: 0;
  left: 0;
  height: 30px;
  width: 30px;
  transition: all 0.15s ease-out 0s;
  background: #cbd1d8;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
  z-index: 1000;
}
.option-input:hover {
  background: #9faab7;
}
.option-input:checked {
  background: #40e0d0;
}
.option-input:checked::before {
  height: 30px;
  width: 30px;
  position: absolute;
  content: '✔';
  display: inline-block;
  font-size: 16.66667px;
  text-align: center;
  line-height: 20px;
}
.option-input:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background: #40e0d0;
  content: '';
  display: block;
  position: relative;
  z-index: 100;
}
</style>
<div class="row">
  <div class="col-md-12">
    <label>Select Subject* :</label>
     <div class="form-group">
        <select name="subjectNames[]" id="city" multiple class="form-control" required>
        </select>


        <label for="">Thick to Add More Subjects :&nbsp;</label>
        <!--<input type="checkbox" id="" class="control"> --> 
         <input type="checkbox" class="option-input checkbox control " id=""/>
            <div class="conditional" style="padding-top:10px;">
            
              <input type="text" name="subjectNames[]"class="form-control" id="option" placeholder="Enter more subject separate with comma. ">
             </div>
</div>
</div>
</div>

<script>
$(document).ready(function(){

  $('#city').lwMultiSelect();

  $('.action').change(function(){
    if($(this).val() != '')
    {
      var action = $(this).attr("id");
      var query = $(this).val();
      var result = '';
      if(action == 'country')
      {
        result = 'state';
      }
      else
      {
        result = 'city';
      }
      $.ajax({
        url:'fetch.php',
        method:"POST",
        data:{action:action, query:query},
        success:function(data)
        {
          $('#'+result).html(data);
          if(result == 'city')
          {
            $('#city').data('plugin_lwMultiSelect').updateList();
          }
        }
      })
    }
  });

  $('#insert_data').on('submit', function(event){
    event.preventDefault();
    if($('#country').val() == '')
    {
      alert("Please Select Category");
      return false;
    }
    else if($('#state').val() == '')
    {
      alert("Please Select Course");
      return false;
    }
    else if($('#city').val() == '')
    {
      alert("Please Select Subject(s)");
      return false;
    }
    else
    {
      $('#hidden_city').val($('#city').val());
      $('#action').attr('disabled', 'disabled');
      var form_data = $(this).serialize();
      $.ajax({
        url:"insert.php",
        method:"POST",
        data:form_data,
        success:function(data)
        {
          $('#action').attr("disabled", "disabled");
          if(data == 'done')
          {
            $('#city').html('');
            $('#city').data('plugin_lwMultiSelect').updateList();
            $('#city').data('plugin_lwMultiSelect').removeAll();
            $('#insert_data')[0].reset();
            alert('Data Inserted');
          }
        }
      });
    }
  });

});
</script>






                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tutor Gender Prefer* :</label>
                                            <select class="form-control" name="tutorGender" required >
                                                <option value="" disable selected>Select Tutor Gender*</option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                <option value="A">Any</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Days in a Week* :</label>
                                            <select class="form-control" name="daysInAWeek" required >
                                                <option value="" disable selected >Select days in a week *</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Salary* :</label>
                                            <input type="number" class="form-control" name="salary" required placeholder="Enter Salary/Month Amount *">
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>When Are You Looking To Hire  :</label>
                                            <input type="date" class="form-control" name="joinDate" required placeholder="Date to join *">
                                        </div>
                                    </div>
                                </div>
                                  <div class="row">
                                   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Number of Student* :</label>
                                           <select class="form-control" name="numberOfStudent" required >
                                                <option value="" disable selected >Select Student Number*</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5+">5+</option>
                                                <option value="Batch">Batch</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                            $today = date("j F, Y");
                                      ?>
                                     <input type="text" class="form-control" name="postTime" maxlength="75" value="<?php echo $today;?>" hidden> 

<style type="text/css">
    .time-picker {
  width: 300px;
}

.time-picker input.active:focus {
  outline: none !important;
}

.time-picker input.active {
  border: 1px solid red;
}

.time-picker input {
  display: inline;
}

.time-picker {
  position: relative;
  display: inline;
}

.suggestions {
  position: absolute;
  border: 1px solid #ddd;
  clear: both;
  max-height: 150px;
  overflow-y: scroll;
  width: 100%;
  background: #fff;
  z-index: 999;
  display: none;
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.suggestions li {
  border-bottom: 1px solid #e2e2e2;
  padding: 10px;
}

.suggestions li:hover {
  background-color: #5897fb;
  color: #fff;
}
</style>
<script type="text/javascript">
    var query = '';
var hours = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
var hours24 = ['13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24'];
var hoursUpdated = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
var minutes = ['00', '30'];
var format = ['am', 'pm'];
var time;
var timeArray = [];
var items = [];
var error;
var errorMessage;
var list = $('#list');

itemList(this.hours, this.minutes, this.format, this.time, this.timeArray);

function itemList(hours, minutes, format, time, timeArray) {
  hours.map(i => {
    minutes.map(j => {
      format.map(k => {
        time = i + ":" + j + " " + k;
        timeArray.push(time);
        this.timeArray = timeArray;
      });
    });
  });
}

function querySubset(query) {
  this.query = query.toLowerCase();
  this.hour = query.substring(0, 2);
  this.timeSelector = query.substring(2, 3);
  this.minute = query.substring(3, 5);
  this.formatSelector = query.substring(5, 6);
  this.formatUpdated = query.substring(6, 8);
}

function hoursUpdate(input) {
  this.hours24.map((value, i) => {
    if (input === value) {
      this.query = this.hoursUpdated[i];
      $("#hour-input").val(this.query);
    }
  });
}

function bindResult() {
  list.show();
  this.error = false;
  $('#hour-input').removeClass('active');
  $('.error').html('').removeClass("alert");

  this.items = this.timeArray.filter(function(jam) {
    return jam.indexOf(this.query) > -1;
  }.bind(this));

  list.empty();
  this.items.forEach(function(hour, i) {
    var entry = document.createElement('li');
    entry.append(document.createTextNode(hour));
    entry.id = i;
    entry.setAttribute("onclick", "select('" + hour + "')");
    list.append(entry);
  });

}

function onErrorResult(errorMes) {
  this.error = true;
  this.errorMessage = errorMes;
  $('.time-picker').attr('data-original-title', this.errorMessage);
  $('.error').html(this.errorMessage).addClass(' alert alert-danger');
  $('#hour-input').addClass('active');
}

function filter(query) {
  if (query !== "") {
    this.querySubset(query);
    if (!isNaN(this.hour)) {
      this.hoursUpdate(this.hour);
      this.bindResult();
      if (this.timeSelector === ":") {
        this.bindResult();
        if (this.minute !== "") {
          if (!isNaN(this.minute))
            this.bindResult();
          if (this.formatSelector === " ") {
            this.bindResult();
            if (this.formatUpdated === "am" || this.formatUpdated === "pm") {
              this.bindResult();
            } else {
              errorMessage = "Define am/pm";
              this.onErrorResult(errorMessage);
            }
          } else {
            errorMessage = "Use space before am/pm";
            this.onErrorResult(errorMessage);
          }
        } else {
          errorMessage = "Fill your minute with number";
          this.onErrorResult(errorMessage);
        }
      } else {
        errorMessage = "Use ' : ' between hour and minute";
        this.onErrorResult(errorMessage);
      }
    } else {
      errorMessage = "Fill your hour with number";
      this.onErrorResult(errorMessage);
    }
  } else {
    this.error = false;
    this.errorMessage = "";
    $('.error').html('').removeClass("alert");
    $('#hour-input').removeClass('active');
    this.items = [];
  }
}

function select(item) {
  list.hide();
  this.error = false;
  this.errorMessage = "";
  this.query = item;
  $("#hour-input").val(this.query);
  $('#hour-input').removeClass('active');
  $('.error').html('').removeClass("alert");
  this.items = [];
}
</script>
                                    <!--<div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tutoring Time  :</label>
                                            <input type="time" class="form-control" name="tutoringTime" required placeholder="Tutoring Time *">
                                        </div>
                                    </div>-->

    <div class="col-md-6">
<div class="form-group">
      <div class="time-picker"><label>Tutoring Time*  :</label>
        <input id="hour-input" class="form-control" name="tutoringTime" required placeholder="Tutoring Time *" type="text" onkeyup=filter(this.value) (focus)="suggestion = true">

        <ul id="list" class="suggestions list-style-none padding-0">
        </ul>
      </div></div>
    </div>
    <div class="col-sm-9">
      <div class="error"></div>
    </div>
 


                                </div>
                            </section>
                            <!-- Step 3 -->
                            <h5>Address</h5>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address* :</label>
                                            <textarea class="form-control" name="address" required placeholder="Student Address"></textarea>
                                        </div>
                                    </div>
                                  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Requirements :</label>
                                            <textarea class="form-control" name="requirments" placeholder=" Others requirments (If any )" maxlength="200"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 4 -->
                            <h5>Submit</h5>
                            <section>
                              
                                <?php 
                                    $loginselcc= (Session::get("stulogin"));
                                            if($loginselcc!=false){?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email Address* :</label>
                                            <input type="email" class="form-control" name="studentEmail"maxlength="100"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required value="<?php echo"$student_email";?>"/>
                                            <input type="text" class="form-control"  name="studentId" hidden required value="<?php echo"$student_id";?>"  />
                                        </div>
                                    </div>
                                     
                                </div>
                                 <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>How Did You Hear About Us?</label>
                                           <select class="form-control" name="howUHearUs">
                                                <option disable selected >Select an Option</option>
                                                <?php 
                                                    $getAllcontact= $gnc->knowus();
                                                    if($getAllcontact){
                                                    while($result = $getAllcontact->fetch_assoc()){
                                                    ?>
                                                <option value="<?php echo $result['id'];?>"><?php echo $result['answer_options'];?></option>
                                                <?php }}?>
                                            </select>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <input type="password" maxlength="20" class="form-control" name="password" required placeholder="Password * 4 - 20 character" minlength="4" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Retype Password :</label>
                                            <input type="password" maxlength="20" class="form-control" name="retypePassword" required placeholder="Password * 4 - 20 character" minlength="4" />
                                        </div>
                                    </div>
                                </div>-->
                            <?php } else {?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email Address* :</label>
                                            <input type="email" class="form-control" name="studentEmail" placeholder="Email *" maxlength="100"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>How Did You Hear About Us?</label>
                                           <select class="form-control" name="howUHearUs">
                                                <option disable selected >Select an Option</option>
                                                <?php 
                                                    $getAllcontact= $gnc->knowus();
                                                    if($getAllcontact){
                                                    while($result = $getAllcontact->fetch_assoc()){
                                                    ?>
                                                <option value="<?php echo $result['id'];?>"><?php echo $result['answer_options'];?></option>
                                                <?php }}?>
                                            </select>
                                        </div>
                                    </div></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password* :</label>
                                            <input type="password" maxlength="20" class="form-control" name="password" required placeholder="Password will be 4 - 20 characters" minlength="4" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Retype Password* :</label>
                                            <input type="password" maxlength="20" class="form-control" name="retypePassword" required placeholder="Password will be 4 - 20 characters" minlength="4" />
                                         </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </section>
                        
                    </div>
                </div>
<!-- success Popup html Start -->
                <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body text-center font-18">
                                <h3 class="mb-20">Are you sure to submit ?</h3>
                                <div class="mb-30 text-center"><span></span></div>
                                After submit we will contact with you and approve your request.
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Submit" name="JobPost"/>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- success Popup html End -->
            </div>
            </form>
        </div>
    </div><?php include('include/footer.php');?>

    <?php 
                if (isset($JobPost)){
                    echo '<script type="text/javascript">alert("' . $JobPost . '")</script>';
            }?>
    <script src="wizard/jquery-steps/build/jquery.steps.js"></script>
    <script>
        $(".tab-wizard").steps({
            headerTag: "h5",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Submit"
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
                $('.steps .current').prevAll().addClass('disabled');
            },
            onFinished: function (event, currentIndex) {
                $('#success-modal').modal('show');
            }
        });
    </script>
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
</body>
</html>