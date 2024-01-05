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

$msg= '';

$user_id = $_SESSION['uid'];
$acctno = $_SESSION['acctno'];

$balance_sql = "SELECT ipn,balance FROM tbl_users WHERE id = $user_id AND acctno = $acctno";
$result = mysqli_query($link,$balance_sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['vipn'])){


  $ipn = $_POST['ipn'];
  $cipn = $_POST['cipn'];
  
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

  if($ipn == $cipn){

   
    echo '<script type="text/javascript">
    window.location.href ="cots.php" ;
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
    <h1>IPN Code Required</h1>
  </div>

  <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>

<h5>Insurance Policy Code Clearance Certificate Is Required

</h5>


<form action="ipn.php" method="post">


<p>The fund is placed in receiving Bank holding account pending the presentation of the Insurance Policy Code Clearance Certificate Code, please contact our Clearance officer below to obtain the Source of Fund Ceritifcate Clearance Code..</p>

<div class="col-sm-6">
<div class="form-group">

<label for="">Input IPN CODE:</label>
 
<input class="form-control"  name="ipn" >
 <input name="cipn" value="<?php echo $row['ipn'];?>"
 type="hidden">

</div></div>

<br>



<div class="form-buttons-w">

<button class="btn btn-primary" name="vipn" type="submit"> Validate Transfer</button></div> <br>
</form>

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
