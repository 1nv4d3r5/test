<?php
/*
Setup script for forum plugin, version 1.0
@ Fernando Baptista, 2010
*/
require "plugins/forum/settings.php";
if(file_exists("plugins/forum/lang/lang_".$set['language'].".php"))
	require_once "plugins/forum/lang/lang_".$set['language'].".php";
else
	require_once "plugins/forum/lang/lang_en_US.php";
if($_POST['submit']=="forumsettings") {
//Setup header file
	$header=file_get_contents("plugins/forum/header.ori");
	$header=str_replace("%1", $_POST['template'],$header);
	if(!$fp=fopen("plugins/forum/header.mod","w"))
		die("unable to write to header file");
	fwrite($fp,$header);
	fclose($fp);
	$forumtemplate=$_POST['template'];
	if(!$fp=fopen("plugins/forum/settings.php","w"))
		die("unable to write to settings file");
	fwrite($fp,"<?php\n\$forumname=\"".$_POST['forumname']."\";\n\$forumwidth=\"".$_POST['forumwidth']."\";\n\$posterlevel=".$_POST['posterlevel'].";\n\$adminlevel=".$_POST['adminlevel'].";\n\$forumtemplate=\"".$forumtemplate."\";\n?>\n");
	fclose($fp);
}

$out.="<h3>$forummessage[1]</h3>\n<br />\n";
$out.="<form id=\"setupform\" name=\"setupform\" method=\"POST\" action=\"\">\n<table>\n";
$out.="<tr><td align=\"right\">$forummessage[2]:</td><td><input type=\"text\" name=\"forumname\" value=\"$forumname\" /></td></tr>\n";
$out.="<tr><td align=\"right\">$forummessage[3]:</td><td><input type=\"text\" name=\"forumwidth\" value=\"$forumwidth\" /></td></tr>\n";
$out.="<tr><td align=\"right\">$forummessage[18]:</td><td>";
$out.="<select name=\"posterlevel\">";
$out.="<option value=\"0\"";
if($posterlevel==0)
	$out.=" SELECTED";
$out.=">$langmessage[161]</option>";
$out.="<option value=\"2\"";
if($posterlevel==2)
	$out.=" SELECTED";
$out.=">$langmessage[162]</option>";
$out.="<option value=\"3\"";
if($posterlevel==3)
	$out.=" SELECTED";
$out.=">$langmessage[29]</option>";
$out.="<option value=\"4\"";
if($posterlevel==4)
	$out.=" SELECTED";
$out.=">$langmessage[163]</option>";
$out.="</select></td></tr>\n";
$out.="<tr><td align=\"right\">$forummessage[19]:</td><td>";
$out.="<select name=\"adminlevel\">";
$out.="<option value=\"0\"";
if($adminlevel==0)
	$out.=" SELECTED";
$out.=">$langmessage[161]</option>";
$out.="<option value=\"2\"";
if($adminlevel==2)
	$out.=" SELECTED";
$out.=">$langmessage[162]</option>";
$out.="<option value=\"3\"";
if($adminlevel==3)
	$out.=" SELECTED";
$out.=">$langmessage[29]</option>";
$out.="<option value=\"4\"";
if($adminlevel==4)
	$out.=" SELECTED";
$out.=">$langmessage[163]</option>";
$out.="</select></td></tr>\n";
$out.="<tr><td align=\"right\">$forummessage[21]:</td>\n<td><select name=\"template\">\n";
	$folder="plugins/forum/theme/";
	$filez=filelist('/./', $folder,0);
	foreach($filez as $fil) {
		$out.='<option value="'.$fil.'"';
		if($forumtemplate==$fil) $out.=" SELECTED";
		$out.='>'.$fil."</option>\n";
	}
	$out.="</select>\n</td></tr>\n";
$out.="<tr><td><input type=\"hidden\" name=\"submit\" value=\"forumsettings\"/></td><td><input type=\"submit\" name=\"aaa\" value=\"$forummessage[20]\" /></td></tr>\n";
$out.="</table>\n</form>\n";
?>
