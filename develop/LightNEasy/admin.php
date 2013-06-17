<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2012 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| administration module admin.php
| Version 3.2.5 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
# This module contains the admin functions
if ($_SESSION['adminlevel']<4)
	die ('Access Denied!');
if ($_SERVER['SERVER_NAME']!=$myserver)
	die ('Access Denied!');

function treat_posts() {
	global $message, $edit, $editextra, $langmessage, $set, $pagenum, $menu, $prefix, $out, $admintemplate;

	if($_POST['return']=="Return") {
			unset($_GET['do']);
			unset($_POST['submit']);
			$edit=0;
			$editextra=0;
	}
	switch($_POST['submit']) {
		case "adduser":
			if($_SESSION['adminlevel']<5) {
				$message=$langmessage[28];
				break;
			}
			if($_POST['handle']=="") {
				$message=$langmessage[2];
				break;
			}
			if($_POST['password']=="") {
				$message=$langmessage[3];
				break;
			}
			if($_POST['email']=="") {
				$message=$langmessage[4];
				break;
			}
			if($_POST['password']!=$_POST['repeatpassword']) {
				$message=$langmessage[5];
				break;
			}
			$query='INSERT INTO '.$prefix.'users (id, handle, password, adminlevel, ip, datejoined, email, firstname, lastname, website, location) VALUES (null, "'.encode($_POST['handle']).'", "'.sha1($_POST['password']).'", '.$_POST['adminlevel'].', "", '.time().', "'.$_POST['email'].'", "'.encode($_POST['firstname']).'", "'.encode($_POST['lastname']).'", "'.$_POST['website'].'", "'.encode($_POST['location']).'")';
			dbquery($query);
			$message=$langmessage[27];
			unset($_GET['action']);
			break;
		case "saveuser":
			$query ="UPDATE ".$prefix."users SET ";
			if($_POST['password']!="") {
				if($_POST['password']==$_POST['repeatpassword'])
					$query.="password=\"".sha1($_POST['password'])."\", ";
				else {
					$message=$langmessage[5];
					break;
				}
			}
			$query.="handle=\"".encode($_POST['handle'])."\", email=\"".$_POST['email']."\", firstname=\"".encode($_POST['firstname'])."\", lastname=\"".encode($_POST['lastname'])."\", website=\"".$_POST['website']."\", location=\"".encode($_POST['location'])."\", adminlevel=".$_POST['adminlevel']." WHERE id=".$_POST['userid'];
			dbquery($query);
			$message=$langmessage[26];
			unset($_GET['action']);
			break;
		case "deleteuser":
			if($output=dbquery("SELECT * FROM ".$prefix."users WHERE id=".$_POST['userid'])) {
				$row=fetch_array($output);
				if($_SESSION['adminlevel'] < $row['adminlevel'])
					break;
			} else
				break;
			$query = "DELETE FROM ".$prefix."users WHERE id=".$_POST['userid'];
			dbquery($query);
			unset($_GET['action']);
			break;
		case "Save":
			if($_POST['mycontent']!="") {
				dbquery("UPDATE ".$prefix."paginas SET content=\"".htmlentities($_POST['mycontent']).'", description="'.encode($_POST['description']).'", template="'.$_POST['template'].'", restricted='.$_POST['restricted'].', m3='.$_POST['extra'].' WHERE page="'.$_POST['pagenum'].'"');
				$edit=0;
				$message=$langmessage[102];
				unset($_GET['do']);
			}
			break;
		case "Save Extra":
			$id=$_POST['id'];
			$result=dbquery('SELECT content FROM '.$prefix.'extras WHERE id='.$id);
			if(num_rows($result))
				dbquery('UPDATE '.$prefix.'extras SET content="'.htmlentities($_POST['mycontent']).'" WHERE id='.$id);
			else
				dbquery('insert into '.$prefix.'extras (id,content) VALUES (null,"'.htmlentities($_POST['mycontent']).'")');
			unset($_GET['do']);
			$editextra=0;
			$message=$langmessage[103];
			break;
		case "Save Setup":
			$query="UPDATE ".$prefix."settings set ";
			if($_POST['password']!="") $query.='password="'.sha1($_POST['password']).'", ';
			if($_POST['restricted']!="") $query.='restricted="'.$_POST['restricted'].'", ';
			$query.='admin="'.$_POST['admin'].'", email="'.$_POST['email'].'", wemail="'.$_POST['wemail'].'", ';
			$query.='homepath="'.$_POST['homepath'].'", template="'.$_POST['template'].
			'", title="'.encode($_POST['title']).'", subtitle="'.encode($_POST['subtitle']).
			'", keywords="'.encode($_POST['keywords']).
			'", description="'.encode($_POST['description']).
			'", author="'.encode($_POST['author']).
			'", footer="'.encode($_POST['footer']).
			'", gzip='.$_POST['gzip'].
			', timeoffset='.$_POST['timeoffset'].
			', dateformat="'.$_POST['dateformat'].
			'", extension="'.$_POST['extension'].
			'", indexfile="'.$_POST['indexfile'].
			'", language="'.$_POST['language'].
			'", langeditor="'.$_POST['langeditor'].'"';
			if(!dbquery($query)) die($langmessage[22]);
			unset($_GET['do']);
			readsetup();
			$message=$langmessage[150];
			break;
		case "Edit Menu Entry":
			$query='UPDATE '.$prefix.'menu SET m1='.$_POST['m1'].', m2='.$_POST['m2'].', m3='.$_POST['m3'].', page="'.$_POST['m4'].'", nome="'.encode($_POST['m5']).'" WHERE page="'.$_POST['oldm4'].'"';
			dbquery($query);
			unset($_GET['action']);
			readmenu();
			break;
		case "Delete Menu Entry":
			dbquery("DELETE FROM ".$prefix."menu WHERE page=\"".$_POST['oldm4']."\"");
			unset($_GET['action']);
			readmenu();
			break;
		case "Query Database":
			dbquery(sanitize(stripslashes($_POST['query'])));
			$message=$langmessage[46];
			unset($_GET['do']);
			break;
		case "Delete Page":
			$link=sanitize($_POST['link']);
			dbquery('DELETE FROM '.$prefix.'menu WHERE page="'.$link.'"');
			dbquery('DELETE FROM '.$prefix.'paginas WHERE page="'.$link.'"');
			if(file_exists($link.".php"))
				unlink($link.".php");
			unset($_GET['do']);
			$pagenum="index";
			$message=$langmessage[104];
			readmenu();
			break;
		case "Create Page":
			if($_POST['filename']=="" || $_POST['label']=="")
				$message=$langmessage[97];
			else {
				$count=0;
				while($menu[$count][3]!="") {
					if($menu[$count][3]==$_POST['count']) break;
					$count++;
				}
				if(!strval(strstr($_POST['filename'], "*")))
					$create=1;
				else
					$create=0;
				$label=htmlentities(sanitize(trim($_POST['label'])));
				$filename1=sanitize(trim($_POST['filename']));
				$descr=encode(sanitize($_POST['description']));
				$templat=sanitize($_POST['template']);
				$restricted=$_POST['restricted'];
				$extra=sanitize(trim($_POST['extra']));
				switch($_POST['level']) {
					case "1": {
						$bb=strval($menu[$count][0])+1;
						dbquery("UPDATE ".$prefix."menu SET m1=m1+1 WHERE m1>=".$bb);
						dbquery("INSERT INTO ".$prefix."menu (m1,m2,m3, page, nome) VALUES ($bb,0,0,\"".$filename1."\",\"".$label."\")");
						if($create) addpage ($bb,0,$extra,$filename1,$label,$descr,$templat,$restricted);
						break;
					}
					case "2": {
						$bb=strval($menu[$count][1])+1;
						$query="UPDATE ".$prefix."menu SET m2=m2+1 WHERE m1=".$menu[$count][0]." AND m2>=".$bb;
						dbquery($query);
						$query="INSERT INTO ".$prefix."menu (m1,m2,m3, page, nome) VALUES (".$menu[$count][0].",".$bb.",0,\"".$filename1."\",\"".$label."\")";
						dbquery($query);
						if($create) addpage ($menu[$count][0],$bb,$extra,$filename1,$label,$descr,$templat,$restricted);
						break;
					}
					case "3": {
						$bb=strval($menu[$count][2])+1;
						$query="UPDATE ".$prefix."menu SET m3=m3+1 WHERE m1=".$menu[$count][0]." AND m2=".$menu[$count][2]." AND m3>=$bb";
						dbquery($query);
						$query="INSERT INTO ".$prefix."menu (m1,m2,m3, page, nome) VALUES (".$menu[$count][0].",".$menu[$count][1].",".$bb.",\"".$filename1."\",\"".$label."\")";
						dbquery($query);
						if($create) addpage ($menu[$count][0],$menu[$count][1],$extra,$filename1,$label,$descr,$templat,$restricted);
						break;
					}
				}
				$message=$langmessage[87];
				$pagenum="index";
				readmenu();
			}
			break;
		default:
	}

	$admintemplate=false;
	if(isset($_GET['do']) && $_GET['do']!="profile" && $_GET['do']!="search" && $_GET['do']!="login" && $_GET['do']!="sitemap")
		$admintemplate=true;

	switch($_GET['do']) {
		case "edit":
			if($_SESSION[$set['password']]=="1") $edit=1;
			else {
				$edit=0;
				unset($_GET['do']);
			}
			break;
		case "editextra":
			if($_SESSION[$set['password']]=="1") $editextra=1;
			else {
		    	$editextra=0;
	    		unset($_GET['do']);
			}
			break;
		default:
	}
}

