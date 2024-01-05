<?php
error_reporting(0);
session_start();
require('accounts/db/index.php');
$u_id=$_SESSION['usr_id'];
$sel_query="Select * from accounts WHERE usr_id LIKE '$u_id' ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
if ($row = mysqli_fetch_assoc($result)) {

 ?>

<?php
$u_pin=$row["account_pin"];
$LOGIN_INFORMATION = array(
  $u_pin,
);

// request login? true - show login and password boxes, false - password box only
define('USE_USERNAME', false);

// User will be redirected to this page after logout
define('LOGOUT_URL', 'http://www.example.com/');

// time out after NN minutes of inactivity. Set to 0 to not timeout
define('TIMEOUT_MINUTES', 1);

// This parameter is only useful when TIMEOUT_MINUTES is not zero
// true - timeout time from last activity, false - timeout time from login
define('TIMEOUT_CHECK_ACTIVITY', true);

// timeout in seconds
$timeout = (TIMEOUT_MINUTES == 0 ? 0 : time() + TIMEOUT_MINUTES * 60);

// logout?
if(isset($_GET['logout'])) {
  setcookie("verify", '', $timeout, '/'); // clear password;
  header('Location: ' . LOGOUT_URL);
  exit();
}

if(!function_exists('showLoginPasswordProtect')) {

// show login form
function showLoginPasswordProtect($error_msg) {
?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Account Security</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="styles/webfont.css">
  <link rel="stylesheet" href="styles/climacons-font.css">
  <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="styles/font-awesome.css">
  <link rel="stylesheet" href="styles/card.css">
  <link rel="stylesheet" href="styles/sli.css">
  <link rel="stylesheet" href="styles/animate.css">
  <link rel="stylesheet" href="styles/app.css">
  <link rel="stylesheet" href="styles/app.skins.css">
  <!-- endbuild -->
</head>

<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app lockscreen usersession">
    <div class="session-wrapper">
      <div class="page-height-o row-equal align-middle">
        <div class="column">
          <div class="card no-border bg-white text-center">
            <div class="card-block">
<?php
error_reporting(0);
session_start();
require('accounts/db/index.php');
$id_default="id_front.png";
$log_id=$_SESSION['usr_id'];
$sel_query="Select * from users WHERE id_front LIKE '$id_default' AND loginid LIKE '$log_id' ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
if ($row = mysqli_fetch_assoc($result)) {

 ?>
<meta http-equiv="refresh" content="0; url=accounts/home/verification.php" />
<?php } 
else {  ?>

<?php
error_reporting(0);
session_start();
require('accounts/db/index.php');
$u_id=$_SESSION['usr_id'];
$u_lock=$_SESSION['usr_lock'];
$sel_query="Select * from accounts WHERE usr_id LIKE '$u_lock' ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
if ($row = mysqli_fetch_assoc($result)) {

 ?>
 <?php echo $error_msg; ?>
              <div class="text-center">
                <div class="lockscreen-avatar">
                  <img src="images/pin.png" alt="" class="avatar avatar-lg img-circle">
                </div>
                <h4 class="card-title">Enter PIN for Account: <?php echo $row["account_no"]; ?></h4>
                <p class="card-text">PIN [4-6 Digits]</p>
              </div>
              <div class="center-block lockcode">
                <form role="form" method="post">
                  <div class="input-group m-y">
                    <input name="access_password" type="password" class="form-control lock-input" id="password" placeholder="enter PIN code" required>
                    <span class="input-group-btn">
                      <button name="Submit" class="btn btn-danger" type="submit">
                      <i class="icon-lock"></i>
                      Validate
                      </button>
                      </span>
                  </div>
                </form>				
              </div>
<?php } 
else {  ?>
<img src="accounts/home/assets/img/logo.png" width="149px" height="50px" />
<br/><br/><br/><br/>

<span class='alert alert-warning alert-dismissable'>
  <strong>Account on hold. Pending manual review.</strong></span>
  <br/><br/><br/><br/>
  
  <a href="logout.php" ><strong>Close</strong></a>
<?php
}
?>

<?php
}
?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- bottom footer -->
    <footer class="session-footer">
      <nav class="footer-right">
        <ul class="nav">
          <li>
            <a href="javascript:;">Feedback</a>
          </li>
          <li>
            <a href="javascript:;" class="scroll-up">
              <i class="fa fa-angle-up"></i>
            </a>
          </li>
        </ul>
      </nav>
      <nav class="footer-left hidden-xs">
        <ul class="nav">
          <li>
            <a href="help.php">Help</a>
          </li>
        </ul>
      </nav>
    </footer>
    <!-- /bottom footer -->
  </div>
  <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="scripts/helpers/modernizr.js"></script>
  <script src="vendor/jquery/dist/jquery.js"></script>
  <script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
  <script src="vendor/fastclick/lib/fastclick.js"></script>
  <script src="vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="scripts/helpers/smartresize.js"></script>
  <script src="scripts/constants.js"></script>
  <script src="scripts/main.js"></script>
  <!-- endbuild -->
</body>

</html>
<?php
  // stop at this point
  die();
}
}

// user provided password
if (isset($_POST['access_password'])) {

  $login = isset($_POST['access_login']) ? $_POST['access_login'] : '';
  $pass = $_POST['access_password'];
  if (!USE_USERNAME && !in_array($pass, $LOGIN_INFORMATION)
  || (USE_USERNAME && ( !array_key_exists($login, $LOGIN_INFORMATION) || $LOGIN_INFORMATION[$login] != $pass ) ) 
  ) {
    showLoginPasswordProtect("<div class='alert alert-danger'>
  <strong>Incorrect PIN! Please try again.</strong></div>");
  }
  else {
    // set cookie if password was validated
    setcookie("verify", md5($login.'%'.$pass), $timeout, '/');
    
    // Some programs (like Form1 Bilder) check $_POST array to see if parameters passed
    // So need to clear password protector variables
    unset($_POST['access_login']);
    unset($_POST['access_password']);
    unset($_POST['Submit']);
  }

}

else {

  // check if password cookie is set
  if (!isset($_COOKIE['verify'])) {
    showLoginPasswordProtect("");
  }

  // check if cookie is good
  $found = false;
  foreach($LOGIN_INFORMATION as $key=>$val) {
    $lp = (USE_USERNAME ? $key : '') .'%'.$val;
    if ($_COOKIE['verify'] == md5($lp)) {
      $found = true;
      // prolong timeout
      if (TIMEOUT_CHECK_ACTIVITY) {
        setcookie("verify", md5($lp), $timeout, '/');
      }
      break;
    }
  }
  if (!$found) {
    showLoginPasswordProtect("");
  }

}

?>
<?php } 
else {  ?>
<meta http-equiv="refresh" content="0; url=accounts/home/" />
<?php
}
?>
<?php
// Auto redirect below must be removed when used in the maain home directory
?>
<meta http-equiv="refresh" content="0; url=accounts/home/" />