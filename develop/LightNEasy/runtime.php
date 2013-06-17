<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2012 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Runtime module runtime.php
| Version 3.2.5 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
# This is the runtime module used by the generated php pages
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Checks if database.php exists. If not, redirect to install.php
clearstatcache();
if(!file_exists("data/database.php")) header ("Location: LightNEasy/install.php");

session_start();
$message="";
$selected=array('index','m2','m3','link','name');

//Includes the common functions
require_once "LightNEasy/common.php";

$sqldbdb=opendb();
$result=dbquery('SELECT * FROM '.$prefix.'bannedips WHERE ip="'.$_SERVER['REMOTE_ADDR'].'"');
if($row=fetch_array($result)!== false) die ($langmessage[118]);
readsetup();
//checks if user is logged in
login();
//redirects to LightNEasy.php if user is logged in and is an admin
if ($_SESSION['adminlevel']>3) {
	header("Location: ".$set['homepath'].$set['indexfile']);
}

require_once "./languages/lang_".$set['language'].".php";

//Read menu
readmenu();

switch($_POST['submit']) {
	case "saveprofile":
		if($_SESSION['adminlevel']>=2)
			$message=saveprofile();
		else
			$message=$langmessage[98];
		break;
	default:
}

function content($page, $count=0) {
	global $langmessage, $menu, $message, $prefix, $out;
	$out="";
	if($message!="") $out.="<div class=\"LNE_message\">".$message."</div>\n";
	switch($_GET['do']) {
		case "search":
			$out.="<h2 class=\"LNE_title\">$langmessage[66]</h2>\n";
			search(true);
			break;
		case "profile":
			$out.=profile();
			break;
		case "sitemap":
			$out.=showsitemap($langmessage,1);
			break;
		case "login":
			$out.=loginform();
			break;
		default: {
			$result = dbquery('SELECT * FROM '.$prefix.'paginas WHERE page="'.$page.'"');
			$row=fetch_array($result);
			if($row['restricted']!=0 && $row['restricted'] > $_SESSION['adminlevel']) {
				$out.=restrictedpage($row['restricted']);
			} else
				$out.=markers(stripslashes(html_entity_decode($row['content'])));
		}
	}
	print $out;
}

function extra($page="", $id=999) {
	global $prefix;
	if($id==999) {
		$result=dbquery("SELECT * FROM ".$prefix."paginas WHERE page=\"".$page."\"");
		$row=fetch_array($result);
		$id=$row['m3'];
		if($id==0)
			return;
	}
	$result=dbquery("select content FROM ".$prefix."extras WHERE id=$id");
	if($row=fetch_array($result))
		print markers(stripslashes(html_entity_decode($row['content'])));
}

//prints.... guess what
function footer() {
	global $set, $LNEversion;
	print $set['footer']." - <a href=\"http://lightneasy.org\">LightNEasy $LNEversion</a>";
}

//parses the page content and executes the modules
function markers($page) {
global $prefix;
$open="%!$";
$close="$!%";
while(strpos($page,$open)) {
	$pagearray=explode($open,$page,2);
	$out.=$pagearray[0];
	$pagearray1=explode($close,$pagearray[1],2);
	$token=explode(" ", $pagearray1[0], 2);
	switch($token[0]) {
		case "plugin":
			$pluginame="plugins/".clean($token[1])."/";
			if(file_exists($pluginame."place.mod"))
				$out.=file_get_contents($pluginame."place.mod");
			if(file_exists($pluginame."include.mod"))
				include $pluginame."include.mod";
			break;
		case "function":
			$bb=clean($token[1]);
			$aa=explode(" ",$bb);
			if($aa[3]!="") $out.=$aa[0]($aa[1],$aa[2],$aa[3]);
			elseif($aa[2]!="") $out.=$aa[0]($aa[1],$aa[2]);
			elseif($aa[1]!="") $out.=$aa[0]($aa[1]);
			else $out.=$aa[0]();
			break;
		case "include":
			include clean($token[1]);
			break;
		case "place":
			$out.=clean(file_get_contents(trim($token[1])));
			break;
		default:
			$addons=fetch_all(dbquery("SELECT * FROM ".$prefix."addons WHERE active=1"));
			$found=false;
			foreach($addons as $addon) {
				if($pagearray1[0]==$addon['name']) {
					$found=true;
					require_once "addons/".$addon['name']."/main.php";
					$out.=$addon['fname']();
					break;
				} elseif(substr($pagearray1[0],0,strlen($addon['name'])) == $addon['name']) {
					$found=true;
					require_once "./addons/".$addon['name']."/main.php";
					$bb = clean(substr($pagearray1[0],strlen($addon['name'])));
					$aa = explode(" ",clean($bb));
					if($aa[3] != "") $out.=$addon['fname'](clean($aa[0]),clean($aa[1]),clean($aa[2]),clean($aa[3]));
					elseif($aa[2]!="") $out.=$addon['fname'](clean($aa[0]),clean($aa[1]),clean($aa[2]));
					elseif($aa[1]!="") $out.=$addon['fname'](clean($aa[0]),clean($aa[1]));
					else $out.=$addon['fname'](clean($aa[0]));
					break;
				}
			}
			if(substr($pagearray1[0],0,5)!="first" && substr($pagearray1[0],0,4)!="head" && !$found) $out.="\n".clean($pagearray1[0])."\n";
	}
	$page=$pagearray1[1];
  }
  if ($page!="")
	$out.=$page;
  return $out;
}
?>
