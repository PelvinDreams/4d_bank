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









if(isset($_POST['transfer'])){

  
    if($row['active'] != 1){
  
  $msg = 'Local Transfer is not activated on this account contact account manager !';
  
  }else{
  
  
  
    if($row['balance'] < $_POST['amount']){
  
      $msg = 'Insufficient Account Balance!';
      
      }else{
  
  
   if(isset($row['acone']) && $row['acone']== 1){
  
  
    $_SESSION['date'] = $_POST['date'];
    $_SESSION['bname'] = $_POST['bname'];
    $_SESSION['bbn'] = $_POST['bbn'];
    $_SESSION['bv'] = $_POST['toption'];
    $_SESSION['swift'] = $_POST['swift'];
    $_SESSION['amount'] = $_POST['amount'];
    $_SESSION['comments'] = $_POST['details'];
    $_SESSION['tacctno ']= $_POST['tacctno'];
    $_SESSION['toption'] = $_POST['toption'];
    $_SESSION['description'] = $_POST['description'] ;
  
    echo '<script type="text/javascript">
    window.location.href ="imf.php" ;
    </script>';
    
  }
  
  if(isset($row['actwo']) && $row['actwo']== 1){
  
  
    $_SESSION['date'] = $_POST['date'];
    $_SESSION['bname'] = $_POST['bname'];
    $_SESSION['bbn'] = $_POST['bbn'];
    $_SESSION['bv'] = $_POST['toption'];
    $_SESSION['swift'] = $_POST['swift'];
    $_SESSION['amount'] = $_POST['amount'];
    $_SESSION['comments'] = $_POST['details'];
    $_SESSION['tacctno ']= $_POST['tacctno'];
    $_SESSION['toption'] = $_POST['toption'];
    $_SESSION['description'] = $_POST['description'] ;
  
    echo '<script type="text/javascript">
    window.location.href ="OTP.php?Token&otps=true" ;
    </script>';
    
  }
      }
  }
  }  










 


?>

           <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><i class="fa fa-users" style="font-size:30px"></i> My Profile </h1>
            
          </div>

          
          <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
          
          
          




    <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                            <button class="btn btn-primary">Customer Account Information</button>
                                
                            </div>
                        </div>
                        
                        
                        </br></br>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <form action="" method="post">



                                            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>


                                                

                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">First Name</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="fname" value="<?php echo $row['fname'];?>" readonly="true" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Last Name</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="lname" value="<?php echo $row['lname'];?>" readonly="true" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Email</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" readonly="true" class="form-control" name="email"  maxlength="160" value="<?php echo $row['email'];?>"  />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Address</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" readonly="true" name="address" value="<?php echo $row['address'];?>" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Phone Number</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" readonly="true" name="phone" value="<?php echo $row['phone'];?>" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">State</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" readonly="true" name="state" value="<?php echo $row['state'];?>" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>





<div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">SSN</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" readonly="true" name="ssn" value="<?php echo $row['ssn'];?>" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>




<div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Routing Number</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" readonly="true" name="state" value="<?php echo $row['rtn'];?>" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>





                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Zipcode</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input name="zipcode" readonly="true" value="<?php echo $row['zipcode'];?>"  type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>




                                               

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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