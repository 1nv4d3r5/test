<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control Panel :: Student Information Panel:: Institute of Information Technology, BZU</title>
<style type="text/css">
<!--
.heading {
	color: #F90;
	font-family: "Comic Sans MS", cursive;
}
.options {
	font-family: "Comic Sans MS", cursive;
	font-size: 16px;
	font-style: oblique;
	color: #F93;
}
-->
</style>
</head>

<body background="images/1019286_abstract_orange_tiles_background_.jpg">

<br />
<br />
<br />
<table align="center" cellpadding="0" bgcolor="#FFFFFF" width="800" border="0">
  <tr>
    <td><h1 align="center" class="heading"><img src="images/cooltext457948700.png" width="747" height="58" alt="Welcome to Admin Panel" /></h1>
  <p align="center">
    <?php 
	 	 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
	 mysql_select_db("department",$link) or die ("Cannot select the database!");
	 $query="SELECT * FROM students";
		
		  $resource=mysql_query($query,$link);
		  echo "
		<table align=\"center\" border=\"0\" width=\"70%\">
		<tr>
		<td><b>Name</b></td> <td><b>Roll No.</b></td><td><b>Reg No.</b></td><td><b>Deparment</b></td><td><b>Action</b></td></tr> ";
while($result=mysql_fetch_array($resource))
	{ 
	echo "<tr><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[3]."</td><td>".$result[4]."</td><td>
	<a href=\"modify2.php?id=".$result[0]."\"><img border=\"0\" src=\"images/cooltext457953689.png\"/></a>
	</td></tr>";
	} echo "</table>";
	 ?>

      </p>
  <p align="center">&nbsp;</p>
      <p align="center"><a href="./"><img border="0" src="images/cooltext457951462.png" onmouseover="this.src='images/cooltext457951462MouseOver.png';" onmouseout="this.src='images/cooltext457951462.png';" /></a><a href="./"><img border="0" src="images/cooltext457951615.png" onmouseover="this.src='images/cooltext457951615MouseOver.png';" onmouseout="this.src='images/cooltext457951615.png';" /></a></p>
    <p align="center"><a href="../about.php"><img border="0" src="images/ahmad.jpg" width="395" height="32" alt="Developed by Ahmad Mushtaq" /></a></p></td>
  </tr>
</table>
<h1 align="center" class="heading">&nbsp;</h1>
</body>
</html>