<?php

include '../config/config.php';
include '../config/database.php';

if ($_POST['otp']) {

    
    if (empty($_POST['otp'])) {
        echo "Please enter OTP";
    } else {
        $input_otp = preg_replace('/[^0-9]/', '', $_POST['otp']);
        $user_id = preg_replace('/[^0-9]/', '', $_POST['user_id']);

        $sql1 = "SELECT * FROM tbl_users WHERE id = '$user_id'";

        $result1 = mysqli_query($link, $sql1);
        if(mysqli_num_rows($result1) > 0){
            while ($row = mysqli_fetch_assoc($result1)){

            $pass_hash_fromdb = $row['mobile_hash'];
            $email = $row['email'];
            $mobile_no = $row['phone'];
            $user_os =  getOS();
            $ip = $_SERVER['REMOTE_ADDR'];

            echo $pass_hash_fromdb;

            if (password_verify($input_otp, $pass_hash_fromdb)) {
                $link->query("UPDATE `tbl_users` SET `mobile_hash`= ' ',`is_mobile`= '1' WHERE id = '$user_id'");


                //after verify otp notify user to your account loggedin
                //twillio
                $sid = $sms_private_key; // Your Account SID from www.twilio.com/console
                $token = $sms_public_key; // Your Auth Token from www.twilio.com/console

                $client = new Twilio\Rest\Client($sid, $token);

                $smsbody = 'Dear ' . $row['fname'] . ' your account was logged in from ' . $user_os . '(IP: '.$ip.') on '.date("F j, Y, g:i a").', if you did not 
				login from this device, contact your account manager to secure your account.';




                $message = $client->messages->create(
                        '+' . $mobile_no, array(
                    'from' => '+12018842686', // From a valid Twilio number
                    'body' => $smsbody
                        )
                );


                //send email


              
                
                
                $msg_body = '<div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 
				<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header"> 
				<div class="be_logo" style="float: left;"> <img src="https://paultechgist.pro/paragons/secure/login/logo.png"> </div> 
				<div class="be_user" style="float: right"> </div> <div style="clear: both;"></div> <div class="be_bluebar"
				style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;"> <h1>Account logged in</h1> </div>
				</div> <div class="be_body" style="padding: 20px;"> '.$smsbody.'  <p style="margine-top:15px;">In case you need any
				further clarification for the same, please do get in touch with your  Branch.</p></div> <div class="be_footer"> 
				<div style="border-bottom: 1px solid #ccc;"></div> <p> Please do not reply to this email. Emails sent to this address
				will not be answered. Copyright ©2019 Investec Credit Union . </p> </div> </div> </div>';
                
                
                $mail_data = array('to' => $email, 'sub' => 'Account Notification', 'msg' => 'login_notify', 'body' => $msg_body);
                send_email($mail_data);

                echo "verified";
            }
        }
    }
    }
}



?>