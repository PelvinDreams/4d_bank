<?php   
session_start();
include '../config/database.php';
include '../config/config.php';


session_destroy();

	  header("location:../../index.php");
exit();
?>