function generate() {
	global $edit, $langmessage, $set, $pagenum, $menu, $templatepath, $selected, $LNEversion, $prefix, $out;
	$edit=0;
	$count=0;
	$go_sm = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset\n\t
      xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"\n\t
      xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"\n\t
      xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n
	<url>\n
	<loc>http://".sv(SERVER_NAME)."/</loc>\n
	<priority>0.6</priority>\n
	<lastmod>".date('Y-m-d')."</lastmod>\n
	<changefreq>daily</changefreq>\n</url>\n";
	while($menu[$count][0]!="") {
		$result1 = dbquery("SELECT * FROM ".$prefix."paginas WHERE page=\"".str_replace("_","",$menu[$count][3])."\"");
		$row1=fetch_array($result1);
		if($row1['template']!="")
			$template2=$row1['template'];
		else
			$template2=$set['template'];
		$row1['description']=decode($row1['description']);
		$out="";
		$pagenum=str_replace("''", "'",$menu[$count][3]);
		$pagenum=str_replace("_","",$pagenum);
		if(!strval(strstr($menu[$count][3], "*"))) {
			$selected['index']=$menu[$count][0];
			$selected['name']=$menu[$count][4];
			$selected['link']=$menu[$count][3];
			
			//query page record for template
			$page="<?php \$pagenum=\"".$pagenum."\"; require_once \"./LightNEasy/runtime.php\"; ?>\n";
			$page.=file_get_contents("templates/".$template2."/template.php");
			$go_sm .= "<url>\n
			<loc>http://".sv(SERVER_NAME).dirname(sv(REQUEST_URI)).$menu[$count][3].".php</loc>\n
			<priority>0.5</priority>\n
			<lastmod>". date('Y-m-d') ."</lastmod>\n
			<changefreq>daily</changefreq>\n
			</url>\n";
			if(!$fp=fopen($pagenum.".php","w"))
				die($langmessage[110].$pagenum.".php");
			$contnt=html_entity_decode(stripslashes($row1['content']));
			//Look in the content for header modules
			while($page != "") {
				if($pagearray=explode($set['openfield'],$page,2)) {
					$out.=$pagearray[0];
					$page=$pagearray[1];
					if($pagearray=explode($set['closefield'],$page,2)) {
						$command=trim($pagearray[0]);
						$page=$pagearray[1];
						switch($command) {
							case "content": {
								contentmarkers($contnt);
								$out.="<?php content(\"".$pagenum."\"); ?>";
								break;
							}
							case "header": {
								$out.=printheader(1,$selected['name'],$row1['description'],$template2);
								break;
							}
							case "footer":		$out.="<?php print footer(); ?>"; break;
							case "search": 		$out.="<?php print searchform(); ?>"; break;
							case "homelink":	$out.="<a href=\"".$set['homepath']."\">$langmessage[111]</a>"; break;
							case "image":		$out.="templates/".$set['template']."/images/"; break;
							case "extra":		$out.="<?php print extra(\"".$selected['link']."\"); ?>\n"; break;
							case "login":		$out.="<?php print loginout(); ?>\n"; break;
							case "loginform":	$out.="<?php print loginform(); ?>\n"; break;
							case "mainmenu":	$out.="<?php print mainmenu(1); ?>\n"; break;
							case "mainmenu1":	$out.="<?php print mainmenu(1,1); ?>\n"; break;
							case "mainmenu2":	$out.="<?php print mainmenu(1,2); ?>\n"; break;
							case "mainmenu3":	$out.="<?php print mainmenu(1,3); ?>\n"; break;
							case "treemenu":	$out.="<?php print treemenu(1); ?>\n"; break;
							case "fullmenu":	$out.="<?php print fullmenu(1); ?>\n"; break;
							case "expmenu":		$out.="<?php print expmenu(1); ?>\n"; break;
							case "submenu":		$out.="<?php print submenu(1); ?>\n"; break;
							case "selected":	$out.=$selected['name']; break;
							case "sitemap":		$out.=sitemap(1); break;
							case "subtitle":	$out.=$set['subtitle']; break;
							case "title":		$out.='<a href="'.$set['homepath'].'">'.$set['title'].'</a>'; break;
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
										$out.="<?php include \"plugins/".trim($aa[1])."/include.mod\"; ?>\n";
									if(file_exists($pluginpath."/place.mod"))
										$out.=file_get_contents("$pluginpath/place.mod");
								} elseif(strpos($command, "extra")!== false) {
									$aa=explode(" ",$command,2);
									$out.="<?php print extra(\"".$selected['link']."\",".$aa[1]."); ?>";
								} else {
									$found=false;
									$addons=fetch_all(dbquery("SELECT * FROM ".$prefix."addons WHERE active=1"));
									foreach($addons as $addon) {
										if($command==$addon['name']) {
											$out.="<?php require_once \"addons/".$addon['name']."/main.php\"; print ".$addon['fname']."(); ?>";
											$found=true;
											break;
										} elseif(substr($command,0,strlen($addon['name'])) == $addon['name']) {
											$found=true;
											$out.="<?php require_once \"addons/".$addon['name']."/main.php\"; ";
											$bb = trim(substr($command,strlen($addon['name'])));
											$aa = explode(" ",$bb);
											if($aa[3] != "") $out.="print ".$addon['fname']."('$aa[0]','$aa[1]','$aa[2]','$aa[3]')";
											elseif($aa[2]!="") $out.="print ".$addon['fname']."('$aa[0]','$aa[1]','$aa[2]')";
											elseif($aa[1]!="") $out.="print ".$addon['fname']."('$aa[0]','$aa[1]')";
											else $out.="print ".$addon['fname']."('$aa[0]')";
											$out.="; ?>";
											break;
										}
									}
									if(!$found)
										$out.=$command;
								}
							}
						}
					} else break;
				} else break;
			}
			if($page != "") $out.=$page;
			fwrite($fp,$out);
			fclose($fp);
			@chmod($menu[$count][3].".php", 0755);
			if(file_exists($menu[$count][3].".html")) unlink($menu[$count][3].".html");
		}
		$count++;
	}
	$go_sm .= "</urlset>\n";
	$fp_go = fopen('sitemap.xml', 'w');
	fwrite($fp_go, $go_sm);
	fclose($fp_go);
	unset($_SESSION[$set['password']]);
	setcookie('userpass', "", time() - 60);
	setcookie('userhandle', "", time() - 60);
	session_destroy();
	unset($_GET['do']);
	header("Location: index.php");
}

