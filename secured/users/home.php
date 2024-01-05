<?php
session_start();
include '../config/database.php';
include '../config/config.php';


  
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
          
          
          <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
          
          
            <div class="row">
          
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="user-profile-wrap shadow-reset">
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="row">

                                
   <!-- EXCHANGERATES.ORG.UK LIVE CURRENCY RATES TICKER START -->
<iframe src="//www.exchangerates.org.uk/widget/ER-LRTICKER.php?w=490&s=1&mc=GBP&mbg=F0F0F0&bs=no&bc=000044&f=verdana&fs=10px&fc=000044&lc=000044&lhc=FE9A00&vc=FE9A00&vc
u=008000&vcd=FF0000&" width="100%" height="50" frameborder="0" scrolling="no" marginwidth="0" marginheight="0"></iframe>
<!-- EXCHANGERATES.ORG.UK LIVE CURRENCY RATES TICKER END -->

                                    <div class="col-lg-3">
                                        
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="user-profile-content">
                                       <button class="btn btn-info"> <h5>ACCOUNT OVERVIEW</h5></button>
</br></br>
                                       
                                            <h5><img src="uploads/<?php echo $row['pics'];?>" style="border-radius:50%;max-height:60px" alt="" width="100" height="100" /> <?php echo $row['fname']. ' ' . $row['lname'] ?></h5>
                                            
                                            <p class="profile-des"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="user-profile-social-list">
                                    <table class="table small m-b-xs">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>Account Name</strong>
                                                </td>
                                                <td>
                                                    <strong><?php echo $row['fname']. ' ' . $row['lname'] ?></strong>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Account Type</strong>
                                                </td>
                                                <td>
                                                    <strong><?php echo $row['utype']; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Account Number</strong> 
                                                </td>
                                                <td>
                                                    <strong><?php echo $row['acctno']; ?></strong>
                                                </td>
                                            </tr>
                                            
                                            
                                             <tr>
                                                <td>
                                                    <strong>Routing Number</strong> 
                                                </td>
                                                <td>
                                                    <strong><?php echo $row['rtn']; ?></strong>
                                                </td>
                                            </tr>
                                            
                                             <tr>
                                                <td>
                                                    <strong>SSN</strong> 
                                                </td>
                                                <td>
                                                    <strong><?php echo $row['ssn']; ?></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                            <div class="col-lg-3">
                                <div class="analytics-sparkle-line user-profile-sparkline">
                                    <div class="analytics-content">
                                    <h5>Balance</h5>
                                    <button class="btn btn-info"> <h6><?php echo  $currency.' '.number_format($row['balance'], 2);?></h6></button>
                                        <div id="sparkline22"></div>
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



           
                    
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h5>Login Details</h5>
                            <div class="sparkline12-outline-icon">
                            <button class="btn btn-danger">Device Information</button>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div id="pwd-container1">
                            <div class="form-group">


                            <?php
$cc = "SELECT COUNT(*) FROM tbl_users WHERE id='$user_id'";

$result = $link->query($cc);
$row = $result->fetch_array();

?>

  
<div class="clearfix offers not-refused-offers">
  
    <div id="offer-galojan" style="background-image: url(&#39;/public/images/default-banner.png&#39;);" class="offer loan-offer loan-offer-approved">
      <div class="offer-actions">
        <a class="offer-action" href="" data-ga-event="pre-approved-loan" data-ga-action="start">
          <object type="nested/links">
            <span class="offer-text"><h6><p>You have logged in from IP: <?php echo $_SERVER['REMOTE_ADDR']; ?> You log in at: <?php echo date("h:i A d M Y"); ?></p>
	</h6></span>
          </object>
        </a>
        
          
        
      </div>
    </div>
    


                               
                        </div>
                    </div>
                </div>
            </div>




                    
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h5>News</h5>
                            <div class="sparkline12-outline-icon">
                            <button class="btn btn-primary">Bank News</button>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div id="pwd-container1">
                            <div class="form-group">


                            <?php


 

$sql = "SELECT * FROM news ";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) > 0){
 while( $row = mysqli_fetch_assoc($result)){


?>

<div id="offer-requires-credit-agency-check" style="background-image: url();" class="offer loan-offer loan-offer-requires_inspection">
  <div class="offer-actions">

      <h3><small><?php echo $row['message']; ?></h3></small>

<?php }
} ?>     
    
  </div>
</div>

</div>

<!--------<a id="show-all-offers" href="#">View all News</a>-------->

                                




                           



                                    
                    
<?php
    $user_id = $_SESSION['uid'];
$acctno = $_SESSION['acctno'];

$balance_sql = "SELECT acctno,cardt,card,utype,active,pics,status,inbalance,balance,acone,actwo,acthree,fname,lname,email,phone,gender   FROM tbl_users WHERE id = $user_id AND acctno = $acctno";
$result = mysqli_query($link,$balance_sql);
$row = mysqli_fetch_assoc($result);


?>

                    <div class="sparkline13-list shadow-reset mg-t-30">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <button class="btn btn-default"><h5>Accounts</h5></button>
                                <div class="sparkline13-outline-icon">
                                    <button class="btn btn-primary">View all account</button>
                                </div>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="static-table-list">
                            <div class="table-responsive">
                                <table class="table sparkle-table">
                                    <thead>
                                        <tr>
                                            <th>Account</th>
                                            <th>Limit</th>
                                            <th>Account Type</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['acctno'];?></td>
                                            <td><?php echo $currency.'50,000';?> </td>
                                            <td><?php echo $row['utype']?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td><?php echo $row['card']?></td>
                                            <td><?php echo $currency.'200,000';?>     </td>
                                            <td><?php echo $row['cardt']?></td>
                                           
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
              



                    <div class="sparkline13-list shadow-reset mg-t-30">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                            <button class="btn btn-default"><h5>Transactions</h5></button>
                                <div class="sparkline13-outline-icon">
                                <button class="btn btn-danger">Download PDF</button>
                                </div>
                            </div>
                        </div>



                        <?php


$user = $_SESSION['utype'];
$acctno = $_SESSION['acctno'];
if (!isset($acctno) && $acctno <= 0) {
	header('Location: index.php');
}

$sql = "SELECT * FROM tbl_transaction WHERE account = $acctno 
		ORDER BY id DESC LIMIT 10";
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
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
   
      
                    <div class="footer-copy-right">
                        <p align="center">Copyright 2021 <?php echo $name;?>. All rights reserved.</p>
                    </div>
                
          
    


