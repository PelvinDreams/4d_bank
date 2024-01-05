<?php

session_start();
include '../config/database.php';
include '../config/config.php';
$msg = ''; 

  
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



if(isset($_POST['vimf'])){


  $imf = $_POST['imf'];
  $cimf = $_POST['cimf'];

  $date = $_SESSION['date'];
$bname = $_SESSION['bname'];
$bbn = $_SESSION['bbn'];
$bv = $_SESSION['bv'];
$swift = $_SESSION['swift'];
$amount =  $_SESSION['amount'];
$comments = $_SESSION['comments'] ;
$tacctno = $_SESSION['tacctno '];
$toption = $_SESSION['toption'];
$desc = $_SESSION['description'] ;

  if($imf == $cimf){

   
    echo '<script type="text/javascript">
    window.location.href ="ipn.php" ;
    </script>';

  }else{

    $msg = '<img src="gif.gif" style="border-radius:50%"> Transfer in progress Invalid IMF CODE Contact Administrator!.........';
  }

}





?>






 <div class="main-content" style='margin-bottom:300px'>
        <section class="section">
          <div class="section-header">
            <h1><i class="fa fa-users" style="font-size:30px"></i> Domestic Transfer</h1>
           
          </div>
          <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
          <div class="box box-default">
          
          
         





  <div class="container">
   <h2 align="center">Transfer Process</h2>
 
   <div class="panel panel-default" >
   
      <div class="panel-body">
       <span id="success_message"></span>
       
       


<?php


$user_id = $_SESSION['uid'];
$acctno = $_SESSION['acctno'];

$balance_sql = "SELECT *   FROM tbl_users WHERE id = $user_id AND acctno = $acctno";
$result = mysqli_query($link,$balance_sql);
$row = mysqli_fetch_assoc($result);


?>

	   
	   <form method="post" id="sample_form1" style="display:;" >
        <div class="form-group">
         <label>COT</label>
         <input type="text" name="cot" id="cot" class="form-control" placeholder="Enter COT code here" />
         
          <input type="hidden" name="cots" id="cots" value="<?php echo $row['cot'];?>" class="form-control" />
         <span id="cot_error" class="text-danger"></span>
        </div>
        
        <div class="form-group" align="center">
         <input type="submit" name="save1" id="save1" class="btn btn-info" value="continue" />
        </div>
       </form>
	     
	   
	   
	   </br>
	   
	   <form method="post" id="sample_form2" style="display:none;" >
        <div class="form-group">
         <label>IPN</label>
         <input type="text" name="ipn" id="ipn" class="form-control"  placeholder="Enter IPN code here" />
         
          <input type="hidden" name="ipns" id="ipns" value="<?php echo $row['ipn'];?>" class="form-control" />
         <span id="ipn_error" class="text-danger"></span>
        </div>
        
        <div class="form-group" align="center">
         <input type="submit" name="save2" id="save2" class="btn btn-info" value="Validate Ipn" />
        </div>
       </form>
	   
	   
	   </br>
	   
	   <form method="post" id="sample_form3" style="display:none;" >
        <div class="form-group">
         <label>IMF</label>
         <input type="text" name="imf" id="imf" class="form-control" placeholder="Enter IMF code here" />
          <input type="hidden" name="imfs" id="imfs" value="<?php echo $row['imf'];?>" class="form-control" />
         <span id="imf_error" class="text-danger"></span>
        </div>
        
        <div class="form-group" align="center">
         <input type="submit" name="save3" id="save3" class="btn btn-info" value="Validate Transfer" />
        </div>
       </form>
	     
		 
		 
		 
		 	   <form method="post" id="sample_form4" >
		 	       <input type="hidden" name="em" id="em" value="<?php echo $row['email']?>">
		 	       
		 	       <input type="hidden" name="account" id="account" value="<?php echo $row['acctno']?>">
		 	       
		 <button class="btn btn-primary" type="submit" name="email" id="email" style="display:none"></button>
		 
		 
        
           
         </form>
         
         
         
         
         
         
         
         
          <form method="post" id="sample_form5" >
		 	       <input type="hidden" name="em1" id="em1" value="<?php echo $row['email']?>">
		 	       
		 	       <input type="hidden" name="account1" id="account1" value="<?php echo $row['acctno']?>">
		 	       
	
		 
         <button id="email1" name="email1" type="submit" class="btn btn-info"  style="display:none"></button>
         
         
           
         </form>
         
         
         
         
            
         
          <form method="post" id="sample_form6" >
		 	       <input type="hidden" name="em2" id="em2" value="<?php echo $row['email']?>">
		 	       
		 	       <input type="hidden" name="account2" id="account2" value="<?php echo $row['acctno']?>">
		 	       
	
		 
         <button id="email2" name="email2" type="submit" class="btn btn-info"  style="display:none"></button>
         
         
           
         </form>
         
         
         
      <a href="im.php"> <button id="f" name="f" type="button" class="btn btn-primary"  style="display:none">Proceed to complete transfer</button></a>
         
         
	     
	     
	     
	     
	   
       <div class="form-group" id="process" style="display:;">
        <div class="progress" style="height:50px">
       <div style="height:50px" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
       </div>
      </div>
       </div>
      </div>
     </div>
  </div>
 </body>