function contentmarkers($contnt) {
	global $out;
		if(strpos($contnt, '%!$plugin')!==false) {
			$one=explode('%!$plugin',$contnt,2);
			$two=explode('$!%',$one[1],2);
			$pluginame="./plugins/".trim($two[0]);
			if(file_exists($pluginame."/onload.mod"))
				$out=str_replace("<body","<body onload=\"".file_get_contents($pluginame."/onload.mod")."\"",$out);
			if(file_exists($pluginame."/first.mod"))
				$out=file_get_contents($pluginame."/first.mod").$out;
		}
		if(strpos($contnt, '%!$first')!==false) {
			$one=explode('%!$first',$contnt,2);
			$two=explode('$!%',$one[1],2);
			$three=file_get_contents(trim($two[0]))."\n<!DOCTYPE";
			$out=str_replace("<!DOCTYPE",$three,$out);
		}
		if(strpos($contnt, '%!$head')!==false) {
			$one=explode('%!$head',$contnt,2);
			$two=explode('$!%',$one[1],2);
			$three=file_get_contents(trim($two[0]))."\n</head>";
			$out=str_replace("</head>",$three,$out);
		}
}

function addpage($m1,$m2,$m3,$page,$nome,$descr,$templat,$restricted) {
	global $prefix;
	$query='INSERT INTO '.$prefix.'paginas (m1,m2,m3,page,nome,content,description,template,restricted) VALUES ('.$m1.','.$m2.','.$m3.',"'.$page.'","'.$nome.'","'.htmlentities("<h2 class=\"LNE_title\">").$nome.htmlentities("</h2>").'","'.$descr.'","'.$templat.'",'.$restricted.')';
	dbquery($query);
}

function addons() {
	global $out, $prefix, $langmessage, $message;
	$out.="<h2>".$langmessage[178]."</h2>\n<hr />\n";
	if($_GET['action']=="edit" && $_GET['name']!="") {
		if(!isset($_POST['submit'])) {
			$addon=fetch_array(dbquery("SELECT * FROM ".$prefix."addons WHERE name=\"".$_GET['name']."\""));
			$out.="<form id=\"form1\" name=\"form1\" method=\"post\" action=\"\">\n<table>\n";
			$out.="<tr><td align=\"right\">Name:</td><td><input type=\"text\" name=\"name\" value=\"".$addon['name']."\" /></td></tr>\n";
			$out.="<tr><td align=\"right\">Function name:</td><td><input type=\"text\" name=\"fname\" value=\"".$addon['fname']."\" /></td></tr>\n";
			$out.="<tr><td align=\"right\">Admin name:</td><td><input type=\"text\" name=\"aname\" value=\"".$addon['aname']."\" /></td></tr>\n";
			$out.="<tr><td align=\"right\">Active:</td><td><input type=\"text\" name=\"active\" value=\"".$addon['active']."\" /></td></tr>\n";
			$out.="<tr><td align=\"right\">Admin Level:</td><td><input type=\"text\" name=\"adminlevel\" value=\"".$addon['adminlevel']."\" /></td></tr>\n";
			$out.="<tr><td align=\"right\">Header:</td><td><input type=\"text\" name=\"header\" value=\"".$addon['header']."\" /></td></tr>\n";
			$out.="<tr><td><input type=\"hidden\" name=\"id\" value=\"".$addon['id']."\" /></td><td><input type=\"submit\" name=\"submit\" value=\"Submit\" /></td></tr>\n";
			$out.="</table>\n</form>\n";
		} else {
			dbquery("UPDATE ".$prefix."addons SET name=\"".$_POST['name']."\", fname=\"".$_POST['fname']."\", aname=\"".$_POST['aname']."\", active=\"".$_POST['active']."\", adminlevel=\"".$_POST['adminlevel']."\", header=\"".$_POST['header']."\" WHERE id=\"".$_POST['id']."\"");
			$out.="<h3>Addon ".$_POST['name']." updated</h3>\n";
		}
	} else {
		if(!isset($_POST['submit'])) {
			$out.="<form id=\"form1\" name=\"form1\" method=\"post\" action=\"\">\n<table>\n";
			$out.="<tr><td align=\"right\">Name:</td><td><input type=\"text\" name=\"name\" value=\"\" /></td></tr>\n";
			$out.="<tr><td align=\"right\">Function name:</td><td><input type=\"text\" name=\"fname\" value=\"\" /></td></tr>\n";
			$out.="<tr><td align=\"right\">Admin name:</td><td><input type=\"text\" name=\"aname\" value=\"\" /></td></tr>\n";
			$out.="<tr><td align=\"right\">Active:</td><td><input type=\"text\" name=\"active\" value=\"\" /></td></tr>\n";
			$out.="<tr><td align=\"right\">Admin Level:</td><td><input type=\"text\" name=\"adminlevel\" value=\"\" /></td></tr>\n";
			$out.="<tr><td align=\"right\">Header:</td><td><input type=\"text\" name=\"header\" value=\"\" /></td></tr>\n";
			$out.="<tr><td></td><td><input type=\"submit\" name=\"submit\" value=\"Add Addon\" /></td></tr>\n";
			$out.="</table>\n</form>\n";
		} else {
			$query="INSERT INTO ".$prefix."addons VALUES ( null, \"".clean($_POST['name'])."\", \"".clean($_POST['fname'])."\", \"".clean($_POST['aname'])."\", ".$_POST['active'].", ".$_POST['adminlevel'].", ".$_POST['header']." )";
			if(dbquery($query))
				$out.="<h3>Addon ".clean($_POST['name'])." added</h3>\n";
			else
				$out.="<h3>Error adding addon</h3>\n";
		}
	}
	$addons=fetch_all(dbquery("SELECT * FROM ".$prefix."addons"));
	$found=false;
	foreach($addons as $addon) {
		if(!$found) {
			$found=true;
			$out.="<div id=\"LNE_admininput\">\n<table>\n";
		}
		$out.="<tr><td>".$addon['name']."</td><td align=\"middle\"><a href=\"".$set['homepath'].$set['indexfile']."?page=".$pagenum."&amp;do=addons&amp;action=edit&amp;name=".$addon['name']."\">\n";
		$out.="<img src=\"images/edit.png\" alt=\"edit\" title=\""."Edit"."\"align=\"left\" border=\"0\" /></a></td><td>";
		if($addon['active'])
			$out.="<img src=\"images/accept.png\" alt=\"active\" title=\"Active\" border=\"0\" align=\"center\" />";
		$out.="</td></tr>\n";
	}
	if($found)
		$out.="</table>\n</div>\n";
}

