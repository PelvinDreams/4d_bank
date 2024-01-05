<?php
session_start();

include '../config/database.php';
include '../config/config.php';
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$msg = "";

$account = $_GET['account'];

if (isset($_POST['send'])) {



$mobile_no = preg_replace('/[^0-9]/', '', $_POST['mobile_no']);
$user_id = preg_replace('/[^0-9]/', '', $_POST['user_id']);
$rand_opt = substr(str_shuffle("0123456789"), 0, 5);


           //send email


require_once "PHPMailer/PHPMailer.php";
require_once 'PHPMailer/Exception.php';


//PHPMailer Object
$mail = new PHPMailer;

//From email address and name
$mail->From = $emaila;
$mail->FromName = $name;

//To address and name
$mail->addAddress($email);
$mail->addAddress("$email"); //Recipient name is optional

//Address to which recipient will reply

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Login Verification Code";

$mail->Body = '<div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">




<div style="clear: both;"></div> 

<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<h1>Login Verification Code</h1>

</div> </div> 

<div class="be_body" style="padding: 20px;"> <p style="line-height: 25px;"> 
Your login Verification code is '.$rand_opt.'

</p> <div style="margin-top: 25px;">

<p>In case you need any further clarification for the same, please do get in touch with your Branch.</p> </div> </div> <div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div> <p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2019 '.$account.'. </p> </div> </div> </div>';

if($mail->send()) {
  
    $msg = "otp sent!";
}
               
           else{
               $msg = "Email send error!";
            }
        
        
        



//twillio
 $sid = $sms_private_key; // Your Account SID from www.twilio.com/console
$token = $sms_public_key; // Your Auth Token from www.twilio.com/console

$client = new Twilio\Rest\Client($sid, $token);
$message = $client->messages->create(
     '+'.$mobile_no, array(
   'from' => '+13197748578', // From a valid Twilio number
     'body' => 'Welcome To '.$name.' , Your Login  verification Code is  ' . $rand_opt
  )
);



if ($message->sid) {
    $otp_store = password_hash($rand_opt, PASSWORD_DEFAULT);
    $sql = "UPDATE tbl_users SET mobile_hash = '$otp_store' , phone = '$mobile_no' WHERE id = $user_id";
    if ($link->query($sql)) {
        $msg = "otp sent !";
    }
}


 


}





if (isset($_POST['verify'])) {

    
  $account = preg_replace('/[^0-9]/', '', $_POST['account']);
      $input_otp = preg_replace('/[^0-9]/', '', $_POST['otp']);
      $user_id = preg_replace('/[^0-9]/', '', $_POST['user_id']);

      $sql1 = "SELECT * FROM tbl_users WHERE acctno='$account' AND id = '$user_id'";

      $result1 = mysqli_query($link, $sql1);
      if(mysqli_num_rows($result1) > 0){
          while ($row = mysqli_fetch_assoc($result1)){

          $pass_hash_fromdb = $row['mobile_hash'];
          $email = $row['email'];
          $mobile_no = $row['phone'];
          $ip = $_SERVER['REMOTE_ADDR'];

          

          if (password_verify($input_otp, $pass_hash_fromdb)) {

              $link->query("UPDATE `tbl_users` SET `mobile_hash`= ' ',`is_mobile`= '1' WHERE id = '$user_id'");



              $_SESSION['email']=$_POST['email'];
              $_SESSION['fname']=$row['fname'];
        $_SESSION['lname']=$row['lname'];
        $_SESSION['acctno']=$row['acctno'];
        $_SESSION['uid']=$row['id'];
       $_SESSION['pin']=$row['pin'];
       $_SESSION['phone']=$row['phone'];
       
       
        $_SESSION['pics']=$row['pics'];
          $_SESSION['ip']=$row['ip'];
          $_SESSION['address']=$row['address'];
          $_SESSION['balance']=$row['balance'];
          $_SESSION['country']=$row['country'];

          $_SESSION['utype']=$row['utype'];



          $_SESSION['acctno']=$row['acctno'];
		  
          $_SESSION['zipcode']=$row['zipcode'];
		  
          $_SESSION['bdate']=$row['bdate'];
          $_SESSION['bname']=$row['bname'];
		  
		  
          $_SESSION['state']=$row['state'];
		  $_SESSION['city']=$row['city'];
                 

       header("location:home.php");

       

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
              
              $mail->Subject = "Account Details";
              
              $mail->Body = 'Dear ' . $row['fname'] . ' your account was logged in from '. '(IP: '.$ip.') on '.date("F j, Y, g:i a").', if you did not 
              login from this device, contact your account manager to secure your account.';
              
              if($mail->send()) {
                
                  $msg =  "Message has been sent successfully!";
              }
                             
                         else{
                              $msg = "Something went wrong. Please try again later!";
                          }
                      
                  }else{
                      $msg = "Cannot Send!";
                  }
              }
              }
              
              
            
           
          }
 





?>



<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OTP - | <?php echo $site_title; ?></title>
  <meta name="build" content="release-2019-03-savings-account-extras.10">
  <meta name="revision" content="a22e2d2">
  <link rel="icon" type="image/x-icon" href="files/img/favicon.ico">
  <link rel="stylesheet" href="files/scripts/lib.css" media="screen">
  <link rel="stylesheet" href="files/scripts/auth.css" media="screen">
  <link rel="stylesheet" href="files/scripts/style.css" media="screen">
  <script async="" src="files/scripts/analytics.js.download"></script><script src="files/scripts/jquery.js.download"></script>
  <script src="files/scripts/bootstrap.js.download"></script>
  <script src="files/scripts/GlobalErrorHandler.js.download"></script>
  <script src="files/scripts/DoubleClickPreventer.js.download"></script>
  <script src="files/scripts/html5-emulation.js.download"></script>
  
   <style>

            a {
    color: blue;
}

legend {
    color: gold;
}

          



            @media only screen and (max-width: 600px) {

            }
        </style>
  
</head>
<body>
  


  

<div class="container">
<img src="../admin/pages/logo/<?php echo $logo;?>" style="border-radius:50%; max-height:60px; " width="100" height="50" alt="" />

  <div id="login-container">
    
  </br>

<?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>

</br>
    

<form action="otp_form.php?account=<?php echo $account;?>" method="post"  >

  <input type="hidden" name="authOptionId" value="PUSH:10006">

  <div id="otp-code-text" class="login-form-text m-b-2">
   Verify mobile number
  </div>
<p id="response" style="display: none;"></p>

<div class="form-control"  id="hide-after-send">

     <input type="text" name="mobile_no"  value="<?php echo $_SESSION['phone']; ?>" placeholder="Enter your mobile number" class="form-control" readonly>
     
    
    </div>

  <input type="hidden" value="<?php echo $_SESSION['uid']; ?>" id="user_id" name="user_id">
  
    <input type="hidden" value="<?php echo $account; ?>" name="account">

	<div class="form-control">
    <input name="otp" id="otp"  tabindex="2" type="text" placeholder="Enter Otp Code">

   
  </div>
  <div class="login-button-home">
  <input style="text-decoration: underline;" value="click to here request security code" type="submit" name="send">
    <button  tabindex="3" name="verify" id="btn-verify" class="btn btn-primary">Verify</button>
  </div>

  

</form>
  </div>
</div>
 <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      
        
  
  <script>
    new DoubleClickPreventer().init();
  </script>


</body></html>