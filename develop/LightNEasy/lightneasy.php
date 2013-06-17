<?php
/*++++++++++++++++++++++++++++++++++++++++++++++++++++
| LightNEasy Content Management System
| Copyright 2007 - 2012 Fernando Baptista
| http://www.LightNEasy.org
++++++++++++++++++++++++++++++++++++++++++++++++++++++
| lightneasy.php Version 3.2.5 SQLite/MySQL
++++++++++++++++++++++++++++++++++++++++++++++++++++++
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+++++++++++++++++++++++++++++++++++++++++++++++++++++*/
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
clearstatcache();

// Redirects to install.php if database file doesn't exist
if(!@filesize("data/database.php")) header ("Location: LightNEasy/install.php");

// Detects the insertion of code in the $_GET array
foreach ($_GET as $check_url) {
	if ((eregi("<[^>]*script*\"?[^>]*>", $check_url)) || (eregi("<[^>]*object*\"?[^>]*>", $check_url)) || (eregi("<[^>]*iframe*\"?[^>]*>", $check_url)) || (eregi("<[^>]*applet*\"?[^>]*>", $check_url)) || (eregi("<[^>]*meta*\"?[^>]*>", $check_url)) || (eregi("<[^>]*style*\"?[^>]*>", $check_url)) || (eregi("<[^>]*form*\"?[^>]*>", $check_url)) || (eregi("\([^>]*\"?[^)]*\)", $check_url)) || (eregi("\"", $check_url))) die ("Hijacking attempt, dying....");
}
unset($check_url);

$myserver=$_SERVER['SERVER_NAME'];

// Installs the common functions
require_once "LightNEasy/common.php";

// Opens the database
$sqldbdb=opendb();

// Reads the setup to the global array $set
$set = array();
readsetup();
if($set['language']=="") $set['language']="en_US";
if($set['langeditor']=="") $set['langeditor']="en";

// Checks if this file is not called remotely
if (!eregi($set['indexfile'], sv('PHP_SELF')) && !eregi('index.php', sv('PHP_SELF')))
	die ('Access Denied!');

// Reads the language file
require_once "./languages/lang_".$set['language'].".php";

// Checks if there was a login attempt or a login cookie exists
login();

// Disables $_GET and $_POST if the user is not logged in, except for the allowed posts
// Disables $_GET except for login and sitemap
if($_GET['do']!="profile" && $_GET['do']!="login" && $_GET['do']!="sitemap" && $_GET['do']!="search" && $_GET['do']!="register" && $_SESSION['adminlevel'] < 4) unset ($_GET['do']);

// Disables $_POST['submit'] except for login, save profile, save registration, send message and send comment
if($_POST['submit']!="enterregister" && $_POST['submit']!="Send message" && $_POST['submit']!="sendcomment" && $_POST['submit']!="saveprofile" && $_SESSION[$set['password']] != "1") unset ($_POST['submit']);

### LightNEay global variables: ###
// $set - settings
// $langmessage - the language file

// edit these 2 following values to your convenience
$upload_max_filesize=4000000;
$max_upload_image_size=250000;

// Global variable containing messages to the user;
$message="";

// $menu - contains the menu
$menu=array(array('m1','m2','m3','link','name'));

// $selected - contains the information of the current page
$selected=array('index','m2','m3','link','name','description','template');

// $pagenum - the file name of the current page
$pagenum=sanitize($_GET['page']);
if($pagenum=="") $pagenum="index";

// $out - String containing the page to be sent to the browser
$out="";

### End of global variables ###

// treats the several possible inputs
switch($_POST['submit']) {
	case "saveprofile":
		if($_SESSION['adminlevel']>=2)
			$message=saveprofile();
		else
			$message=$langmessage[98];
		break;
	default:
}

// read the menu
readmenu();

// reads the admin functions if the user is logged in
if($_SESSION['adminlevel']>3) {
	require_once "./LightNEasy/admin.php";
//call admin functions for treating inputs if logged in
	treat_posts();
}

