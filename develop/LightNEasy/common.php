<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2012 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Common functions module common.php
| Version 3.2.5 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
# This module contains the common functions

// LightNEasy version
$LNEversion="3.2.5";

if(isset($_GET['do']))
	if($_GET['do']=="logout")
		logout();


function clean($string) {
	return trim(str_replace('&nbsp;',' ',$string));
}

function data_formatada($unix_time){
	global $set, $fuso_s;
		return strftime($set['dateformat'], $unix_time + $fuso_s);
}

function decode($string) {
	return html_entity_decode(utf8_decode(stripslashes($string)));
}

function encode($string) {
	return utf8_encode(htmlentities($string));
}

function expmenu($generat) {
	global $pagenum,$menu,$selected,$set;
	$count=0;
	$aa="\n";
	while($menu[$count][0] != "") {
		if(($menu[$count][1]=="0" && $menu[$count][2]=="0" || $menu[$count][0]==$selected['index']) &&	strpos($menu[$count][3], "_") === false) {
			$aa.='<li';
			if($menu[$count][2]!="0") $aa.=" class=\"LNE_menu_doubleintend\"";
			elseif($menu[$count][1]!="0") $aa.=" class=\"LNE_menu_intend\"";
			else $aa.=" class=\"LNE_menu\"";
			$aa.="><a ";
			if($menu[$count]['nome']==$selected['name']) $aa.='class="selected" ';
			if(strpos($menu[$count][3],"*")) $aa.='href="'.str_replace("*", "",$menu[$count][3]).'">';
			else
				if($generat) $aa.='href="'.$menu[$count][3].'.php">';
				else $aa.='href="'.$set['indexfile'].'?page='.$menu[$count][3].'">';
			$aa.=$menu[$count]['nome']."</a></li>\n";
		}
		$count++;
	}
	return $aa;
}

function filelist($pattern, $start_dir='.', $dir=0) {
$filenames=array();
if ($handle = opendir($start_dir)) {
	while (false !== ($file = readdir($handle))) {
		if (strcmp($file, '.')==0 || strcmp($file, '..')==0) continue;
		if($dir) {
			if(is_dir($start_dir."/".$file))
				array_push($filenames, $file);
		} else
			array_push($filenames, $file);
	}
	closedir($handle);
}
//$order=-1;
$filesort = create_function('$a,$b', "\$a1=\$a$sortby;\$b1=\$b$sortby; if (\$a1==\$b1) return 0; else return (\$a1<\$b1) ? -1 : 1;");
uasort($filenames, $filesort);
return $filenames;
}

function fullmenu($generat=0) {
       global $pagenum, $menu, $selected, $extension, $set;
       $count=0;
       $out="\n";
       while($menu[$count][0] != "") {
           if($menu[$count][0] != "0") {
               $out.="<li";
               if($menu[$count][2]!="0")
                       $out.=" class=\"LNE_menu_doubleintend\"";
               elseif($menu[$count][1]!="0")
                       $out.=" class=\"LNE_menu_intend\"";
               else
                       $out.=" class=\"LNE_menu\"";
               $out.="><a ";
               if($menu[$count]['nome']==$selected['name'])
                       $out.= 'class="selected" ';
               if(strpos($menu[$count][3],"*"))
                       $out.='href="'.str_replace("*", "",$menu[$count][3]).'">';
               elseif($generat)
                       $out.='href="'.$menu[$count][3].'.php">';
               else
                       $out.='href="'.$set['indexfile'].'?page='.$menu[$count][3].'">';
               $out.=$menu[$count]['nome']."</a></li>\n";
           }
           $count++;
       }
       return $out;
}

function getuserid ($handle) {
	global $prefix;
	$result=dbquery("SELECT id FROM ".$prefix."users WHERE handle=\"$handle\"");
	if($row=fetch_array($result))
		return $row['id'];
	else
		return false;
}

function is_intval($value) {
     return 1 === preg_match('/^[+-]?[0-9]+$/', $value);
}

