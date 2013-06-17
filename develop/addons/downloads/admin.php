<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2011 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Downloads admin module admin.php
| Version 3.2.4 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
global $downloadsmessage,$myserver;
if ($_SERVER['SERVER_NAME']!=$myserver)
	die ('Access Denied!');
if(file_exists("addons/downloads/lang/lang_".$set['language'].".php"))
	require_once "addons/downloads/lang/lang_".$set['language'].".php";
else
	require_once "addons/downloads/lang/lang_en_US.php";
function adownloads() {
	global $message, $downloadsmessage, $max_upload_file_size, $prefix;
	if($_POST['submit']=="Add Download" || $_POST['submit']=="Edit Download") {
		$succeded=false;
		if($_POST['filename']=="upload") { // upload file to folder downloads
			$message=$_FILES["file"]["error"] . "<br />";
			if($_FILES['uploadedfile']['name'] != "") {
				$_FILES['uploadedfile']['name']=str_replace(" ", "_", $_FILES['uploadedfile']['name']);
				$target_path = "downloads/";
				$target_path .= basename( $_FILES['uploadedfile']['name']);
				if(file_exists($target_path))
					unlink($target_path);
				if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
					$succeded=true;
					@chmod($target_path, 0644);
				} else {
					$message=$downloadsmessage[123];
				}
			} else $message=$downloadsmessage[97];
		}
		if(($_POST['nome']!="" && $_POST['file']!="") || $succeded) {
			if($succeded)
				$filenam=basename( $_FILES['uploadedfile']['name']);
			else
				$filenam=htmlentities($_POST['file']);
			if($_POST['submit'] == "Add Download") // add download
				$query="INSERT INTO ".$prefix."downloads (reg,nome,file,downloads,ex) VALUES (null,\"".encode($_POST['nome'])."\",\"$filenam\", 0, ".$_POST['cat'].")";
			else // edit download
				$query="UPDATE ".$prefix."downloads  SET nome=\"".encode($_POST['nome'])."\", file=\"$filenam\", downloads=".$_POST['downloads'].", ex=".$_POST['cat']." WHERE reg=".$_POST['reg'];
			if(!dbquery($query)) die($downloadsmessage[119]);
		}
		unset($_GET['action']);
	}
	if($_POST['downloadcat']=="Add Category" || $_POST['downloadcat']=="Edit Category") {
	// add category, edit category
		if($_POST['downloadcat']=="Add Category")
			$query="INSERT INTO ".$prefix."downloadscat (id, nome, descr) VALUES (null, '".encode($_POST['name'])."', '".encode($_POST['descr'])."')";
		else
			$query="UPDATE ".$prefix."downloadscat SET nome=\"".encode($_POST['name'])."\", descr=\"".encode($_POST['descr'])."\" WHERE id=".$_POST['id'];
		if (!dbquery($query)) die($downloadsmessage[105]);
	}
	switch($_GET['action']) {
		case "delete":
			dbquery("DELETE FROM ".$prefix."downloads WHERE reg=".$_GET['id']);
			unset($_GET['action']);
			$message1="Download deleted";
			break;
		case "deletec":
			dbquery("DELETE FROM ".$prefix."downloadscat WHERE id=".$_GET['id']);
			unset($_GET['action']);
			$message1="Download category deleted";
			break;
		case "editc":
			$result = dbquery("SELECT * FROM ".$prefix."downloadscat WHERE id=".$_GET['id']);
			$row=fetch_array($result);
			$message1="Download category deleted";
	}
	if($message1!="") $out.="<h3>".$message1."</h3>\n";
	if($message!="") $out.="<h3>".$message."</h3>\n";
	$out.="<h2>$downloadsmessage[48]</h2>\n<hr />\n<div align=\"center\"><h3>$downloadsmessage[49]</h3>\n";
	$out.="<form method=\"post\" action=\"\"><fieldset style=\"border: 0;\"><table>\n";
	$out.="<tr><td>$downloadsmessage[50]</td><td><input type=\"text\" name=\"name\"";
	if($_GET['action']=="editc") $out.=" value=\"".decode($row[1])."\"";
	$out.=" /></td></tr>\n<tr><td>$downloadsmessage[15]</td><td><input type=\"text\" name=\"descr\"";
	if($_GET['action']=="editc") $out.=" value=\"".decode($row[2])."\"";
	$out.=" /></td></tr>\n<tr><td></td><td><input type=\"hidden\" name=\"id\" value=\"".$_GET['id']."\" />\n";
	$out.="<input type=\"hidden\" name=\"downloadcat\" ";
	if($_GET['action']=="editc") $out.="value=\"Edit Category\"";
	else $out.="value=\"Add Category\"";
	$out.=" />\n";
	$out.="<input type=\"submit\" name=\"\" ";
	if($_GET['action']=="editc") $out.="value=\"$downloadsmessage[54]\"";
	else $out.="value=\"$downloadsmessage[53]\"";
	$out.=" />\n";
	$out.="</td></tr>\n</table></div>\n";
	$result = dbquery("SELECT * FROM ".$prefix."downloadscat ORDER BY id");
	$out.="<table cellspacing=\"5\">";
	while ($row=fetch_array($result)) {
		$out.="<tr><td><a href=\"".$_SERVER['SCRIPT_NAME']."?";
		if($_GET['do']!="") $out.="do=".$_GET['do']."&amp;";
		$out.="id=".$row[0]."&amp;action=editc\"><img src=\"images/edit.png\" style=\"align: left; border: 0;\" ></a></td>\n";
		$GETarray['action'] = "deletec";
		$out.="<td><a href=\"".$_SERVER['SCRIPT_NAME']."?";
		if($_GET['do']!="") $out.="do=".$_GET['do']."&amp;";
		$out.="id=".$row['id']."&amp;action=deletec\"><img src=\"images/editdelete.png\" style=\"align: left; border: 0;\" ></a></td>\n";
		$out.="<td>".decode($row['nome'])."</td>";
		$out.="<td>".decode($row['descr'])."</td></tr>\n";
	}
	$out.="</table></form>";
	if($_GET['action']=="edit") $row=fetch_array(dbquery("SELECT * FROM ".$prefix."downloads WHERE reg=".$_GET['id']));
	$out.="<hr><div align=\"center\"><h3>$downloadsmessage[48]</h3>";
	$out.="<form enctype=\"multipart/form-data\" method=\"post\" action=\"\"><fieldset style=\"border: 0;\"><table>\n";
	$out.="<tr><td><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"$max_upload_file_size\" /></td>\n<td>$downloadsmessage[50]</td><td><input type=\"text\" name=\"nome\"";
	if($_GET['action']=="edit") $out.=" value=\"".decode($row[1])."\"";
	$out.=" /></td></tr>\n";
	$out.="<tr><td><input style=\"width: 14px;\" type=\"radio\" checked=\"checked\" name=\"filename\" value=\"upload\" /></td><td>$downloadsmessage[122]</td><td><input style=\" text-align: left;\" name=\"uploadedfile\" type=\"file\" name=\"uploadfile\" />\n</td></tr>\n";
	$out.="<tr><td><input style=\"width: 14px;\" type=\"radio\" name=\"filename\" value=\"filename\" /></td><td>$downloadsmessage[84]</td><td><input type=\"text\" name=\"file\"";
	if($_GET['action']=="edit") $out.=" value=\"".decode($row[2])."\"";
	$out.=" /></td></tr>\n";
	if($_GET['action']=="edit") {
		$out.="<tr><td>&nbsp;</td><td>$downloadsmessage[48]</td><td><input type=\"text\" name=\"downloads\" value=\"".$row[3]."\" />";
		$out.="<input type=\"hidden\" name=\"reg\" value=\"".$row[0]."\" /></td></tr>\n";
	}
	$out.="<tr><td>&nbsp;</td><td>$downloadsmessage[52]</td><td align=\"right\"><select name=\"cat\" >\n";
	$result = dbquery("SELECT * FROM ".$prefix."downloadscat");
	$cats=fetch_all($result);
	foreach ($cats as $cat) {
		$out.='<option value="'.$cat['id'].'"';
		if($_GET['action']=="edit" && $row[4]==$cat['id']) $out.=' SELECTED';
		$out.='>'.decode($cat['nome'])."&nbsp;</option>\n";
	}
	$out.="</select></tr>\n";
	$out.="<tr><td>&nbsp;</td><td>&nbsp</td><td>\n";
	$out.="<input type=\"hidden\" name=\"submit\" ";
	if($_GET['action']=="edit") $out.="value=\"Edit Download\"";
	else $out.="value=\"Add Download\"";
	$out.=" />\n";
	$out.="<input type=\"submit\" name=\"\" ";
	if($_GET['action']=="edit") $out.="value=\"$downloadsmessage[56]\"";
	else $out.="value=\"$downloadsmessage[55]\"";
	$out.=" />\n";
	$out.="</td></tr>\n</table>\n</fieldset>\n</form>\n</div>\n<hr />\n";
	$row1=fetch_all(dbquery("SELECT * FROM ".$prefix."downloadscat ORDER BY id DESC"));
	$i=0;
	while($row1[$i]['nome']) {
		$result = dbquery("SELECT * FROM ".$prefix."downloads WHERE ex=".$row1[$i]['id']." ORDER BY reg DESC");
		if(num_rows($result)) {
			$out.="<h3>".$row1[$i]['nome'].":</h3>\n";
			$out.="<table cellspacing=\"5\">";
			while ($row=fetch_array($result)) {
				$out.="<tr><td><a href=\"".$_SERVER['SCRIPT_NAME']."?";
				if($_GET['do']!="") $out.="do=".$_GET['do']."&amp;";
				$out.="id=".$row['reg']."&amp;action=edit\"><img src=\"images/edit.png\" style=\"align: left; border: 0;\" ></a></td>\n";
				$out.="<td><a href=\"".$_SERVER['SCRIPT_NAME']."?";
				if($_GET['do']!="") $out.="do=".$_GET['do']."&amp;";
				$out.="id=".$row['reg']."&amp;action=delete\"><img src=\"images/editdelete.png\" style=\"align: left; border: 0;\" ></a></td>\n";
				$out.="<td>".decode($row['nome'])."</td><td>".$row['file']."</td>\n";
				$out.="<td>".$row['downloads']."</td><td>".$row['ex']."</td></tr>\n";
			}
			$out.="</table>\n";
		}
		$i++;
	}
	return $out;
}
?>
