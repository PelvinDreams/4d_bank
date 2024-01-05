<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_SESSION['uid'])){
 
 
  include '../../config/database.php';
  include '../../config/config.php';
  include 'header.php';
  $msg = "";

}
else{

    header("location:../pages");
}









    
    if(isset($_POST['delete'])){
	
        $cid = $_POST['cid'];
        
    $sql = "DELETE FROM md WHERE cid='$cid'";
    
    if (mysqli_query($link, $sql)) {
        $msg = "deleted successfully!";
    } else {
        $msg = "Cannnot delete! ";
    }
    }
    
    


 if(isset($_POST['approve'])){
    
   $email = $_POST['email'];
      $amount= $_POST['amount'] ;
 

 
 
 
 
 

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
        
          
 
 
 
 
 
 
 
     
  $sql = "UPDATE tbl_users SET balance = balance + $amount  WHERE email ='$email'";
  
    
  if(mysqli_query($link, $sql)){


   $sql1 = "UPDATE md SET status = 1  WHERE email ='$email'";
  
   if(mysqli_query($link, $sql1)){
       
       
       
        $txndate = date("Y/m/d");
    $token ='1234567890';
      $token = str_shuffle($token);
       $token= substr($token,0, 8);  
      
    $sql2 = "INSERT INTO tbl_transaction (tx_no, tx_type, amount, date, description, to_accno, account, status,comments)
    
    VALUES ('$token', 'credit', '$amount', '$txndate', 'Cheque Deposit', '', '$account','success','Cheque')";
         
         
         mysqli_query($link, $sql2);
   
require_once "PHPMailer/PHPMailer.php";
require_once 'PHPMailer/Exception.php';


//PHPMailer Object
$mail = new PHPMailer;

//From email address and name
$mail->From = $emaila;
$mail->FromName = $name;

//To address and name
$mail->addAddress($email, $fname);
$mail->addAddress("$email"); //Recipient name is optional

//Address to which recipient will reply

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Mobile Deposit Approval";

$mail->Body = '<div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">

<div class="be_logo" style="float: left;"> <img src="https://'.$bankurl.'/nonsms-bank-script/3d_bank/admin/pages/logo/'.$logo.'"> </div>

<div class="be_user" style="float: right"> <p>Dear: '.$fname.' - Account Number: ' .$account.'</p> </div> 

<div style="clear: both;"></div> 

<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<h1>Loan Approval</h1>

</div> </div> 

<div class="be_body" style="padding: 20px;"> <p style="line-height: 25px;"> This is to inform you that your deposit of <strong>'.$amount.'</strong> 

has been approved and added to your account balance.
 </p> <div style="margin-top: 25px;">

<p>In case you need any further clarification for the same, please do get in touch with your Branch.</p> </div> </div> <div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div> <p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2019 '.$name.'. </p> </div> </div> </div>';

if($mail->send()) {
  
    $msg =  "Check Approved !";
}
               
           else{
                $msg = "Approved but cannot top up and send mail .'$account'.!";
            }
    

 }
 
 else{
    

 $msg= "cannot Approve! ";
}
  
      
      
      
      
  }
  
  
  
 
 }



?>

  

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
  

  <link rel="stylesheet" href=" https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/1.5.6/css/buttons.jqueryui.min.css">



  

  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.min.css">
  <link rel="stylesheet" href="">
 
  
    
    



  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
 

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.jqueryui.min.js"></script>
   
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
  
  
  <script type="text/javascript" charset="utf8" src=""></script>
  <script type="text/javascript" charset="utf8" src=""></script>

 
  



    
    
 
    
    
    
    
    
    

   
   



<style>
.table-responsive {
overflow-x: hidden;
}
@media (max-width: 8000px) {
.table-responsive {
overflow-x: auto;
}
</style>
  </head>
  <body>

  <!-- Main Content -->
      <div class="main-content">

        <section class="section">

          <div class="section-header">
            <h1><i class="fa fa-users" style="font-size:30px"></i>MOBILE DEPOSIT MANAGEMENT</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href=""><?php echo $name;?></a></div>
                 <div class="breadcrumb-item"></div>
            </div>
          </div>
          
          
           <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          
          <div class="col-md-12 col-sm-12 col-sx-12">
               <div class="table-responsive">
                     <table class="display"  id="example">
                                    <thead>
                                        <tr>
                                            <th>ACCOUNT</th>
                                             <th style="display:none">EMAIL</th>
                                             <th style="display:none">CID</th>
                                             <th style="">AMOUNT</th>
                                            <th>DATE</th>
                                             <th>CHEQUE</th>
                                            
                                            
                                             <th>CHEQUE-ID </th>
                                            <th>STATUS</th>
                                            
                                             <th>ACTION</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php 
                                    $sql= "SELECT * FROM md";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  while($row = mysqli_fetch_assoc($result)){  
				 
				 
				 
				  if(isset($row['status'])  && $row['status']==1){
					  $st = 'Approved &nbsp;&nbsp;<i style="color:green;font-size:20px;" class="fa  fa-check" ></i>';
					  
				  }else{
					  $st = 'Not yet Approved &nbsp;&nbsp;<i style="color:red;font-size:20px;" class="fa  fa-times" ></i>';
				  }
        
				  ?>
				

                            
                                        <tr class="odd gradeX">
                                            
                                            <form action="md.php?acct = <?php echo $row['account'];?>"  method="post">
                                      
                                            <td><?php echo $row['account'];?></td>
                                            
                                            <td style="display:none"><input type="text" name="email" value="<?php echo $row['email'];?>"></td>
                                             <td style="display:none"><input type="text" name="cid" value="<?php echo $row['cid'];?>"></td>
                                            
                                            
                                            <td style=""><input type="number" name="amount" value="Enter Amount"></td>
                                            
                                            
                                            <td><?php echo $row['date'];?></td>
                                           
                                            <td><img src="../../users/md/<?php echo $row['cheque'];?>" width="200px"></td>
                                              <td><?php echo $row['cid'];?></td>
                                               <td><?php echo $st;?></td>
                                            
                                  

                                            <td><button type="submit" name="delete" style="width:100%" class="btn btn-danger"><span class="fas fa-trash">-Delete </span></button></td>

                                          
                                            <td><button  type="submit" name="approve" style="width:100%" class="btn btn-success"><span class="fas fa-check">-Approve </span></button></td>
                                            
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
      </div>
      </div> 
      </div>
      </div>
      </div>
      </div>
      </section>
      </div>
      </div>       
     
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
       
    } );
    

    table.buttons().container()
        .insertBefore( '#example_filter' );

        table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-12:eq(0)' );
} );
</script>

  </body>
</html>