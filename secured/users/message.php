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









if (isset($_POST['msgs'])){

  
    
       $account= $_POST['account'];
       $message = $_POST['message'];
    
    
         $msgid ='cabcdg19etsfjhdshdsh35678gwyjerehuhb/>()[]{}|\dTSGSAWQUJHDCSMNBVCBNRTPZXMCBVN1234567890';
                $msgid = str_shuffle($msgid);
                 $msgid= substr($msgid,0, 10);
    
    
         $sql = "INSERT INTO messageadmin (account, message, msgid) VALUES ('$account','$message','$msgid')";
    
          if(mysqli_query($link, $sql)){
    
       
            $msg= "Your message was successfully sent!";
        } else {
            $msg= "Cannot send message!";
        }
    }
    
    
    
    if(isset($_POST['delete'])){
	
        $msgid = $_POST['msgid'];
        
    $sql = "DELETE FROM messageadmin WHERE msgid='$msgid'";
    
    if (mysqli_query($link, $sql)) {
        $msg = "Message deleted successfully!";
    } else {
        $msg = "Message not deleted! ";
    }
    }



 


?>

   <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><i class="fa fa-users" style="font-size:30px"></i> Message</h1>
            
          </div>

          
          <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
          
          
          




    <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                            <button class="btn btn-primary">Message Admin</button>
                               
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <form action="message.php" method="post">



                                            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>


                                                

                                                


                                                <input type="hidden" name="account" value="<?php echo $row['acctno'];?>" class="form-control" />

                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro">Message</label>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <textarea  name="message" placeholder="Type enter your message"  class="form-control" />
</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <input type="submit" name="msgs" value="Send Message"  class="btn btn-info" />
                                                        </div>
                                                    </div>
                                                </div>







                                                <div class="col-md-12 col-sm-12 col-sx-12">

<div class="box-body table-responsive no-padding">

<table id="table" class="table table-responsive table-striped table-bordered table-hover" >



					<thead>

						<tr class="info">
						<th>Account</th>
                            <th>Message</th>
                            <th>Admin-Response</th>
							<th style="display:none;"></th>
							
							 <th>Status</th>
								<th>Date</th>
                                <th>Action</th>
								
                                
                                

						</tr>
					</thead>


					<tbody>
					<?php $sql= "SELECT * FROM messageadmin WHERE account='$acctno'";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  while($row = mysqli_fetch_assoc($result)){  
				  if(isset($row['astatus'])  && $row['astatus']==1){
					  $msg = 'Administrator replied &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-check" ></i>';
					  
				  }else{
					  $msg = 'Waiting for response! &nbsp;&nbsp;<i class="fa  fa-envelope" style=" font-size:20px;color:red"></i>';
				  }
                  ?>
                  


				
						<tr class="primary">
						<form action="message.php" method="post">
                       <td><?php echo $row['account'];?></td>
                       
                            <td id="account">  <?php echo $row['message'];?>
               </td>
               <td id="account"> <?php echo $row['reply'];?>
               </td>
							<td style="display:none;"><input type="hidden" name="msgid" value="<?php echo $row['msgid'];?>"> </td>
							
													
							<td><?php echo $msg;?></td>
						              
              <td><?php echo $row['date'];?></td>
			  
                          
							
							
    <td><button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> Delete</span></button></td>
</form>
						</tr>
						
					  <?php
 }
			  }
			  ?>
					</tbody>



				</table>
				
</div>
          </div>

		  </div>
          <!-- /top tiles -->

          </div>

        



                                               

                                                    </div>
                                                </div>
                                            </form>
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