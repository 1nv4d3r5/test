<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2012 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Dropdown admin module admin.php
| Version 3.2.5 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
global $myserver;
if ($_SERVER['SERVER_NAME']!=$myserver)
	die ('Access Denied!');

function adropdown() {
	if($_POST['colorsetup']=="Set Colors") {
		$one=$_POST['one'];
		$two=$_POST['two'];
		$three=$_POST['three'];
		$four=$_POST['four'];
		$css=file_get_contents("addons/dropdown/original.css");
		$css=str_replace("%1%",$one,$css);
		$css=str_replace("%2%",$two,$css);
		$css=str_replace("%3%",$three,$css);
		$css=str_replace("%4%",$four,$css);
		if(!$fp=fopen("addons/dropdown/style.css","w"))
			die("unable to write to css file");
		fwrite($fp,$css);
		fclose($fp);
		if(!$fp=fopen("addons/dropdown/colors.php","w"))
			die("unable to write color data");
		fwrite($fp,"<?php\n\$one=\"$one\";\n\$two=\"$two\";\n\$three=\"$three\";\n\$four=\"$four\";\n?>\n");
		fclose($fp);
	} else
		include "addons/dropdown/colors.php";

	$out.="<form method=\"post\" action=\"\"><table style=\"margin: 0 auto;\">\n";
	$out.="<tr><td>Background:</td><td style=\"width: 80px; background: $one;\">&nbsp;</td><td><input style=\"width: 80px;\" type=\"text\" name=\"one\" value=\"$one\" /></td></tr>\n";
	$out.="<tr><td>Mouse over:</td><td style=\"background: $two;\">&nbsp;</td><td><input style=\"width: 80px;\" type=\"text\" name=\"two\" value=\"$two\" /></td></tr>\n";
	$out.="<tr><td>Selected:</td><td style=\"background: $three;\">&nbsp;</td><td><input style=\"width: 80px;\" type=\"text\" name=\"three\" value=\"$three\" /></td></tr>\n";
	$out.="<tr><td>Foreground:</td><td style=\"background: $one; color: $four;\">&nbsp;Example</td><td><input style=\"width: 80px;\" type=\"text\" name=\"four\" value=\"$four\" /></td></tr>\n";
	$out.="<tr><td></td><td><input style=\"width: 80px;\" type=\"submit\" name=\"colorsetup\" value=\"Set Colors\" /></td><td></td></tr>\n";
	$out.="</table></form>\n";
	return $out;
}
?>