//displays the 3 icons: edit, delete, admin menu
function adminmenu() {
	global $set,$pagenum, $langmessage;
	$aa="";
	if($_SESSION[$set['password']]=="1") {
		$aa.="\n<div id=\"LNE_admin\"><table>\n\t<tr>";
		$aa.="<td><a href=\"".$set['homepath'].$set['indexfile']."?page=".$pagenum."&amp;do=edit\">\n\t";
		$aa.="<img src=\"images/edit.png\" alt=\"edit\" title=\"".$langmessage[152]."\" align=\"left\" /></a></td>\n\t";
		$aa.="<td><a href=\"".$set['homepath'].$set['indexfile']."?page=".$pagenum."&amp;do=delete\">";
		$aa.="<img src=\"images/editdelete.png\" alt=\"delete\" align=\"left\" title=\"".$langmessage[136]."\" /></a></td>\n\t";
		$aa.="<td><a href=\"".$set['homepath'].$set['indexfile']."?do=settings\">";
		$aa.="<img src=\"images/tools.png\" alt=\"Settings\" align=\"left\" title=\"".$langmessage[34]."\" /></a></td>\n\t";
		$aa.="</tr>\n</table></div>\n";
	}
	return $aa;
}

function create_page() {
	global $set, $menu, $prefix, $langmessage;
	$out.="<h2>$langmessage[35]</h2>\n<form method=\"post\" action=\"\">
	<fieldset><table width=\"100%\"><tr><td align=\"right\"><b>$langmessage[83]:</b></td><td><select name=\"level\"><OPTION VALUE=\"1\">1&nbsp;</OPTION>\n
	<OPTION VALUE=\"2\">2&nbsp;</OPTION>\n<OPTION VALUE=\"3\">3&nbsp;</OPTION>\n</td></tr>\n
	<tr><td align=\"right\"><b>$langmessage[140]:</b></td><td><select name=\"count\">\n";
	$count=0;
	while($menu[$count][0] != "") {
		$out.="<option value=\"".$menu[$count][3]."\"";
		$out.=" selected >".$menu[$count][4]."&nbsp;</option>\n";
		$count++;
	}
	$out.="</select></td></tr>\n
	<tr><td align=\"right\"><b>$langmessage[84]:</b></td><td><input name=\"filename\" type=\"text\" style=\"width: 300px;\" /></td></tr>\n";
	$out.="<tr><td align=\"right\"><b>$langmessage[85]:</b></td><td><input name=\"label\" type=\"text\" style=\"width: 300px;\" /></td></tr>\n";
	$out.="<tr><td align=\"right\" valign=\"top\"><b>$langmessage[15]:</b></td><td><textarea name=\"description\" style=\"width: 400px;\"></textarea></td></tr>\n";
	$out.="<tr><td align=\"right\"><b>$langmessage[11]:</b></td><td><select name=\"template\">\n";
	$folder="templates";
	$out.="<OPTION VALUE=\"\">$langmessage[159]</OPTION>\n";
	$dir=opendir($folder);
	while($file=readdir($dir))
		if($file != ".." && $file != "." && is_dir($folder."/".$file))
		    $out.='<OPTION VALUE="'.$file.'">'.$file."&nbsp;</OPTION>\n";
	closedir($dir);
	$out.="</select></td></tr>\n";
	$out.="<tr><td align=\"right\"><b>$langmessage[160]</b></td><td>";
	$out.="<select name=\"restricted\">";
	$out.="<option value=\"0\">$langmessage[161]</option>";
	$out.="<option value=\"2\">$langmessage[162]</option>";
	$out.="<option value=\"3\">$langmessage[29]</option>";
	$out.="<option value=\"4\">$langmessage[163]</option>";
	$out.="</select></td></tr>\n";
	$out.="<tr><td align=\"right\"><b>$langmessage[36]:</b></td><td><select name=\"extra\">\n";
	$output=dbquery("SELECT id FROM ".$prefix."extras");
	$xtras=fetch_all($output);
	foreach($xtras as $xtra) {
		$out.="<option value=\"".$xtra['id'].'"';
		if($row['m3']==$xtra['id']) $out.=" SELECTED";
		$out.=">Extra ".$xtra['id']."</option>\n";
	}
	$out.="</select></td></tr>\n";
	$out.="<tr><td></td><td>\n";
	$out.="<input type=\"hidden\" name=\"submit\" value=\"Create Page\" />\n";
	$out.="<input type=\"submit\" name=\"\" value=\"$langmessage[86]\" />\n";
	$out.="</td></tr>\n</table></fieldset></form>\n";
	return $out;
}

function delete_page() {
	global $out, $pagenum, $langmessage, $selected, $prefix;
	$out.="<div align=\"center\">\n<h2>$langmessage[131]".$selected['name']."?</h2>\n";
	$out.="<form method=\"post\" action=\"\">\n<fieldset>\n";
	$out.="<input type=\"hidden\" name=\"link\" value=\"".$selected['link']."\" />\n";
	$out.="<input type=\"hidden\" name=\"submit\" value=\"Delete Page\" />\n";
	$out.="<input type=\"submit\" name=\"\" value=\"$langmessage[136]\" />\n";
	$out.="</fieldset></form>\n</div>\n";
	$result = dbquery("SELECT * FROM ".$prefix."paginas WHERE page=\"".$pagenum."\"");
	if($row=fetch_array($result))
		$out.=showcontent(stripslashes(html_entity_decode($row['content'])));
	else
		$out.="<h2>$langmessage[116]</h2>";
}

function editextra($id) {
	global $prefix;
	$result=dbquery("SELECT id, content FROM ".$prefix."extras WHERE id=$id");
	$row=fetch_array($result);
	print "<form method=\"post\" action=\"\">\n<fieldset>\n";
	editor(stripslashes(html_entity_decode($row['content'])));
	print savereturn("Save Extra", $id);
}