function login() {
	global $message, $set, $langmessage, $prefix;
//******************** insert for Teamleague ***********************************************************
//	include "php/users.php";
//******************** End of insert ******************************************************************* 
	if($_SESSION[$set['password']]!="1") {
	if($_REQUEST['do']=="login" && $_POST['handle']!="") {
		$result=dbquery("SELECT * FROM ".$prefix."users WHERE handle=\"".encode(sanitize($_POST['handle'])).'"');
		$row = fetch_array($result);
//******************** insert for Teamleague ***********************************************************
//		if(!$row) $row=checknewuser($_POST['handle']);
//******************** End of insert ******************************************************************* 
		if($row) {
//******************** insert for Teamleague ***********************************************************
//			$row=updateuser($row);
//******************** End of insert ******************************************************************* 
			if($row['password'] == sha1($_POST['password'])) {
				//inserts password in cookie
				setcookie('userpass', sha1(trim($_POST['password'])), time() + 60 * 60 * 24 * 30);
				setcookie('userhandle', encode(sanitize($_POST['handle'])), time() + 60 * 60 * 24 * 30);
				$_SESSION[$set['password']]="1";
				$_SESSION['user']=decode($row['handle']);
				$_SESSION['adminlevel']=$row['adminlevel'];
				$message=$langmessage[95];
				unset($_GET['do']);
				header("Location: ".$set['homepath']);
			} else
				$message=$langmessage[96];
		} else {
			$message=$langmessage[96];
		}
	} else {
		//Checks if there is a login cookie from past session
		if ($_COOKIE['userhandle'] != "") {
			$user=decode(sanitize($_COOKIE['userhandle']));
			if($row = fetch_array(dbquery('SELECT * FROM '.$prefix.'users WHERE handle="'.$user.'"'))) {
//******************** insert for Teamleague ***********************************************************
//				$row=updateuser($row);
//******************** End of insert ******************************************************************* 
				if($row['password'] == $_COOKIE['userpass']) {
					$_SESSION[$set['password']]="1";
					$_SESSION['user']=$user;
					$_SESSION['adminlevel']=$row['adminlevel'];
					header("Location: ".$set['homepath']);
				}
			}
		}
	}
	}
}

function loginform() {
//Called by $#loginform#$, prints a login form in the template. Alternative to $#login#$.
	global $langmessage, $LNEversion, $set;
    if ($_SESSION[$set['password']]=="1" && $_SESSION['user']!="") {
		$out="\n<form style=\"margin-left: 12px;\" name=\"form1\" id=\"loginform\" method=\"get\" action=\"index.php\" />\n";
		$out.=$langmessage[31]." <a href=\"?do=profile\">".$_SESSION['user']."</a>\n";
		$out.="<input name=\"do\" value=\"logout\" type=\"hidden\" />\n";
		$out.="<input type=\"submit\" name=\"aaa\" value=\"$langmessage[121]\" />\n";
		$out.="</form>\n";
	} else {
		$out="<div id=\"loginform\"><h2>$langmessage[120]</h2>\n";
		$out.="<form name=\"form1\" id=\"form10\" method=\"post\" action=\"?do=login\" />\n";
		$out.="<table><tr><td>$langmessage[155]</td><td><input name=\"handle\" type=\"text\" size=\"8\" maxlength=\"20\" /></td></tr>\n";
		$out.="<tr><td>$langmessage[6]</td><td><input name=\"password\" type=\"password\" size=\"8\" maxlength=\"20\" /></td></tr>\n";
		$out.="<tr><td><input type=\"hidden\" name=\"do\" value=\"login\" /></td>\n";
		$out.="<td><input type=\"submit\" name=\"aaa\" value=\"$langmessage[120]\" style=\"text-align: center\" /></td></tr>\n";
		if($set['gzip'])
			$out.="<tr><td></td><td><a href=\"".$set['homepath'].$set['indexfile']."?do=register\">$langmessage[38]</a></td></tr>\n";
		$out.="</table>\n";
		$out.="</form>\n</div>\n";
	}
	return $out;
}

function loginout() {
//called by $#login#$, prints the login/logout link
	global $set,$langmessage;
	if($_SESSION[$set['password']]=="1")
		return "<a href=\"?do=profile\">".$_SESSION['user']."</a> | <a href=\"?do=logout\">$langmessage[121]</a>";
	else
		return "<a href=\"?do=login\" rel=\"nofollow\">$langmessage[120]</a>";
}

function logout() {
	global $set, $message;
	unset($_SESSION['user']);
	unset($_SESSION[$set['password']]);
	unset($_SESSION['adminlevel']);
	session_destroy();
	setcookie('userhandle', "", time() - 600);
	setcookie('userpass', "", time() - 600);
	unset($_GET['do']);
	$message="you were logged out";
//	header("Location: ".$set['homepath']);
}

function mainmenu($generat, $span=0) {
	global $pagenum,$menu,$selected,$set;
	$aa="\n";
	$count=0;
	$first=true;
	while($menu[$count][0] != "") {
		if($menu[$count][1]=="0" && $menu[$count][2]=="0") {
			$aa.='<li';
			if($first) {
				$first=false;
				$aa.=' class="first"';
			}
			$aa.='>';
			if($span==3) $aa.="<span>";
			$aa.='<a ';
			if($menu[$count][0]==$selected['index'])
				$aa.='class="selected" ';
			if(strpos($menu[$count][3],"*"))
				$aa.='href="'.str_replace("*", "",$menu[$count][3]).'">';
			else
				if($generat)
					$aa.='href="'.$menu[$count][3].'.php">';
				else
					$aa.='href="'.$set['indexfile'].'?page='.$menu[$count][3].'">';
			if($span==2) $aa.="<span>";
			$aa.=$menu[$count]['nome'];
			if($span==1) $aa.="<span>";
			if($span==2 || $span==1) $aa.="</span>";
			$aa.="</a>";
			if($span==3) $aa.="</span>";
			$aa.="</li>\n";
		}
		$count++;
	}
	return $aa;
}

