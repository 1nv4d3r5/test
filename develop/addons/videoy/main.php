<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2010 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Videoy run module main.php
| Version 3.2 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
function youtube($url) {
	$out="\n<object width=\"425\" height=\"355\"><param name=\"movie\" value=\"http://www.youtube.com/v/";
	$out.=$url;
	$out.="\"></param>\n<param name=\"allowFullScreen\" value=\"true\"></param>\n<param name=\"allowscriptaccess\" value=\"always\"></param>";
	$out.="\n<embed src=\"http://www.youtube.com/v/";
	$out.=$url;
	$out.="\" type=\"application/x-shockwave-flash\"  allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"425\" height=\"355\">\n</embed></object>\n";
	return $out;
}
?>