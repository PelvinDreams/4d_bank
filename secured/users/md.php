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









if(isset($_POST['transfer'])){

  

    
     $image = $_FILES['image']['name'];
	$target = "md/".basename($image);
   $account = $_POST['account'];
    $email = $_POST['email'];
  $cid = substr(str_shuffle("0JHGGSGJHS123456HHDHYDJH789"), 0, 10);
  

   $sql = "INSERT INTO md (email, account, cheque, cid) VALUES ('$email','$account','$image','$cid')";
   
   if(mysqli_query($link, $sql)){
       
       move_uploaded_file($_FILES['image']['tmp_name'], $target);
      
           $msg =  "Cheque deposited successfully wait for approval!";

}else{
    
     $msg =  "Unable to deposit!";
}

}






 


?>
   <div class="main-content">
        <section class="section">
          <div class="section-header">
          
          
          <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
          
          
          
            <div class="row" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs custom-menu-wrap" style="background-color:#d3e3e8;color:black;">
                        <li><a style="color:black;" href="payment.php"><i style="color:red; "  class="fa fa-refresh" aria-hidden="true"></i> History</a>
                        </li>
                        <li><a style="color:black;"  href="local.php"><i style="color:blue; "  class="fa fa-exchange" aria-hidden="true"></i> Domestic Transfer</a>
                        </li>

                        <li><a style="color:black;"  href="international.php"><i style="color:teal; "  class="fa fa-exchange" aria-hidden="true"></i> International Transfer</a>
                        </li>

                       
                        
                    </ul>

        </div>
    </div>





    <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                            <a href="local.php"><button class="btn btn-primary">Domestic Transfer</button></a> &nbsp;&nbsp; <a href="md.php"><button class="btn btn-primary">Mobile Deposit</button></a>
                                <div class="sparkline12-outline-icon">
                                    <span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                    <span><i class="fa fa-wrench"></i></span>
                                    <span class="sparkline12-collapse-close"><i class="fa fa-times"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <form action="md.php" method="post"  enctype="multipart/form-data">



                                            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>


                                             


                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Upload Cheque</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="file" class="form-control" name="image"  />
                                                        </div>
                                                    </div>
                                                </div>


                                                

<input type="hidden" name="email" value="<?php echo $row['email']?>" />

                                                <input type="hidden" name="account" value="<?php echo $acctno?>" />
<input type="hidden" name="swift" value="4521369875" />
<input type="hidden" name="description" value="" />

                                               
                                               

                                                <div class="form-group-inner">
                                                    <div class="login-btn-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3"></div>
                                                            <div class="col-lg-6">
                                                                <div class="login-horizental cancel-wp pull-left">
                                                                    
                                                                    <button class="btn btn-sm btn-primary login-submit-cs" name="transfer" type="submit">Deposit-Cheque</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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