function editmenu() {
	global $menu, $langmessage, $set, $prefix;
	$out="<h2>$langmessage[91]</h2>\n<hr>\n";
	if($_GET['action']=="edit") {
		$result = dbquery("SELECT * FROM ".$prefix."menu WHERE page=\"".$_GET['page']."\"");
		$row=fetch_array($result);
		$out.='<div align="center"><form method="post" action=""><fieldset>';
		$out.="<table width=\"90%\" cellspacing=\"5\">";
		$out.="<tr><td>m1</td><td>m2</td><td>m3</td><td>$langmessage[69]</td><td>$langmessage[85]</td></tr>";
		$out.='<tr><td><input style=" width: 3em;" type="text" name="m1" value='.$row[0].' /></td>';
		$out.='<td><input style=" width: 3em;" type="text" name="m2" value='.$row[1].' /></td>';
		$out.='<td><input style=" width: 3em;" type="text" name="m3" value='.$row[2].' /></td>';
		$out.='<td><input type="text" name="m4" value="'.$row[3].'" size="10" /></td>';
		$out.='<td><input type="text" name="m5" value="'.decode($row[4]).'" size="30" /></td>';
		$out.='</tr></table><input type="hidden" name="oldm4" value="'.$row[3].'" />';
		$out.='<input type="hidden" name="submit" value="Edit Menu Entry" />';
		$out.='<input type="submit" name="" value="'.$langmessage[92].'" />';
		$out.="\n</fieldset></form></div>\n";
	}
	if($_GET['action']=="delete") {
		$result = dbquery("SELECT * FROM ".$prefix."menu WHERE page=\"".$_GET['page']."\"");
		$row=fetch_array($result);
		$out.='<div align="center"><form method="post" action=""><fieldset>';
		$out.="<table><tr><td>m1</td><td>m2</td><td>m3</td><td>$langmessage[69]</td><td>$langmessage[85]</td></tr>";
		$out.='<tr><td>'.$row[0].'</td>';
		$out.='<td>'.$row[1].'</td>';
		$out.='<td>'.$row[2].'</td>';
		$out.='<td>'.$row[3].'</td>';
		$out.='<td>'.decode($row[4]).'</td>';
		$out.='</tr></table><input type="hidden" name="oldm4" value="'.$row[3].'" />';
		$out.="<input type=\"hidden\" name=\"submit\" value=\"Delete Menu Entry\" />\n";
		$out.="<input type=\"submit\" name=\"\" value=\"$langmessage[93]\" />\n";
		$out.="</fieldset></form></div>";
	}
	$out.="<table cellspacing=\"5\" style=\"border: 0;\">\n
	<tr><td style=\" width: 14px;\"></td><td style=\" width: 14px;\"></td><td style=\" width: 14px;\"></td><td style=\" width: 14px;\"></td><td style=\" width: 14px;\"></td><td style=\" width: 140px;\"><b>$langmessage[69]:</b></td><td><b>$langmessage[85]:</b></td></tr>\n";
	$count=0;
	while($menu[$count][0]) {
		$out.='<tr><td>';
		$out.='<a href="'.$set['homepath'].$set['indexfile'].'?do=editmenu&amp;action=edit&amp;page='.$menu[$count][3].'"><img src="images/edit.png" title="'.$langmessage[92].'" style="align: left; border: 0;" ></a>';
		$out.='</td><td><a href="'.$set['homepath'].$set['indexfile'].'?do=editmenu&amp;action=delete&amp;page='.$menu[$count][3].'"><img src="images/editdelete.png" title="'.$langmessage[93].'" style="align: left; border: 0;" ></a>';
		$out.='</td><td>'.$menu[$count][0].'</td><td>'.$menu[$count][1].'</td><td>'.$menu[$count][2];
		$out.='</td><td>'.$menu[$count][3].'</td><td>';
		if($menu[$count][1]!="0")
			$out.="<span style=\" width: 20px; display: inline; float: left;\">-></span>";
		if($menu[$count][2]!="0")
			$out.="<span style=\" width: 20px; display: inline; float: left;\">-></span>";
		$out.=$menu[$count][4]."</td></tr>\n";
		$count++;
	}
	$out.="</table><hr>\n";
	return $out;
}

function editpage() {
	global $set, $langmessage, $selected, $pagenum, $prefix;
		print "<h2>$langmessage[90]</h2>\n";
		$result = dbquery('SELECT * FROM '.$prefix.'paginas WHERE page="'.$pagenum.'"');
		if($row=fetch_array($result))
			$out= stripslashes(html_entity_decode($row['content']));
		print "<form method=\"post\" action=\"\">\n<fieldset>\n";
		editor($out);
		print "\n<input  type=\"hidden\" name=\"pagenum\" value=\"".$pagenum."\" />\n";
		if($_POST['extra']=="1") {
			print savereturn("Save Page Extra");
		} else {
			print $langmessage[67].": <input style=\"width: 95%\" type=\"text\" name=\"description\" value=\"";
			if($row['description']!="")
				print decode($row['description']);
			print "\" />\n<table>\n";
			print "<tr><td>$langmessage[160]</td><td>";
			print "<select name=\"restricted\">\n";
			print "<option value=\"0\"";
			if($row['restricted']==0 || $row['restricted']==1) print " selected";
			print ">$langmessage[161]</option>";
			print "<option value=\"2\"";
			if($row['restricted']==2) print " selected";
			print ">$langmessage[162]</option>";
			print "<option value=\"3\"";
			if($row['restricted']==3) print " selected";
			print ">$langmessage[29]</option>";
			print "<option value=\"4\"";
			if($row['restricted']==4 || $row['restricted']==5) print " selected";
			print ">$langmessage[163]</option></select></td></tr>\n";
			print "<tr><td>$langmessage[11]&nbsp;</td><td><select name=\"template\">\n";
			print "<OPTION VALUE=\"\">Default</OPTION>\n";
			$folder="templates";
			$files=filelist("/./", "templates", 1);
			foreach($files as $file) {
				print '<OPTION VALUE="'.$file.'"';
				if(trim($file) == $row['template'] && $row['template']!="") print " SELECTED";
				print '>'.$file."&nbsp;</OPTION>\n";
			}
			print "</select></td></tr>\n";
			print "<tr><td>$langmessage[36]</td><td><select name=\"extra\">\n";
			$output=dbquery("SELECT id FROM ".$prefix."extras");
			$xtras=fetch_all($output);
			print "<option value=\"0\"";
			if($row['m3']==0) print " SELECTED";
			print ">None</option>\n";
			foreach($xtras as $xtra) {
				print "<option value=\"".$xtra['id'].'"';
				if($row['m3']==$xtra['id']) print " SELECTED";
				print ">Extra ".$xtra['id']."</option>\n";
			}
			print "</select></td></tr>\n</table>\n";
			print savereturn("Save");
		}
}

