<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2010 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Links run function main.php
| Version 3.2.1 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
global $linksmessage, $set;
if(file_exists("addons/links/lang/lang_".$set['language'].".php"))
	require_once "addons/links/lang/lang_".$set['language'].".php";
else
	require_once "addons/links/lang/lang_en_US.php";
function links($cat=0, $direction="asc") {
	global $linksmessage, $prefix;
	if($direction!="asc" && $direction!="desc")
		$direction="asc";
	$out="";
	if($cat) $query="SELECT * FROM ".$prefix."linkscat WHERE id=".$cat." ORDER BY nome";
	else $query="SELECT * FROM ".$prefix."linkscat ORDER BY nome";
	if(!$cresult=dbquery($query)) die ($linksmessage[4]);
	$out.="\n<div id=\"LNE_show\">\n";
	while ($crow=fetch_array($cresult)) {
		$out.="<h3>".decode($crow['descr'])."</h3>\n";
		$query="SELECT * FROM ".$prefix."links where hits=".$crow[0]." ORDER BY name ".$direction;
		if(!$result=dbquery($query)) die ($linksmessage[5]);
		if(num_rows($result)) {
			$out.="<ul>\n";
			while ($row = fetch_array($result)) {
				$out.="<li><a href=\"".$row['link']."\" onclick=\"window.open(this.href,'_blank');return false;\">".decode($row['name'])."</a><div>".decode($row['descr'])."</div></li>\n";
			}
			$out.="</ul>\n";
		}
	}
	$out.="</div>\n";
	return $out;
}
?>
