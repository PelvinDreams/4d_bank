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
       $account= $_POST['account'];
    
       $loanid ='cabcdg19etsfjhdshdsh35678gwyjerehuhb/>()[]{}|\dTSGSAWQUJHDCSMNBVCBNRTPZXMCBVN1234567890';
        $loanid = str_shuffle($loanid);
         $loanid= substr($loanid,0, 10);
        
    
         $sql = "INSERT INTO loan (account, date, name, amount, duration,reason,loanid) VALUES ('$account','$date','$name','$amount','$duration','$reason','$loanid')";
    
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
          
          
          <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
          


    <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                            <button class="btn btn-primary">FAQ</button>
                                <div class="sparkline12-outline-icon">
                                    <span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                    <span><i class="fa fa-wrench"></i></span>
                                    <span class="sparkline12-collapse-close"><i class="fa fa-times"></i></span>
                                </div>
                            </div>
                        </div>
                        

                        <h3>1. How to find a payment if I do not see it in History?</h3>
  <p>All your payments, service and card payments can be seen in Statement. To keep your payment in History for longer, mark a payment in History as <b>Defined.</b></p>

  <h3>2. How to print details of a payment that is not in History?</h3>
  <p>Save needed payment as “Template” in old internet bank and within 1 day it will appear in History of new internet bank. Now you can view, print or make a new payment based on this transaction on any moment from History. Migrated payment will stay in History as long as you do not unmark in in tick-box “Defined”.</p>

  <h3>3. Which transactions need SMS confirmation?</h3>
  <p>All transactions are confirmed with SMS, except payments between your own accounts and currency exchange. Adding funds to existing deposits are also considered as transaction between own accounts and do not need SMS confirmation.</p>

  <h3>4. What is the difference between Balance and Available amounts?</h3>
  <p>Balance is the amount of money on your bank account. Available – amounts available to you, including credits, minus reserved amounts.</p>

  <h3>5. What are reserved amounts?</h3>
  <p><b>Reserved</b> amounts perform card(s) transactions that haven’t been yet reflected on your bank account(s). Thereby, you can see this funds in Internet bank, but cannot use.</p>

  <h3>6. Where can I get account statement for periods until 2012?</h3>
  <p>You can get account statement for periods earlier that 2012 in any branch office of the Bank.</p>

  <h3>7. What is security code?</h3>
  <p>For your convenience, instead of all requisites of a transaction you will get a short code of three (3) letters in confirming SMS. Identical code you will see on the screen in your Internet bank while confirming a transaction.</p>

  <h3>8. Where are my defined payments?</h3>
  <p>Your defined payments are in menu Payments - History.</p>

  <h3>9 How to create a defined payment?</h3>
  <p>Mark any payment in History as <b>Defined.</b>	</p>

  <h3>10. Why does Internet bank open in Russian language?</h3>
  <p>Language in Internet bank is determined by default according to the settings of your browser, but you can change it on any page of Internet bank.</p>

  <h3>11. I cannot find button <b>Refresh?</b></h3>
  <p>You can use <b>Refresh</b> button in browser instead.</p>
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