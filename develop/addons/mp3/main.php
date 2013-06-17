<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2010 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Mp3 run module main.php
| Version 3.2 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
function mp3($url) {
	$out="\n<object type=\"application/x-shockwave-flash\" data=\"addons/mp3/dewplayer.swf?son=";
	$out.="./".$url;
	$out.='.mp3" width="200" height="20"> <param name="movie" value="addons/mp3/dewplayer.swf?son=';
	$out.="./".$url;
	$out.=".mp3\" /></object>\n";
	return $out;
}
?>