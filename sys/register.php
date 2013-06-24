<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />

	

	<title>Student Information System - Register</title>
	

	
	</head>
<body background="admin/images/1019286_abstract_orange_tiles_background_.jpg">


<?php
//$from = ""; // Initialize the email from variable
// This code runs only if the username is posted

error_reporting(E_ALL);
if (isset ($_POST['username'])){
	 
	 $username = preg_replace('#[^A-Za-z0-9]#i', '', $_POST['username']); // filter everything but letters and numbers
     $email1 = $_POST['email1'];
     $email2 = $_POST['email2'];
     $pass1 = $_POST['pass1'];
     $pass2 = $_POST['pass2'];
	 


     $email1 = stripslashes($email1); 
     $pass1 = stripslashes($pass1); 
     $email2 = stripslashes($email2);
     $pass2 = stripslashes($pass2); 
	 
     $email1 = strip_tags($email1);
     $pass1 = strip_tags($pass1);
     $email2 = strip_tags($email2);
     $pass2 = strip_tags($pass2);

     // Connect to database
     $link=mysql_connect("localhost","root","") or die(mysql_error());
	 mysql_select_db("department",$link) or die("MySQL ERROR!");
     $emailCHecker = mysql_real_escape_string($email1);
	 $emailCHecker = str_replace("`", "", $emailCHecker);
	 // Database duplicate username check setup for use below in the error handling if else conditionals
	 $sql_uname_check = mysql_query("SELECT * FROM users WHERE username='$username'"); 
     $uname_check = mysql_num_rows($sql_uname_check);
     // Database duplicate e-mail check setup for use below in the error handling if else conditionals
     $sql_email_check = mysql_query("SELECT * FROM users WHERE email='$emailCHecker'");
     $email_check = mysql_num_rows($sql_email_check);

     // Error handling for missing data
     if ((!$username) || (!$email1) || (!$email2) || (!$pass1) || (!$pass2)) { 

     $errorMsg = 'ERROR: You did not submit the following required information:<br /><br />';
  
     if(!$username){ 
       $errorMsg .= ' * User Name<br />';
     } 
    	 if(!$email1){ 
       $errorMsg .= ' * Email Address<br />';      
     }
	 if(!$email2){ 
       $errorMsg .= ' * Confirm Email Address<br />';        
     } 	
	 if(!$pass1){ 
       $errorMsg .= ' * Login Password<br />';      
     }
	 if(!$pass2){ 
       $errorMsg .= ' * Confirm Login Password<br />';        
     } 	
	
     } else if ($email1 != $email2) {
              $errorMsg = 'ERROR: Your Email fields below do not match<br />';
     } else if ($pass1 != $pass2) {
              $errorMsg = 'ERROR: Your Password fields below do not match<br />';
     		 
     } else if (strlen($username) < 4) {
	           $errorMsg = "<u>ERROR:</u><br />Your User Name is too short. 4 - 20 characters please.<br />"; 
     } else if (strlen($username) > 20) {
	           $errorMsg = "<u>ERROR:</u><br />Your User Name is too long. 4 - 20 characters please.<br />"; 
     } else if ($uname_check > 0){ 
              $errorMsg = "<u>ERROR:</u><br />Your User Name is already in use inside of our system. Please try another.<br />"; 
     } else if ($email_check > 0){ 
              $errorMsg = "<u>ERROR:</u><br />Your Email address is already in use inside of our system. Please use another.<br />"; 
     } else { // Error handling is ended, process the data and add member to database
     ////////}
	 }
	 }////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
     $email1 = mysql_real_escape_string($email1);
     $pass1 = mysql_real_escape_string($pass1);
	 
     // Add MD5 Hash to the password variable
     $db_password = md5($pass1); 
	 


     // Add user info into the database table for the main site table
     $sql = mysql_query("INSERT INTO users (username, password,email) 
     VALUES('$username','$db_password','$email1')")
     or die (mysql_error());

?>


<table id="register-form" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="738" valign="top">

        <h2>Create Your Account </h2>

      <table width="600" align="center" cellpadding="8" cellspacing="0" style="border:#999 1px solid; background-color:#FBFBFB;">
        <form action="register.php" method="post" enctype="multipart/form-data">
          <tr>
          <br />
            <td colspan="2"><font color="#FF0000"><?php print "$errorMsg"; ?></font></td>
          </tr>       
          <tr>
            <td width="114" bgcolor="#FFFFFF">User Name:<span class="brightRed"> *</span></td>
            <td width="452" bgcolor="#FFFFFF"><input name="username" type="text" class="formFields" id="username" value="<?php print "$username"; ?>" size="32" maxlength="20" />
              <span id="nameresponse"><span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></span></td>
          </tr>
                    
          <tr>
            <td bgcolor="#EFEFEF">Email Address: <span class="brightRed">*</span></td>
            <td bgcolor="#EFEFEF"><input name="email1" type="text" class="formFields" id="email1" value="<?php print "$email1"; ?>" size="32" maxlength="48" /></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">Confirm Email:<span class="brightRed"> *</span></td>
            <td bgcolor="#FFFFFF"><input name="email2" type="text" class="formFields" id="email2" value="<?php print "$email2"; ?>" size="32" maxlength="48" /></td>
          </tr>
          <tr>
            <td bgcolor="#EFEFEF">Create Password:<span class="brightRed"> *</span></td>
            <td bgcolor="#EFEFEF"><input name="pass1" type="password" class="formFields" id="pass1" size="32" maxlength="16" />
              <span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">Confirm Password:<span class="brightRed"> *</span></td>
            <td bgcolor="#FFFFFF"><input name="pass2" type="password" class="formFields" id="pass2" size="32" maxlength="16" />
            <span class="textSize_9px"><span class="greyColor">Alphanumeric Characters Only</span></span></td>
          </tr>
         
          <tr>
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF"><p><br />
              <input type="submit" name="Submit" value="Sign Up!" />
            </p></td>
          </tr>
        </form>
      </table>
      <br />
      <br /></td>

  </tr>
</table>


</body>
</html>