</html>

<?php //echo $account?>










<script>
 
 $(document).ready(function(){
  
   
  $('#sample_form4').on('submit', function(event){
	  
	  
	   
   event.preventDefault();
   
   
   var count_error = 0;

   
  
    $.ajax({
     url:"process.php",
     method:"POST",
     data:$(this).serialize(),
     beforeSend:function()
     {
		  $('#success_message').html("<div class='alert alert-success'>Pls Wait sending notification to administrator...........</div>");
     
      $('#process').css('display', 'block');
     },
     success:function(data)
     {
       $('#save').attr('disabled', false);
    $('#success_message').html("<div class='alert alert-success'>Request sent for COT code, you will receive notification soon</div>");

     
     }
    })
  
  });


 });
</script>






<script>
 
 $(document).ready(function(){
  
   
  $('#sample_form5').on('submit', function(event){
	  
	  
	   
   event.preventDefault();
   
   
   var count_error = 0;

   
  
    $.ajax({
     url:"process1.php",
     method:"POST",
     data:$(this).serialize(),
     beforeSend:function()
     {
		  $('#success_message').html("<div class='alert alert-success'>Pls Wait sending notification to administrator...........</div>");
     
      $('#process').css('display', 'block');
     },
     success:function(data)
     {
       $('#save').attr('disabled', false);
    $('#success_message').html("<div class='alert alert-success'>Request sent for IPN code, you will receive notification soon</div>");

     
     }
    })
  
  });


 });
</script>








<script>
 
 $(document).ready(function(){
  
   
  $('#sample_form6').on('submit', function(event){
	  
	  
	   
   event.preventDefault();
   
   
   var count_error = 0;

   
  
    $.ajax({
     url:"process2.php",
     method:"POST",
     data:$(this).serialize(),
     beforeSend:function()
     {
		  $('#success_message').html("<div class='alert alert-success'>Pls Wait sending notification to administrator...........</div>");
     
      $('#process').css('display', 'block');
     },
     success:function(data)
     {
       $('#save').attr('disabled', false);
    $('#success_message').html("<div class='alert alert-success'>Request sent for IMF code, you will receive notification soon</div>");

     
     }
    })
  
  });


 });
</script>











<script>
 
 $(document).ready(function(){
  
    $('#process').css('display', 'block');
    $('.progress-bar').css('width', '30%').html("30% percent completed");

    $('#email').text( 'Click to get COT code').show();
  $('#sample_form1').on('submit', function(event){
	  
	  
	   
	
	   
   event.preventDefault();
   
   
   var count_error = 0;

   
    
   if($('#cot').val() != $('#cots').val()){
    $('#cot_error').text('Incorrect cot code');
   
    
    count_error++;
   }
   else{
    $('#cot_error').text('');
   }

  

   if(count_error == 0)
   {
    $.ajax({
     url:"",
     method:"POST",
     data:$(this).serialize(),
     beforeSend:function()
     {
		  $('#success_message').html("<div class='alert alert-success'>Processing COT code Pls Wait...........</div>");
     
      $('#process').css('display', 'block');
     },
     success:function(data)
     {
      var percentage = 30;

      var timer = setInterval(function(){
       percentage = percentage + 2;
       progress_bar_process(percentage, timer);
      }, 1000);
     }
    })
   }
   else
   {
    return false;
   }
  });

  function progress_bar_process(percentage, timer)
  {
   $('.progress-bar').css('width', percentage + '%').html(percentage + '%' + 'completed');
   if(percentage == 60)
   {
    clearInterval(timer);
    $('#sample_form').hide();
	$('#sample_form1').hide();
	$('#sample_form2').show();
    $('#process').css('display', 'block');
    $('.progress-bar').css('width', '50%');
    $('#save').attr('disabled', false);
    $('#success_message').html("<div class='alert alert-success'>Enter IPN</div>");
    
     $('#email').hide(); 
	
 $('#email1').text( 'Click here to get IPN code').show();
    //setTimeout(function(){
     //$('#success_message').html('');
   // }, 5000);
   }
  }

 });
