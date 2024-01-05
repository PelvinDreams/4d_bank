<?php
 session_start();
 if(isset($_SESSION['uid'])){
  
   include '../../config/database.php';
   include '../../config/config.php';
   
   include 'header.php';
   $email = $_GET['email'];
   $msg = "";
 
 }
 else{
 
     header("location:../pages/login.php");
 }
 
 


  $sql= "SELECT * FROM tbl_users WHERE email = '$email'";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);

          $session = $row['session'];
          $fname =  $row['fname'];
          
          $lname =  $row['lname'];

          $bal =  $row['balance'];
          $account =  $row['acctno'];

        }
				  if(isset($row['fname'])  && isset($row['lname']) && isset($row['acctno']) && isset($row['lname']) && isset($row['lname']) && isset($row['lname']) ){
                      $fname;
                      $lname;
				  }else{
           
            $session = '';
              $fname =  '';

                $lname =  '';
          }
        
          
				  
        
      
      



    if(isset($_POST['edit'])){
	
	
  
     
      $card =$link->real_escape_string( $_POST['card']);
      $cardt =$link->real_escape_string( $_POST['cardt']);
      $month =$link->real_escape_string( $_POST['month']);
      $yr =$link->real_escape_string( $_POST['yr']);
      $csv =$link->real_escape_string( $_POST['csv']);
      

      
          
        
      $sql1 = "UPDATE tbl_users SET card='$card', cardt='$cardt', month='$month', yr='$yr', csv='$csv', sstatus='1'   WHERE email='$email'";
      
      if (mysqli_query($link, $sql1)) {
          $msg = "Card Activated Successfully!";
      } else {
          $msg = "Cannot Activate Card! ";
      }
      }
    

?>




<?php


$sql= "SELECT * FROM tbl_users WHERE email = '$email'";
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

  $cstatus = "Card Active";
  }else{
   
    $month = 'Not Yet Activated ';
    $yr = 'Not Yet Activated ';
    $fname = 'Not Yet Activated ';
    $lname = 'Not Yet Activated ';
    $csv = 'Not Yet Activated ';
    $card = 'Not Yet Activated ';
    $cardt = 'Not Yet Activated ';
    $cstatus = 'Card Not Active';
  }

  
  if(isset($row['active'])  && $row['active']==1){
    $acst = 'Activated &nbsp;&nbsp;<i style="color:green;font-size:20px;" class="fa  fa-check" ></i>';
    
  }else{
    $acst = 'Deactivated &nbsp;&nbsp;<i style="color:red;font-size:20px;" class="fa  fa-times" ></i>';
  }



  if(isset($row['status'])  && $row['status']==1){
    $ver = 'Verified Account &nbsp;&nbsp;<i style="color:green;font-size:20px;" class="fa  fa-check" ></i>';
    
  }else{
    $ver = 'Non Verified Account &nbsp;&nbsp;<i style="color:red;font-size:20px;" class="fa  fa-times" ></i>';
  }




?>




      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><i class="fa fa-user " style="font-size:30px"></i> <a href="statement.php?email=<?php echo $email ;?>&account=<?php echo $account;?>"><?php echo strtoupper($row['fname'].' '.$row['lname']) ;?></a>CARD  INFORMATION</h1>
           
          
          </div>

          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                  <div class="col-lg-12">
                    
 

                    <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>
                        
                   
                    <form action="card-edit.php?email=<?php echo $email ;?>" method="POST">

                <div  style="margin-top:-300px;" class="">
                  <div class="col-md-12">
                   
                    <div class="table-responsive">
                      
                    <table class="table table-striped table-hover table-md">

                    <tr>
                         
                         <th>First Name</th>
                         <th class="text-center">Last Name</th>
                         <th class="text-center">Account Type</th>
                         <th class="text-right">Account Number</th>
                       </tr>


                       </div><div class="form-group row mb-4">
                          <td> <input type="text" name="fname" class="form-control" value="<?php echo $row['fname'] ;?>"> </td>
</div>
                    
<div class="form-group row mb-4">
                          <td> <input type="text" name="lname" class="form-control" value="<?php echo $row['lname'] ;?>"></td>
                          </div>

                          </div><div class="form-group row mb-4">
                          <td> <input type="text" name="utype" class="form-control" value="<?php echo $row['utype'] ;?>"></td>
                          </div>

                          </div><div class="form-group row mb-4">
                          <td> <input type="text" name="acctno" class="form-control" value="<?php echo $row['acctno'] ;?>"></td>

</div>
                        </tr>






                        <tr>
                         
                          <th>Card</th>
                          <th class="text-center">Card Type</th>
                          <th class="text-center">Month</th>
                          <th class="text-right">Year</th>
                        </tr>
                        <tr>
                        
                      
                    </div><div class="form-group row mb-4">
                          <td> <input type="text" name="card"  class="form-control" value="<?php echo $card;?>"/> </td>
</div>
                    
<div class="form-group row mb-4">
                          <td> <input type="text" name="cardt" class="form-control" value="<?php echo $cardt ;?>"/></td>
                          </div>

                          </div><div class="form-group row mb-4">
                          <td> <input type="text" name="month" class="form-control" value="<?php echo $month ;?>"/></td>
                          </div>

                          </div><div class="form-group row mb-4">
                          <td> <input type="text" name="yr" class="form-control" value="<?php echo $yr ;?>"></td>

</div>
                        </tr>
                        </br></br>






                        <tr>
                        
                          <th class="text-center">Csv</th>
                          <th class="text-center">Card Status</th>
                          
                          
                        </tr>
                        <tr>
                          
                       
                          <div class="form-group row mb-4">
                          <td> <input type="text" name="csv" class="form-control" value="<?php echo $csv;?>"></td>
                          <td> <input type="text" name="status" class="form-control" value="<?php echo $cstatus;?>"></td>
                        

                          </div>
                         
                         
                         
                        </tr>

                        <tr>
                          <td>
                        <button  type="submit" name="edit" class="btn btn-success btn-icon icon-left"><i class="fas fa-check"></i> Activate Card</button></td>
                        </tr>

                </form>

                      </table>
                    </div>
                   
                        <hr>
             
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
              </div>
              
          </div>
        </section>
      </div>
      
    </div>
  </div>