function printheader($generate, $pagename, $desc="", $templ="") {
global $set, $pagenum, $editextra, $selected, $langmessage, $cntt, $LNEversion, $prefix;
if($generate)
	$out.= "\n<?php\n\tprint checktitle();\n?>\n";
else
	$out.= checktitle();
$out.="<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />\n";
$out.="<meta http-equiv='Content-Language' content='".$set['language']."' />\n";
$out.="<meta http-equiv='Content-Script-Type' content='text/javascript' />\n";
$out.="<meta http-equiv='Content-Style-Type' content='text/css' />\n";
$out.="<meta name='keywords' content='".$set['keywords']."' />\n";
$out.="<meta name='description' content=\"";
if($desc != "")
	$out.=$desc;
else
	$out.=$set['description'];
$out.="\" />\n";
$out.="<meta name='author' content='".$set['author']."' />\n";
$out.="<meta name='generator' content='LightNEasy ".$LNEversion."' />\n";
$out.="<meta name='Robots' content='index,follow' />\n";
$out.="<meta http-equiv='imagetoolbar' content='no' /><!-- disable IE's image toolbar -->\n";
if(num_rows(dbquery("SELECT titulo FROM ".$prefix."noticias"))) {
	$out.="<link rel=\"alternate\" type=\"application/rss+xml\" title=\"LightNEasy RSS Feed\" href=\"LightNEasy/rss.php\" />\n";
	$out.="<link rel=\"alternate\" type=\"application/atom+xml\" title=\"LightNEasy Atom Feed\" href=\"LightNEasy/atom.php\" />\n";
}
$out.="<link rel='stylesheet' type='text/css' href='templates/";
if($templ != "")
	$out.=$templ;
else
	if($selected['template'] != "")
		$out.=$selected['template'];
	else
		$out.=$set['template'];
$out.="/style.css' />\n";
$out.="<link rel='stylesheet' type='text/css' href='css/lightneasy.css' />\n";
if($generate)
	$out.= "<?php\n\tprint checkaddons();\n?>\n";
else
	$out.= checkaddons();
if($generate) $out.=credits();
return $out;
}

function checktitle() {
global $cntt, $set, $selected, $langmessage, $pagenum, $prefix;
$query="";
$result = dbquery("SELECT * FROM ".$prefix."paginas WHERE page=\"".$pagenum."\"");
if($row=fetch_array($result)) {
	$cntt=html_entity_decode(stripslashes($row['content']));
}
if(strpos($cntt, '%!$news')!==false) {
	if(!is_intval($_GET['id']) && $GET['id']!="") die ($langmessage[98]);
	if($_GET['id']!="") {
		$noticia_numero = $_GET['id'];
		$query = "SELECT titulo, data, noticia, autor, email, visto, reg FROM ".$prefix."noticias WHERE reg=".$noticia_numero;
	} else {
		$query = "SELECT titulo, data, noticia, autor, email, visto, reg FROM ".$prefix."noticias ORDER BY reg DESC LIMIT 0, 1";
	}
	if($query!="") {
		$row=fetch_array(dbquery($query));
		$out="<title>".decode($row['titulo'])."</title>\n";
	}
}
if($query=="")
	$out="<title>".$selected['name']." - ".$set['title']."</title>\n";
return $out;
}

function checkaddons() {
	global $pagenum, $addons, $cntt, $prefix, $set, $selected;
	$out="";
	if(strpos($cntt, '%!$plugin')!==false) {
		$one=explode('%!$plugin',$cntt,2);
		$two=explode('$!%',$one[1],2);
		$pluginame="./plugins/".trim($two[0]);
		if(file_exists($pluginame."/header.mod")) {
			$three=file_get_contents($pluginame."/header.mod");
			$out.= $three."\n";
		}
		if(file_exists($pluginame."/first.mod") && !$generate) {
			include "$pluginame/first.mod";
		}
	}
	if($selected['template']!="")
		$templ=$selected['template'];
	else
		$templ=$set['template'];
	$template=file_get_contents("templates/$templ/template.php");
	$addons=fetch_all(dbquery("SELECT * FROM ".$prefix."addons WHERE active=1 AND header=1"));
	foreach($addons as $addon)
		if(strpos($cntt,"%!$".$addon['name']))
			require_once "addons/".$addon['name']."/header.php";
		elseif(strpos($template,"$#".$addon['name']))
			require_once "addons/".$addon['name']."/header.php";
	return $out;
}

