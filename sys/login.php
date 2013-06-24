<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	

	<title>Student Information System - Log In</title>
	
	
</head>
<body background="admin/images/1019286_abstract_orange_tiles_background_.jpg">


<?php
// Start Session to enable creating the session variables below when they log in
session_start();
// Force script errors and warnings to show on page in case php.ini file is set to not display them
error_reporting(E_ALL);
ini_set('display_errors', '1');

$errorMsg = '';
$username = '';
$pass = '';
$remember = '';



if (isset($_POST['username'])) {
	
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	if (isset($_POST['remember'])) {
		$remember = $_POST['remember'];
	}
	$username = stripslashes($username);
	$pass = stripslashes($pass);
	$username = strip_tags($username);
	$pass = strip_tags($pass);
	
	// error handling conditional checks go here
	if ((!$username) || (!$pass)) { 

		$errorMsg = 'Please fill in both fields';

	} else { // Error handling is complete so process the info if no errors
		include 'include/connect_to_mysql.php'; // Connect to the database
		$username = mysql_real_escape_string($username); // After we connect, we secure the string before adding to query
	    
		$pass = md5($pass); // Add MD5 Hash to the password variable they supplied after filtering it
		// Make the SQL query
        $sql = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$pass' "); 
		$login_check = mysql_num_rows($sql);
        // If login check number is greater than 0 (meaning they do exist and are activated)
		if($login_check > 0){ 
				global $login;
				$login = 1;
    			while($row = mysql_fetch_array($sql)){
					
					
					$id = $row["id"];   
					$_SESSION['id'] = $id;
					// Create the idx session var
					$_SESSION['idx'] = base64_encode("g4p3h9xfn8sq03hs2234$id");
                    // Create session var for their username
					$username = $row["username"];
					$_SESSION['username'] = $username;
					// Create session var for their email
					$useremail = $row["email"];
					$_SESSION['useremail'] = $useremail;
					// Create session var for their password
					$userpass = $row["password"];
					$_SESSION['userpass'] = $userpass;

					$_SESSION['logged']="logged";
			
    			} // close while
	
    			// Remember Me Section
    			if($remember == "yes"){
                    $encryptedID = base64_encode("g4enm2c0c4y3dn3727553$id");
    			    setcookie("idCookie", $encryptedID, time()+60*60*24*100, "/"); // Cookie set to expire in about 30 days
			        setcookie("passCookie", $pass, time()+60*60*24*100, "/"); // Cookie set to expire in about 30 days
    			} 
    			// All good they are logged in, send them to homepage then exit script
    			header('Location: ./admin/index.php'); 
    			exit();
	
		} else { // Run this code if login_check is equal to 0 meaning they do not exist
		    $errorMsg = "Incorrect login data, please try again";
		}


    } // Close else after error checks

} //Close if (isset ($_POST['uname'])){

?>

<div id="login-form">
<table width="400" align="center" cellpadding="6" style="background-color:#FFF; border:#666 1px solid;" id="login-table">
  <form action="login.php" method="post" enctype="multipart/form-data" name="signinform" id="signinform">
    <tr>
      <td width="23%" align="center"><font size="+2">Log In</font></td>
      <td width="77%"><font color="#FF0000"><?php print "$errorMsg"; ?></font></td>
    </tr>
    <tr>
      <td align="center"><strong>Username:</strong></td>
      <td><input name="username" type="text" id="username" style="width:60%;" /></td>
    </tr>
    <tr>
      <td align="center"><strong>Password:</strong></td>
      <td><input name="pass" type="password" id="pass" maxlength="24" style="width:60%;"/></td>
    </tr>
  <tr>
      <td align="right">&nbsp;</td>
      <td><input name="remember" type="checkbox" id="remember" value="yes" checked="checked" />
        Remember Me</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="myButton" type="submit" id="myButton" value="Sign In" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr>
      <td colspan="2" align="center">Need an Account? <a href="register.php">Click Here</a><br />        <br /></td>
      
    </tr>
  </form>
  
</table>
<br />
<br />
<br />

<br />
<br />
<br />
</div>


</body>



</html>