// Sets the path to the template file
if($selected['template']=="") $selected['template']=$set['template'];
$templatepath="./templates/".$selected['template']."/template.php";
//defaults to lightneasy template if selected template not found
if (!file_exists($templatepath)) $templatepath="templates/lightneasy/template.php";
if (!file_exists($templatepath)) die ($templatepath." ".$langmessage[109]);

if(file_exists("LightNEasy/install.php"))
	if(!@unlink("LightNEasy/install.php"))
		$message=$langmessage[24]."<br />".$message;
	else
		@unlink("LightNEasy/install1.php");

if($_GET['do']=="generate") generate();
//if($_GET['do']=="generate") $message="Function disabled";
if($admintemplate) {
	$selected['template']="admintemplate";
	$templatepath="templates/".$selected['template']."/template.php";
}

//Read the template and execute the template markers
$page=file_get_contents($templatepath);
while($page != "") {
	if($pagearray=explode($set['openfield'],stripslashes($page),2)) {
		$out.=$pagearray[0];
		$page=$pagearray[1];
		if($pagearray=explode($set['closefield'],$page,2)) {
			$command=trim($pagearray[0]);
			$page=$pagearray[1];
			switch($command) {
				case "content": $out .= content(); break;
				case "expmenu": $out .= expmenu(0); break;
				case "extra": $out .= extra(); break;
				case "footer": $out .= $set['footer']; break;
				case "fullmenu": $out .= fullmenu(0); break;
				case "search": $out.=searchform(); break;
				case "header": $out .= printheader(0,$selected['name'],$selected['description']); break;
				case "homelink": $out .= '<a href="'.$set['homepath']."\">$langmessage[111]</a>"; break;
				case "image": $out .= "./templates/".$selected['template']."/images/"; break;
				case "login":  $out .= loginout(); break;
				case "loginform":  $out .= loginform(); break;
				case "mainmenu": $out .= mainmenu(0); break;
				case "mainmenu1": $out.= mainmenu(0,1); break;
				case "mainmenu2": $out.= mainmenu(0,2); break;
				case "mainmenu3": $out.= mainmenu(0,3); break;
				case "subtitle": $out .= $set['subtitle']; break;
				case "title": $out .= '<a href="'.$set['homepath'].'">'.$set['title'].'</a>'; break;
				case "selected": $out .= $selected['name']; break;
				case "sitemap": $out .= sitemap(0); break;
				case "submenu": $out .= submenu(0); break;
				case "treemenu": $out.= treemenu(0); break;
				default: {
					if(strpos($command, "plugin")!== false) {
						$aa=explode(" ",$command,2);
						$pluginpath="plugins/".trim($aa[1]);
						if(file_exists($pluginpath."/first.mod"))
							$out=file_get_contents($pluginpath."/first.mod").$out;
						if(file_exists($pluginpath."/header.mod"))
							$out=str_replace("</head>",file_get_contents($pluginpath."/header.mod")."\n</head>",$out);
						if(file_exists($pluginpath."/onload.mod"))
							$out=str_replace("<body","<body onload=\"".file_get_contents($pluginpath."/onload.mod")."\"",$out);
						if(file_exists($pluginpath."/include.mod"))
							include "plugins/".trim($aa[1])."/include.mod";
						if(file_exists($pluginpath."/place.mod"))
							$out.=file_get_contents("$pluginpath/place.mod");
					} elseif(substr($command,0,5) == "extra") {
						$aa = explode(" ",$command,2);
						$out .= extra($aa[1]);
					} else {
						$found=false;
						$output=dbquery("SELECT * FROM ".$prefix."addons WHERE active=1");
						$addonss=fetch_all($output);
						foreach($addonss as $addon) {
							if($command==$addon['name']) {
								$found=true;
								require_once "addons/".$addon['name']."/main.php";
								$out.=$addon['fname']();
								break;
							} elseif(substr($command,0,strlen($addon['name'])) == $addon['name']) {
								$found=true;
								require_once "addons/".$addon['name']."/main.php";
								$bb = trim(substr($command, strlen($addon['name'])));
								$aa = explode(" ",$bb);
								if($aa[3] != "") $out .= $addon['fname'](clean($aa[0]),clean($aa[1]),clean($aa[2]),clean($aa[3]));
								elseif($aa[2]!="") $out .= $addon['fname'](clean($aa[0]),clean($aa[1]),clean($aa[2]));
								elseif($aa[1]!="") $out .= $addon['fname'](clean($aa[0]),clean($aa[1]));
								else $out .= $addon['fname'](clean($aa[0]));
								break;
							}
						}
						if(!$found)
							$out .= $command;
					}
				}
			}
		} else break;
	} else break;
}
if($page != "") $out .= $page;

