<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2011 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Gallery admin module admin.php
| Version 3.2.4 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
global $gallerymessage, $myserver, $prefix, $sqldbdb, $MySQL, $set;
if ($_SERVER['SERVER_NAME']!=$myserver)
	die ('Access Denied!');
if(file_exists("addons/gallery/lang/lang_".$set['language'].".php"))
	require_once "addons/gallery/lang/lang_".$set['language'].".php";
else
	require_once "addons/gallery/lang/lang_en_US.php";
require_once "addons/gallery/common.php";
// Check if table exists in the database
$query="";
if($MySQL==0) {
	if(!$aa=sqlite_fetch_column_types($prefix."images", $sqldbdb))
		$query = "CREATE TABLE ".$prefix."images ( id INTEGER NOT NULL PRIMARY KEY, file VARCHAR(20) NOT NULL, name VARCHAR(50) NOT NULL)";
} else
		$query = "CREATE TABLE IF NOT EXISTS ".$prefix."images ( id INTEGER NOT NULL auto_increment, file VARCHAR(20) NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY (id))";

if($query!="")
	@dbquery($query);

if($_POST['submit']=="Delete Gallery") {
	$folder="galeries/".$_POST['name'];
	$filez=filelist('/./', $folder);
	foreach($filez as $fil)
		$out.=deleteimage($folder."/".$fil,$fil);
	if(@rmdir($folder))
		$message=$gallerymessage[1];
	else
		$message=$gallerymessage[2];
	unset($_GET['do']);
}

if($_POST['submit']=="Create Gallery") {
	if(!is_dir("galeries/".$_POST['galeryname'])) {
		mkdir("galeries/".$_POST['galeryname'], 0777)
			or die ($gallerymessage[63]);
		$message=$gallerymessage[64];
	} else $message=$gallerymessage[65];
	unset($_GET['do']);
}

if($_POST['submit']=="Upload image") {
	$message="";
	if($_FILES['uploadedfile']['name'] != "" && $_POST['gal']!="") {
		if($_FILES['uploadedfile']['size']>$_POST['MAX_FILE_SIZE'])
			$message="";
		$target_path = "galeries/".$_POST['gal']."/";
		$target_path = $target_path.basename( $_FILES['uploadedfile']['name']);
	} else $message=$gallerymessage[97];
	if($message=="") {
		if(file_exists($target_path)) unlink($target_path);
		$imagename=encode(sanitize($_POST['imagename']));
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
			@chmod($target_path, 0644);
			dbquery("INSERT INTO ".$prefix."images ( id, file, name ) VALUES (null, \"".basename($_FILES['uploadedfile']['name'])."\", \"$imagename\" )");
			$message=$gallerymessage[124].basename( $_FILES['uploadedfile']['name']).$gallerymessage[125];
		} else $message=$gallerymessage[123];
	}
	unset($_GET['do']);
}

if($_POST['submit']=="Submit Settings") {
	$message="";
	if(!is_intval($_POST['maxfilesize']) || !is_intval($_POST['thumbnailwidth']))
		die($langmessage[98]);
	if(!$fp=fopen("addons/gallery/settings.php","w"))
		die($langmessage[55]);
	fwrite($fp,"<?php\n\$maxfilesize=".$_POST['maxfilesize'].";\n\$thumbnailwidth=".$_POST['thumbnailwidth'].";\n?>\n");
		fclose($fp);
	$message=$langmessage[150];
}

