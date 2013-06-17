<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2011 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Uploads run module main.php
| Version 3.2.4 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/

function uploads() {
	global $uploadsmessage, $prefix, $set;
	if(file_exists("addons/uploads/lang/lang_".$set['language'].".php"))
		require_once "addons/uploads/lang/lang_".$set['language'].".php";
	else
		require_once "addons/uploads/lang/lang_en_US.php";
	require_once "addons/uploads/settings.php";
	
	if(!$crow=fetch_array(dbquery("SELECT * FROM ".$prefix."downloadscat WHERE nome=\"Uploads\""))) {
		dbquery("INSERT INTO ".$prefix."downloadscat (id, nome, descr) VALUES (null, \"Uploads\", \"Users upload here\")");
		$crow=fetch_array(dbquery("SELECT * FROM ".$prefix."downloadscat WHERE nome=\"Uploads\""));
	}

	$message="";
	if($_POST['submitupload']=="Add Upload") {
		if($_POST['secCode'] != $_SESSION['operation']) {
			$message=$uploadsmessage[8];
		} else {
			$succeded=false;
			$message=$_FILES["file"]["error"];
			if($_FILES['uploadedfile']['name'] != "") {
				$_FILES['uploadedfile']['name']=str_replace(" ", "_", $_FILES['uploadedfile']['name']);
				$target_path = "./uploads/".basename($_FILES['uploadedfile']['name']);
				if(file_exists($target_path))
					unlink($target_path);
				if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
					$succeded=true;
					$message=$uploadsmessage[12];
					@chmod($target_path, 0644);
				} else {
					$message=$uploadsmessage[11];
				}
			} else $message=$uploadsmessage[9];
			if($succeded) {
				$filenam=basename( $_FILES['uploadedfile']['name']);
				$query="INSERT INTO ".$prefix."downloads (reg,nome,file,downloads,ex) VALUES (null,\"".encode(sanitize($_POST['nome']))."\",\"$filenam\", 0, ".sanitize($_POST['cat']).")";
				if(!dbquery($query))
					$message=$uploadsmessage[10];
			}
		}
	} else {
		if($_SESSION['adminlevel']>=$adminlevel) {
			$out.="\n<div id=\"LNE_show\">\n";
			$out.="<div align=\"center\">\n<h3>$uploadsmessage[5]</h3>\n";
			$out.="<form enctype=\"multipart/form-data\" method=\"post\" action=\"\"><fieldset style=\"border: 0;\"><table>\n";
			$out.="<tr><td align=\"right\"><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"$max_upload_file_size\" /><b>$uploadsmessage[13]:&nbsp;</b></td>";
			$out.="<td><input type=\"text\" name=\"nome\" style=\"width: 100%;\" /></td></tr>\n";
			$out.="<tr><td align=\"right\"><b>$uploadsmessage[5]:&nbsp;</b></td><td><input style=\" text-align: left;\" name=\"uploadedfile\" type=\"file\" name=\"uploadfile\" />\n</td></tr>\n";
			$out.="<tr><td align=\"right\"><b>$uploadsmessage[6]:&nbsp;</b></td>\n";
			if($set['catchpa']=="0") {
				//text catchpa
				srand((double) microtime() * 1000000);
				$a = rand(0, 9);
				$b = rand(0, 9);
				$c=$a+$b;
				$out.="<td>$a + $b = ";
				$_SESSION['operation'] = $c;
				$out.="<input type=\"text\" name=\"secCode\" maxlength=\"2\" style=\"width:20px\" /></td></tr>\n";
			} else {
				// image catchpa
				$out.="<td>";
				$out.=catchpa();
/*				$out.="<img src=\"./LightNEasy/seccode.php\" width=\"71\" height=\"21\" align=\"absmiddle\" />"; */
				$out.="</td></tr>\n";
			}
			$out.="<tr><td></td><td><input type=\"hidden\" name=\"cat\" value=\"".$crow['id']."\" /><input type=\"hidden\" name=\"submitupload\" value=\"Add Upload\" />\n";
			$out.="<input type=\"submit\" name=\"aaa\" value=\"$uploadsmessage[7]\" />\n";
			$out.="</td><td>&nbsp</td></tr>\n</table>\n</fieldset>\n</form>\n</div>\n";
		} else {
			$out.="<h3>$uploadsmessage[21]</h3>\n";
		}
	}
	if($message!="")
		$out.="<h3 style=\"color: red;\">$message</h3>\n";
	if(!$result=dbquery("SELECT * FROM ".$prefix."downloads WHERE ex=".$crow['id']." ORDER BY reg DESC")) die ($uploadsmessage[3]);
	$out.="<h3>$uploadsmessage[14]</h3>\n";
	if(num_rows($result)) {
		$GETarray=$_GET;
		$out.="<ul>";
		while ($row = fetch_array($result)) {
			$GETarray['dlid'] = $row['reg'];
			$out.="<li>".decode($row['nome'])."</li>\n";
		}
		$out.="</ul>";
	} else
		$out.="<h3>$uploadsmessage[4]</h3>";
	$out.="</div>\n";
	return $out;
}
?>
