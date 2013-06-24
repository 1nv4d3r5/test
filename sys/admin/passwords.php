<?php 
session_start(); /// initialize session 
include("passwords.php"); 
check_logged(); /// function checks if visitor is logged. 
If user is not logged the user is redirected to login.php page  
?> 
  
your page code goes here


<?php 
$USERS["username1"] = "password1"; 
$USERS["username2"] = "password2"; 
$USERS["username3"] = "password3"; 
  
function check_logged(){ 
     global $_SESSION, $USERS; 
     if (!array_key_exists($_SESSION["logged"],$USERS)) { 
          header("Location: login.php"); 
     }; 
}; 
?>
