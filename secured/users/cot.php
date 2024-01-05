<?php
session_start();

$userinfo = array(
                '548410'=>'password1',
                'user2'=>'password2'
                );

if(isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}

if(isset($_POST['username'])) {
    if($userinfo[$_POST['username']] == $_POST['password']) {
        $_SESSION['username'] = $_POST['username'];
    }else {
        //Invalid Login
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <title>Login</title>
</head>
<body>
<?php if($_SESSION['username']): ?>
<p><a href="tax.php">&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; <span
 style="color: rgb(0, 102, 0); font-weight: bold;">&nbsp;</span></a></p>
<p><a href="transfer.php"><span
 style="color: rgb(0, 102, 0); font-weight: bold;">&nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp;COT CODE WAS ENTERED SUCCESSFULLY</span> <big
 style="color: rgb(204, 0, 0);"><span
 style="font-weight: bold;">CLICK HERE</span></big><span
 style="font-weight: bold;"> <span
 style="color: rgb(0, 102, 0);">TO COMPLETE FIRST TRANSFER</span></span></a></p>
</body>
</html>               
<?php endif; ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <style type="text/css">
a {text-decoration: none; }
  </style>
  <link rel="shortcut icon" href="../images/favicon.bmp">
  <meta content="text/html; charset=ISO-8859-1"
 http-equiv="content-type">
  <title>ONLINE ACCOUNT</title>
</head>
<body
 style="background-color: rgb(204, 204, 204); color: rgb(0, 0, 0);"
 alink="#ee0000" link="#0000ee" vlink="#551a8b">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;
<div id="warpper"
 style="margin: 0px auto; width: 990px; color: rgb(51, 51, 51); font-family: Verdana,helvetica,sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: rgb(204, 204, 204);">
<div id="menuContainer"
 style="font-style: normal; font-variant: normal; font-weight: normal; font-size: 12px; line-height: normal; font-family: Verdana,Arial,Helvetica,sans-serif; color: rgb(0, 0, 0); margin-top: 0px;">
<ul class="menu"
 style="margin: 0px; padding: 0px; list-style-type: none;">
  <li
 style="margin: 0px 2px 0px 10px; padding: 0px; list-style-type: none; position: relative; text-align: center; float: left; background-image: none; background-position: 100% 0%; color: rgb(51, 51, 255);"><a
 href="index.php"><span class="firstTab activeLink"
 style="padding: 0px 25px; margin-left: 10px; text-decoration: none; line-height: 30px; height: 31px; z-index: 302; background-image: url(); font-weight: bold; background-position: 100% 0%;">My
Accounts</span></a></li>
  <li
 style="margin: 0px 2px 0px 0px; padding: 0px; list-style-type: none; position: relative; text-align: center; float: left; background-image: none;"><a
 style="font-weight: bold;" href="added_service.php"><span
 class="hiddenText"
 style="position: absolute; left: 0px; top: 0px; font-size: 1px; line-height: 0px; height: 0px; width: 0px; overflow: hidden;"></span></a><a
 href="../login.php"><span class="lastTab"
 style="padding: 0px 25px; color: rgb(7, 77, 141); text-decoration: none; line-height: 30px; height: 31px; z-index: 302;"><span
 style="font-weight: bold;">Log-out</span></span></a></li>
</ul>
<a name="skipmegamenu" class="hiddenText" tabindex="0"
 style="position: absolute; left: 0px; top: 0px; font-size: 1px; line-height: 0px; height: 0px; width: 0px; overflow: hidden;"></a></div>
<div id="container"
 style="border: 4px solid rgb(52, 111, 171); width: 982px; background-image: url(presents/preview/pnt/images/bkg_container.gif); background-color: rgb(245, 245, 245); padding-bottom: 5px; float: left; margin-top: -2px; background-position: 0% 50%;">
<div class="branding seg-todays-date"
 style="margin: 4px 10px 0px 0px; text-align: right; color: rgb(88, 88, 88); font-family: verdana; font-size: 10px;"><span><span
 class="Apple-converted-space">&nbsp;</span>&nbsp;&nbsp;&nbsp;</span></div>
<div id="content"
 style="margin: 5px 10px 10px; background-color: rgb(255, 255, 255);">
<div id="loadtpl"><br>
<table summary="Progress indicator" class="progressBar"
 style="margin-left: 25px; width: 788px; height: 31px;"
 border="0" cellpadding="0" cellspacing="2">
  <tbody>
    <tr>
      <td class="stepTextOff"
 title="Step one of four has been completed."
 style="padding: 3px 15px; color: rgb(102, 102, 102); font-size: 11px; background-color: rgb(204, 255, 255);"
 align="center">Transfer destination<img src="spacer.gif"
 alt="Step one of four has been completed."
 title="Step one of four has been completed."
 style="border: 0px none ;" border="0" height="1"
 width="1"></td>
      <td class="stepTextOff"
 title="Step two of four has been completed."
 style="padding: 3px 15px; color: rgb(102, 102, 102); font-size: 11px; background-color: rgb(204, 255, 255);"
 align="center">Information<img src="spacer.gif"
 alt="Step two of four has been completed."
 title="Step two of four has been completed."
 style="border: 0px none ;" border="0" height="1"
 width="1"></td>
      <td class="stepTextOn"
 title="You are on step three of four."
 style="padding: 3px 15px; color: rgb(0, 0, 0); font-size: 11px; font-weight: bold; background-color: rgb(255, 204, 153);"
 align="center">Verify<img src="spacer.gif"
 alt="You are step three of four."
 title="You are on step three of four."
 style="border: 0px none ;" border="0" height="1"
 width="1"></td>
      <td class="stepTextOff"
 title="Step four of four has not been completed."
 style="padding: 3px 15px; color: rgb(102, 102, 102); font-size: 11px; background-color: rgb(204, 255, 255);"
 align="center">Confirmation<img src="spacer.gif"
 alt="Step four of four has not been completed."
 title="Step four of four has not been completed."
 style="border: 0px none ;" border="0" height="1"
 width="1"></td>
    </tr>
  </tbody>
</table>
<br>
<span style="font-weight: bold; color: rgb(0, 153, 0);"></span><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; <span
 class="alertText"
 style="color: rgb(153, 0, 0); font-size: 1.2em; font-weight: bold;"><span
 style="color: rgb(0, 102, 0);"></span></span>&nbsp;<strong><php
 title="echo $row_rsAcc['Firstname']; "
 xmlns="http://disruptive-innovations.com/zoo/nvu"> &nbsp;</php></strong><strong><php
 title="echo $row_rsAcc['Firstname']; "
 xmlns="http://disruptive-innovations.com/zoo/nvu"><php
 title="echo $row_rsAcc['Firstname']; "
 xmlns="http://disruptive-innovations.com/zoo/nvu"></php></php></strong><strong><php
 title="echo $row_rsAcc['Lastname']; "
 xmlns="http://disruptive-innovations.com/zoo/nvu">&nbsp;<php
 title="echo $row_rsAcc['Lastname']; "
 xmlns="http://disruptive-innovations.com/zoo/nvu"></php></php></strong>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
<table class="instrTextTable" summary="instructional text"
 style="margin-left: 10px; margin-top: 18px; width: 888px; height: 130px;"
 border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td class="instrTextArea"
 style="padding-left: 15px; padding-right: 15px; background-color: rgb(255, 204, 153);"><span
 class="alertText"
 style="color: rgb(153, 0, 0); font-size: 1.2em; font-weight: bold;"><br>
      <br>
      </span>
      <div style="margin-left: 40px;"><big><span
 class="alertText"
 style="color: rgb(153, 0, 0); font-size: 1.2em; font-weight: bold;">Almost
finished!&nbsp;</span><span style="font-style: italic;">Please
enter your SIX digit cost of Transfer pin below to complete first
transfer</span></big><br>
      <br>
      <br>
      <font style="font-weight: bold;" color="#008080"
 size="2"> <a =""><font color="#008080"
 size="2"><span style=""></span></font></a><font
 style="font-weight: bold;" color="#008080" size="2"><a
 href="javascript:void(0)"
 onclick="window.open
('/en/contact.html', 'MyPopUp', 'width=550,height=500,toolbar=0,scrollbars=1,screenX=200,screenY=100,left=200,top=100')"><font
 color="#008080">&nbsp;<span
 style="text-decoration: none;">CLICK HERE TO REQUEST AND
OBTAIN COT CODE FROM BANK</span></font></a>
      </font></font></div>
      <br>
      </td>
    </tr>
  </tbody>
</table>
<span class="style6"><span
 style="font-weight: bold; color: rgb(0, 0, 102);"></span></span><br>
<div style="margin-left: 40px;"><br>
</div>
<form name="login" action="" method="post">
  <table style="width: 737px; height: 49px;" border="0">
    <tbody>
      <tr>
        <td style="background-color: rgb(204, 204, 204);"
 width="89"><span class="style8"><span
 style="font-weight: bold;">&nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <big
 style="color: rgb(153, 0, 0);">&nbsp;
&nbsp;&nbsp;COT</big><span
 style="color: rgb(153, 0, 0);"> </span><br>
&nbsp;&nbsp; &nbsp;
&nbsp; &nbsp;&nbsp;</span> </span></td>
        <td style="background-color: rgb(204, 204, 204);"
 width="225"><input name="username" id="cot"
 required="" type="password"></td>
      </tr>
      <input name="password" value="password1"
 type="hidden"><br>
    </tbody>
  </table>
  <br>
  <div style="margin-left: 200px;"><span class="style6"><input
 name="Submit" value="Confirm Transaction" type="submit"></span><img
 style="width: 12px; height: 15px;" alt="" src="lock.gif"><br>
  </div>
  <div style="margin-left: 800px;"><br>
  </div>
  <br>
  <br>
</form>
</div>
</div>
<div class="footer" id="pageFooter"
 style="margin: 10px; padding: 16px 0px 10px; clear: both; font-style: normal; font-variant: normal; font-weight: normal; font-size: 11px; line-height: normal; font-family: Verdana;"><span
 class="footerEqOp"
 style="display: block; float: left; width: 320px;"><br>
</span></div>
</div>
</div>
<br>
</body>
</html>