function profile() {
	global $set, $langmessage, $prefix;
	$out = "<h2>$langmessage[165]</h2>\n";
	$result=dbquery('SELECT * FROM '.$prefix.'users WHERE handle="'.encode($_SESSION['user']).'"');
	if($row = fetch_array($result)) {
		$out.="<form name=\"form1\" id=\"form1\" method=\"post\" action=\"\" />\n<fieldset style=\"border: none;\">\n";
		$out.="<table style=\"border: none; padding: 4px;\">\n";
		$out.="<tr><td>$langmessage[155]</td><td><input name=\"handle\" type=\"hidden\" value=\"".$row['handle']."\" /><b>".decode($row['handle'])."</b></td></tr>\n";
		$out.="<tr><td>$langmessage[6]</td><td><input name=\"password\" type=\"password\" size=\"20\" maxlength=\"20\" value=\"\" /></td></tr>\n";
		$out.="<tr><td>$langmessage[156]</td><td><input name=\"repeatpassword\" type=\"password\" size=\"20\" maxlength=\"20\" value=\"\" /></td></tr>\n";
		$out.="<tr><td>$langmessage[158]</td><td><input name=\"email\" type=\"text\" size=\"20\" maxlength=\"50\" value=\"".$row['email']."\" /></td></tr>\n";
		$out.="<tr><td>$langmessage[166]</td><td><input name=\"firstname\" type=\"text\" size=\"20\" maxlength=\"50\" value=\"".decode($row['firstname'])."\" /></td></tr>\n";
		$out.="<tr><td>$langmessage[167]</td><td><input name=\"lastname\" type=\"text\" size=\"20\" maxlength=\"50\" value=\"".decode($row['lastname'])."\" /></td></tr>\n";
		$out.="<tr><td>$langmessage[168]</td><td><input name=\"website\" type=\"text\" size=\"20\" maxlength=\"50\" value=\"".$row['website']."\" /></td></tr>\n";
		$out.="<tr><td>$langmessage[169]</td><td><input name=\"location\" type=\"text\" size=\"20\" maxlength=\"50\" value=\"".decode($row['location'])."\" /></td></tr>\n";
		$out.="<tr><td><input type=\"hidden\" name=\"userid\" value=\"".$row['id']."\" />";
		$out.="<input type=\"hidden\" name=\"submit\" value=\"saveprofile\" /></td>\n";
		$out.="<td><input type=\"submit\" name=\"aaa\" value=\"$langmessage[82]\" /></td></tr>\n</table>\n";
		$out.="</fieldset></form>\n";
	}
	return $out;
}

function readmenu() {
	global $menu,$pagenum,$selected, $prefix;
	unset($men);
	$menu=array();
	$result = dbquery("SELECT * FROM ".$prefix."menu ORDER BY m1 ASC, m2 ASC, m3 ASC");
	$count=0;
	while($men=fetch_array($result)) {
		$men['nome']=decode($men['nome']);
		$row1=fetch_array(dbquery("SELECT * FROM ".$prefix."paginas WHERE page=\"".$men['page']."\""));
		if(intval($_SESSION['adminlevel'])>=$row1['restricted']) {
			$menu[$count]=$men;
			if($menu[$count][3]==$pagenum) {
				$selected['index']=$men['m1'];
				$selected['m2']=$men['m2'];
				$selected['m3']=$men['m3'];
				$selected['link']=$men['page'];
				$selected['name']=$men['nome'];
				$selected['description']=decode($row1['description']);
				$selected['template']=$row1['template'];
			}
			$count++;
		}
	}
}

function readsetup() {
	global $set, $fuso_s, $prefix;
	$query="SELECT * FROM ".$prefix."settings";
	if(!$result=dbquery($query)) die ("Error - Could not read the settings");
	$set=fetch_array($result);
	$set['title']=decode($set['title']);
	$set['subtitle']=decode($set['subtitle']);
	$set['keywords']=decode($set['keywords']);
	$set['description']=decode($set['description']);
	$set['author']=decode($set['author']);
	$set['footer']=decode($set['footer']);
	$set['newspage']=decode($set['restricted']);
	$fuso_s = intval($set['timeoffset']) * 3600;
}

