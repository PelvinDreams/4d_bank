<?php

session_start();
include '../config/database.php';
include '../config/config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

$mobile_no = preg_replace('/[^0-9]/', '', $_POST['mobile_no']);
$user_id = preg_replace('/[^0-9]/', '', $_POST['user_id']);
$rand_opt = substr(str_shuffle("0123456789"), 0, 5);




/*
  //textLocal
  // Authorisation details.
  $username = "gajanand.kgn@gmail.com";
  $hash = "";
  // Config variables. Consult http://api.textlocal.in/docs for more info.
  $test = "0"; //recieve on mobile production and 1 for development
  // Data for text message. This is the text message data.
  $sender = " TXTLCL"; // This is who the message appears to be from.
  $numbers = $mobile_no; // A single number or a comma-seperated list of numbers bb



  $message = 'Universal Renaissance Bank verification number is  ' . $rand_opt;
  // 612 chars or less
  // A single number or a comma-seperated list of numbers
  $message = urlencode($message);
  $data = "username=" . $username . "&hash=" . $hash . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $numbers . "&test=" . $test;
  $ch = curl_init('http://api.textlocal.in/send/?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch); // This is the result from the API
  if ($result == true) {

  $otp_store = password_hash($rand_opt, PASSWORD_DEFAULT);
  $sql = "UPDATE tbl_users SET mobile_hash = '$otp_store' , phone = '$mobile_no' WHERE id = $user_id";
  if ($con->query($sql)) {
  echo "otp sent !";
  }
  }
  curl_close($ch);
 */


//twillio
$sid = $sms_private_key; // Your Account SID from www.twilio.com/console
$token = $sms_public_key; // Your Auth Token from www.twilio.com/console

$client = new Twilio\Rest\Client($sid, $token);
$message = $client->messages->create(
     '+'.$mobile_no, array(
   'from' => '+12018842686', // From a valid Twilio number
     'body' => 'Welcome To  .'$name'., Your Login  verification Code is  ' . $rand_opt
  )
);



if ($message->sid) {
    $otp_store = password_hash($rand_opt, PASSWORD_DEFAULT);
    $sql = "UPDATE tbl_users SET mobile_hash = '$otp_store' , phone = '$mobile_no' WHERE id = $user_id";
    if ($link->query($sql)) {
        echo "otp sent !";
    }
}


 






