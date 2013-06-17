<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2012 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon LastNews run module main.php
| Version 3.2.5 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
global $set, $newsmessage;
if(file_exists("addons/news/lang/lang_".$set['language'].".php"))
	require_once "addons/news/lang/lang_".$set['language'].".php";
else
	require_once "addons/news/lang/lang_en_US.php";

require_once "addons/news/main.php";
function lastnews($cat=-1) {
	global $prefix;
	$quer="SELECT titulo,data,noticia,autor,email,visto,reg,cat FROM ".$prefix."noticias";
	if($cat > -1) $quer.=" WHERE cat=".$cat;
	$quer.=" ORDER BY reg DESC LIMIT 0,1";
	$query = dbquery($quer);
	if($row_db = fetch_array($query))
		return show_one_news($row_db['0'],$row_db['1'],$row_db['2'],$row_db['3'],$row_db['4']);
}
?>
