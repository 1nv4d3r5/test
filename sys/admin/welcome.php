<?php
$username =$_GET['uname'];
$password =$_GET['password'];
if(is set($username)&&is set($password))
{
echo"welcome". $username;
}
else
{
echo "welcome guest",
}

?>
