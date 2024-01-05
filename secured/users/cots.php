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

$msg= '';

$user_id = $_SESSION['uid'];
$acctno = $_SESSION['acctno'];

$balance_sql = "SELECT cot,balance FROM tbl_users WHERE id = $user_id AND acctno = $acctno";
$result = mysqli_query($link,$balance_sql);
$row = mysqli_fetch_assoc($result);
if(isset($_POST['vcot'])){


  $cot = $_POST['cot'];
  $ccot = $_POST['ccot'];
  
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

  if($cot == $ccot){
////
   
    echo '<script type="text/javascript">
    window.location.href ="im.php" ;
    </script>';

  }else{

    $msg = '<img src="gif.gif" style="border-radius:50%"> Transfer in progress Invalid IPN CODE Contact Administrator!.........';
  }

}




?>     

     
     
     
     
   <div class="main-content">
        <section class="section">
          <div class="section-header">
          
          
          <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
          
          
            <div class="row" >
        
  <div class="page-header">
    <h1>COT Code Required</h1>
  </div>


</br></br>
  <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>

<h5>Cost of Transfer Code Is Required

</h5>


<form action="cots.php" method="post">


<p>The fund is placed in receiving Bank holding account pending the presentation of the Cost of Transfer Code, please contact our Clearance officer below to obtain the Cost of Transfer Code..</p>

<div class="col-sm-6">
<div class="form-group">

<label for="">Input COT CODE:</label>
 
<input class="form-control"  name="cot" >
 <input name="ccot" value="<?php echo $row['cot'];?>"
 type="hidden">

</div></div>

<br>



<div class="form-buttons-w">

<button class="btn btn-primary" name="vcot" type="submit"> Validate Transfer</button></div> <br>
</form>

</div></div>

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
