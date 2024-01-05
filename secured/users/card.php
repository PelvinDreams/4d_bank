<?php
session_start();
include '../config/database.php';
include '../config/config.php';
$msg = ''; 

  
$user_id = $_SESSION['uid'];
$acctno = $_SESSION['acctno'];

$balance_sql = "SELECT *   FROM tbl_users WHERE id = $user_id AND acctno = $acctno";
$result = mysqli_query($link,$balance_sql);
$row = mysqli_fetch_assoc($result);


if(isset($row['status']) && $row['status']== 0){

header('location:../admin/pages/error.php');
}else{
}


include "hh.php";









if(isset($_POST['apply'])){

  
    $phone=$link->real_escape_string( $_POST['phone']);
    $account=$link->real_escape_string( $_POST['account']);
    $cardt =$link->real_escape_string( $_POST['cardt']);

//Card number generation...
$card ='827673930057000463891234567890';
$card = str_shuffle($card);
$card = substr($card,0, 16);


//csv code generation...
$csv ='76573827673930057000463891234567890';
$csv = str_shuffle($csv);
$csv = substr($csv,0, 4);






    if($phone != $row['phone']){

        $msg = "Please enter phone attached to bank!";

    }else{

        if(isset($row['csv']) && $row['csv'] != 0){

$msg = "You Already applied, Wait For Administrator Approval!";
        }else{
        
      
    $sql1 = "UPDATE tbl_users SET card='$card',cardt='$cardt',csv='$csv'   WHERE acctno='$account'";
    
    if (mysqli_query($link, $sql1)) {
        $msg = "Application Successful!";
    } else {
        $msg = "Cannot Apply! ";
    }
    }
}
}





 


?>

   <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><i class="fa fa-users" style="font-size:30px"></i> Card Application </h1>
            
          </div>

          
          <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
          
          
          


    <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        <div class="sparkline12-hd">
                            
                        </div>
                        
                        </br>
                        
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <form action="card.php" method="post">



                                            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>


                                                

                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Phone</label>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <input type="text" name="phone" placeholder="Enter phone number"  class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <input type="hidden" name="account" value="<?php echo $row['acctno'];?>" class="form-control" />
</br>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Account Number</label>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <input type="text" name="acct" placeholder="Enter account number"  class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

</br>

                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Card Type</label>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <select type="text" name="cardt"  class="form-control" />
                                                            <option>Select Card Type</option>
                                                            <option>Credit Master Card</option>
                                                            <option>Debit Master Card</option>
                                                            <option>Credit Visa Card</option>
                                                            <option>Debit Visa Card</option>
                                                              </select>
                                                        </div>
                                                    </div>
                                                </div>
</br>
                                                
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <input type="submit" name="apply" value="Apply For Card"  class="btn btn-info" />
                                                        </div>
                                                    </div>
                                                </div>




                                                <?php


$user_id = $_SESSION['uid'];
$acctno = $_SESSION['acctno'];

$sql = "SELECT *   FROM tbl_users WHERE id = $user_id AND acctno = $acctno";
$result = mysqli_query($link,$sql);
if(mysqli_num_rows($result) > 0){
  $row = mysqli_fetch_assoc($result);


 
  $fname =  $row['fname'];
  
  $lname =  $row['lname'];

  $card =  $row['card'];
  $cardt =  $row['cardt'];
  $csv =  $row['csv'];
  $yr =  $row['yr'];
  $month =  $row['month'];

}
  if(isset($row['sstatus'])  && $row['sstatus'] == 1 ){
             
  $fname =  $row['fname'];
  
  $lname =  $row['lname'];

  $card =  $row['card'];
  $cardt =  $row['cardt'];
  $csv =  $row['csv'];
  $yr =  $row['yr'];
  $month =  $row['month'];
  }else{
   
    $month = 'Not Yet Activated &nbsp;&nbsp;<i style="color:red;font-size:20px;" class="fa  fa-times" ></i>';
    $yr = 'Not Yet Activated &nbsp;&nbsp;<i style="color:red;font-size:20px;" class="fa  fa-times" ></i>';
    $fname = 'Not Yet Activated &nbsp;&nbsp;<i style="color:red;font-size:20px;" class="fa  fa-times" ></i>';
    $lname = 'Not Yet Activated &nbsp;&nbsp;<i style="color:red;font-size:20px;" class="fa  fa-times" ></i>';
    $csv = 'Not Yet Activated &nbsp;&nbsp;<i style="color:red;font-size:20px;" class="fa  fa-times" ></i>';
    $card = 'Not Yet Activated &nbsp;&nbsp;<i style="color:red;font-size:20px;" class="fa  fa-times" ></i>';
    $cardt = 'Not Yet Activated &nbsp;&nbsp;<i style="color:red;font-size:20px;" class="fa  fa-times" ></i>';
  }

  
  


?>





                                                </br>

<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="background-color:#c7fff7;padding:50px;border-radius:10px">
                    <div class="card payment-card responsive-mg-b-30">
                        <div class="payment-inner-pro">
                            <i ><?php echo $row['cardt'];?></i>
</br></br>
                            <h5><?php echo $card;?></h5>
                            <div class="row m-t-10">
                                <div class="col-sm-6 col-md-6 col-sm-6 col-xs-6">
                                    <strong class="m-r-5">Expiry Date :</strong><br /><?php echo $month.' '.$yr;?>
                                </div>
                                <div class="col-sm-6 col-md-6 col-sm-6 col-xs-6 text-left">
                                    <strong class="m-r-5">Name :</strong><?php echo $fname.' '.$lname;?><br />
                                    <strong class="m-r-5">CSV :</strong><?php echo $csv;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</br>





                                               

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