function register() {
	global $langmessage, $message, $prefix;
	$message="";
	if($_POST['submit']=="enterregister") {
		if(	$_SESSION[session_id()] != $_POST['secCode'])
			$message="<h3>$langmessage[64]</h3>\n";
		if($_POST['handle']=="" || $_POST['password']=="" || $_POST['password1']=="" || $_POST['email']=="")
			$message="<h3>$langmessage[101]</h3>\n";
		// check if both passwords match
		if($_POST['password']!=$_POST['password1'])
			$message="<h3>$langmessage[180]</h3>\n";
		if($message=="") {
			$handle=encode(sanitize(strip_tags($_POST['handle'])));
			$password=sanitize($_POST['password']);
			$email=sanitize(strip_tags($_POST['email']));
			$fname=encode(sanitize(strip_tags($_POST['fname'])));
			$lname=encode(sanitize(strip_tags($_POST['lname'])));
			$website=sanitize(strip_tags($_POST['website']));
			$location=encode(sanitize(strip_tags($_POST['location'])));
			if(num_rows(dbquery("SELECT * FROM ".$prefix."users WHERE handle=\"$handle\"")))
				$message="<h3>$langmessage[33]</h3>\n";
		}
		if($message=="") { // all ok so far
			$ip=$_SERVER['REMOTE_ADDR'];
			$query="INSERT INTO ".$prefix."users (id, handle, password, adminlevel, ip, datejoined, email, firstname, lastname, website, location) VALUES (null, \"$handle\", \"".sha1($password)."\", 2, \"$ip\", ".time().", \"$email\", \"$fname\", \"$lname\", \"$website\", \"$location\")";
			dbquery($query);
			$message="<h3>$langmessage[27].</h3><p>$langmessage[181]</p>\n";
		}
		return $message;
	} else {
		$out = "<p>$langmessage[174]</p>\n";
		$out .= "<form name=\"form1\" method=\"post\" action=\"\">\n";
		$out .= "<table>\n";
		$out .= "<tr><td align=\"right\">$langmessage[155]&nbsp;</td><td><input type=\"text\" name=\"handle\" value=\"\" /></td></tr>\n";
		$out .= "<tr><td align=\"right\">$langmessage[6]&nbsp;</td><td><input type=\"password\" name=\"password\" value=\"\" /></td></tr>\n";
		$out .= "<tr><td align=\"right\">$langmessage[156]&nbsp;</td><td><input type=\"password\" name=\"password1\" value=\"\" /></td></tr>\n";
		$out .= "<tr><td align=\"right\">$langmessage[158]&nbsp;</td><td><input type=\"text\" name=\"email\" value=\"\" /></td></tr>\n";
		$out .= "<tr><td align=\"right\">$langmessage[166]&nbsp;</td><td><input type=\"text\" name=\"fname\" value=\"\" /></td></tr>\n";
		$out .= "<tr><td align=\"right\">$langmessage[167]&nbsp;</td><td><input type=\"text\" name=\"lname\" value=\"\" /></td></tr>\n";
		$out .= "<tr><td align=\"right\">$langmessage[10]&nbsp;</td><td><input type=\"text\" name=\"website\" value=\"\" /></td></tr>\n";
		$out .= "<tr><td align=\"right\">$langmessage[169]&nbsp;</td><td><input type=\"text\" name=\"location\" value=\"\" /></td></tr>\n";
		$out .= "<tr><td align=\"right\">$langmessage[63]</td><td>".catchpa()."</td></tr>\n";
		$out .= "<tr><td><input type=\"hidden\" name=\"submit\" value=\"enterregister\"></td><td><input type=\"submit\" name=\"aaa\" value=\"$langmessage[179]\"></td></tr>\n";
		$out .= "</table></form>\n";
	}
	return $out;
}

function restrictedpage ($level) {
	global $langmessage;
	$out = "<h2>$langmessage[146]</h2>\n";
	if($level<4)
		$out.= "<h4>$langmessage[147]</h4>\n";
	else
		$out.= "<h4>$langmessage[164]</h4>\n";
	return $out;
}

function sanitize($text) {
	global $langmessage;
	if(strpos($text,null) !== false)
		die($langmessage[98]);
	// Convert problematic ascii characters to their true values
	$search = array("40","41","58","65","66","67","68","69","70",
		"71","72","73","74","75","76","77","78","79","80","81",
		"82","83","84","85","86","87","88","89","90","97","98",
		"99","100","101","102","103","104","105","106","107",
		"108","109","110","111","112","113","114","115","116",
		"117","118","119","120","121","122"
		);
	$replace = array("(",")",":","a","b","c","d","e","f","g","h",
		"i","j","k","l","m","n","o","p","q","r","s","t","u",
		"v","w","x","y","z","a","b","c","d","e","f","g","h",
		"i","j","k","l","m","n","o","p","q","r","s","t","u",
		"v","w","x","y","z"
		);
	$entities = count($search);
	for ($i=0;$i < $entities;$i++) $text = preg_replace("#(&\#)(0*".$search[$i]."+);*#si", $replace[$i], $text);
	// the following is based on code from bitflux (http://blog.bitflux.ch/wiki/)
	// Kill hexadecimal characters completely
	$text = preg_replace('#(&\#x)([0-9A-F]+);*#si', "", $text);
	// remove any attribute starting with "on" or xmlns
	$text = preg_replace('#(<[^>]+[\\"\'\s])(onmouseover|onmousedown|onmouseup|onmouseout|onmousemove|onclick|ondblclick|onload|xmlns)[^>]*>#iU', ">", $text);
	do {
		$oldtext = $text;
		preg_replace('#</*(applet|meta|xml|blink|link|style|script|embed|object|iframe|frame|frameset|ilayer|layer|bgsound|title|base)[^>]*>#i', "", $text);
	// remove javascript: and vbscript: protocol
	} while ($oldtext != $text);
	$text = preg_replace('#([a-z]*)=([\`\'\"]*)script:#iU', '$1=$2nojscript...', $text);
	$text = preg_replace('#([a-z]*)=([\`\'\"]*)javascript:#iU', '$1=$2nojavascript...', $text);
	$text = preg_replace('#([a-z]*)=([\'\"]*)vbscript:#iU', '$1=$2novbscript...', $text);
	$text = preg_replace('#(<[^>]+)style=([\`\'\"]*).*expression\([^>]*>#iU', "$1>", $text);
	$text = preg_replace('#(<[^>]+)style=([\`\'\"]*).*behaviour\([^>]*>#iU', "$1>", $text);
	return $text;
}

