
<?php
 session_start();
if(isset($_SESSION['uid'])){
 
 
  include '../../config/database.php';
  include '../../config/config.php';
  include 'users_query.php';
  include 'header.php';
  $msg = "";

}
else{

    header("location:../pages");
}




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
//include '../config/database.php';
//include '../config/config.php';
//$msg = ''; 


  

if(isset($_POST['submit'])){

 $cpassword = $link->real_escape_string($_POST['cpassword']);
$cpin = $link->real_escape_string($_POST['cpin']);

$fname = $link->real_escape_string($_POST['firstname']);
$lname = $link->real_escape_string($_POST['lastname']);
$pwd = $link->real_escape_string($_POST['password']);
$email = $link->real_escape_string($_POST['email']);
$phone = $link->real_escape_string($_POST['phone']);
$bdate =$link->real_escape_string( $_POST['bdate']);

$gender = $link->real_escape_string($_POST['gender']);
$address = $link->real_escape_string( $_POST['address']);
$city = $link->real_escape_string($_POST['city']);
$country = $link->real_escape_string($_POST['country']);
$state = $link->real_escape_string($_POST['state']);
$zipcode = $link->real_escape_string($_POST['zipcode']);
$notification = $link->real_escape_string((int) $_POST['notification']);
$nbalance = $link->real_escape_string($_POST['nbalance']);
$inbalance = $link->real_escape_string($_POST['inbalance']);
$bname = $link->real_escape_string($_POST['bname']);

$utype = $link->real_escape_string($_POST['utype']);
$pin = $link->real_escape_string( $_POST['pin']);
$image = $_FILES['image']['name'];
$target = "uploads/".basename($image);



//account number generation...
$account ='29176573827673930057000463891234567890';
$account = str_shuffle($account);
$account = substr($account,0, 10);

$balance = '';
$mobile_hash = '';
$active = '';
$status = '';
$session = '';
$is_mobile = '';

//imf code generation...
$imf ='827673930057000463891234567890';
$imf = str_shuffle($imf);
$imf = substr($imf,0, 4);


//cot code generation...
$cot ='76573827673930057000463891234567890';
$cot = str_shuffle($cot);
$cot = substr($cot,0, 4);


//ipn code generation...
$ipn ='3827673930057000463891234567890';
$ipn = str_shuffle($ipn);
$ipn = substr($ipn,0, 4);



$sql = "SELECT email FROM tbl_users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    $msg = 'Email already exist, please try another email.';



if ($cpassword != $pwd) {
    
    $msg = 'Password does not match!.';

}


if ($cpin != $pin) {
    
    $msg = 'Pin does not match!.';

}
}else{

$sql1 = "INSERT INTO tbl_users (fname, lname, pwd, email, phone, gender, is_mobile, mobile_hash, utype, pics, bdate,acctno,active,status,pin,session,balance,address,city,state,zipcode,notification,nbalance,inbalance,bname,country,ipn,imf,cot)

        VALUES ('$fname', '$lname', '$pwd', '$email', '$phone', '$gender', '$is_mobile','$mobile_hash', '$utype', '$image', '$bdate','$account','$active','$status','$pin','$session','$balance','$address','$city','$state','$zipcode','$notification','$nbalance','$inbalance','$bname','$country','$ipn','$imf','$cot')";

         if(mysqli_query($link, $sql1)){

move_uploaded_file($_FILES['image']['tmp_name'], $target);
              
           
        //   $sid = $sms_private_key; // Your Account SID from www.twilio.com/console
//$token = $sms_public_key; // Your Auth Token from www.twilio.com/console

           // $client = new Twilio\Rest\Client($sid, $token);

          //  $smsbody = 'Dear: '.$fname.' - Account Number: ' .$account.'!
                 
           // This is to inform you that your Account '.$account.', is registered successfully with '.$name.' and currently  not active. We will soon contact you once its activated. In case you need any further clarification for the same, please do get in touch with your Branch';




        //    $message = $client->messages->create(
           //         '+' . $phone, array(
            //    'from' => '+13197748578', // From a valid Twilio number
            //    'body' => $smsbody
             //       )
          //  );

    
           
            //send email


require_once "PHPMailer/PHPMailer.php";
require_once 'PHPMailer/Exception.php';


//PHPMailer Object
$mail = new PHPMailer;

//From email address and name
$mail->From = $emaila;
$mail->FromName = $name;

//To address and name
$mail->addAddress($email, $fname);
$mail->addAddress("$email"); //Recipient name is optional

//Address to which recipient will reply

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Account Registration Details";

$mail->Body = '<div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">

<div class="be_logo" style="float: left;"> <img src="https://'.$bankurl.'/nonsms-bank-script/3d_bank/admin/pages/logo/'.$logo.'"> </div>

<div class="be_user" style="float: right"> <p>Dear: '.$fname.' - Account Number: ' .$account.'</p> </div> 

<div style="clear: both;"></div> 

<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<h1>A/C: '.$account.' is created</h1>

</div> </div> 

<div class="be_body" style="padding: 20px;"> <p style="line-height: 25px;"> This is to inform you that your Account # <strong>'.$account.'</strong> 

is registered successfully with '.$name.' and currently  not active. We will soon contact you once it gets activated. </p> <div style="margin-top: 25px;">

<p>In case you need any further clarification for the same, please do get in touch with your Branch.</p> </div> </div> <div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div> <p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2019 '.$account.'. </p> </div> </div> </div>';

if($mail->send()) {
  
    $msg = "A new account has been created successfully, the user will receive an email notifivcation soon !";
}
               
           else{
               $msg = "Something went wrong. Please try again later!";
            }
        
        
        
        
        
        
    
        
        
        
        
        
    }else{
         $msg = "Cannot Register!";
    }
}
}











