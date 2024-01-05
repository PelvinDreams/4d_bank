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


include "header.php";










if (isset($_POST['contact'])){

  
   
       $name= $_POST['name'];
       $email = $_POST['email'];
       $account= $_POST['account'];
       $complain= $_POST['complain'];
      
    
    
    
         $sql = "INSERT INTO contact (name, email, account,complain) VALUES ('$name','$email','$account','$complain')";
    
          if(mysqli_query($link, $sql)){
    
       
            $msg= "Your complain was successfully sent, wait for response!";
        } else {
            $msg= "Cannot send!";
        }
    }
    
    







 


?>

<div class="container" style="width:95%" >
            <div class="row" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs custom-menu-wrap" style="background-color:#d3e3e8;color:black;">
                        <li><a style="color:black;" href="message.php"><i style="color:red; "  class="fa fa-comment" aria-hidden="true"></i> Send Message</a>
                        </li>
                        

                        <li><a style="color:black;"  href="contact.php"><i style="color:teal; "  class="fa fa-comment" aria-hidden="true"></i> Contact Administrator</a>
                        </li>

                       
                       
                        
                    </ul>

        </div>
    </div>


<div class="container" style="width:95%" >
           
       




    <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                            <button class="btn btn-primary">Contact Account Manager</button>
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
                                            <form action="contact.php" method="post">



                                            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>


                                                

                                                


                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Full Name</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control" name="name"  maxlength="160" value=""  placeholder="Enter Full Name"/>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Email</label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="email" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Account</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input type="text"  name="account" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>




                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Comment</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <textarea   name="complain" class="form-control" placeholder="Type your complain here" >
</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <div class="form-group-inner">
                                                    <div class="login-btn-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3"></div>
                                                            <div class="col-lg-6">
                                                                <div class="login-horizental cancel-wp pull-left">
                                                                    
                                                                    <button class="btn btn-sm btn-primary login-submit-cs" name="contact" type="submit">Submit</button>
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