// $out contains the complete page, print it
print $out;

### Execution end ###

// displays the content and interprets incomming commands
function content() {
global $pagenum, $selected, $message, $menu, $set, $langmessage, $LNEversion, $out, $prefix;
if($message!="") $out.="<div class=\"LNE_message\">".$message."</div>\n";
if($_SESSION['adminlevel']>3) $out.=adminmenu();
switch($_GET['do']) {
	case "search":
		$out.="<h2 class=\"LNE_title\">$langmessage[66]</h2>\n";
		$out.=search();
		break;
	case "register":
		if($set['gzip'])
			$out.=register();
		break;
	case "addons":
		$out.=addons();
		break;
	case "create":
		$out.= create_page();
		break;
	case "database":
		$out.=query();
		break;
	case "delete":
		delete_page();
		break;
	case "edit":
		print $out;
		$out="";
		editpage();
		break;
	case "editextra":
		print $out;
		$out="";
		extras();
		break;
	case "editmenu":
		$out.= editmenu();
		break;
	case "login":
		$out.= loginform();
		break;
	case "plugins":
		$out.=plugins();
		break;
	case "profile":
		if($_SESSION[$set['password']]=="1")
			$out.= profile();
		break;
	case "query":
		$out.= query();
		break;
	case "settings":
		$out.= settings();
		break;
	case "setup":
		$out.= setup();
		break;
	case "sitemap":
		$out.= showsitemap($langmessage,0);
		break;
	case "users":
		$out.= users();
		break;
	default: {
		$addons=fetch_all(dbquery("SELECT * FROM ".$prefix."addons WHERE active=1"));
		$found=false;
		foreach($addons as $addon)
			if($_GET['do']==$addon['name'] && $_SESSION['adminlevel']>=$addon['adminlevel']) {
				require_once "addons/".$addon['name']."/admin.php";
				$out.=$addon['aname']();
				$found=true;
				break;
			}
		if(!$found) {
			$result = dbquery("SELECT * FROM ".$prefix."paginas WHERE page=\"".$pagenum."\"");
			if($row=fetch_array($result)) {
				if($row['restricted']!=0 && $row['restricted'] > $_SESSION['adminlevel'])
					$out.=restrictedpage($row['restricted']);
				else {
					$contnt=html_entity_decode(stripslashes($row['content']));
					showcontent($contnt);
				}
			} else {
				$result = dbquery("SELECT * FROM ".$prefix."paginas WHERE page=\"index\"");
				if($row=fetch_array($result)) {
					$contnt=html_entity_decode(stripslashes($row['content']));
					showcontent($contnt);
				} else $out.="<h2>$langmessage[116]</h2>\n";
			}
			foreach($addons as $addon)
				if(strpos( $contnt,"%!$".$addon['name']) && $addon['header']==1)
					require_once "addons/".$addon['name']."/header.php";
		}
	}
  }
}

