<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2010 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Lyteframe run module main.php
| Version 3.2 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
function lyteframe( $title, $link, $width=0, $height=0 ) {
//	global $out;
	$out="<a rev=\"width: ";
	if($width)
		$out.= $width;
	else
		$out.= "640";
	$out.= "px; height: ";
	if($height)
		$out.= $height;
	else
		$out.= "380";
	$out.= "px; scrolling: no;\" title=\"".$title."\" rel=\"lyteframe\" href=\"".$link."\">".$title."</a>\n";
	return $out;
}
?>