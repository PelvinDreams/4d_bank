
<?php
session_start();
if(isset($_SESSION['uid'])){
 
 
  include '../../config/database.php';
  include '../../config/config.php';
  include 'header.php';

  $msg = "";

}
else{

    header("location:../pages");
}


  $email = $_GET['email'];

if(isset($_POST['news'])){



 $message = $_POST['message'];
 
   
     // $emails = $_POST['email'];
      
 

	 $sql = "UPDATE  news SET message = '$message' WHERE  id = 1";
        if(mysqli_query($link, $sql)){
			
			$msg = "News Added!";
		}else{
			
			$msg = "News not Added!";
		}
}




    ?>




  <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><i class="fa fa-user " style="font-size:30px"></i> NEWS MANAGEMENT</h1>
           
          
          </div>


        
         

 
          <hr></hr>
          
        <?php  $em = $_SESSION['email']?>
          
            <div class="box-header with-border">
            
            <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
          </br>

     <form class="form-horizontal" action="inmessage.php?email=<?php echo  $email; ?>" method="POST" >

           <legend>Add News </legend>
		   
		  
 <div class="form-group">
      
     
		
		 <input type="hidden" name="email" value="<?php echo  $email; ?>"  class="form-control">
		
       <div class="form-group">
        <textarea placeholder="write message here" name="message" class="form-control"></textarea>
      </div>

      
      
	  
	  <button style="" type="submit" class="btn btn-primary" name="news" > <i class="fa fa-send"></i>&nbsp; Add News </button>


    </form>


    </div>
   </div>

   </div>
  </div>
  </section>
</div>

