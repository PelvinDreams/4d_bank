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









if (isset($_POST['apply'])){

  
    $date= $_POST['date'];
       $name= $_POST['name'];
       $amount = $_POST['amount'];
       $duration= $_POST['duration'];
       $reason= $_POST['reason'];
    
       $loanid ='cabcdg19etsfjhdshdsh35678gwyjerehuhb/>()[]{}|\dTSGSAWQUJHDCSMNBVCBNRTPZXMCBVN1234567890';
        $loanid = str_shuffle($loanid);
         $loanid= substr($loanid,0, 10);
        
    
         $sql = "INSERT INTO loan (date, name, amount, duration,reason,loanid) VALUES ('$date','$name','$amount','$duration','$reason','$loanid')";
    
          if(mysqli_query($link, $sql)){
    
       
            $msg= "Your loan application was successfully sent, wait for response!";
        } else {
            $msg= "Cannot apply!";
        }
    }
    
    
  


 


?>
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><i class="fa fa-users" style="font-size:30px"></i> My Loan Status </h1>
            
          </div>

          
          <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
          
          
          





    <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        



                                            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>


                                                

                                                


</br></br>



                                                <div class="col-md-12 col-sm-12 col-sx-12">

<div class="box-body table-responsive no-padding">

<table id="table" class="table table-responsive table-striped table-bordered table-hover" >



					<thead>

						<tr class="info">
						<th>Account</th>
                            <th>Date</th>
                            <th>Name</th>
							<th style="display:none;"></th>
							
							 <th>Amount</th>
                                <th>Duration</th>
                                <th>Reason</th>
                                <th>Loan ID</th>
                                <th>Status</th>
								

						</tr>
					</thead>


					<tbody>
					<?php $sql= "SELECT * FROM loan WHERE account='$acctno'";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  while($row = mysqli_fetch_assoc($result)){  
				  if(isset($row['status'])  && $row['status']==1){
					  $msg = 'Loan Approved &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-check" ></i>';
					  
				  }else{
					  $msg = 'Loan Not approved try again! &nbsp;&nbsp;<i class="fa  fa-times" style=" font-size:20px;color:red"></i>';
				  }
                  ?>
                  


				
						<tr class="primary">
						<form action="message.php" method="post">
                       <td><?php echo $row['account'];?></td>
                       
                            <td id="account">  <?php echo $row['date'];?>
               </td>
               <td id="account"> <?php echo $row['name'];?>
               </td>
							<td style="display:none;"><input type="hidden" name="msgid" value="<?php echo $row['msgid'];?>"> </td>
							
													
							<td><?php echo $row['amount'];?></td>
						              
              <td><?php echo $row['duration'];?></td>
              
			  
              <td><?php echo $row['reason'];?></td>
							
							
              <td><?php echo $row['loanid'];?></td>
              <td><?php echo $msg;?></td>
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