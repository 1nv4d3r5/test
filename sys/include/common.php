<?php


function check_logged(){ 
     global $_SESSION, $username; 
     if (!array_key_exists($_SESSION["logged"],$username)) { 
          header("Location: login.php"); 
     }; 
};

?>