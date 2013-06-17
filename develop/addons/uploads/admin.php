<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2011 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Uploads admin module admin.php
| Version 3.2.4 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
global $myserver;
if ($_SERVER['SERVER_NAME']!=$myserver)
	die ('Access Denied!');

function auploads() {
	global $prefix, $langmessage, $set;
	if(file_exists("addons/uploads/lang/lang_".$set['language'].".php"))
		require_once "addons/uploads/lang/lang_".$set['language'].".php";
	else
		require_once "addons/uploads/lang/lang_en_US.php";
	require_once "addons/uploads/settings.php";
	$message="";
	if($_POST['submitupload']=="Transfer upload") {
		if(!is_intval($_POST['cat']) || !is_intval($_POST['fileid']))
			die ($uploadsmessage[16]);
		dbquery("UPDATE ".$prefix."downloads SET ex=".$_POST['cat']." WHERE reg=".$_POST['fileid']);
		$filename=sanitize($_POST['filename']);
		rename("./uploads/".$filename, "./downloads/".$filename);
	}
	if($_POST['submitupload']=="savesettings") {
		if(!is_intval($_POST['adminlevel']) || !is_intval($_POST['maxsize']))
			die($langmessage[98]);
		$adminlevel=$_POST['adminlevel'];
		$max_upload_file_size=$_POST['maxsize'];
		if(!$fp=fopen("addons/uploads/settings.php","w"))
			die($langmessage[55]);
		fwrite($fp,"<?php\n\$adminlevel=".$_POST['adminlevel'].";\n\$max_upload_file_size=$max_upload_file_size;\n?>\n");
		fclose($fp);
		$message=$langmessage[150];
	}
	if($message!="") $out.="<h3 style=\"color: red;\">".$message."</h3>\n";
	$out.="<h2>$uploadsmessage[1]</h2>\n<hr />\n";
	$out.="<h3>$uploadsmessage[18]</h3>\n";
	$out.="<form name=\"formn\" method=\"POST\" action=\"\">\n";
	$out.="<table><tr><td>$uploadsmessage[17]:</td><td><SELECT name=\"adminlevel\">\n";
	$out.="<option value=\"1\"";
	if($adminlevel==1)
		$out.=" SELECTED";
	$out.=">$langmessage[161]</option>\n";
	$out.="<option value=\"2\"";
	if($adminlevel==2)
		$out.=" SELECTED";
	$out.=">$langmessage[162]</option>\n";
	$out.="<option value=\"3\"";
	if($adminlevel==3)
		$out.=" SELECTED";
	$out.=">$langmessage[29]</option>\n";
	$out.="<option value=\"4\"";
	if($adminlevel==4)
		$out.=" SELECTED";
	$out.=">$langmessage[163]</option>\n";
	$out.="</SELECT></td></tr>\n";
	$out.="<tr><td>$uploadsmessage[20]:</td><td><input type=\"text\" name=\"maxsize\" value=\"$max_upload_file_size\" /></td></tr>\n";
	$out.="<tr><td><input type=\"hidden\" name=\"submitupload\" value=\"savesettings\" /></td>";
	$out.="<td><input type=\"submit\" name=\"aaa\" value=\"$uploadsmessage[19]\" /></td></tr>\n";
	$out.="</table>\n</form>\n";
	$cat=fetch_array(dbquery("SELECT * FROM ".$prefix."downloadscat WHERE nome=\"Uploads\""));
	$result = dbquery("SELECT * FROM ".$prefix."downloads WHERE ex=".$cat['id']." ORDER BY reg DESC");
	$out.="<hr /><h3>$uploadsmessage[14]</h3>\n";
	$out.="<form name=\"formm\" method=\"POST\" action=\"\">\n";
	if(num_rows($result)) {
		$out.="<table cellspacing=\"5\">\n";
		while ($row=fetch_array($result)) {
			$out.="<form name=\"form".$row['reg']."\" method=\"post\" action=\"\">\n";
			$out.="<tr><td><input type=\"hidden\" name=\"submitupload\" value=\"Transfer upload\" />";
			$out.="<input type=\"hidden\" name=\"fileid\" value=".$row['reg']." />";
			$out.="<input type=\"hidden\" name=\"filename\" value=".$row['file']." />";
			$out.="<input type=\"submit\" name=\"aaa\" value=\"$uploadsmessage[15]\" /></td>\n";
			$out.="<td><select name=\"cat\">\n";
			$output=dbquery("SELECT * FROM ".$prefix."downloadscat WHERE nome <> \"Uploads\"");
			$i=0;
			while($row1=fetch_array($output)) {
				$out.="<option value=\"".$row1['id']."\">".$row1['nome']."</option>\n";
				$i++;
			}
			$out.="</select></td>\n";
			$out.="<td><a href=\"addons/downloads/send.php?cat=".$cat['id']."&amp;dlid=".$row['reg']."\">".decode($row['nome'])."</a></td><td>".$row['file']."</td>\n";
			$out.="<td>".$row['downloads']."</td><td>".$row['ex']."</td></tr>\n</form>\n";
		}
		$out.="</table>\n";
	} else {
		$out.="<p>$uploadsmessage[4]</p>\n";
	}
	return $out;
}
?>