function saveprofile() {
	global $message, $prefix;
	if(!is_intval($_POST['userid'])) die ("aha! Naughty!");
	$handle=encode(sanitize($_POST['handle']));
	$password=sanitize($_POST['password']);
	$repeatpassword=sanitize($_POST['repeatpassword']);
	$email=sanitize(strip_tags($_POST['email']));
	$firstname=encode(sanitize(strip_tags($_POST['firstname'])));
	$lastname=encode(sanitize(strip_tags($_POST['lastname'])));
	$website=sanitize(strip_tags($_POST['website']));
	$location=encode(sanitize(strip_tags($_POST['location'])));
	$query="UPDATE ".$prefix."users SET email=\"$email\", firstname=\"$firstname\", lastname=\"$lastname\", handle=\"$handle\", website=\"$website\", location=\"$location\"";
	if($_POST['password']!="") {
		if($_POST['password']==$_POST['repeatpassword'])
			$query.=", password=\"".sha1($_POST['password'])."\"";
		else
			$message=$langmessage[180];
	}
	$query.="  WHERE id=".$_POST['userid'];
	dbquery($query);
}

function search($run=false) {
	global $out, $set, $langmessage, $message, $prefix;
	if($_POST['submit']=="search" && $_POST['search']!="" && $_POST['search']!=$langmessage[49]) {
		$needle=sanitize(strip_tags($_POST['search']));
		$out.="<h3>$langmessage[68]\"$needle\":</h3>\n<ul>\n";
		// search pages
		$posts=array();
		$posts=fetch_all(dbquery("SELECT * FROM ".$prefix."paginas"));
		foreach($posts as $post) {
			$text=strip_tags(decode($post['content']));
			if(($pos=stripos($text, $needle))!==false) {
				$first=substr($text,0,strval($pos));
				if(strlen($first)>=50)
					$first="...".substr($first,strlen($first)-50);
				$last=substr($text , strval($pos)+strlen($needle));
				if(strlen($last)>=50)
					$last=substr($last, 0,50)."...";
				$out.="<li><h3><a href=\"".$post['page'].".php\">".decode($post['nome'])."</a></h3>\n<p>$first<b>$needle</b>$last</p></li>\n";
			}
		}
		unset($posts);
		//Search news
		$posts=array();
		$posts=fetch_all(dbquery("SELECT * FROM ".$prefix."noticias"));
		foreach($posts as $post) {
			//check within titles
			$text=strip_tags(decode($post['titulo']));
			if(($pos=stripos($text, $needle))!==false) {
				$text=strip_tags($text);
				$first=substr($text,0,strval($pos));
				$last=substr($text , strval($pos)+strlen($needle));
				$out.="<li><a href=\"".$set['newspage'].".php?id=".$post[0]."\">$first<b>$needle</b>$last</a></li>\n";
			}
			//check within news text
			$text=strip_tags(decode($post['noticia']));
			if(($pos=stripos($text, $needle))!==false) {
				$first=substr($text,0,strval($pos));
				if(strlen($first)>=50)
					$first="...".substr($first,strlen($first)-50);
				$last=substr($text , strval($pos)+strlen($needle));
				if(strlen($last)>=50)
					$last=substr($last, 0,50)."...";
				$out.="<li><a href=\"".$set['newspage'].".php?id=".$post[0]."\">".decode($post['titulo'])."</a><p>$first<b>$needle</b>$last</p></li>\n";
			}
		}
		$out.="</ul>";
	}
	if($run)
		return $out;
}

function searchform() {
	global $set, $langmessage, $message;
	$out.="<div class=\"f_search\">\n<form method=\"post\" action=\"?do=search\">\n";
	$out.="<p><input type=\"text\" name=\"search\" value=\"$langmessage[49]\" class=\"search\" onblur=\"if(this.value=='') this.value='$langmessage[49]';\" onfocus=\"if(this.value=='$langmessage[49]') this.value='';\" />\n";
	$out.="<input type=\"hidden\" name=\"submit\" value=\"search\" />\n";
	$out.="<input type=\"submit\" value=\"$langmessage[65]\" class=\"submit\" /></p>\n";
	$out.="</form>\n</div>\n";
	return $out;
}

function showsitemap($langmessage,$gen) {
	$out="<h2>$langmessage[88]</h2>\n<br />\n";
	$out.="<ul>".fullmenu($gen)."</ul>\n";
	return $out;
}

