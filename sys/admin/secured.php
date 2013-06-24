<?php 
session_start(); /// initialize session 
include("passwords.php"); 
check_logged(); /// function checks if visitor is logged. 
If user is not logged the user is redirected to login.php page  
?> 
  
your page code goes here


<?php
//always start session
session_start();

//lets look to see if form has been submitted with a field "username"
if(isset($_POST['username'])){ 
//you can change the username and password value here...

 if(($_POST['username'] == "admin") && ($_POST['password'] == "adminpass")){
  //if username and passwords match then create session called "secured"
  $_SESSION['secured'] = "Secured";
 }else{
// if the values don't match... show error message

  echo "Oop! Looks like the username and password is not what I'm looking for, sorry you can't continue :( <p>
  <a href='?'>Lets try that again...</a>";
 }
}
//done creating session. 
 
//if there IS NO sessions called "secured"
if(!isset($_SESSION['secured'])){
//then display a simple form
//feel free to customize your form nicely :)
echo "<form method='post'>
Username: <input type='text' name='username' maxlength='10' /><br>
Password: <input type='password' name='password' maxlength='10' /><br>
<input type='submit' value='login' />
</form>";
}else{
//else if the session is created... show me the HTML page :)
?>
 

 
<html>
<head>
<title>Session Login</title>
</head>
<body>
<p>You have been successfully logged in :)... now lets add some content in this secured page.
</p>
</body>
</html>
 
 
<?php 
}
//this closes the else statement... DONE!!!
?>