function images() {
	global $gallerymessage, $max_upload_image_size, $prefix;
	$out="<h2>$gallerymessage[7]</h2>\n<hr />\n<div align=\"center\">\n";
	if($_GET['do']=="gallery" && $_GET['action']=="delete" && $_GET['name']!="") {
		$out.=deleteimage($_GET['name']);
	}
	if($_GET['do']=="gallery" && $_GET['action']=="deletegal" && $_GET['name']!="") {
		$galleryname=$_GET['name'];
		$out.="<h4 style=\"color: red;\">".$gallerymessage[3]."$galleryname?</h4>\n";
		$out.="<p>$gallerymessage[4]</p>\n";
		$out.="<form method=\"post\" action=\"\">\n";
		$out.="<input type=\"hidden\" name=\"name\" value=\"$galleryname\" />\n";
		$out.="<input type=\"hidden\" name=\"submit\" value=\"Delete Gallery\" />\n";
		$out.="<input type=\"submit\" name=\"aaa\" value=\"".$gallerymessage[5]."\" />\n";
		$out.="</form>\n";
	}
	$out.="<h3>$gallerymessage[8]</h3>\n";
	if($maxfilesize=="")
		$maxfilesize=200000;
	if($thumbnailwidth=="")
		$thumbnailwidth=100;
	if(file_exists("./addons/gallery/settings.php"))
		require_once "./addons/gallery/settings.php";
	$out.="<form method=\"post\" action=\"\">\n";
	$out.="<table><tr><td>$gallerymessage[9]&nbsp;</td><td><input type=\"text\" name=\"maxfilesize\" value=\"$maxfilesize\" /></td></tr>\n";
	$out.="<tr><td>$gallerymessage[10]&nbsp;</td><td><input type=\"text\" name=\"thumbnailwidth\" value=\"$thumbnailwidth\" /></td></tr>\n";
	$out.="<tr><td><input type=\"hidden\" name=\"submit\" value=\"Submit Settings\" /></td><td><input type=\"submit\" name=\"aaa\" value=\"$gallerymessage[11]\" /></td></tr>\n";
	$out.="</table>\n</form>\n<hr />\n";
	
	$out.="<form enctype=\"multipart/form-data\" method=\"post\" action=\"\">\n<fieldset style=\"border: 0;\">\n";
	$out.="<h3>$gallerymessage[58]</h3>\n";
	$out.="<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"$maxfilesize\" />\n";
	$out.="<table>\n";
	$out.="<tr><td>$gallerymessage[60]</td><td><input type=\"text\" name=\"imagename\" value=\"\" style=\"width: 100%\" /></td></tr>\n";
	$out.="<tr><td>".$gallerymessage[59].":</td><td><input name=\"uploadedfile\" type=\"file\" />\n</td></tr>\n";
	$out.="<tr><td>".$gallerymessage[61].":</td><td>";
	$out.="<select name=\"gal\">\n";
	$folder="./galeries";
	$files=filelist('/./',$folder,1);
	foreach($files as $file) {
		if($file != ".." && $file != ".") {
		    $out.='<option value="'.$file."\">".$file."&nbsp;</option>\n";
		}
	}
	$out.="</select>\n</td></tr>\n";
	$out.="<tr><td></td><td>";
	$out.="<input type=\"hidden\" name=\"submit\" value=\"Upload image\" />";
	$out.="<input type=\"submit\" name=\"aaa\" value=\"".$gallerymessage[58]."\" /></td>";
	$out.="</tr>\n</table>\n</fieldset>\n</form>\n<hr /><h3>".$gallerymessage[62]."</h3>\n";
	$out.="<form method=\"post\" action=\"\">\n<fieldset style=\"border: 0;\">\n";
	$out.="<table>\n<tr><td>$gallerymessage[117]:</td>\n<td>";
	$out.="<input name=\"galeryname\" type=\"text\" value=\"\" />\n</td></tr>\n";
	$out.="<tr><td><input type=\"hidden\" name=\"submit\" value=\"Create Gallery\" /></td>\n<td>";
	$out.="<input type=\"submit\" name=\"aa\" value=\"$gallerymessage[62]\" /></td>";
	$out.="</tr></table>\n</fieldset>\n</form>\n<hr />\n";
	$out.="<h3>".$gallerymessage[148]." ".$gallerymessage[176]."</h3>\n";

	$files=filelist('/./',$folder,1);
	$none=true;
	foreach($files as $file) {
		if($none) {
			$none=false;
			$out.="<table>";
		}
		if($file != ".." && $file != ".") {
			$out.="<tr>";
			$out.="<td><a href=\"".$_SERVER["SCRIPT_NAME"]."?do=gallery&amp;action=deletegal&amp;name=$file\">";
			$out.="<img src=\"./images/editdelete.png\" alt=\"delete\" title=\"Delete gallery $file\" align=\"left\" border=\"0\" /></a></td>";
			$out.="<td>".$file."</td></tr>\n";
		}
	}
	if(!$none) $out.="</table>\n";

	$out.="<hr /><h3>".$gallerymessage[148]." ".$gallerymessage[38]."</h3>\n";
	$out.="<table>\n";
	$folder="./galeries";
	$files=filelist('/./',$folder,1);
	$gal=0;
	foreach($files as $file) {
		if($gal==0) {
			$out.="\n<form method=\"post\" name=\"galery\" action=\"\">\n";
			$out.="<select onchange=\"document.galery.submit();\" name=\"selectgal\">\n";
			$first=$file;
		}
		$gal++;
		$out.="<option value=\"".$file."\"";
		if($_POST['selectgal']==$file)
			$out.=" selected";
		$out.=">".$file."&nbsp;</option>\n";
	}
	if($gal>0) {
		$out.="</select></form>\n<br /><br />\n";
		if($_POST['selectgal']!="")
			$file=$_POST['selectgal'];
		else {
			$file=$first;
		}
		$folder1="./galeries/".$file;
		$file1=filelist("/./",$folder1);
		foreach($file1 as $fil) {
			$out.="<tr><td><a href=\"".$_SERVER["SCRIPT_NAME"]."?do=gallery&amp;action=delete&amp;name=$folder1/$fil\">";
			$out.="<img src=\"./images/editdelete.png\" alt=\"delete\" title=\"Delete $fil\" align=\"left\" border=\"0\" /></a></td>";
			$thumb=createThumb($folder1."/".$fil, "thumbs/", 100);
			if($row=fetch_array(dbquery("SELECT * FROM ".$prefix."images WHERE file=\"".basename($thumb)."\"")))
				$filename=decode($row['name']);
			else
				$filename=$thumb;
			$out.="<td>$filename</td>";
			$out.="<td align=\"center\" >";
			$out.="<img src=\"thumbs/$thumb\"  alt=\"$filename\"  title=\"$filename\" /></td></tr>\n";
		}
	}
	$out.="</table>\n";
	$out.="</div>\n";
	return $out;
}

function deleteimage($pathtofile, $basename="") {
	global $gallerymessage, $prefix;
	if(@unlink($pathtofile)) {
		if($basename=="") {
			$info = pathinfo($pathtofile);
			$basename = $info['basename'];
		}
		//remove database entry
		if($row=fetch_array(dbquery("SELECT * FROM ".$prefix."images WHERE file=\"$basename\"")))
			dbquery("DELETE FROM ".$prefix."images WHERE id=".$row['id']);
		//delete thumbnail too
		@unlink("thumbs/".$basename);
		$out="<h2 class=\"LNE_message\">".$gallerymessage[149]."</h2>\n";
	} else
		$out="<h2 class=\"LNE_message\">".$gallerymessage[6]."</h2>\n";
	return $out;
}
?>
