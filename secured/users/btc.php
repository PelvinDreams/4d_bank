
<?php
 
session_start();
include '../config/database.php';
include '../config/config.php';
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





if(isset($acctno)){




}else{
    
    echo "<script>

window.location.href='form/index.php';

</script>";

}


$balance_sql = "SELECT *   FROM tbl_users WHERE id = $user_id AND acctno = $acctno";
$result = mysqli_query($link,$balance_sql);
$row = mysqli_fetch_assoc($result);


if(isset($_POST['submit'])){

$tacct = $_POST['tacct'];
$ttype = $_POST['ttype'];

$pin = $_POST['pin'];

$cpin = $_POST['cpin'];

if($cpin != $pin){
	
	$msg = "Invalid account pin!";
	
}

else{


if(isset($ttype) && $ttype == "Domestic" ){

echo "<script>

window.location.href='local.php?tacct=$tacct';

</script>";

}elseif($ttype == "International" ){

echo "<script>

window.location.href='international.php?tacct=$tacct';

</script>";

}
}
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
	<?php
			
			
			
			
$user_id = $_SESSION['uid'];
$acctno = $_SESSION['acctno'];

$balance_sql = "SELECT *   FROM tbl_users WHERE id = '$user_id' AND acctno = '$acctno'";
$result = mysqli_query($link,$balance_sql);
$row = mysqli_fetch_assoc($result);
  
			
			?>
<?php

if(isset($_POST['depo'])){




$btc =$link->real_escape_string( $_POST['btc']);
$usd =$link->real_escape_string( $_POST['usd']);
$btctnx =$link->real_escape_string($_POST['btctnx']);
$emails =$link->real_escape_string($_POST['email']);

$tnx = uniqid('tnx');


if($btc == "" || $usd == "" ||  $btctnx == "" ){
			$msg = "No Field should be left empty!";

	}else{

$status = 0;

$sql = "INSERT INTO btc (btc,usd,btctnx,email,status,tnxid)
VALUES ('$btc','$usd','$btctnx','$emails','$status','$tnx')";

if (mysqli_query($link, $sql)) {

  include_once "PHPMailer/PHPMailer.php";
  include_once 'PHPMailer/Exception.php';

  $mail= new PHPMailer();
  $mail->setFrom($emaila);
   $mail->FromName = $name;
  $mail->addAddress($emails);
  $mail->Subject = "Deposit Alert!";
  $mail->isHTML(true);
  $mail->Body = '
<div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">

<div class="be_logo" style="float: left;"> <img src="https:// '.$bankurl.'/bitbank/admin/pages/logo/'.$logo.'"> </div>

<div class="be_user" style="float: right"> <p>Dear: '.$row['fname'].'</p> </div> 

<div style="clear: both;"></div> 

<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<h1>Thank you for banking on '.$name.'</h1>

</div> </div> 

<div class="be_body" style="padding: 20px;"> <p style="line-height: 25px;"> 

Your order of '.$usd.' USD worth of '.$btc.'  BTC has been sent, your transaction ID is '.$tnx.' , you  will be credited once your order is confirmed


</p>

<div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div>


<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2019 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>' ;



  if($mail->send()){

    $msg= " Your order of $usd USD worth of $btc  BTC has been sent, your transaction ID is $tnx , you  will be credited once your order is confirmed ";
  }


else {
   $msg= " Your order was sent but could not send mail ";
  }



} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
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



 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><i class="fa fa-users" style="font-size:30px"></i> Bitcoin Deposit</h1>
            
          </div>

          
          <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
          
          
          


        <?php
$url = "https://bitpay.com/api/rates";

  $json = file_get_contents($url);
  $data = json_decode($json, TRUE);    
        


$btcPrice = $data[2]["rate"];
$btcDisplay = round($btcPrice,2);

?>

<script>
function btcconverter(input){
var price = "<?php echo $btcDisplay; ?>";
var output = input.value / price;
var out= document.getElementById('btc');
out.value=output;
}

</script>



<div style="margin-top:-10px ;background: ;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

<div style="background:;max-width: 95%;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">
	
<div class="col-md-6 col-lg-6 col-sm-12 col-sx-12">
          <div class="box box-default">
            <div class="box-header with-border">

          <h4 align="center"><i class="fa fa-refresh"></i> Bitcoin Payment Process</h4>
</br>


        <?php 

    echo '<img src="code/index.php"  style="width:200px;"/>';

?>
 
          <hr></hr>
          

          <!-- <span><img src="https://scriptsdemo.website/investment-script/demo-users/pages/crypto_qrcode-api/qr.php" width="50px" height="50px"/> Pay through QR code Scanning</span>
          </br>
          <span><b>OR</b></span>-->
          <h4>Make payment to the below Bitcoin wallet</h4>
       <?php   
        $sql1= "SELECT * FROM admin";
  $result1 = mysqli_query($link,$sql1);
  if(mysqli_num_rows($result1) > 0){
  $row = mysqli_fetch_assoc($result1);

    if(isset($row['bwallet'])){
  $bw = $row['bwallet'];
}else{
  $bw="cant find wallet";
}
}
          ?>
          <input type="text" class="form-control" value="<?php echo $bw ;?>" id="myInput" readonly>
          </br>
<button onclick="myFunction()" class="btn btn-info">Copy Bitcoin Address</button>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("copy");
  alert("Copied the wallet address: " + copyText.value);
}
</script>
   
   <?php
   
   $user_id = $_SESSION['uid'];
$acctno = $_SESSION['acctno'];

$balance_sql = "SELECT acctno,cardt,card,utype,active,pics,status,inbalance,balance,acone,actwo,acthree,fname,lname,email,phone,gender   FROM tbl_users WHERE id = $user_id AND acctno = $acctno";
$result = mysqli_query($link,$balance_sql);
$row = mysqli_fetch_assoc($result);

   
   ?>       
      
          
            <div class="box-header with-border">
            
            <?php if($msg != "") echo "<div style='padding:20px;background-color:;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>

     <form class="form-horizontal" action="btc.php?email=<?php  echo $row['email'];?>" method="POST" >

       <div class="form-group">
        <input type="double" id="btc" name="btc" placeholder="Value in BTC is displayed here" readonly="true" class="form-control">
      </div>
        <div class="form-group">
        <input type="double" onchange="btcconverter(this);" onkeyup="btcconverter(this);" id="usd" name="usd" placeholder="Amount in USD" class="form-control">
        </div>
       
        <div class="form-group">
        <input type="text"  name="btctnx" placeholder="Paste the transferred btc transaction ID " class="form-control">
        </div>

        <input type="hidden"  name="email" value="<?php  echo $row['email']?>" class="form-control">
       
       

      <button style="" type="submit" class="btn btn-warning" name="depo" >Deposit</button>


    </form>


    </div>
   </div>

   </div>
  </div>
  </section>
</div>

