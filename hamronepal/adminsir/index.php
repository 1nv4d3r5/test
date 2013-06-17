<?php
/* session_start();
if(isset($_SESSION['msg']))
	{
	$mymsg=$_SESSION['msg'];
	$_SESSION['msg']="";
	}
else
	{
	session_start();
	}*/
?>


<html>
<head>
<title>Admin Panel</title>
</head>
<link href="css/style.css" rel="stylesheet" type="text/css">
<body >
<form name="galleryform" method="post" action="login.php" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="50" cellpadding="50">
      <tr>
        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="50" cellpadding="50">
            <tr>
              <td align="center" valign="middle">
			  <?php 
			 
			  	echo("<span class=\"messagetd\">".$mymsg."</span>");
				
			  ?>
			 
			    <table width="300" border="0" cellpadding="0" cellspacing="0" class="dataTable">
                  <tr>
                    <th colspan="2" align="left" class="th"> Administrator's Login </th>
                  </tr>
                  
                  <tr valign="top" class="whiteTd">
                    <td align="right" class="blanktd"> User Name:</td>
                    <td align="left"><input name="txtuser" type="text" class="cbomedium" id="txtuser" ></td>
                  </tr>
                  <tr valign="top" class="fadeTd">
                    <td align="right" class="blanktd">Password:</td>
                    <td align="left"><input name="txtpass" type="password" class="cbomedium" id="txtpass"></td>
                  </tr>
                  <tr align="center" valign="top">
                    <th align="right" class="th"></th>
                    <th align="left" class="th"><input type="submit" name="login" value="Login &raquo;" class="button"/></th>
                  </tr>
                </table>
			    </td>
            </tr>
          </table></td>
      </tr>
    </table>
  </form>
</center>
</body>
</html>