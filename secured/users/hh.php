<?php


if(isset($_SESSION['uid'])){
 
 


  
 
}
else{

    header("location:index.php");
}


?>


    
    <script>
         setTimeout(function(){
            window.location.href = 'logout.php';
         }, 1000000);
      </script>
    




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $title;?></title>

  <!-- General CSS Files -->
  
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>







<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            
            
            
            <li><div class="" data-placement="right" >
                 <img src="../admin/pages/logo/<?php echo $logo;?>" style="max-height:60px; " width="80" height="40" alt="" />
                 </div></li>
          </ul>
         
          
          
          
        </form>
        <ul class="navbar-nav navbar-right">
         
               
          <li class="">
            <div id="google_translate_element" style="margin-left:2%">

</div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


            
          </li>
        </ul>
      </nav>




      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
           <img src="uploads/<?php echo $row['pics'];?>" style="border-radius:50%;max-height:60px" alt="" width="100" height="100" /> 
                                            
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php"> <img src="uploads/<?php echo $row['pics'];?>" style="border-radius:50%;max-height:30px" alt="" width="30" height="30" />  </a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header"><?php echo $row['fname']. ' ' . $row['lname'] ?></li>
              <li class="nav-item dropdown active">
                  
                  
                <a href="home.php" class="nav-link "><i class="fas fa-home"></i><span>Overview</span></a>
                 </li>
                
                    
              
              
              
              
              
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>My Account</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="details.php">Profile</a></li>
                  <li><a class="nav-link" href="statement.php">Account Statement</a></li>
                   <li><a class="nav-link" href="cpassword.php">Change Password</a></li>
                    <li><a class="nav-link" href="cpin.php">Change Pin</a></li>
                    </ul>
              </li>
              
              
              


 <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Payment</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="local.php">Domestic Transfer</a></li>
                  <li><a class="nav-link" href="international.php">International Transfer</a></li>
                   <li><a class="nav-link" href="payment.php">Payment History</a></li>
                    </ul>
              </li>
              

              
                <li >
                <a href="card.php" class="nav-link "><i class="fas fa-th"></i> <span>Cards</span></a>
                
              </li>
              
              
              
              
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Loan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="loan.php">Loan Application</a></li>
                  <li><a class="nav-link" href="sloan.php">Loan Status</a></li>
                  
                    </ul>
              </li>
              
              
           
              
               <li >
                <a href="message.php" class="nav-link "><i class="fas fa-th"></i> <span>Message</span></a>
                
              </li>
              
           
              
              <li >
                <a href="btc.php" class="nav-link "><i class="fas fa-comment"></i> <span>Btc Deposit </span></a>
                
              </li>
              

              <li><a class="nav-link" href="faq.php"><i class="fas fa-pencil-ruler"></i> <span>Faq</span></a></li>

              <li><a class="nav-link" href="logout.php"><i class="fa fa-user"></i> <span>Log-Out</span></a></li>
             
              

               
               
             
             
              </ul>

           
        </aside>
      </div>



     











  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>

  <!-- JS Libraies -->


  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/index-0.js"></script>
</body>




</html>
