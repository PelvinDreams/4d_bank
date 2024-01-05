<?php

 

//fetch total active accounts

$sql2= "SELECT * FROM tbl_users WHERE status = 1 ";
			  $result2 = mysqli_query($link,$sql2);
			  
			  if(mysqli_num_rows($result2) > 0){
				 
              $total2= mysqli_num_rows($result2);
				
 
			  }else{
				$total2 = 0  ;
			  }
			  
//fetch total investors that registered

$sql= "SELECT * FROM tbl_users Where status = 0 ";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				
              $total= mysqli_num_rows($result);
				
			  }else{
				$total = 0  ;
			  }
			  
			  
//fetch total investors that has investedhh
 
$sqlu= "SELECT * FROM tbl_users  ";
			  $resultu = mysqli_query($link,$sqlu);
			  if(mysqli_num_rows($resultu) > 0){
				
              $totalu= mysqli_num_rows($resultu);
				
			  }else{
				$totalu = 0  ;
			  }
			  


////////

	$sql_qry1="SELECT SUM(amount) AS count FROM tbl_transaction WHERE tx_type = 'credit' ";

$duration1 = $link->query($sql_qry1);
while($row = $duration1->fetch_array()){
    $credit = $row['count'];
	}
	
	
	
	$sql_qry1="SELECT SUM(amount) AS count FROM tbl_transaction WHERE tx_type = 'debit' ";

$duration1 = $link->query($sql_qry1);
while($row = $duration1->fetch_array()){
    $debit = $row['count'];
	}
	
////////

	$sql_qry="SELECT SUM(usd) AS counter FROM btc ";

if($duration = $link->query($sql_qry)){
while($record = $duration->fetch_array()){
    $deposit = $record['counter'];
	}
}else{
				$deposit = 0  ;
			  }
	
	
?>