function editor($text) {
	global $set;
	include_once("fckeditor/fckeditor.php") ;
	$oFCKeditor = new FCKeditor('mycontent') ;
	$oFCKeditor->BasePath = "./fckeditor/";
	$oFCKeditor->Height = 400 ;
	if($set['langeditor']=="ZZ")
		$oFCKeditor->Config['AutoDetectLanguage'] = true ;
	else {
		$oFCKeditor->Config['AutoDetectLanguage'] = false ;
		$oFCKeditor->Config['DefaultLanguage'] = $set['langeditor'];
	}
//comment out the next line for using the FCK editor default skin
	$oFCKeditor->Config['SkinPath'] = "skins/silver/";
// the following line will work on some templates. Enable it if it works for you
//	$oFCKeditor->Config['EditorAreaCSS'] = "../../templates/".$set['template']."/style.css" ;
	$oFCKeditor->Value = $text;
	$oFCKeditor->Create() ;
}

function extras() {
	global $langmessage, $prefix;
	print "<h2>$langmessage[36]</h2>\n<hr />\n";
	if($_GET['action']=="delete" && $_GET['id']!="") {
		dbquery("DELETE FROM ".$prefix."extras WHERE id=".$_GET['id']);
		$_GET['id']="";
	}
	if($_GET['id']!="") {
		editextra($_GET['id']);
	} else {
		$result=dbquery("SELECT id, content FROM ".$prefix."extras");
		if(num_rows($result)>1) {
			$row=fetch_all($result);
			foreach($row as $res) {
				// Print the links to all extras
				print "<table><tr><td><a href='".$_SERVER["SCRIPT_NAME"]."?do=editextra&amp;action=edit&amp;id=".$res['id']."'><img src=\"images/edit.png\" alt=\"edit\" title=\"Edit extra\" style=\"align: left; border: 0;\" /></a></td><td><a href='".$_SERVER["SCRIPT_NAME"]."?do=editextra&amp;action=delete&amp;id=".$res['id']."'><img src=\"images/editdelete.png\" alt=\"delete\" title=\"Delete extra\" style=\"align: left; border: 0;\" /></a></td><td>$langmessage[36] ".$res['id']."</td></tr>\n</table>\n";
			}
		} else {
			$row=fetch_array($result);
			editextra($row['id']);
		}
	}
}

function plugins () {
	global $langmessage;
	$out="<h2>".$langmessage[23]."</h2><hr />\n";
	if(isset($_GET['src'])) {
		include $_GET['src'];
	} else {
		$folders=filelist ( "/./", "plugins", 1);
		$achou=false;
		foreach($folders as $folder) {
			if($achou==false) {
				$out.="<ul>\n";
				$achou=true;
			}
			$out.="<h3><ul><li>";
			if(file_exists("plugins/$folder/setup.mod"))
				$out.="<a href=\"?do=plugins&src=plugins/$folder/setup.mod\"><img src=\"images/toolss.png\" alt=\"setup\" title=\"Setup plugin\" style=\"border: none;\"/></a>&nbsp;".$folder;
			else
				$out.=$folder;
			$out.="</li></ul></h3>\n";
		}
		if($achou) $out.="</ul>\n";
	}
	return $out;
}

function query() {
	global $langmessage;
	$out.="<h2>$langmessage[45]</h2>\n<form method=\"post\" action=\"\"><fieldset>\n
	<div align=\"center\">\n
	<table width=\"95%\">\n
	<tr><td>$langmessage[47]:</td><td><textarea style=\"width: 95%; height: 60px;\" name=\"query\"></textarea></td></tr>\n
	</table>\n";
	$out.="<input type=\"hidden\" name=\"submit\" value=\"Query Database\" />\n";
	$out.="<input type=\"submit\" name=\"\" value=\"$langmessage[45]\" />\n";
	$out.="</div>\n</fieldset></form>\n";
	return $out;
}

// Displays the icons for save/return
function savereturn($value, $id=0) {
	global $langmessage;
	$out.="<input type=\"hidden\" name=\"submit\" value=\"$value\" />\n";
	$out.="<table>\n\t";
	if($id) {
		$out.="<tr><td align=\"center\" colspan=\"2\">";
		$out.="<select name=\"id\"><option value=\"$id\">".$langmessage[82]."</option><option value=\"0\">".$langmessage[173]."</option></select>";
		$out.="</td></tr>\n\t";
	}
	$out.="<tr><td valign=\"top\">";
	$out.="<input type=\"image\" name=\"aa\" value=\"\" src=\"images/accept.png\" title=\"".$langmessage[82]."\" style=\"width: 32px; height: 32px; border: none;\" />\n\t</fieldset></form>\n\t";
	$out.="<form style=\"border: none; margin: 0; padding: 0;\" method=\"post\" action=\"\">\n\t<fieldset style=\"border: none; margin: 0; padding: 0; background: transparent;\"></td>\n\t";
	$out.="<td valign=\"top\"><input type=\"hidden\" name=\"return\" value=\"Return\" />\n\t";
	$out.="<input type=\"image\" name=\"aa\" title=\"".$langmessage[153]."\" src=\"images/back.png\" value=\"\" style=\"width: 32px; height: 32px; border: none;\" />\n\t</td>";
	$out.="</tr>\n\t</fieldset>\n\t</form>\n</table>\n";
	return $out;
}

