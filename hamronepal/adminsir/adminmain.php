<?php
include("include/session.php");

?>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css">
<title> Admin Panel</title>
</head>
<body>
<center>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr valign="top">
      <td>
	  <?
	  include("include/header.php");
	  ?>
	  </td>
    </tr>
    <tr valign="top">
      <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="200" align="left" valign="top" style="background-color:#F9F9F9"><? include("include/leftmenu.php"); ?></td>
          <td align="center" style="border-left:1px solid #EFEFEF">
		  <? 
			if ((isset($mymsg)) AND (strlen($mymsg)>1))
				{
				echo("<p><span class=messagetd>".$mymsg."</span></p>");
				$mymsg="";
				}
			?>		
		 		  
		  Welcome <br />
				to<br />
            <br />
            Website Administration Panel </td>
        </tr>
      </table></td>
    </tr>
    
    <tr align="left"> 
      <td align="center"> 
        <? include("include/footer.php"); ?>      </td>
    </tr>
  </table>
</center>
	<? 
	if ((isset($mymsg)) AND (strlen($mymsg)>1))
		{
		echo'<script language="javascript">location.href="logout.php";</script>';
		}
	?>		
	</body>
	</html>