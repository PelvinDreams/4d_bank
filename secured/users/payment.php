<?php
session_start();
include '../config/database.php';
include '../config/config.php';


  
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


















 


?>
   <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><i class="fa fa-users" style="font-size:30px"></i> My Payment History </h1>
            
          </div>

          
          <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
          
          
          
          
          </br></br>
    <div class="table-responsive">
                 
            
            




            <?php

$user_id = $_SESSION['uid'];
 $acctno = $_SESSION['acctno'];

$sql = "SELECT * FROM tbl_transaction WHERE account = $acctno 
   ";
$result = mysqli_query($link,$sql);

?> 
 <table id="payment-history" class="table table-condensed table-responsive table-striped statement sortable">
   <thead>
     <tr>
     <?php

if(mysqli_num_rows($result) > 0) { //if
while($row = mysqli_fetch_assoc($result)) {

?>
     
       <th width="80" class="{sorter: &#39;date&#39;} header">Date</th>
      
       <th width="30%" class="header">Transacion ID</th>
       <th width="40%" class="header">Details</th>
       <th class="{sorter: &#39;amount&#39;} right amount header">Amount</th>
       <th class="{sorter: &#39;amount&#39;} right amount header">Charges</th>
       <th class="right header">Status</th>
       
         <th class="{sorter: false} mark-as-favorite"></th>
       
       
     </tr>
   </thead>
   <tbody>
     
    
 <tr class="transaction-row nondefined" id="payment-10215" data-payment-id="10215">
   <td><?php echo $row['date']; ?></td>
  
   <td>
      <?php echo $row['tx_no']; ?>
     </a>
   </td>
   <td>
     <div id="comment-10215" class="muted comment-in-history"></div>
     
     <?php echo $row['description']; ?>
   </td>
   <td class="right amount">
    
     
       <span class="amount-value">+<?php echo $row['tx_type'] == "credit" ? "$&nbsp;" . number_format($row['amount'], 2) : ""; ?><br>
        -<?php echo $row['tx_type'] == "debit" ? "$&nbsp;" . number_format($row['amount'], 2) : ""; ?></span>
       
     
   </td>
   
   <td class="right amount">
    
     
       <span class="amount-value">
        -<?php echo  "$&nbsp;" . number_format($row['charges'], 2); ?></span>
       
     
   </td>
   <td class="right payment-status deferred">Completed</td>
   
     <td class="favorite-action">
       
         <a class="remove-favorite post"  title="Remove from favorites" data-post-confirmation="Really remove from favorites?">★</a>
       
       
     </td>
   
   
 </tr>
 <?php
} // end while
}//if
else {
?>
 <tr> 
  <td colspan="6" align="right">You have no transaction history yet, seems that you haven't done any transaction yet.</td>
 </tr>
 <?php 
}//else{
   $user_id = $_SESSION['uid'];
   $acctno = $_SESSION['acctno'];
     
   $balance_sql = "SELECT balance FROM tbl_users WHERE id = $user_id AND acctno = $acctno";
   $result = mysqli_query($link,$balance_sql);
   $row = mysqli_fetch_assoc($result);
?>
   </tbody>
 </table>




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