function settings() {
	global $langmessage, $set, $pagenum, $prefix;
	$out.="<h2>$langmessage[34]</h2><hr /><div id=\"LNE_admininput\">\n";
	$out.="<div class=\"LNE_settings\"><a href=\"".$set['homepath'].$set['indexfile']."?page=".$pagenum."&amp;do=create\"><img src=\"images/addpage.png\" alt=\"$langmessage[35]\" title=\"$langmessage[35]\" style=\"border: 0;\" /></a><br />".$langmessage[35]."</div>\n";
	$out.="<div class=\"LNE_settings\">\n<a href=\"".$set['homepath'].$set['indexfile']."?page=".$pagenum."&amp;do=editextra\"><img src=\"images/extra.png\" alt=\"$langmessage[36]\" title=\"$langmessage[36]\" style=\"border: 0;\" /></a><br />".$langmessage[36]."</div>\n";
	$out.="<div class=\"LNE_settings\"><a href=\"".$set['homepath'].$set['indexfile']."?page=".$pagenum."&amp;do=editmenu\"><img src=\"images/menu.png\" alt=\"$langmessage[41]\" title=\"$langmessage[41]\" style=\"border: 0;\" /></a><br />$langmessage[41]</div>\n";
	$out.="<div class=\"LNE_settings\"><a href=\"".$set['homepath'].$set['indexfile']."?page=".$pagenum."&amp;do=users\"><img src=\"images/user.png\" alt=\"$langmessage[154]\" title=\"$langmessage[154]\" style=\"border: 0;\" /></a><br />$langmessage[154]</div>\n";
	$out.="<div class=\"LNE_settings\"><a href=\"".$set['homepath'].$set['indexfile']."?page=".$pagenum."&amp;do=plugins\"><img src=\"images/plugins.png\" alt=\"$langmessage[177]\" title=\"$langmessage[177]\" style=\"border: 0;\" /></a><br />$langmessage[177]</div>\n";
	$out.="<div class=\"LNE_settings\"><a href=\"".$set['homepath'].$set['indexfile']."?page=".$pagenum."&amp;do=addons\"><img src=\"images/add.png\" alt=\"$langmessage[178]\" title=\"$langmessage[178]\" style=\"border: 0;\" /></a><br />$langmessage[178]</div>\n";
	$out.="<div class=\"LNE_settings\"><a href=\"".$set['homepath'].$set['indexfile']."?page=".$pagenum."&amp;do=setup\"><img src=\"images/setup.png\" alt=\"$langmessage[44]\" title=\"$langmessage[44]\" style=\"border: 0;\" /></a><br />$langmessage[44]</div>\n";
	$out.="<div class=\"LNE_settings\"><a href=\"".$set['homepath'].$set['indexfile']."?page=".$pagenum."&amp;do=database\"><img src=\"images/database.png\" alt=\"$langmessage[45]\" title=\"$langmessage[45]\" style=\"border: 0;\" /></a><br />$langmessage[45]</div>\n";
	$addons=fetch_all(dbquery("SELECT * FROM ".$prefix."addons WHERE active=1 ORDER BY name"));
	if(file_exists("addons/lang_".$set['language'].".php"))
		require_once "addons/lang_".$set['language'].".php";
	else
		require_once "addons/lang_en_US.php";
	foreach($addons as $addon) {
		if($addon['aname']!="") {
			$name=$addon['name'];
			$out.="<div class=\"LNE_settings\"><a href=\"".$set['homepath'].$set['indexfile']."?page=".$pagenum."&amp;do=".$addon['name']."\"><img src=\"addons/".$addon['name']."/icon.png\" alt=\"".$addon['name']."\" title=\"".$addon['name']."\" style=\"border: 0;\" /></a><br />".$$name."</div>\n";
		}
	}
	$out.="<div class=\"LNE_settings\"><a href=\"".$set['homepath'].$set['indexfile']."?page=".$pagenum."&amp;do=generate\"><img src=\"images/generate.png\" alt=\"$langmessage[42]\" title=\"$langmessage[42]\" style=\"border: 0;\" /></a><br />$langmessage[42]</div>\n";
	$out.="</div>\n";
	return $out;
}

function setup() {
	global $langmessage, $set;
	$out.="<form method=\"post\" action=\"\">\n";
	$out.="<h2>$langmessage[130]</h2>\n<fieldset><table id=\"LNE_setup\">\n";
	$out.="<tr><td align=\"right\">$langmessage[6]:</td>\n";
	$out.="<td><input type=\"text\" name=\"password\" value=\"\" /></td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[7]:</td>\n";
	$out.="<td><input type=\"text\" name=\"admin\" value=\"".$set['admin']."\" /></td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[8]:</td>\n";
	$out.="<td><input type=\"text\" name=\"email\" value=\"".$set['email']."\" /></td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[9]:</td>\n";
	$out.="<td><input type=\"text\" name=\"wemail\" value=\"".$set['wemail']."\" /></td></tr>\n";
	$out.="<input type=\"hidden\" name=\"restricted\" value=\"\" />";
	$out.="<tr><td align=\"right\">$langmessage[10]:</td>\n";
	$out.="<td><input type=\"text\" name=\"homepath\" value=\"".$set['homepath']."\" /></td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[11]:</td>\n<td><select name=\"template\">\n";
	$folder="templates";
	$filez=filelist('/./', $folder,1);
	foreach($filez as $fil) {
		$out.='<option value="'.$fil.'"';
		if($set['template']==$fil) $out.=" SELECTED";
		$out.='>'.$fil."</option>\n";
	}
	$out.="</select>\n</td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[12]:</td><td><input type=\"text\" name=\"title\" value=\"".$set['title']."\" /></td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[13]:</td><td><input type=\"text\" name=\"subtitle\" value=\"".$set['subtitle']."\" /></td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[14]:</td><td><textarea name=\"keywords\">".$set['keywords']."</textarea></td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[15]:</td><td><textarea name=\"description\">".$set['description']."</textarea></td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[16]:</td><td><input type=\"text\" name=\"author\" value=\"".$set['author']."\" /></td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[17]:</td><td><input type=\"text\" name=\"footer\" value=\"".$set['footer']."\" style=\"width: 450px;\" /></td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[145]:</td><td><input type=\"text\" name=\"timeoffset\" value=\"".$set['timeoffset']."\" /></td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[151]:</td><td><input type=\"text\" name=\"dateformat\" value=\"".$set['dateformat']."\" /></td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[19]:</td>\n<td><input type=\"text\" name=\"indexfile\" value=\"".$set['indexfile']."\" /></td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[57]:</td>\n<td><input type=\"text\" name=\"restricted\" value=\"".$set['restricted']."\" /></td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[20]:</td>\n<td><select name=\"language\">\n";
	$folder="languages";
	$filez=filelist('/./', $folder);
	foreach($filez as $fil) {
		$out.='<option value="'.substr($fil,5,5).'"';
		if(substr($fil,5,5) == $set['language']) $out.=' SELECTED';
		$out.='>'.substr($fil,0,10)."</option>\n";
	}
	$out.="</select>\n</td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[21]:</td>\n<td><select name=\"langeditor\">\n";
	$out.="<option value=\"ZZ\">Default</option>\n";
	$folder="fckeditor/editor/lang";
	$filez=filelist('/./', $folder);
	foreach($filez as $fil) {
		if(strpos($fil, ".js")) {
			$out.='<option value="'.substr($fil,0,2).'"';
			if(substr($fil,0,2) == $set['langeditor']) $out.=' SELECTED';
			$out.='>'.$fil."</option>\n";
		}
	}
	$out.="</select>\n</td></tr>\n";
	$out.="<tr><td align=\"right\">$langmessage[18]:</td>\n<td><select name=\"gzip\">\n";
	$out.="<option value=\"1\">$langmessage[59]&nbsp;</option>\n";
	$out.="<option value=\"0\"";
	if($set['gzip']==0)
		$out.=" SELECTED";
	$out.=">$langmessage[60]&nbsp;</option>\n";
	$out.="</select></td>\n";
	$out.="<tr><td align=\"right\">$langmessage[32]:</td>\n<td><select name=\"extension\">\n";
	$out.="<OPTION VALUE=\"1\">$langmessage[182]&nbsp;</OPTION>\n";
	$out.="<OPTION VALUE=\"0\"";
	if($set['extension']==0) $out.=" SELECTED";
	$out.=">$langmessage[58]&nbsp;</OPTION>\n";
	$out.="</select>\n</td></tr>\n";
	$out.="<tr><td><input type=\"hidden\" name=\"submit\" value=\"Save Setup\" />\n";
	$out.="</td><td><input type=\"submit\" name=\"\" value=\"$langmessage[25]\" /></td></tr>\n";
	$out.="</table>\n</fieldset></form>\n";
	return $out;
}

