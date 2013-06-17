<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2012 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon News run module main.php
| Version 3.2.5 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
global $set, $newsmessage;

if(file_exists("addons/news/lang/lang_".$set['language'].".php"))
	require_once "addons/news/lang/lang_".$set['language'].".php";
else
	require_once "addons/news/lang/lang_en_US.php";

if($_POST['submit']=="sendcomment")
		$message=sendcomment();
if($_POST['submit']=="deletecomment")
		$message=deletecomment();

if($message!="")
	$out.="<p style=\"color: red; font-weight: 600; \">$message</p>\n";

// this function shows the news
function shownews($post_integra=1, $post_cabecalho=9, $comenta=0, $categ=-1) {
	global $newsmessage, $set, $pagenum, $prefix;
	if($_GET['action']=="delete" && is_intval($_GET['id']) && is_intval($_GET['commentid']) && $_SESSION['adminlevel']>3) {
		dbquery("DELETE FROM ".$prefix."comments WHERE id=".$_GET['commentid']);
	}
	if(isset($_GET['id']))
		if(!is_intval($_GET['id'])) die ("news - Aha! Clever!");
		else $noticia_numero = $_GET['id'];
	if($noticia_numero!="") {
		$query = "SELECT titulo,data,noticia,autor,email,visto, reg FROM ".$prefix."noticias WHERE reg=".$noticia_numero;
		if($categ>-1) $query.= " AND cat=".$categ;
	} else {
		$query = "SELECT titulo, data, noticia, autor, email, visto, reg FROM ".$prefix."noticias";
		if($categ>-1) $query.= " WHERE cat=".$categ;
		$query.= " ORDER BY reg DESC LIMIT 0, $post_integra";
	}
	$row=dbquery($query);
	$first=false;
	while($row_db = fetch_array($row)) {
		$out.=show_one_news($row_db['titulo'],$row_db['data'],$row_db['noticia'],$row_db['autor'],$row_db['email']);
		//check if there are comments on this news
		$res=dbquery("SELECT * FROM ".$prefix."comments WHERE newsid=".$row_db['reg']." ORDER BY time DESC");
		$num=num_rows($res);
		if($_GET['showcomments']=="1" || $comenta==2) {
		//show the comments
			$ff=true;
			$i=0;
			while($row1= fetch_array($res)) {
				if($ff) {
					$out.="<div class=\"LNEnews_comments\">".$newsmessage[143].":</div>";
					$ff=false;
				}
				$out.="<div class=\"LNEnews_comment\">\n";
				if($_SESSION['adminlevel']>3) {
					$out.="\n<form method=\"post\" action=\"\" class=\"delete\">\n";
					$out.="<input type=\"hidden\" name=\"newsid\" value=\"".$row1['newsid']."\" />\n";
					$out.="<input type=\"hidden\" name=\"id\" value=\"".$row1['id']."\" />\n";
					$out.="<input type=\"hidden\" name=\"submit\" value=\"deletecomment\" />\n";
					$out.="<input type=\"image\" name=\"aaa\" src=\"images/editdelete.png\" value=\"\" title=\"$newsmessage[174]\" style=\"border: none; background: transparent; width: 16px; height: 16px;\"/>\n";
					$out.="</form>\n";
				}
				$out.="<span class=\"time\">".$newsmessage[112]." ".data_formatada($row1['time'])."</span>";
				$out.="<span class=\"text\">".decode($row1['text'])."</span>";
				$out.="<span class=\"poster\">".$newsmessage[144].": </span>\n";
/*				if($row1['postermail']!="")
					$out.="<span class=\"author\"><a href=\"mailto:".decode($row1['postermail'])."\">".stripslashes(decode($row1['poster']))."</a></span>"; 
				else */
					$out.="<span class=\"author\">".stripslashes(decode($row1['poster']))."</span>";
				$out.="</div>\n";
				unset($_GET['showcomments']);
			}
		} else {
			if($num) {
				$out.="<a href=\"".$_SERVER['SCRIPT_NAME']."?page=".$pagenum."&amp;id=".$row_db['reg']."&amp;showcomments=1\">". $newsmessage[143].": ".$num."</a><br />\n";
			}
		}
		$out.="\n<br />";
		if(!$first && ($comenta==2 || ($comenta==1 && $_SESSION['user']!=""))) $out.=commentform($row_db[6]);
		$first=true;
		$novo_visto = $row_db[5] + 1;
		$query_add = dbquery("UPDATE ".$prefix."noticias SET visto = $novo_visto WHERE reg = ". $row_db[6]);
	}
	$post_cabecalho_s = $post_cabecalho + $post_integra;
	if($noticia_numero!="") {
		$query = "SELECT titulo, reg ,data, visto FROM ".$prefix."noticias WHERE reg != ".$noticia_numero;
		if($categ>-1) $query.= " AND cat=".$categ;
		$query.= " ORDER BY reg DESC LIMIT 0, ".$post_cabecalho_s;
	} else {
		$query = "SELECT titulo, reg ,data, visto FROM ".$prefix."noticias";
		if($categ>-1) $query.= " WHERE cat=".$categ;
		$query.=" ORDER BY reg DESC LIMIT $post_integra, ".$post_cabecalho_s;
	}
	$query=dbquery($query);
	$GETarray = $_GET;
	$first=true;
	while ($row_db = fetch_array($query)) {
		if($first) {
			$first=false;
			$out.="<div align=\"center\"><span style=\"font-size: 85%; font-weight: bold;\">$newsmessage[113]</span></div>";
			$out.="<table border='0' align='center'><tr><td>$newsmessage[12]</td><td>$newsmessage[114]</td><td>$newsmessage[115]</td></tr>";
		}
		$GETarray['id'] = $row_db[1];
		$GETarray['showcomments']="0";
		$call = $_SERVER['SCRIPT_NAME'] . "?" . http_build_query($GETarray,'','&amp;');
		$out.="<tr><td><a href=\"".$call."\">".stripslashes(decode($row_db["0"]))."</a></td><td>".data_formatada($row_db["2"])."</td><td>".$row_db["3"]."</td></tr>";
	}
	if(!$first) $out.="</table>";
	$out.="<span class=\"rss\">".showrss()."</span>\n";
	return $out;
}

