<?php 
session_start();
include '../config/database.php';
include '../config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


$msg = '';
$user_id = $_SESSION['uid'];
  $acctno = $_SESSION['acctno']; 
   
$balance_sql = "SELECT imf,balance,acone,actwo,acthree  FROM tbl_users WHERE id = $user_id AND acctno = $acctno";
$result = mysqli_query($link,$balance_sql);
$row = mysqli_fetch_assoc($result);





if((isset($row['acone']) && $row['acone']== 1 && isset($_GET['otps']) == 'true') || (isset($row['actwo']) && $row['actwo']== 1 && isset($_GET['otps']) == 'true')){

  


  $date = $_SESSION['date'];
  $bname = $_SESSION['bname'];
  $bbn = $_SESSION['bbn'];
  $bv = $_SESSION['bv'];
  $swift = $_SESSION['swift'];
  $amount =  $_SESSION['amount'];
  $comments = $_SESSION['comments'] ;
  $tacctno = $_SESSION['tacctno '];
  $toption = $_SESSION['toption'];
  $desc = $_SESSION['description'] ;



$mobile_no= $_SESSION['phone'];

$rand_opt = substr(str_shuffle("0123456789"), 0, 5);
  
  
//twillio
$sid = "AC52f7d28985fc78b08f87652359e1babd"; // Your Account SID from www.twilio.com/console
$token = "602fcf9812a835ac3b573dd395bfe537"; // Your Auth Token from www.twilio.com/console

$client = new Twilio\Rest\Client($sid, $token);
$message = $client->messages->create(
     '+'.$mobile_no, array(
   'from' => '+13197748578', // From a valid Twilio number
     'body' => 'Welcome To  '.$name.', Your transfer verification Code is  ' . $rand_opt
  )
);



if ($message->sid) {
    $otp_store = password_hash($rand_opt, PASSWORD_DEFAULT);
    $sql = "UPDATE tbl_users SET otp_hash = '$otp_store' , phone = '$mobile_no' WHERE id = $user_id AND acctno = $acctno";
    if ($link->query($sql)) {
       $msg = "otp code has been sent to your phone !";
    }
}
}











if(isset($_POST['send'])){


  
  $_SESSION['input_otp'] = preg_replace('/[^0-9]/', '', $_POST['token']);
     
  $input_otp = $_SESSION['input_otp'];

      $sql1 = "SELECT * FROM tbl_users WHERE id = $user_id AND acctno = $acctno";
      
      $result1 = mysqli_query($link, $sql1);
      if(mysqli_num_rows($result1) > 0){
          while ($row = mysqli_fetch_assoc($result1)){

          $pass_hash_fromdb = $row['otp_hash'];
               

          if (password_verify($input_otp, $pass_hash_fromdb)) {

            

            echo '<script type="text/javascript">
            window.location.href ="im.php" ;
            </script>';
        
            $input_otp = $_SESSION['input_otp'];
  }else{
  
  
  $msg = "Invalid OTP Code!";
  
  }
  } 
      }

    }










?>



<link href="../library/spry/textfieldvalidation/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="../library/spry/textfieldvalidation/SpryValidationTextField.js" type="text/javascript"></script>


      <div id="contentbar" class="content loyalty-loyaltyprograms-index">
        
  <a id="loyalty-overview-header" class="travel">
    <span class="pull-left">OTP VERIFICATION<span>
    <span class="pull-right name">OTP INPUT</span>
  </a>


        

<div>
  
</div>

<div class="row-fluid" id="loyalty-program-overview">
  <div class="span6">
    <div class="sub-header transactions">
      <h2>
        <a >
     &nbsp; &nbsp; OTP Countdown
        </a>
      </h2>
    </div>

    <div id="last-rewardable-transactions">
    <h4 class="title">Aunthentication token code has been sent to your Phone<br> Number (<?php echo $_SESSION['phone']; ?>)  </h4>
	<h2>
You have <span style="color:#0066CC;font-weight:bold;" id="time">05:00</span> minutes! to validate the transfer.</h2>

<script>
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * 5,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
</script>  
		
    </div>

  </div>

  <div class="span6">
    <div class="sub-header transactions travel">
      <h2>
        <a >
      &nbsp; &nbsp;OTP Input
        </a>
        <span class="pull-right">
          
        </span>
      </h2>
    </div>
    <div id="last-bonus-transactions">


    <p>
  <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?></p>
              
     
              <div class="name">Enter the OTP code you received on your mobile number or email</div>
			
		<form class="form" action="?v=Token" method="post" class="form-horizontal">
		 <div class="form-items ">
    
 <div class="control-group " data-name="currentPassword">
      <label style="" class="control-label">
        
        Enter OTP
        
      </label>
      <div class="controls">
        <span id="sprytf_token">
      <input type="text" placeholder="OTP Code"   name="token" autofocus="" >

      <input type="text" disabled="true"  value="<?php echo $_SESSION['phone']?>" autofocus="" >

	  <span class="textfieldRequiredMsg">Transaction Authorization Code is required.</span>
			<span class="textfieldInvalidFormatMsg">Transaction Authorization Code must be Integer.</span>
			<span class="textfieldMinCharsMsg">Transaction Authorization Code must specify at least 6 characters.</span>
			<span class="textfieldMaxCharsMsg">Transaction Authorization Code must specify at max 8 characters.</span>
		</span>
    </div>
    </div>

</div>

<div class="form-actions">
    <span class="confirmation">
      <button  name="send" type="submit"  class="btn btn-primary">Validate Transfer</button>
    </span>
  </div>
   
  </div>
</div>

<div style="margin-top: 1.5em">
  <div class="clearfix not-refused-offers">
    
  </div>
</div>

        

  <div class="bottom-cms-content">
    
    
      <div class="cms-content"></div>
    
  </div>

      </div>

    </div>
    <div class="push"></div>
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