function users() {
	global $langmessage, $prefix;
	$out="<h2>$langmessage[154]</h2>\n<hr />\n";
	if($_GET['id']!="" && !is_intval($_GET['id']) || $_GET['pag']!="" && !is_intval($_GET['pag']))
		die($langmessage[98]);
	if($_GET['action']=="deleteuser") {
		$result = dbquery('SELECT * FROM '.$prefix.'users WHERE id='.$_GET['id']);
		if($row = fetch_array($result))
			if($_SESSION['adminlevel']>=$row['adminlevel'])
				$out.= userform($_GET['id'], $row, true);
	} elseif($_GET['action']=="edituser") {
		$result = dbquery('SELECT * FROM '.$prefix.'users WHERE id='.$_GET['id']);
		if($row = fetch_array($result))
			$out.= userform($_GET['id'], $row);
	} else
		$out.= userform();
	$out.="<div style=\"margin-top: 20px;\">\n<table style=\"border: none;\">\n";
	$multy=false;
	$result=dbquery('SELECT * FROM '.$prefix.'users ORDER BY handle');
	$pages=num_rows($result);
	if($pages>25) {
		if($_GET['pag']=="")
			$_GET['pag']=1;
		$query="SELECT * FROM ".$prefix."users ";
		if(isset($_GET['letter']))
			$query.="WHERE UPPER(SUBSTR(handle,1,1))=\"".sanitize($_GET['letter'])."\" ";
		$query.="ORDER BY handle limit ".(($_GET['pag']-1)*25).", 25";
		$result=dbquery($query);
		$pagebar="<tr><td colspan=\"6\" align=\"left\"><a href=\"LightNEasy.php?page=index&do=users";
		if(isset($_GET['letter']))
			$pagebar.="&letter=".sanitize($_GET['letter']);
		$pagebar.="&pag=";
		if($_GET['pag']>1)
			$pagebar.=$_GET['pag']-1;
		else
			$pagebar.=$_GET['pag'];
		$pagebar.="\"><</a>  ";
		$result1=dbquery("SELECT DISTINCT UPPER(SUBSTR(handle,1,1)) as letter FROM ".$prefix."users ORDER BY handle ASC");
		while($row = fetch_array($result1)) {
			$pagebar.="<a href=\"LightNEasy.php?page=index&do=users&letter=".$row['letter']."&pag=1\">".$row['letter']."</a> ";
		}
		$pagebar.=" <a href=\"LightNEasy.php?page=index&do=users";
		if(isset($_GET['letter']))
			$pagebar.="&letter=".sanitize($_GET['letter']);
		$pagebar.="&pag=";
		if($pages>$_GET['pag']*25)
			$pagebar.=$_GET['pag']+1;
		else
			$pagebar.=$_GET['pag'];
		$pagebar.="\">  ></a></td></tr>\n";
		$out.=$pagebar;
		$multy=true;
	}
	while($row = fetch_array($result)) {
		$out.="<tr><td><a href=\"".$_SERVER['SCRIPT_NAME']."?do=users&amp;action=edituser&amp;id=".$row['id']."\"><img style=\"padding: none; border: none;\" src=\"images/edit.png\" alt=\"edit\" /></a></td>";
		$out.="<td><a href=\"".$_SERVER['SCRIPT_NAME']."?do=users&amp;action=deleteuser&amp;id=".$row['id']."\"><img style=\"padding: none; border: none;\" src=\"images/editdelete.png\" alt=\"delete\" /></a></td>";
		$out.="<td><b>".decode($row['handle'])."</b></td><td>".$row['adminlevel']."</td><td>".$row['ip']."</td><td>".strftime("%m/%d/%y", $row['datejoined'])."</td></tr>\n";
	}
	if($multy)
		$out.=$pagebar;
	$out.="</table>\n</div>\n";
	return $out;
}

function userform($id=0, $row="", $del=false) {
	global $langmessage;
	if($id) {
		$mess="saveuser";
		$mess1=$langmessage[82];
	} else {
		$mess="adduser";
		$mess1=$langmessage[172];
	}
	if($del) {
		$mess="deleteuser";
		$mess1="Delete User";
	}
	$out.="<form method=\"POST\" action=\"\" />\n<table>\n";
	$out.="<tr><td>$langmessage[155]</td><td><input name=\"handle\" type=\"text\" size=\"20\" maxlength=\"30\" value=\"".decode($row['handle'])."\" /></td></tr>\n";
	$out.="<tr><td>$langmessage[170]</td><td>".$row['ip']."</td></tr>\n";
	$out.="<tr><td>$langmessage[6]</td><td><input name=\"password\" type=\"password\" size=\"20\" maxlength=\"30\" /></td></tr>\n";
	$out.="<tr><td>$langmessage[156]</td><td><input name=\"repeatpassword\" type=\"password\" size=\"20\" maxlength=\"30\" /></td></tr>\n";
	$out.="<tr><td>$langmessage[158]</td><td><input name=\"email\" type=\"text\" size=\"20\" maxlength=\"30\" value=\"".$row['email']."\" /></td></tr>\n";
	$out.="<tr><td>$langmessage[166]</td><td><input name=\"firstname\" type=\"text\" size=\"20\" maxlength=\"30\" value=\"".decode($row['firstname'])."\" /></td></tr>\n";
	$out.="<tr><td>$langmessage[167]</td><td><input name=\"lastname\" type=\"text\" size=\"20\" maxlength=\"30\" value=\"".decode($row['lastname'])."\" /></td></tr>\n";
	$out.="<tr><td>$langmessage[168]</td><td><input name=\"website\" type=\"text\" size=\"20\" maxlength=\"30\" value=\"".$row['website']."\" /></td></tr>\n";
	$out.="<tr><td>$langmessage[169]</td><td><input name=\"location\" type=\"text\" size=\"20\" maxlength=\"30\" value=\"".decode($row['location'])."\" /></td></tr>\n";
	if($_SESSION['adminlevel']>3) {
		$out.="<tr><td>$langmessage[157]</td><td>\n<select name=\"adminlevel\">\n";
		$out.="<option value=\"0\"";
		if($row['adminlevel']==0) $out.=" selected";
		$out.=">$langmessage[161]</option>\n";
		$out.="<option value=\"2\"";
		if($row['adminlevel']==2) $out.=" selected";
		$out.=">$langmessage[162]</option>\n";
		$out.="<option value=\"3\"";
		if($row['adminlevel']==3) $out.=" selected";
		$out.=">$langmessage[29]</option>\n";
		$out.="<option value=\"4\"";
		if($row['adminlevel']==4) $out.=" selected";
		$out.=">$langmessage[163]</option>\n";
		if($_SESSION['adminlevel']>4) {
			$out.="<option value=\"5\"";
			if($row['adminlevel']==5) $out.=" selected";
			$out.=">$langmessage[30]</option>\n";
		}
		$out.="</select>\n</td></tr>\n";
	} else {
		$out.="<input type=\"hidden\" name=\"adminlevel\" value=\"".$row['adminlevel']."\" />\n";
	}
	$out.="<tr><td><input type=\"hidden\" name=\"userid\" value=\"$id\" /><input type=\"hidden\" name=\"submit\" value=\"$mess\" /></td><td><input name=\"\" type=\"submit\" value=\"$mess1\" /></td></tr>\n";
	$out.="</table>\n</form>\n";
	return $out;
}
?>
