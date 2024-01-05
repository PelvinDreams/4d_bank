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

  
    $pin=$link->real_escape_string( $_POST['pin']);
    $account=$link->real_escape_string( $_POST['account']);
    $npin =$link->real_escape_string( $_POST['npin']);

    if($pin != $row['pin']){

        $msg = "Incorrect Old Pin!";

    }else{
        
      
    $sql1 = "UPDATE tbl_users SET pin='$npin'   WHERE acctno='$account'";
    
    if (mysqli_query($link, $sql1)) {
        $msg = "Pin Changed Successfully!";
    } else {
        $msg = "Cannot Change pin! ";
    }
    }
}





 


?>

   <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><i class="fa fa-users" style="font-size:30px"></i> My Pin Settings </h1>
            
          </div>

          
          <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
          
          
          



    <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        <div class="sparkline12-hd">
                            
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <form action="cpin.php" method="post">



                                            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>


                                                

                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Old Pin</label>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <input type="text" name="pin" placeholder="Enter old pin"  class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <input type="hidden" name="account" value="<?php echo $row['acctno'];?>" class="form-control" />

</br>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">New Pin</label>
                                                        </div>
                                                        
                                                        <div class="col-lg-3">
                                                            <input type="text" name="npin" placeholder="Enter new pin"  class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
</br>
                                                
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <input type="submit" name="change" value="Change pin"  class="btn btn-info" />
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