function show_one_news($a,$b,$c,$d,$e) {
	global $newsmessage, $set;
	$out="<div class=\"LNEnews\"><h2 class=\"LNEnews_title\" >".decode($a)."</h2>\n";
	$out.="<p>$newsmessage[16]: <span class=\"LNEnews_author\">".stripslashes(decode($d))."</span> <span class=\"LNEnews_date\">".$newsmessage[112]." ".data_formatada($b)."</span></p>\n";
	$out.="<span class=\"LNEnews_text\">".stripslashes(decode($c))."</span>\n";
	$out.="</div>\n";
	return $out;
}

function commentform($newsid) {
	global $newsmessage, $editar, $set;
	$out="<form action=\"\" id=\"LNEnews_commentform\" method=\"post\"><fieldset class=\"noborder\">\n";
	if($_SESSION['user']!="") {
		$out.="<input type=\"hidden\" name=\"commentname\" value=\"".$_SESSION['user']."\" />\n";
		$out.="<input type=\"hidden\" name=\"commentemail\" value=\"".$_SESSION['email']."\" />\n";
	} else {
		$out.="<p><b>".$newsmessage[30].":</b><br />\n";
		$out.="<input type=\"text\" name=\"commentname\" value=\"";
		if($editar) $out.=sanitize($_POST['commentname']);
		$out.="\" /></p>\n";
		$out.="<p><b>".$newsmessage[31].":</b><br />\n";
		$out.="<input type=\"text\" name=\"commentemail\" value=\"";
		if($editar) $out.=sanitize($_POST['commentemail']);
		$out.="\"></p>\n";
	}
	$out.="<p><b>".$newsmessage[138].":</b><br />\n";
	$out.="<textarea name=\"commentmessage\">";
	if($editar) $out.=sanitize($_POST['commentmessage']);
	$out.="</textarea></p>\n";
	if($_SESSION['user']!="") {
		srand((double) microtime() * 1000000);
		$a = rand(1, 99);
		$_SESSION[session_id()]=$a;
		$out.="<input type=\"hidden\" name=\"secCode\" value=\"$a\" />\n";
	} else {
		$out.="<p><b>$newsmessage[99]:<br />\n";
		if($set['extension']=="0") {
			//text catchpa - use this is your server doesn't display the catchpa image correctly
			srand((double) microtime() * 1000000);
			$a = rand(0, 9);
			$b = rand(0, 9);
			$c=$a+$b;
			$out.="<td>$a + $b = ";
			$_SESSION[session_id()] = $c;
			$out.="<input type=\"text\" name=\"secCode\" maxlength=\"2\" style=\"width:20px\" /></p>\n";
			// end of text catchpa
		} else {
			// image catchpa
			$out.=catchpa()."</p>\n";
			// end of image catchpa
		}
	}
	$out.="<input type=\"hidden\" name=\"submit\" value=\"sendcomment\" />\n";
	$out.="<input type=\"hidden\" name=\"newsid\" value=\"$newsid\" />\n";
	$out.="<input type=\"submit\" class=\"submit\" value=\"$newsmessage[137]\" />\n</fieldset></form><br />\n";
	return $out;
}

function showrss() {
	$out="News feed: <a href=\"./LightNEasy/rss.php\"><img src=\"images/rss.png\" alt=\"RSS feed\" title=\"News RSS feed\" /></a>\n";
	return $out;
}

function sendcomment() {
	global $sqldbdb, $newsmessage, $editar, $prefix;
	if(!is_intval(trim($_POST['newsid'])) || !is_intval(trim($_POST['secCode'])) || !is_intval($_SESSION[session_id()])) die ("#1 - aha! Clever!");
	$editar=true;
	if($_POST['commentname']=="" || $_POST['commentmessage']=="")
		$message=$newsmessage[101];
	else {
		if($_POST['secCode'] != $_SESSION[session_id()])
			$message=$newsmessage[139];
		else {
			$order   = array("\r\n", "\n", "\r");
			$commentmessage =  str_replace($order, "<br />\n",sanitize(strip_tags($_POST['commentmessage'])));
			$query="INSERT INTO ".$prefix."comments (newsid, poster, postermail, time, text) VALUES (".$_POST['newsid'].",\" ".encode(sanitize(strip_tags($_POST['commentname'])))."\", \"".encode(sanitize(strip_tags($_POST['commentemail'])))."\", ".time().", \"".encode(stripslashes($commentmessage))."\")";
			dbquery($query);
			$registos = db_changes($sqldbdb);
			if ($registos == 1) {
				$message=$newsmessage[141];
				$editar=false;
			} else
				$message=$newsmessage[142];
		}
	}
	unset($_GET['do']);
	return $message;
}

function deletecomment() {
	global $prefix, $newsmessage;
	if(!is_intval($_POST['newsid']) || !is_intval($_POST['id']))
		return $newsmessage[3];
	if($_SESSION['adminlevel']>3) {
		dbquery("DELETE FROM ".$prefix."comments WHERE newsid=".$_POST['newsid']." AND id=".$_POST['newsid']);
		return $newsmessage[175];
	} else
		return $newsmessage[2];
}
?>
