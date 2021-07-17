<?php include('include/header.php');?>
    <!-- ##### Instructors Video Start ##### -->
    <div class="instructors-video d-flex align-items-center justify-content-center bg-img" style="background-image: url(<?php echo "$contimg";?>);">
        <h2>Be The Best Tutor</h2>
        <!-- video btn -->
        <a href="https://www.youtube.com/watch?v=w05dlpbGdpE" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
    </div>
    <!-- ##### Instructors Video End ##### -->


<?php 
if(isset($_POST['submit'])){
    $to = "asifsajal1@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['name'];
    $subject = "contact Form submission of your website";
    //$subject2 = "Copy of your form submission";
    $message = "Mr./Mrs. ".$first_name . "\n\n wrote the following::" . "\n\n" . $_POST['message'];
    //$message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
   //mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender

$var1="Mail Sent. Thank you  ";
$var2=", we will contact with you shortly.";
echo '<script type="text/javascript">alert("' .$var1. $first_name . $var2.'")</script>';
    }
?>

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-12 col-lg-6">
                    <div class="contact--info mt-50 mb-100">
                        <h4>Contact Info</h4>
                        <?php 
                $getAllcontact= $gnc->getAllcontact();
                if($getAllcontact){
                while($result = $getAllcontact->fetch_assoc()){
                ?>
                        <ul class="contact-list">
                            <li>
                                <h6><i class="fa fa-phone" aria-hidden="true"></i> Number:</h6>
                                <h6><?php echo $result['contact_cell'];?></h6>
                            </li>
                            <li>
                                <h6><i class="fa fa-envelope" aria-hidden="true"></i> Email:</h6>
                                <h6><?php echo $result['contact_mail'];?></h6>
                            </li>
                            <li>
                                <h6><i class="fa fa-map-pin" aria-hidden="true"></i> Address:</h6>
                                <h6><?php echo $result['contact_address'];?></h6>
                            </li>
                        </ul>
                        <?php }}?>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-12 col-lg-6">
                    <div class="contact-form">
                        <h4>Get In Touch</h4>
                        
                        <form class="contact100-form validate-form" action="" method="post">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="name"class="form-control" id="text" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required >
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message" required ></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn clever-btn w-100"name="submit">Send a message &nbsp;<i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
<?php include('include/footer.php');?>