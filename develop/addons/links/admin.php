<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2012 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Links admin function admin.php
| Version 3.2.5 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
global $linksmessage,$myserver;
if ($_SERVER['SERVER_NAME']!=$myserver)
	die ('Access Denied!');
if(file_exists("addons/links/lang/lang_".$set['language'].".php"))
	require_once "addons/links/lang/lang_".$set['language'].".php";
else
	require_once "addons/links/lang/lang_en_US.php";

function alinks() {
	global $message, $linksmessage, $prefix;
	if(($_POST['submit']=="Add Link" || $_POST['submit']=="Edit Link") && $_POST['link']!="" && $_POST['linkname']!=""){
		if($_POST['submit'] == "Add Link")
			$query="INSERT INTO ".$prefix."links (id, link, name, descr, hits) VALUES (null, \"".
			htmlentities($_POST['link'])."\", \"".encode($_POST['linkname']).
			"\", \"".encode($_POST['descr'])."\", ".$_POST['cat'].")";
		else
			$query="UPDATE ".$prefix."links SET link=\"".htmlentities($_POST['link']).
			"\", name=\"".encode($_POST['linkname'])."\", descr=\"".encode($_POST['descr']).
			"\", hits=".$_POST['cat']." WHERE id=".$_POST['id'];
		if(!dbquery($query)) die($linksmessage[132]);
		unset($_GET['action']);
	}
	if($_POST['linkcat']=="Add Category" || $_POST['linkcat']=="Edit Category") { // add category - edit category
		if($_POST['linkcat']=="Add Category")
			$query="INSERT INTO ".$prefix."linkscat (id, nome, descr) VALUES (null, '".encode($_POST['name'])."', '".encode($_POST['descr'])."')";
		else
			$query="UPDATE ".$prefix."linkscat SET nome=\"".encode($_POST['name'])."\", descr=\"".encode($_POST['descr'])."\" WHERE id=".$_POST['id'];
		if (!dbquery($query)) die($linksmessage[106]);
	}

	switch($_GET['action']) {
		case "delete":
			dbquery("DELETE FROM ".$prefix."links WHERE id=".$_GET['id']);
			unset($_GET['action']);
			break;
		case "deletec":
			dbquery("DELETE FROM ".$prefix."linkscat WHERE id=".$_GET['id']);
			unset($_GET['action']);
			break;
		case "editc":
			$result = dbquery("SELECT * FROM ".$prefix."linkscat WHERE id=".$_GET['id']);
			$row=fetch_array($result);
	}
	$out="<h2>$linksmessage[40]</h2>\n<hr />\n<div align=\"center\">\n<h3>$linksmessage[66]</h3>\n";
	$out.="<form method=\"post\" action=\"\"><fieldset style=\"border: 0;\"><table>\n";
	$out.="<tr><td>$linksmessage[50]</td><td><input type=\"text\" name=\"name\"";
	if($_GET['action']=="editc") $out.=" value=\"".decode($row[1])."\"";
	$out.=" /></td></tr>\n";
	$out.="<tr><td>$linksmessage[67]</td><td><input type=\"text\" name=\"descr\"";
	if($_GET['action']=="editc") $out.=" value=\"".decode($row[2])."\"";
	$out.=" /></td></tr>\n<tr><td>";
	if($_GET['action']=="editc") $out.="<input type=\"hidden\" name=\"id\" value=".$row[0]." />";
	$out.="</td>\n<td>";
	$out.="<input type=\"hidden\" name=\"linkcat\" ";
	if($_GET['action']=="editc") $out.="value=\"Edit Category\"";
	else $out.="value=\"Add Category\"";
	$out.=" />\n";
	$out.="<input type=\"submit\" name=\"\" ";
	if($_GET['action']=="editc") $out.="value=\"$linksmessage[54]\"";
	else $out.="value=\"$linksmessage[53]\"";
	$out.=" />\n";
	$out.="</td></tr>\n</table></div>\n";
	$result = dbquery("SELECT * FROM ".$prefix."linkscat ORDER BY nome");
	$out.="<table cellspacing=\"5\">";
	$GETarray=$_GET;
	while ($row=fetch_array($result)) {
		$out.="<tr><td><a href=\"".$_SERVER['SCRIPT_NAME']."?";
		if($_GET['do']!="") $out.="do=".$_GET['do']."&amp;";
		$out.="id=".$row[0]."&amp;action=editc\"><img src=\"images/edit.png\" style=\"align: left; border: 0;\" ></a></td>\n";
		$out.="<td><a href=\"".$_SERVER['SCRIPT_NAME']."?";
		if($_GET['do']!="") $out.="do=".$_GET['do']."&amp;";
		$out.="id=".$row[0]."&amp;action=deletec\"><img src=\"images/editdelete.png\" style=\"align: left; border: 0;\" ></a></td>\n";
		$out.="<td>".decode($row['nome'])."</td><td>".decode($row['descr'])."</td>\n";
		$out.="<td>".$row['id']."</td></tr>\n";
	}
	$out.="</table>\n</form>\n";
	if($_GET['action']=="edit")
		$row=fetch_array(dbquery("SELECT * FROM ".$prefix."links WHERE id=".$_GET['id']));
	$out.="<div align=\"center\"><h3>$linksmessage[40]</h3><form name=\"form1\" method=\"post\" action=\"\"><fieldset style=\"border: 0;\">\n<table>\n";
	$out.="<tr><td>$linksmessage[68]</td><td><input type=\"text\" name=\"linkname\"";
	if($_GET['action']=="edit") $out.=" value=\"".decode($row['name'])."\"";
	$out.=" /></td></tr>\n<tr><td>$linksmessage[69]</td><td><input type=\"text\" name=\"link\"";
	if($_GET['action']=="edit") $out.=" value=\"".$row['link']."\"";
	$out.=" /></td></tr>\n";
	$out.="<tr><td valign=\"top\" >$linksmessage[67]</td><td><textarea name=\"descr\">";
	if($_GET['action']=="edit") $out.=decode($row['descr']);
	$out.="</textarea></td></tr>\n";
	$out.="<tr><td>$linksmessage[52]</td><td align=\"right\"><select name=\"cat\" >\n";
	$result = dbquery("SELECT * FROM ".$prefix."linkscat");
	$cats=fetch_all($result);
	foreach ($cats as $cat) {
		$out.='<option value="'.$cat['id'].'"';
		if($_GET['action']=="edit" && $row[4]==$cat['id']) $out.=' SELECTED';
		$out.='>'.decode($cat['nome'])."&nbsp;</option>\n";
	}
	$out.="</select></tr>\n<tr><td>";
	if($_GET['action']=="edit") $out.="<input type=\"hidden\" name=\"id\" value=\"".$row[0]."\" />";
	$out.="</td><td><input type=\"hidden\" name=\"submit\" ";
	if($_GET['action']=="edit") $out.="value=\"Edit Link\"";
	else $out.="value=\"Add Link\"";
	$out.=" />\n";
	$out.="<input type=\"submit\" name=\"aa\" ";
	if($_GET['action']=="edit") $out.="value=\"$linksmessage[70]\"";
	else $out.="value=\"$linksmessage[71]\"";
	$out.=" />\n";
	$out.="</td></tr></table></fieldset></form></div>\n";
	$out.="<table cellspacing=\"5\">";
	$cat=0;
	$result = dbquery("SELECT * FROM ".$prefix."links ORDER BY hits ASC, name ASC");
	while ($row=fetch_array($result)) {
		if($row['hits']!=$cat) {
			$cat=$row['hits'];
			$cr=fetch_array(dbquery("SELECT * FROM ".$prefix."linkscat WHERE id=$cat"));
			$out.="<tr><td colspan=\"3\" align=\"center\"><h3>".decode($cr['nome'])."</h3></td></tr>\n";
		}
		$out.="<tr><td><a href=\"".$_SERVER['SCRIPT_NAME']."?";
		if($_GET['do']!="") $out.="do=".$_GET['do']."&amp;";
		$out.="id=".$row[0]."&amp;action=edit\"><img src=\"images/edit.png\" style=\"align: left; border: 0;\" ></a></td>\n";
		$out.="<td><a href=\"".$_SERVER['SCRIPT_NAME']."?";
		if($_GET['do']!="") $out.="do=".$_GET['do']."&amp;";
		$out.="id=".$row[0]."&amp;action=delete\"><img src=\"images/editdelete.png\" style=\"align: left; border: 0;\" ></a></td>\n";
		$out.="<td>".decode($row['name'])."</td><td>".$row['link']."</td></tr>\n";
	}
	$out.="</table>\n";
	return $out;
}
?>
