<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2011 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Downloads send module main.php
| Version 3.2.4 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
if(isset($_GET['dlid'])) {
	global $set, $prefix, $fuso_s;
	// there is a download request
	require_once "../../data/database.php";
	require_once "../../LightNEasy/common.php";
	if(!is_intval($_GET['dlid'])) die ("Downloads - Aha! Clever!");


	if($MySQL==1) {
		$sqldbdb = @mysql_connect($databasehost, $databaselogin, $databasepassword) or die("Error - Could not connect to MySQL server: " . mysql_error());
		@mysql_select_db($databasename) or die("Error - Could not open MySQL database " . mysql_error());
	} elseif($MySQL==0) {
		if(!$sqldbdb = @sqlite_open("../../data/$databasename.db")) die ("Error - Could not open SQLite 2 database");
	} else {
		if(!$sqldbdb= new SQLite3("../../data/$databasename.db")) die ("Couldn't open SQLite 3 database");
	}
	readsetup();
	if(file_exists("lang/lang_".$set['language'].".php"))
		require_once "lang/lang_".$set['language'].".php";
	else
		require_once "lang/lang_en_US.php";
	if($set['language']=="") $set['language']="en_US";

	require_once "../../languages/lang_".$set['language'].".php";
	$result=dbquery("SELECT * FROM ".$prefix."downloads WHERE reg=".$_GET['dlid']);
	$row = fetch_array($result);
	$filename=decode($row[2]);
	if(strpos($filename,"*")) $filename = str_replace("*", "",$filename);
	if(strpos($filename," "))$filename = str_replace(" ", "_",$filename);
	$filename2=$filename;
	if(!$crow=fetch_array(dbquery("SELECT * FROM ".$prefix."downloadscat WHERE nome=\"Uploads\"")))
		die ($downloadsmessage[2]);
	if($crow['id']!=$row['ex'])
		$filename="../../downloads/".$filename;
	else
		$filename="../../uploads/".$filename;
	if(!file_exists($filename)) die ($downloadsmessage[109]);
	$size = filesize("$filename");
	$ext = explode (".",$filename);
	if (end($ext)=="php" || end($ext)=="html") die ($downloadsmessage[108]);
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false);
	switch(end($ext)) {
		case "zip": header("Content-Type: application/zip"); break;
		case "doc": header("Content-Type: application/msword"); break;
		case "pdf": header("Content-Type: application/pdf"); break;
		case "ppt": header("Content-Type: application/ms-powerpoint"); break;
		case "xls": header("Content-Type: application/ms-excel"); break;
		case "mp3": header("Content-Type: audio/mp3"); break;
		case "avi": header("Content-Type: video/avi"); break;
		case "mpg": header("Content-Type: video/mpeg"); break;
		default:
			header("Content-Type: application/save");
	}
	header("Content-Length: $size");
	header("Content-Disposition: attachment; filename=$filename2");
	header("Content-Transfer-Encoding: binary");
	$fp = fopen("$filename", "r");
	fpassthru($fp);
	fclose($fp);
	unset($_GET['dlid']);
	$novo_visto = $row['downloads'] + 1;
	dbquery("UPDATE ".$prefix."downloads SET downloads = $novo_visto WHERE reg = ".$row['reg']);
	die();
}
?>
