<?php
//Includes the common functions
global $prefix, $set, $fuso_s;
require_once "../data/database.php";
if($MySQL==1) {
	$sqldbdb = @mysql_connect($databasehost, $databaselogin, $databasepassword) or die("Error - Could not connect to MySQL server: " . mysql_error());
	@mysql_select_db($databasename) or die("Error - Could not open database " . mysql_error());
} elseif($MySQL==0) {
	if(!$sqldbdb = @sqlite_open("../data/$databasename.db")) die ("Error - Could not open database");
} else {
	if(!$sqldbdb= new SQLite3("../data/$databasename.db")) die ("Couldn't open SQLite 3 database");
}
require_once "../languages/lang_en_US.php";
require_once "common.php";
readsetup();
require_once "../addons/news/lang/lang_en_US.php";
require_once "../addons/news/main1.php";
$query = dbquery("SELECT titulo,data,noticia,autor,email,visto,reg,cat FROM ".$prefix."noticias ORDER BY reg DESC LIMIT 0,1");
if($row_db = fetch_array($query)) {
	print "<html>\n<head>\n";
	print "<link rel='stylesheet' type='text/css' href='../templates/admintemplate/style.css' />\n";
	print "<link rel='stylesheet' type='text/css' href='../css/lightneasy.css' />\n";
	print "<head><body style=\"width: 270px;\">\n";
	print show_one_news($row_db['0'],$row_db['1'],$row_db['2'],$row_db['3'],$row_db['4']);
	print "</body>\n</html>\n";
}
?>