?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="reg/img/apple-icon.png">
	<link rel="icon" type="image/png" href="reg/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?php echo $row['title']; ?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
    <link href="reg/css/bootstrap.min.css" rel="stylesheet" />
	<link href="reg/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="reg/css/demo.css" rel="stylesheet" />
</head>

<body>

    <!--   Creative Tim Branding   -->
   

	
    <!--   Big container   -->
    <div class="container">
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="orange" id="wizardProfile">


                    <form action="new.php" method="post" enctype="multipart/form-data" >

                 
                    	<div class="wizard-header">
                        	<h3>
                        	   <b>CREATE </b> NEW USER ACCOUNT <br>
                        	   
                        	</h3>
                    	</div>
                        </br>

                        <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>

                        </br>

						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#about" data-toggle="tab">Step1</a></li>
	                            <li><a href="#account" data-toggle="tab">Step2</a></li>
	                            <li><a href="#address" data-toggle="tab">Step3</a></li>
								<li><a href="#step4" data-toggle="tab">Step4</a></li>
	                        </ul>

						</div>

                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                              <div class="row">
                                  <h4 class="info-text"> Let's start with the basic information </h4>
                                  <div class="col-sm-4 col-sm-offset-1">
                                     <div class="picture-container">
                                          <div class="picture">
                                              <img src="reg/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                              <input type="file"  name="image"  id="wizard-picture" />
                                          </div>
                                          <h6>Choose Picture</h6>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>First Name <small>(required)</small></label>
                                        <input required name="firstname" type="text" class="form-control" placeholder="Your firstname">
                                      </div>
                                      <div class="form-group">
                                        <label>Last Name <small>(required)</small></label>
                                        <input required name="lastname" type="text" class="form-control" placeholder="Your Last Name">
                                      </div>
                                  </div>
                                  <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Email <small>(required)</small></label>
                                          <input required name="email" type="email" class="form-control" placeholder="Your Email Address">
                                      </div>
                                  </div>
                              </div>
                            </div>
							
						
                             <div class="tab-pane" id="account">
                              <div class="row">
                                    <div class="col-sm-12">
                                      
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Password</label>
                                            <input required name="password" type="password"  class="form-control" placeholder="Password">
                                          </div>
                                    </div>
                                   <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Confirm Password </label>
                                            <input required name="cpassword" type="password" class="form-control" placeholder="Confirm password">
                                          </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Account Pin</label>
                                            <input required name="pin" type="text"   class="form-control" placeholder="Acc PIN">
                                          </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Verify Pin Number</label>
                                            <input required name="cpin" type="text" class="form-control" placeholder="Verify Pin">
                                          </div>
                                    </div>
                                </div>
                            </div>
						
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">
                                     
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Phone Number</label>
                                            <input required name="phone" type="text"class="form-control" placeholder="ie +1xxx_xxx _xxxx">
                                          </div>
                                    </div>
                                    <div class="col-sm-3">
                                         <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input required name="bdate" type="text" class="form-control" placeholder="(mm-dd-yyyy)">
                                          </div>
                                    </div>
                                    <div class="col-sm-5">
                                         <div class="form-group">
                                            <label>Gender</label><br>
                                             <select required name="gender" class="form-control">
                                             <option value="">Please select your gender</option>
					<option value="Male">Male</option>
					<option value="Felame">Female</option>
                                                
                                                
                                            </select>
                                          </div>
                                    </div>
                                    <div class="col-sm-5">
                                         <div class="form-group">
                                            <label> Account Type</label><br>
                                             <select required name="utype" class="form-control">
											 <option value="">Please select Account Type</option>
                                               <option value="Checking Account">Checking Account</option>
					                           <option value="Savings Account">Saving Account</option>
					                             <option value="Fixed Deposit Account">Fixed deposit Account</option>
                                                
                                            </select>
                                          </div>
                                    </div>
                                </div>
                            </div>
							 <div class="tab-pane" id="step4">
                                <div class="row">
                                    <div class="col-sm-12">
                                     
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Address</label>
                                            <input required name="address"  type="text"class="form-control" placeholder="ie 2,wall street">
                                          </div>
                                    </div>
                                    <div class="col-sm-3">
                                         <div class="form-group">
                                            <label>Zip Code</label>
                                            <input required name="zipcode" type="text" class="form-control" placeholder="1111111">
                                          </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>State</label>
                                            <input required name="state" type="text" class="form-control" placeholder="New York..">
                                          </div>
                                    </div>
                                     <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Country</label>
                                            <input required name="country" type="text" class="form-control" placeholder="USA">
                                          </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>City</label>
                                            <input required name="city" type="text" class="form-control" placeholder="USA">
                                          </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
 <input name="notification" type="hidden" class="form-control" value="Notification">
<input name="nbalance" type="hidden" class="form-control" value="Negative Balance">
<input name="inbalance" type="hidden" class="form-control" value="Incoming Balance">
 <input name="bname" type="hidden" class="form-control" value="Bank Name">
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />

                                <input name="submit" type="submit" class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' value='Register Account!' />

                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                            </div>
                            
                            <div class="clearfix"></div>
                        </div>

                    </form>
                    
                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
    </div> <!--  big container -->
    
    
    
    
    
    
    

    <div class="footer">
        <div class="container">
           
        </div>
    </div>

</div>

</body>

	<!--   Core JS Files   -->
	<script src="reg/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="reg/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="reg/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="reg/js/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="reg/js/jquery.validate.min.js"></script>

</html>
