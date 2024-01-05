<?php



session_start();
include '../config/database.php';
include '../config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$msg = ''; 


$user_id = $_SESSION['uid'];
$acctno = $_SESSION['acctno']; 

$balance_sql = "SELECT acctno,cardt,card,utype,active,pics,status,inbalance,balance,acone,actwo,acthree,fname,lname,email,phone,gender   FROM tbl_users WHERE id = $user_id AND acctno = $acctno";
$result = mysqli_query($link,$balance_sql);
$row = mysqli_fetch_assoc($result);


if(isset($row['status']) && $row['status']== 0){

header('location:../admin/pages/error.php');
}else{
}


include "hh.php";




    $sql1 = "SELECT * FROM tbl_users WHERE id = '$user_id' AND acctno = '$acctno'";
      
      $result1 = mysqli_query($link, $sql1);
      if(mysqli_num_rows($result1) > 0){
          while ($row = mysqli_fetch_assoc($result1)){

          $pass_hash_fromdb = $row['otp_hash'];
          $email = $row['email'];
          $mobile_no = $row['phone'];
          $ip = $_SERVER['REMOTE_ADDR'];

          


            $date = date("Y/m/d");
            $bname = $_SESSION['bname'];
            $bbn = $_SESSION['bbn'];
            $bv = $_SESSION['bv'];
            $swift = $_SESSION['swift'];
            $amount =  $_SESSION['amount'];
            $comments = $_SESSION['comments'] ;
            $tacctno = $_SESSION['tacctno '];
            $toption = $_SESSION['toption'];
            $desc = $_SESSION['description'] ;

            $tokens ='827673930057000463891234567890';
$tokens = str_shuffle($tokens);
$tokens = substr($tokens, 0, 8);
 $_SESSION['token'] = $tokens;
 
$acctno = $_SESSION['acctno'];

$fname =  $row['fname'];
$charges = ($ch/100) * $amount;
$pay = $amount + $charges;
$bal = $row['balance'] - $pay;
         
          
            $sql = "INSERT INTO tbl_transaction (tx_no, tx_type, amount, date, description, to_accno, account, status,  comments,charges) 
            VALUES ('$tokens', 'debit', '$amount', '$date', '$desc', '$tacctno', '$acctno', 'SUCCESS', '$comments','$charges')";
          
            if(mysqli_query($link,$sql)){

            
  $link->query("UPDATE `tbl_users` SET `otp_hash`= ' ', balance = balance - $pay WHERE id = '$user_id'");

 $link->query("UPDATE `tbl_users` SET `otp_hash`= ' ', balance = balance + $amount WHERE acctno = '$tacctno'");


             require_once "PHPMailer/PHPMailer.php";
             require_once 'PHPMailer/Exception.php';
             
             
             //PHPMailer Object
             $mail = new PHPMailer;
             
             //From email address and name
             $mail->From = $emaila;
             $mail->FromName = $name;
             
             //To address and name
             $mail->addAddress($email);
             
             
             //Address to which recipient will reply
             
             //Send HTML or Plain Text email
             $mail->isHTML(true);
             
             $mail->Subject = "Debit Alert!";
             
             $mail->Body = '<div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">

<div class="be_logo" style="float: left;"> <img src="https://'.$bankurl.'/nonsms-bank-script/3d_bank/admin/pages/logo/'.$logo.'"></div>

<div class="be_user" style="float: right"> <p>Dear: '.$fname.' - Account Number: ' .$acctno.'</p> </div> 

<div style="clear: both;"></div> 

<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<h1>Debit Alert!</h1>

</div> </div> 

<div class="be_body" style="padding: 20px;"> <p style="line-height: 25px;"> 

             Dear ' . $row["fname"] . ' A Debit transaction of  '.  $currency.''.$amount.' occured in your account on  '.$date.' at the charges of '.  $currency.''.$charges.' Available balance  '.  $currency.''.$bal.' 
             
             </br>
             
             Available Balance: '.  $currency.''.$bal.'
             . </p>

<div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div>


<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2019 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>';
             
             if($mail->send()) {
               
                 $msg =  "Transfer Succesful!";
             }
                            
                        else{
                             $msg = "Something went wrong. Please try again later!";
                 
             }
            }

            else{
                
                 $msg = "Cannot complete transfer!";
            }
          
}
          
}
 



?>


   <div class="main-content">
        <section class="section">
          <div class="section-header">
          
          
          <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
          


<h6 class="element-header"></h6><div class="element-box-tp">
<div class="row"><div class="col-lg-7 col-xxl-6">
  <link rel="shortcut icon" href="../images/favicon.bmp" />
  <title>Contacting transfer Server</title>
  <link rel="icon" type="image/x-icon"
 href="files/favicon.ico" />
  <style type="text/css">
<!--
.style1 {font-family: "Courier New", Courier, monospace}
.style4 {font-family: "Courier New", Courier, monospace;
color:#0066CC;
font-size:20px;}
#Layer1 {
position:absolute;
left:374px;
top:23px;
width:437px;
height:367px;
z-index:1;
margin-top: 5%;
margin-right: 5%;
right: 20%;
bottom: 200%;
margin-bottom: 5%;
margin-left: 5%;
border: thin solid #0066CC;
border-radius:7px;
padding: 5px;
}
-->
  </style>
  <script>
