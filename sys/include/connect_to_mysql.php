<?php

$link = mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("department",$link) or die (mysql_error());
?>