function submenu($generat) {
	global $pagenum,$menu,$selected, $set;
	$count=0;
	while($menu[$count][0] != "") {
		if($menu[$count][3]==$pagenum) {
			$m1=$menu[$count][0];
			$m2=$menu[$count][1];
			$m3=$menu[$count][2];
			if($m3) $sub=3; else
			if($m2) $sub=2; else $sub=1;
			break;
		}
		$count++;
	}
	$count=0;
	$out="\n";
	while($menu[$count][0] != "") {
		if($menu[$count][0]==$m1 && ($menu[$count][1]!="0" || $menu[$count][2]!="0")) {
			if (($sub==1 && $menu[$count][2]==0) || 
				($sub==2 && $menu[$count][0]==$m1 && ($menu[$count][1]==$m2 || $menu[$count][2]=="0")) || 
				($sub==3 && $menu[$count][1]==$m2 && $menu[$count][0]==$m1)) {
				$out.="<li>";
				$out.="<a ";
				if($menu[$count]['nome']==$selected['name'])
					$out.="class=\"selected\" ";
				if(strpos($menu[$count][3],"*"))
					$out.="href=\"".str_replace("*", "",$menu[$count][3]).'">';
				else
					if($generat)
						$out.='href="'.$menu[$count][3].'.php">';
					else
						$out.='href="'.$set['indexfile'].'?page='.$menu[$count][3].'">';
				if($sub==2 && $menu[$count][2]!="0")
					$out.=" > ";
				$out.=$menu[$count]['nome']."</a></li>\n";
			}
		}
		$count++;
	}
	return $out;
}

//for compability with earlier php versions
function sv($s) {
	if (!isset($_SERVER)) {
		global $_SERVER;
		$_SERVER = $GLOBALS['HTTP_SERVER_VARS'];
	}
	if (isset($_SERVER[$s]))return $_SERVER[$s];
	else return'';
}

function treemenu($generat=0) {
    global $pagenum, $menu, $selected, $extension, $set;
    $replace_chars=array(" ", ",", ".", "/", "?", "!", "-", ";", "'");
//    $out='<ul class="menu2">'."\n";
    $intend=0;
    for($count=0;$menu[$count][0] != "";$count++) {
        #$out.='mira-intend'.$intend.'mira-changed'.$changed.'mira-count'.$count.'menudecountuno'.$menu[$count][1];
        $changed=false;
        if($menu[$count][1]!="0" && $intend<1) {
            $changed=true;
            $intend=1;
            $out.='<ul class="sub">'."\n";
        }
        if($menu[$count][2]!="0" && $intend<2) {
            $changed=true;
            $intend=2;
            $out.="<ul>"."\n";
        }
        if($menu[$count][2]=="0" && $intend==2) {
            $changed=true;
            $intend--;
            $out.="</ul></li>"."\n";
        }
        if($menu[$count][1]=="0" && $intend==1) {
            $changed=true;
            $intend--;
            $out.="</ul></li>"."\n";
        }
        if($menu[$count][1]=="0" && $menu[$count][2]=="0") {
            $out.='<li class="top"><a class="top_link" id="'.str_replace($replace_chars, "_", $menu[$count]['nome']).'" ';
        }
        else {
            if($menu[$count][2]=="0" && $menu[$count][1]==$menu[$count+1][1]) {
                $out.='<li><a class="fly" ';
            }
            else {
                $out.="<li><a ";
            }
        }
        #if($menu[$count]['nome']==$selected['name'])
        #   $out.= 'class="selected" ';
        if(strpos($menu[$count][3],"*"))
            $out.='href="'.str_replace("*", "",$menu[$count][3]).'">';
        elseif($generat)
            $out.='href="'.$menu[$count][3].'.php">';
        else
            $out.='href="'.$set['indexfile'].'?page='.$menu[$count][3].'">';
        if($menu[$count][1]=="0" && $menu[$count][2]=="0") {
            if($menu[$count][0]==$menu[$count+1][0]) {
                $out.='<span class="down">'.$menu[$count]['nome']."</span></a>"."\n";
            }
            else {
                $out.="<span>".$menu[$count]['nome']."</span></a></li>"."\n";
            }
        }
        else {
            if($menu[$count][2]=="0" && $menu[$count][1]==$menu[$count+1][1]) {
                $out.=$menu[$count]['nome']."</a>"."\n";
            }
            else {
                $out.=$menu[$count]['nome']."</a></li>"."\n";
            }
        }
    }
    if($intend==1) {    
        $out.="</ul>";
    }
//    $out.="</ul>";
    return $out;
}

function db_changes() {
	global $MySQL, $sqldbdb;
	if($MySQL==1) {
		return mysql_affected_rows($sqldbdb);
	} elseif($MySQL==0) {
		return sqlite_changes($sqldbdb);
	} else {
		return $sqldbdb->changes();
	}
}

function num_rows($result) {
	global $MySQL;
	if($MySQL==1) {
		return mysql_num_rows($result);
	} elseif($MySQL==0) {
		return sqlite_num_rows($result);
	} else {
		for($i = 0; fetch_array($result); $i++);
		$result->reset();
		return $i;
	}
}

function fetch_all($result) {
	for($i = 0; $array[$i] = fetch_array($result); $i++);
	array_pop($array);
	return $array;
}

