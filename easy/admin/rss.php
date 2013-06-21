<?php


require_once "common.php";
require_once "../data/database.php";
if($MySQL==1) {
	$sqldbdb = @mysql_connect($databasehost, $databaselogin, $databasepassword) or die("Error - Could not connect to MySQL server: " . mysql_error());
	@mysql_select_db($databasename) or die("Error - Could not open database " . mysql_error());
} elseif($MySQL==0) {
	if(!$sqldbdb = @sqlite_open("./data/$databasename.db")) die ("Error - Could not open database");
} else {
	if(!$sqldbdb= new SQLite3("./data/$databasename.db")) die ("Couldn't open SQLite 3 database");
}
readsetup();
$newspage=$set['newspage'];
$pathtonews="/".$newspage.".php?";

header('Content-type: application/rss+xml; charset=utf-8');
$out ="<?xml version=\"1.0\" ?>\n";
$out.="<rss version=\"2.0\" xmlns:atom=\"http://www.w3.org/2005/RSS\">\n";
$out.="<channel>\n";
$out.="<atom:link href=\"http://".sv('SERVER_NAME').sv('PHP_SELF')."\" rel=\"self\" type=\"application/rss+xml\" />\n";
$out.="<title>".$set['title']."</title>\n";
$out.="<description>".$set['description']."</description>\n";
$out.="<link>http://".sv('SERVER_NAME').sv('PHP_SELF')."</link>\n";
$query = "SELECT titulo,data,noticia,autor,email,visto, reg FROM ".$prefix."noticias ORDER BY reg DESC LIMIT 0, 5";
$roww=fetch_all(dbquery($query));
foreach($roww as $row) {
	$out.="<item>\n<title>".sanitize(stripslashes(decode($row[0])))."</title>\n";
	$descr=str_replace("&","&amp;",substr(strip_tags(stripslashes(decode($row[2]))),0,120));
	$out.="<description>".$descr."...\n</description>\n";
	$out.="<link>"."http://".sv('SERVER_NAME').$pathtonews."id=".$row[6]."</link>\n";
	$out.="<guid>"."http://".sv('SERVER_NAME').$pathtonews."id=".$row[6]."</guid>\n";
	$out.="</item>\n";
}
$out.="</channel>\n</rss>\n";
print $out;
?>
