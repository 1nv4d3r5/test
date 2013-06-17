<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2011 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Gallery run module main.php
| Version 3.2.4 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
function galery($gal="", $width=0, $height=0) {
	global $gallerymessage, $set, $prefix;
	if(file_exists("addons/gallery/lang/lang_".$set['language'].".php"))
		require_once "addons/gallery/lang/lang_".$set['language'].".php";
	else
		require_once "addons/gallery/lang/lang_en_US.php";
	require_once "addons/gallery/common.php";

	if(file_exists("./addons/gallery/settings.php"))
		require_once "./addons/gallery/settings.php";

	$out="";
	if($gal!="") {
		$count=1;
		$out.="<h2>".$gal."</h2><br />\n";
		$galeries[0]=$gal;
	} else {
		if(isset($_POST['gal'])) $gal=sanitize($_POST['gal']);
		$folder="galeries";
		$files=filelist('/./',$folder,1);
		$folder="galeries";
		$count=0;
		foreach($files as $file) {
			if($file != ".." && $file != "." && is_dir($folder."/".$file)) {
				$galeries[$count]=$file;
				$count++;
			}
		}
	}
	if($count>1) {
		$out.="\n<form method=\"post\" name=\"galery\" action=\"\"><fieldset style=\"border: 0;\">\n";
		$out.="<select onchange=\"document.galery.submit();\" name=\"gal\" class=\"LNE_select\">\n";
		for($i=0;$i<$count;$i++) {
			$out.='<option value="'.$galeries[$i].'"';
			if($gal==$galeries[$i]) $out.=" selected";
			$out.=">".$galeries[$i]."&nbsp;</option>\n";
			if($gal=="") $gal=$galeries[$i];
		}
		$out.="</select>\n";
		$out.="<input type=\"hidden\" name=\"showgalery\" value=\"$gallerymessage[94]\" />\n";
		$out.="</fieldset></form>\n";
		$out.="<br />\n";
	} else {
		$gal=$galeries[0];
	}
	//$gal contains the galery folder
	$gal="galeries/".$gal;
	$filez=filelist('/./',$gal);
	foreach($filez as $file) {
		if($file!="index.html") {
			if(intval($thumbnailwidth)==0)
				$thumbnailwidth=100;
			if($row=fetch_array(dbquery("SELECT * FROM ".$prefix."images WHERE file=\"".basename($file)."\"")))
				$filename=decode($row['name']);
			else
				$filename=$file;
			$out.="<a href=\"$gal/$file\" rel=\"lytebox[".$gal."]\" title=\"$filename\" >";
			$tname=createThumb( $gal."/".$file, "thumbs/", $thumbnailwidth );
			$out.="<img src=\"thumbs/".$tname."\" width=\"$thumbnailwidth\" alt=\"$filename\" class=\"bordered\" /></a>\n";
		}
	}
	return $out;
}
?>