function fetch_array($result) {
	global $MySQL;
	if($MySQL==1) {
		return mysql_fetch_array($result);
	} elseif($MySQL==0) {
		return sqlite_fetch_array($result);
	} else {
		return $result->fetchArray();
	}
}

function opendb() {
	global $MySQL, $prefix;
	require_once "data/database.php";
	if($MySQL==1) {
		$a = @mysql_connect($databasehost, $databaselogin, $databasepassword) or die("Error - Could not connect to MySQL server: " . mysql_error());
		@mysql_select_db($databasename) or die("Error - Could not open database " . mysql_error());
	} elseif($MySQL==0) {
		if(!$a = @sqlite_open("./data/$databasename.db")) die ("Error - Could not open database");
	} else {
		if(!$a= new SQLite3("./data/$databasename.db")) die ("Couldn't open SQLite 3 database");
	}
	return $a;
}

function dbquery($query) {
	global $sqldbdb, $MySQL;
	if($MySQL) {
		$result = @mysql_query($query,$sqldbdb) or die(mysql_error());
		return $result;
	} elseif($MySQL==0) {
		$result = @sqlite_query($sqldbdb,$query);
		if (!$result) {
			print sqlite_error_string(sqlite_last_error($sqldbdb));
			return false;
		} else return $result;
	} else {
		$result = $sqldbdb->query($query);
		if (!$result) {
			print $sqldbdb->lastErrorMsg();
			return false;
		} else {
			return $result;
		}
	}
}

function convertRGB($color) {
    $color = eregi_replace('[^0-9a-f]', '', $color);
    return array(hexdec(substr($color, 0, 2)), hexdec(substr($color, 2, 2)), hexdec(substr($color, 4, 2)));
}

function createImage($text, $width, $height, $font = 5) {
    global $fontColor, $bgColor, $lineColor, $set;

    if($img = @ImageCreate($width, $height)) {
      list($R, $G, $B) = convertRGB($fontColor);
      $fontColor = ImageColorAllocate($img, $R, $G, $B);
      list($R, $G, $B) = convertRGB($bgColor);
      $bgColor = ImageColorAllocate($img, $R, $G, $B);
      list($R, $G, $B) = convertRGB($lineColor);
      $lineColor = ImageColorAllocate($img, $R, $G, $B);
		imagefilledrectangle($img, 0, 0, imagesx($img), imagesy($img), $bgColor);
      for($i = 0; $i <= $width; $i += 5) {
        @ImageLine($img, $i, 0, $i, $height, $lineColor);
      }
      for($i = 0; $i <= $height; $i += 5) {
        @ImageLine($img, 0, $i, $width, $i, $lineColor);
      }

      $hcenter = $width / 2;
      $vcenter = $height / 2;
      $x = round($hcenter - ImageFontWidth($font) * strlen($text) / 2);
      $y = round($vcenter - ImageFontHeight($font) / 2);
      ImageString($img, $font, $x, $y, $text, $fontColor);

      if(function_exists('ImagePNG')) {
        @ImagePNG($img, "data/catchpa.png");
		return("png");
      } else if(function_exists('ImageGIF')) {
		@ImageGIF($img, "data/catchpa.gif");
		return("gif");
      }
      else if(function_exists('ImageJPEG')) {
        @ImageJPEG($img, "data/catchpa.jpg");
        return("jpg");
      }
      ImageDestroy($img);
    }
}

function catchpa(){
    global $fontColor, $bgColor, $lineColor, $set, $out;
	$fontSize = 5;              // font size (1 - 5)
	$fontColor = "000000";      // font color (RGB hexcode)
	$bgColor = "FFFFFF";        // background color (RGB hexcode)
	$lineColor = "B0B0B0";      // line color (RGB hexcode)
	srand((double) microtime() * 1000000);
	$secCode = '';
	for($i = 0; $i < 6; $i++)
		$secCode .= rand(0, 9);
	$_SESSION[session_id()] = $secCode;
	$ext=createImage($secCode, 71, 21, $fontSize);
	return("<input type=\"text\" name=\"secCode\" maxlength=\"6\" style=\"width:50px\" />\n&nbsp;<b>&laquo;</b>&nbsp;<img src=\"data/catchpa.$ext\" width=\"71\" height=\"21\" align=\"absmiddle\" />");
}

//replacement for PHP5 function http_build_query() if that function doesn't exist
//taken from the PHP online manual
if(!function_exists('http_build_query')) {
    function http_build_query($data,$prefix=null,$sep='',$key='') {
        $ret    = array();
            foreach((array)$data as $k => $v) {
                $k    = urlencode($k);
                if(is_int($k) && $prefix != null) {
                    $k    = $prefix.$k;
                };
                if(!empty($key)) {
                    $k    = $key."[".$k."]";
                };

                if(is_array($v) || is_object($v)) {
                    array_push($ret,http_build_query($v,"",$sep,$k));
                }
                else {
                    array_push($ret,$k."=".urlencode($v));
                };
            };

        if(empty($sep)) {
            $sep = ini_get("arg_separator.output");
        };

        return    implode($sep, $ret);
    };
};

?>
