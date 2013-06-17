<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2010 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Videog run module main.php
| Version 3.2 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
function googlev($url) {
	$out="\n<embed style=\"width:400px; height:326px;\" id=\"VideoPlayback\" type=\"application/x-shockwave-flash\" src=\"http://video.google.com/googleplayer.swf?docId=";
	$out.=$url;
	$out.="\" flashvars=\"\"></embed>\n";
	return $out;
}
?>