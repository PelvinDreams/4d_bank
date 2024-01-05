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









if(isset($_POST['change'])){

  
    $password=$link->real_escape_string( $_POST['password']);
    $account=$link->real_escape_string( $_POST['account']);
    $npassword =$link->real_escape_string( $_POST['npassword']);

    if($password != $row['pwd']){

        $msg = "Incorrect Old Password!";

    }else{
        
      
    $sql1 = "UPDATE tbl_users SET pwd='$npassword'   WHERE acctno='$account'";
    
    if (mysqli_query($link, $sql1)) {
        $msg = "Password Changed Successfully!";
    } else {
        $msg = "Cannot Change password! ";
    }
    }
}





 


?>
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><i class="fa fa-users" style="font-size:30px"></i> My Password Settings</h1>
            
          </div>

          
          <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
          
          
          



    <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                       
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <form action="cpassword.php" method="post">



                                            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>


                                                

                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Old Password</label>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <input type="text" name="password" placeholder="Enter old password"  class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <input type="hidden" name="account" value="<?php echo $row['acctno'];?>" class="form-control" />


</br>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">New Password</label>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <input type="text" name="npassword" placeholder="Enter new password"  class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
</br>
                                                
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <input type="submit" name="change" value="Change password"  class="btn btn-info" />
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