function showcontent($page, $count=0) {
	global $out, $prefix;
	$open="%!$";
	$close="$!%";
	while(strpos($page,$open)) {
		$pagearray=explode($open,$page,2);
		$out.=$pagearray[0];
		$pagearray1=explode($close,$pagearray[1],2);
		$token=explode(" ", $pagearray1[0],2);
		switch($token[0]) {
			case "include":
				include clean($token[1]);
				break;
			case "first":
				$aaa=include clean($token[1]);
				$out=$aaa.$out;
				break;
			case "plugin":
				$pluginame="./plugins/".clean($token[1]);
				if(file_exists($pluginame."/header.mod"))
					$out=str_replace("</head",file_get_contents($pluginame."/header.mod")."\n</head",$out);
				if(file_exists($pluginame."/first.mod"))
					include $pluginame."/first.mod";
				if(file_exists($pluginame."/onload.mod"))
					$out=str_replace("<body","<body onload=\"".file_get_contents($pluginame."/onload.mod")."\"",$out);
				if(file_exists("$pluginame/place.mod"))
					$out.=file_get_contents("$pluginame/place.mod");
				if(file_exists("$pluginame/include.mod")) {
					include "$pluginame/include.mod";
				}
				break;
			case "function":
				$bb=clean($token[1]);
				$aa=explode(" ",$bb);
				if($aa[3]!="") $out.=$aa[0](clean($aa[1]),clean($aa[2]),clean($aa[3]));
				elseif($aa[2]!="") $out.=$aa[0](clean($aa[1]),clean($aa[2]));
				elseif($aa[1]!="") $out.=$aa[0](clean($aa[1]));
				else $out.=$aa[0]();
				break;
			case "head":
				$out=str_replace("</head>",file_get_contents(clean($token[1]))."\n</head>",$out);
				break;
			case "place":
				$out.=clean(file_get_contents(trim($token[1])));
				break;
			default:
			$found=false;
			$addons=fetch_all(dbquery("SELECT * FROM ".$prefix."addons where active=1"));
			foreach($addons as $addon) {
				if($pagearray1[0]==$addon['name']) {
					$found=true;
					require_once "addons/".$addon['name']."/main.php";
					$out.=$addon['fname']();
					break;
				} elseif(substr($pagearray1[0],0,strlen($addon['name'])) == $addon['name']) {
					$found=true;
					require_once "addons/".$addon['name']."/main.php";
					$bb = trim(substr($pagearray1[0],strlen($addon['name'])));
					$aa = explode(" ",$bb);
					if($aa[3] != "") $out .= $addon['fname'](clean($aa[0]),clean($aa[1]),clean($aa[2]),clean($aa[3]));
					elseif($aa[2]!="") $out .= $addon['fname'](clean($aa[0]),clean($aa[1]),clean($aa[2]));
					elseif($aa[1]!="") $out .= $addon['fname'](clean($aa[0]),clean($aa[1]));
					else $out .= $addon['fname'](clean($aa[0]));
					break;
				}
			}
			if(!$found) $out.="\n".html_entity_decode(stripslashes($pagearray1[0]))."\n";
		}
		$page=$pagearray1[1];
	}
	if($page!="") $out.=$page;
}

function credits() {
global $LNEversion;
return "\n<!-- +++++++++++++++++++++++++++++++++++++++++++++++++
| LightNEasy $LNEversion Content Management System
| SQLite/MySQL version
++++++++++++++++++++++++++++++++++++++++++++++++++++++
| Copyright 2007-2012 Fernando Baptista
| http://www.lightneasy.org
++++++++++++++++++++++++++++++++++++++++++++++++++++++
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->\n";
}

function extra($id=999) {
	global $prefix, $selected;
	if($id==999) {
		$result=dbquery("SELECT * FROM ".$prefix."paginas WHERE page=\"".$selected['link']."\"");
		$row=fetch_array($result);
		$id=$row['m3'];
		if($id==0)
			return;
	}
	$result=dbquery("select content FROM ".$prefix."extras WHERE id=$id");
	if($row=fetch_array($result))
		showcontent(stripslashes(html_entity_decode($row['content'])));
	else {
		$result=dbquery("select content FROM ".$prefix."extras WHERE id=1");
		if($row=fetch_array($result))
			showcontent(stripslashes(html_entity_decode($row['content'])));
	}
}

function sitemap($generate) {
//prints the sitemap link
	global $set, $pagenum, $langmessage;
	if($generate)
		return '<a href="?do=sitemap" rel="nofollow">'.$langmessage[88].'</a>';
	else
		return '<a href="'.$set['indexfile'].'?page='.$pagenum.'&amp;do=sitemap" rel="nofollow">'.$langmessage[88].'</a>';
}
?>
