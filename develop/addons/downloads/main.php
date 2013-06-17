<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2011 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Downloads run module main.php
| Version 3.2.4 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
global $set, $downloadsmessage;

if(file_exists("addons/downloads/lang/lang_".$set['language'].".php"))
	require_once "addons/downloads/lang/lang_".$set['language'].".php";
else
	require_once "addons/downloads/lang/lang_en_US.php";

function downloads($cat=0) {
	global $downloadsmessage, $prefix;
	if($cat)
		$query="SELECT * FROM ".$prefix."downloadscat WHERE id=".$cat." ORDER BY nome";
	else {
		if(!$crow=fetch_array(dbquery("SELECT * FROM ".$prefix."downloadscat WHERE nome=\"Uploads\"")))
			die ($downloadsmessage[2]);
		$query="SELECT * FROM ".$prefix."downloadscat WHERE id<>".$crow['id']." ORDER BY nome";
	}
	if(!$cresult=dbquery($query))
		die ($downloadsmessage[2]);
	$out.="\n<div id=\"LNE_show\">\n";
	while ($crow = fetch_array($cresult)) {
		$out.="<h3>".decode($crow['descr'])."</h3>";
		$query="SELECT * FROM ".$prefix."downloads WHERE ex=".$crow['id']." ORDER BY reg DESC";
		if(!$result=dbquery($query)) die ($downloadsmessage[3]);
		if(num_rows($result)) {
			$GETarray=$_GET;
			$out.="<ul>";
			while ($row = fetch_array($result)) {
				$GETarray['dlid'] = $row[0];
				$out.="<li><a href=\"addons/downloads/send.php?".http_build_query($GETarray,'','&amp;')."\" rel=\"nofollow\">".decode($row[1])."</a></li>\n";
			}
			$out.="</ul>";
		} else
			$out.="<h3>$downloadsmessage[100]</h3>";
	}
	$out.="</div>\n";
	return $out;
}
?>