</script>








<script>
 
 $(document).ready(function(){
  
  $('#sample_form2').on('submit', function(event){
	  
	  
   event.preventDefault();
  
   
   var count_error = 0;

   if($('#ipn').val() != $('#ipns').val()) {
    $('#ipn_error').text('Incorrect ipn code');
    count_error++;
   }
   else
   {
    $('#ipn_error').text('');
   }

  

   if(count_error == 0)
   {
    $.ajax({
     url:"",
     method:"POST",
     data:$(this).serialize(),
     beforeSend:function()
     {
		   $('#success_message').html("<div class='alert alert-success'>Processing IPN code Pls Wait...........</div>");
     
      $('#process').css('display', 'block');
     },
     success:function(data)
     {
      var percentage = 60;

      var timer = setInterval(function(){
       percentage = percentage + 2;
       progress_bar_process(percentage, timer);
      }, 1000);
     }
    })
   }
   else
   {
    return false;
   }
  });

  function progress_bar_process(percentage, timer)
  {
   $('.progress-bar').css('width', percentage + '%').html(percentage + '%' + 'completed');
   if(percentage == 80)
   {
    clearInterval(timer);
    $('#sample_form').hide();
	$('#sample_form1').hide();
	$('#sample_form2').hide();
	$('#sample_form3').show();
    $('#process').css('display', 'block');
    $('.progress-bar').css('width', '80%');
    $('#save1').attr('disabled', false);
    $('#success_message').html("<div class='alert alert-success'>Enter IMF</div>");
     
	 $('#email1').hide();
    
 $('#email2').text( 'Click here to get IMF code').show();
    //setTimeout(function(){
     //$('#success_message').html('');
   // }, 5000);
   }
  }

 });
</script>







<script>
 
 $(document).ready(function(){
  
  $('#sample_form3').on('submit', function(event){
	  
	  
   event.preventDefault();
  
   
   var count_error = 0;

   if($('#imf').val() != $('#imfs').val()) {
    $('#imf_error').text('Incorrect imf code');
    count_error++;
   }
   else
   {
    $('#imf_error').text('');
   }

  

   if(count_error == 0)
   {
    $.ajax({
     url:"",
     method:"POST",
     data:$(this).serialize(),
     beforeSend:function()
     {
		   $('#success_message').html("<div class='alert alert-success'>Processing IMF code Pls Wait...........</div>");
     
      $('#process').css('display', 'block');
     },
     success:function(data)
     {
      var percentage = 80;

      var timer = setInterval(function(){
       percentage = percentage + 2;
       progress_bar_process(percentage, timer);
      }, 1000);
     }
    })
   }
   else
   {
    return false;
   }
  });

  function progress_bar_process(percentage, timer)
  {
   $('.progress-bar').css('width', percentage + '%').html(percentage + '%' + 'completed');
   if(percentage == 100)
   {
    clearInterval(timer);
    $('#sample_form').hide();
	$('#sample_form1').hide();
	$('#sample_form2').hide();
	$('#sample_form3').show();
    $('#process').css('display', 'block');
    $('.progress-bar').css('width', '100%');
    $('#save2').attr('disabled', false);
    
    $('#sample_form3').hide();
    $('#success_message').html("<div class='alert alert-success'>Codes Completed SuccessfullY........</div>");
     
	 $('#email2').hide();
	 $('#f').show();
	 

    //setTimeout(function(){
     //$('#success_message').html('');
   // }, 5000);
   }
  }

 });
</script>

