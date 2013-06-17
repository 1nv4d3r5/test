<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2011 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Survey admin module admin.php
| Version 3.2.4 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
global $myserver;
if ($_SERVER['SERVER_NAME']!=$myserver)
	die ("Access Denied!");

function asurvey() {
	global $prefix, $sqldbdb, $MySQL, $set, $langmessage;
	if(file_exists("addons/survey/lang/lang_".$set['language'].".php"))
		require_once "addons/survey/lang/lang_".$set['language'].".php";
	else
		require_once "addons/survey/lang/lang_en_US.php";
	// Check if table exists in the database
	if($MySQL==0) {
		if(!$aa=sqlite_fetch_column_types($prefix."surveynames", $sqldbdb)) {
			dbquery("CREATE TABLE ".$prefix."surveynames ( id INTEGER NOT NULL PRIMARY KEY, surveyid INTEGER NOT NULL, surveyname VARCHAR(80), place INTEGER NOT NULL, adminlevel INTEGER NOT NULL)");
		}
		if(!$aa=sqlite_fetch_column_types($prefix."surveyvotes", $sqldbdb)) {
			dbquery("CREATE TABLE ".$prefix."surveyvotes ( id INTEGER NOT NULL PRIMARY KEY, surveyid INTEGER NOT NULL, vote INTEGER NOT NULL, voterid INTEGER NOT NULL)");
		}
	} else {
		dbquery("CREATE TABLE IF NOT EXISTS ".$prefix."surveynames ( id INTEGER NOT NULL auto_increment, surveyid INTEGER NOT NULL, surveyname VARCHAR(80), place INTEGER NOT NULL, adminlevel INTEGER NOT NULL, PRIMARY KEY (id))");
		dbquery("CREATE TABLE IF NOT EXISTS ".$prefix."surveyvotes ( id INTEGER NOT NULL auto_increment, surveyid INTEGER NOT NULL, vote INTEGER NOT NULL, voterid INTEGER NOT NULL, PRIMARY KEY (id))");
	}

	if(isset($_POST['surveysubmit'])) {
		if($_POST['surveysubmit']=="New Survey" && $_POST['surveyname']!="") {
			if(!is_intval($_POST['adminlevel']))
				die($langmessage[98]);
			dbquery("INSERT INTO ".$prefix."surveynames ( id, surveyid, surveyname, place, adminlevel) VALUES ( null, 0, \"".encode(sanitize($_POST['surveyname']))."\", 0, ".$_POST['adminlevel'].")");
		}
		if($_POST['surveysubmit']=="Delete Survey" && $_POST['surveyid']!="") {
			if(!is_intval($_POST['surveyid']))
				die($langmessage[98]);
			dbquery("DELETE FROM ".$prefix."surveynames WHERE (id=".$_POST['surveyid']." AND surveyid=0) OR surveyid=".$_POST['surveyid']);
			dbquery("DELETE FROM ".$prefix."surveyvotes WHERE surveyid=".$_POST['surveyid']);
		}
		if($_POST['surveysubmit']=="Add Option" && $_POST['option']!="") {
			if(!is_intval($_POST['surveyid']) || !is_intval($_POST['place']))
				die($langmessage[98]);
			dbquery("INSERT INTO ".$prefix."surveynames ( id, surveyid, surveyname, place, adminlevel) VALUES ( null, ".$_POST['surveyid'].", \"".encode(sanitize($_POST['option']))."\", ".$_POST['place'].", 0)");
		}
	}
	$out.="<h2>$surveymessage[15]</h2>\n<hr />\n";
	$out.="<h3>$surveymessage[1]</h3>\n";
	$out.="<form name=\"form1\" method=\"POST\" action=\"\">\n";
	$out.="<table>\n<tr><td>$surveymessage[2]:&nbsp;</td><td><input type=\"text\" name=\"surveyname\" value=\"\" size=\"50\" /></td></tr>\n";
	$out.="<tr><td>$surveymessage[3]:&nbsp;</td><td><SELECT name=\"adminlevel\">\n";
	$out.="<option value=\"0\">$langmessage[161]</option>\n";
	$out.="<option value=\"2\">$langmessage[162]</option>\n";
	$out.="<option value=\"3\">$langmessage[29]</option>\n";
	$out.="<option value=\"4\">$langmessage[163]</option>\n";
	$out.="</SELECT></td></tr>\n";
	$out.="<tr><td><input type=\"hidden\" name=\"surveysubmit\" value=\"New Survey\" /></td>";
	$out.="<td><input type=\"submit\" value=\"$surveymessage[1]\" name=\"aaa\" /></td></tr>\n";
	$out.="</table>\n</form>\n";
	$out.="<hr /><h3>$surveymessage[5]</h3>\n";
	$out.="<form name=\"form2\" method=\"POST\" action=\"\">\n";
	$out.="<table>\n";
	$out.="<tr><td>$surveymessage[5]:&nbsp;</td><td><SELECT name=\"surveyid\">\n";
	$output=dbquery("SELECT * FROM ".$prefix."surveynames WHERE surveyid=0");
	$row=fetch_all($output);
	$i=0;
	while($row[$i]['surveyname']) {
		$out.="<option value=\"".$row[$i]['id']."\">".decode($row[$i]['surveyname'])."</option>\n";
		$i++;
	}
	$out.="</SELECT></td></tr>\n";
	$out.="<tr><td><input type=\"hidden\" name=\"surveysubmit\" value=\"Delete Survey\" /></td>";
	$out.="<td><input type=\"submit\" value=\"$surveymessage[5]\" name=\"aaa\" /></td></tr>\n";
	$out.="</table>\n</form>\n";
	$out.="<hr /><h3>$surveymessage[6]</h3>\n";
	$out.="<form name=\"form1\" method=\"POST\" action=\"\">\n";
	$out.="<table>\n";
	$out.="<tr><td>$surveymessage[2]:&nbsp;</td><td><SELECT name=\"surveyid\">\n";
	$row=fetch_all(dbquery("SELECT * FROM ".$prefix."surveynames WHERE surveyid=0"));
	$i=0;
	while($row[$i]['surveyname']) {
		$out.="<option value=\"".$row[$i]['id']."\">".decode($row[$i]['surveyname'])."</option>\n";
		$i++;
	}
	$out.="</SELECT></td></tr>\n";
	$out.="<tr><td>$surveymessage[7]:&nbsp;</td><td><input type=\"text\" name=\"place\" size=\"2\" value=\"\" /></td></tr>\n";
	$out.="<tr><td>$surveymessage[8]:&nbsp;</td><td><input type=\"text\" name=\"option\" size=\"50\" value=\"\" /></td></tr>\n";
	$out.="<tr><td><input type=\"hidden\" name=\"surveysubmit\" value=\"Add Option\" /></td>";
	$out.="<td><input type=\"submit\" name=\"aaa\" value=\"$surveymessage[9]\" /></td></tr>\n";
	$out.="</table>\n</form>\n";
	$out.="<hr /><h3>$surveymessage[4]</h3>\n<ul>";
	$i=0;
	while($row[$i]['id']) {
		$out.="<li>".$row[$i]['id']." - ".decode($row[$i]['surveyname'])."</li>\n";
		$row1=fetch_all(dbquery("SELECT * FROM ".$prefix."surveynames WHERE surveyid=".$row[$i]['id']));
		$j=0;
		$out.="<ul>";
		while($row1[$j]['id']) {
			$out.="<li>".$row1[$j]['surveyname']."</li>\n";
			$j++;
		}
		$out.="</ul>\n";
		$i++;
	}
	$out.="</ul>\n";
	return $out;
}
?>
