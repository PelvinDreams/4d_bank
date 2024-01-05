<?php
session_start();
include '../config/database.php';
include '../config/config.php';


$msg = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$account = $_GET['account'];




if (isset($_POST['log'])) {
 
  if (empty($_POST["pin"])) {
    $msg = "Account Pin Number is required";
  } else {
    $pin = test_input($_POST["pin"]);
    
    }
  
  
  
    
		
	$pin = $link->real_escape_string($_POST['pin']);
	
	
	if($pin == ""){
		$msg = "Account Pin  field cannot be empty!";
		
	}else {
   

    
  $account = preg_replace('/[^0-9]/', '', $_POST['account']);
      $input_otp = preg_replace('/[^0-9]/', '', $_POST['otp']);
      $user_id = preg_replace('/[^0-9]/', '', $_POST['user_id']);

      $sql1 = "SELECT * FROM tbl_users WHERE acctno='$account' ";

      $result1 = mysqli_query($link, $sql1);
      if(mysqli_num_rows($result1) > 0){
          while($row = mysqli_fetch_assoc($result1)){

          $pass_hash_fromdb = $row['mobile_hash'];
          $email = $row['email'];
          $mobile_no = $row['phone'];
          $ip = $_SERVER['REMOTE_ADDR'];

          

          if ($pin == $row['pin']) {



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
                  $_SESSION['ssn']=$row['ssn'];
		  $_SESSION['rtn']=$row['rtn'];

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
    
}
 
 
		
		


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- form CSS
		============================================ -->
    <link rel="stylesheet" href="css/form.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Header top area start-->
</br>
    <div class="login-form-area mg-t-30 mg-b-40">
        <div class="container">
            <div class="row">

           
                <div class="col-lg-4"></div>



                <form id="adminpro-form" class="adminpro-form" method="post" action="pin.php?account=<?php echo $account;?> ">
                    <div class="col-lg-4">

                    <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>



                        <div class="login-bg">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="logo">
                                        <a href=""><img src="../admin/pages/logo/<?php echo $logo;?>" style="border-radius:50%; max-height:60px; " width="100" height="50" alt="" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-title">
                                        <h1></h1>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="login-input-head">
                                        <p><b>Pin</b></p>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="login-input-area">
                                        <input type="password" name="pin" />
                                        <i class="fa fa-lock login-user"></i>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="hidden" name="account" value="<?php echo $account;?>" />
                                
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-4">

                                </div>
                                <div class="col-lg-8">
                                    <div class="login-button-pro">
                                        
                                        <button type="submit"  name="log" class="login-button login-button-lg">Log in</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>

    </br></br>
    <!-- login End-->
    <!-- Footer Start-->
    <div class="footer-copyright-area">
      
                    <div class="footer-copy-right">
                        <p>Copyright 2021 <?php echo $name;?>. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- form validate JS
		============================================ -->
    <script src="js/jquery.form.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/form-active.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>