var preloadimages=new Array(":abstract.simplenet.com/point.gif","abstract.simplenet.com/point2.html")
var intervals=1000
//configure destination URL
var targetdestination="receipt.php" 
var splashmessage=new Array()
var openingtags='<font face="Courier New, Courier, monospace" size="3">'
splashmessage[0]='PROCESSING'
splashmessage[1]=':PLEASE WAIT:'
splashmessage[2]='YOUR TRANSFER DATA IS BEING PROCESSED'
splashmessage[3]='INITIATING TRANSFER'
splashmessage[4]='YOUR TRANSFER DATA IS BEING PROCESSED'
splashmessage[5]='10%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[6]='15%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[7]='20%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[8]='21%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[9]='25%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[10]='30%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[11]='40%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[12]='42%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[13]='45%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[14]='50%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[15]='55%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[16]='60%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[17]='80%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[18]='90%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[19]='95%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[20]='100%<BR>OF TRANSFER COMPLETED<br>'
splashmessage[21]='<BR>TRANSFER SUCCESSFUL, PLS WAIT, GENERATING TRANSFER RECEIPT<br>'
var closingtags='</font>'
//Do not edit below this line (besides HTML code at the very bottom)
var i=0
var ns4=document.layers?1:0
var ie4=document.all?1:0
var ns6=document.getElementById&&!document.all?1:0
var theimages=new Array()
//preload images
if (document.images){
for (p=0;p<preloadimages.length;p++){
theimages[p]=new Image()
theimages[p].src=preloadimages[p]
}
}
function displaysplash(){
if (i<splashmessage.length){
sc_cross.style.visibility="hidden"
sc_cross.innerHTML='<b><center>'+openingtags+splashmessage[i]+closingtags+'</center></b>'
sc_cross.style.left=ns6?parseInt(window.pageXOffset)+parseInt(window.innerWidth)/2-parseInt(sc_cross.style.width)/2 :document.body.scrollLeft+document.body.clientWidth/2-parseInt(sc_cross.style.width)/2
sc_cross.style.top=ns6?parseInt(window.pageYOffset)+parseInt(window.innerHeight)/2-sc_cross.offsetHeight/2:document.body.scrollTop+document.body.clientHeight/2-sc_cross.offsetHeight/2
sc_cross.style.visibility="visible"
i++
}
else{
window.location=targetdestination
return
}
setTimeout("displaysplash()",intervals)
}
function displaysplash_ns(){
if (i<splashmessage.length){
sc_ns.visibility="hide"
sc_ns.document.write('<b>'+openingtags+splashmessage[i]+closingtags+'</b>')
sc_ns.document.close()
sc_ns.left=pageXOffset+window.innerWidth/2-sc_ns.document.width/2
sc_ns.top=pageYOffset+window.innerHeight/2-sc_ns.document.height/2
sc_ns.visibility="show"
i++
}
else{
window.location=targetdestination
return
}
setTimeout("displaysplash_ns()",intervals)
}
function positionsplashcontainer(){
if (ie4||ns6){
sc_cross=ns6?document.getElementById("splashcontainer"):document.all.splashcontainer
displaysplash()
}
else if (ns4){
sc_ns=document.splashcontainerns
sc_ns.visibility="show"
displaysplash_ns()
}
else
window.location=targetdestination
}
window.onload=positionsplashcontainer
  </script>
  <script><!--
var jv=1.0;
//--></script>
  <script language="Javascript1.1"><!--
jv=1.1;
//--></script>
  <script language="Javascript1.2"><!--
jv=1.2;
//--></script>
  <script language="Javascript1.3"><!--
jv=1.3;
//--></script>
  <script language="Javascript1.4"><!--
jv=1.4;
//--></script>
</head>
<body oncontextmenu="return false"
 onselectstart="return false" ondragstart="return false">
<div class="style4">
<h2><small>&nbsp; <span
 style="color: rgb(0, 153, 0);">&nbsp;Transfer in
progress......</span></small><br />
</h2>
</div>
<div class="style1" id="splashcontainer" align="center"></div>
<div>
<p class="style1" align="center"><br />
<br />
<br />
<br />
<img alt=""  style="" src="Loading.gif" /></p>
</div>
</div>
<span class="style1"><font size="18">
</font></span><span class="style1"> </span>
<noscript><span class="style1"><IMG height=1 src="#"
width=1></span>
</noscript>
<p class="style1">&nbsp;</p>
<p class="style1">&nbsp;</p>
<p class="style1">&nbsp;</p>
<p class="style1">&nbsp;</p>
<p class="style1">&nbsp;</p>
<p class="style1">&nbsp;</p>
<p class="style1" align="center">&nbsp;</p>
<p class="style1" align="center">&nbsp;</p>
<p class="style1" align="center">&nbsp;</p>
<p class="style1" align="center">&nbsp;</p>


