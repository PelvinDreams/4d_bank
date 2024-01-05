<?php
 session_start();
if(isset($_SESSION['uid'])){
 
 
  include '../../config/database.php';
  include '../../config/config.php';
  include 'users_query.php';
  include 'header.php';
  $msg = "";

}
else{

    header("location:../pages");
}












if(isset($_POST['submit'])){



$btc =$link->real_escape_string($_POST['btc']);

$email =$link->real_escape_string($_POST['email']);



    
    
$sql = "UPDATE admin SET bwallet='$btc' WHERE email='$email'";

    
  if(mysqli_query($link, $sql)){

  

    $msg= " Address Added successfully";
    

 }
 
 else{
    

 $msg= "Cannot add address! ";
}
    

}




?>
  
 
 
 
 
 
 <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?php echo $name?></h1>
          </div>






          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total User Accounts</h4>
                  </div>
                  <div class="card-body">
                  <?php echo $totalu;?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4> Active Accounts</h4>
                  </div>
                  <div class="card-body">
                  <?php echo $total2;?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Inactive Accounts</h4>
                  </div>
                  <div class="card-body">
                  <?php echo $total;?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4> Debit Transactions</h4>
                  </div>
                  <div class="card-body">
                 $<?php echo $debit;?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4> Credit Transactions</h4>
                  </div>
                  <div class="card-body">
                  $<?php echo $credit;?>
                  </div>
                </div>
              </div>
            </div>
          </div>


<?php




  $sql= "SELECT * FROM admin WHERE id = '1'";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);

          $email = $row['email'];
          $wallet =  $row['bwallet'];
          

        }
				 
        

?>





<div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
            <div class="box-header with-border">

          <h4 align="center"><i class="fa fa-refresh"></i> Add Bitcoin Address</h4>
          </br>
          	<?php if($msg != "") echo "<div style='padding:20px;background-color:#fff;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
<div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-white">
             

              <form class="form-horizontal" action="home.php" method="POST" >
  
 
         
<div class="form-group">
    
    <div class="form-group">
<input type="text"  name="wallet" readonly value="<?php  echo $wallet?>" class="form-control">
 
</div>
    
<input type="text"  name="btc"   placeholder="Btc wallet address" class="form-control">
 
</div>


             
<div class="form-group">
<input type="hidden"  name="email"  value="<?php  echo $row['email']?>" class="form-control">
 
</div>

<div class="form-group">
<input type="submit"  name="submit" value="Add Btc Wallet Address" class="btn btn-primary">
 
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
        </section>
      </div>
