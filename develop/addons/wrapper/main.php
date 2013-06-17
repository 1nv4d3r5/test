<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2010 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Wrapper run module main.php
| Version 3.2.2 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
function iframe($url, $width=0) {
	$out.="<div style=\"text-align: center; margin: 0; padding: 0;\">\n";
	$out.="<iframe onload=\"calcHeight();\" id=\"the_iframe\" frameborder=\"0\" scrolling=\"no\" width=\"";
	if($width) $out.=$width;
	else $out.="100%";
	$out.="\" src=\"".$url."\">\n";
	$out.="An iframe capable browser is required to view this web site\n";
	$out.="</iframe>\n</div>\n";
	return $out;
}
?>
