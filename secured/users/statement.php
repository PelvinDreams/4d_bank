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



     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><i class="fa fa-users" style="font-size:30px"></i> My Account Statement </h1>
            
          </div>

          
          <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
          
          
          
 
 
 
 

    <div class="table-responsive">
                 
            
            




            <?php

$user_id = $_SESSION['uid'];
 $acctno = $_SESSION['acctno'];

$sql = "SELECT * FROM tbl_transaction WHERE account = $acctno 
   ";
$result = mysqli_query($link,$sql);

?> 

<div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label class="login2 pull-right pull-right-pro"><button class="btn btn-primary">Statement Of Account</button></label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text"  value="<?php echo $row['fname'].'  '.$row['lname'].' | '.$row['acctno'];?>" readonly="true" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

</br>
</br>






                        <?php


$user = $_SESSION['utype'];
$acctno = $_SESSION['acctno'];
if (!isset($acctno) && $acctno <= 0) {
	header('Location: index.php');
}

$sql = "SELECT * FROM tbl_transaction WHERE account = $acctno 
		ORDER BY id DESC";
$result = mysqli_query($link, $sql);



?> 


                        <div class="sparkline13-graph">
                           <div class="col-md-12 col-sm-12 col-sx-12">
               <div class="table-responsive">
                     <table class="display"  id="example">
                                    <thead>
                                        <tr>
                                        <th class="account header">Account</th>
      <th class="header">Name</th>
      <th class="{sorter: &#39;numeric&#39;} header">Reference No#</th>
      <th class="right header">Date</th>
      <th class="right header">Description</th>
      <th class="right {sorter: &#39;date&#39;} header">Debit</th>
     <th class="right {sorter: &#39;date&#39;} header">Credit</th>
      <th class="right {sorter: &#39;date&#39;} header">Charges</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){



?>
          <td nowrap="" class="account" id="account-10034">
          <?php echo $_SESSION['acctno'] ?>
          </td>
        
        
        <td><?php echo $_SESSION['fname'];  ?></td>
        <td style="text-transform: lowercase">
      <?php echo $row['tx_no']; ?>
        </td>
        <td class="right"><?php echo $row['date']; ?></td>
        <td class="right"><?php echo $row['comments']; ?></td>
        <td class="right" style="text-transform: lowercase"><span style="color:red"><?php echo $row['tx_type'] == "debit" ? $currency . "&nbsp;" . number_format($row['amount'], 2) 
		: ""; ?></span></td>
		<td class="right" style="text-transform: lowercase"><span style="color:green"><?php echo $row['tx_type'] == "credit" ? $currency . "&nbsp;" . number_format($row['amount'], 2) 
		: ""; ?></span></td>
		
		 <td class="right" style="text-transform: lowercase"><span style="color:red"><?php echo $row['tx_type'] == "debit" ? $currency . "&nbsp;" . number_format($row['charges'], 2) 
		: ""; ?></span></td>
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
}//else
	$user_id = $_SESSION['uid'];
	$acctno = $_SESSION['acctno'];
	  
	$balance_sql = "SELECT balance FROM tbl_users WHERE id = $user_id AND acctno = $acctno";
	$result = mysqli_query($link, $balance_sql);
if(mysqli_num_rows($result) > 0){
  $row = mysqli_fetch_assoc($result);
}
	
?>
                                        </tr>
                                    </tbody>
									
									<tbody>
      
  <?php 
      $user_id = $_SESSION['uid'];
      $acctno = $_SESSION['acctno'];
      
      $balance_sql = "SELECT balance FROM tbl_users WHERE id = $user_id AND acctno = $acctno";
      $result1 = mysqli_query($link, $balance_sql);
    $row = mysqli_fetch_assoc($result1);
      ?>
        <tr id="closing-balance-row">
          <th class="right" colspan="4">Available Balance: </th>
          <th class="right amount">$ <?php echo number_format($row['balance']); ?></th>
          
        </tr>
      
      <tr id="credit-turnover-row">
        <th class="right" colspan="4">Pending Balance:</th>
        
        
      </tr>
      
    </tbody>
  
                                </table>
                            </div>
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


</br></br>
  
 
 
 
 
 
 
 
 
 
 

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
