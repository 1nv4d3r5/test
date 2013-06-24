
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to LBEF College Maitidevi Student Information Center :: Institute of Information Technology</title>
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

<body background="../admin/images/1019286_abstract_orange_tiles_background_.jpg">

<br />
<br />
<br />
<table align="center" cellpadding="0" bgcolor="#FFFFFF" width="800" border="0">
  <tr>
    <td><h1 align="center" class="heading"><img src="../admin/images/computer.jpg" width="504" height="82" /></h1>
      <h1 align="center" class="heading"><img src="../admin/images/cooltext457954659.png" width="830" height="51" alt="Welcome to Site" /></h1>
      <p align="center">
        <?php 
	 	 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
	 mysql_select_db("department",$link) or die ("Cannot select the database!");
	 $query="SELECT * FROM students";
		
		  $resource=mysql_query($query,$link);
		  echo "
		<table align=\"center\" border=\"0\" width=\"70%\">
		<tr>
		<td><b>Name</b></td> <td><b>Roll No.</b></td><td><b>Reg No.</b></td><td><b>Deparment</b></td></tr> ";
while($result=mysql_fetch_array($resource))
	{ 
	echo "<tr><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[3]."</td><td>".$result[4]."</td></tr>";
	} echo "</table>";
	 ?>
	         
      </p>
  <p align="center">&nbsp;</p>
      <p align="center"><a href="../about.php"><img border="0" src="../admin/images/cooltext457954859.png" onmouseover="this.src='../admin/images/cooltext457954859MouseOver.png';" onmouseout="this.src='../admin/images/cooltext457954859.png';" /></a> <a href="../admin/index.php"><img border="0" src="../admin/images/cooltext457954941.png" onmouseover="this.src='../admin/images/cooltext457954941MouseOver.png';" onmouseout="this.src='../admin/images/cooltext457954941.png';" /></a><a href="../main/index.php"><img border="0" src="../admin/images/cooltext457955210.png" onmouseover="this.src='../admin/images/cooltext457955210MouseOver.png';" onmouseout="this.src='../admin/images/cooltext457955210.png';" /></a></p>
      <center>
        <a href="about.php"><img src="../admin/images/ahmad.jpg" alt="Developed by Shankar Bisunke " width="395" height="32" border="0" /></a>
      </center>
    <p align="left">&nbsp;</p></td>
  </tr>
</table>
<h1 align="center" class="heading">&nbsp;</h1>

</body>
</html>