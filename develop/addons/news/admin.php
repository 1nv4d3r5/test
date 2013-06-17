<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2011 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon News admin module admin.php
| Version 3.2.4 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
global $newsmessage,$myserver;
if ($_SERVER['SERVER_NAME']!=$myserver)
	die ('Access Denied!');

if(file_exists("addons/news/lang/lang_".$set['language'].".php"))
	require_once "addons/news/lang/lang_".$set['language'].".php";
else
	require_once "addons/news/lang/lang_en_US.php";
	
if($_POST['submit']=="Add News" || $_POST['submit']=="Edit News") {
	$autor = encode($_POST["autor"]);
	$email= encode($_POST["email"]);
	$titulo = encode($_POST["titulo"]);
	$texto = encode($_POST["mycontent"]);
	$cat=$_POST['cat'];
	$data = mktime  ($_POST['hora'], $_POST['minuto'], 0, $_POST['mes'], $_POST['dia'], $_POST['ano'] );
	if($_POST['submit'] == "Add News")
		$query="INSERT INTO ".$prefix."noticias (autor , email , titulo , noticia , data, visto, cat) VALUES (\"$autor\", \"$email\", \"$titulo\", \"$texto\", \"$data\",1, $cat)";
	else
		$query="UPDATE ".$prefix."noticias SET autor=\"$autor\", email=\"$email\", titulo=\"$titulo\", noticia=\"$texto\", data=\"$data\", cat=$cat WHERE reg=\"".$_POST['reg']."\"";
	dbquery($query);
	$registos = db_changes($sqldbdb);
	if ($registos == 1) $message=$newsmessage[75];
	elseif($_GET['action']=="Add News") $message=$newsmessage[76];
	unset($_GET['action']);
}
if($_POST['newscat']=="Add Category" || $_POST['newscat']=="Edit Category") {
	if($_POST['newscat']=="Add Category")
		$query="INSERT INTO ".$prefix."newscat (id, nome, descr) VALUES (null, '".encode($_POST['name'])."', '".encode($_POST['descr'])."')";
	else
		$query="UPDATE ".$prefix."newscat SET id=".$_POST['id'].", nome='".encode($_POST['name'])."', descr='".encode($_POST['descr'])."' WHERE id=".$_POST['newid'];
	if(!dbquery($query)) die ($newsmessage[107]);
	unset ($_GET['action']);
}

function adminnews() {
	global $noticia_numero, $newsmessage, $message, $prefix, $out;
	switch($_GET['action']) {
	case "deletec":
		$noticia_numero = $_GET['id'];
		$query = dbquery("DELETE FROM ".$prefix."newscat WHERE id = $noticia_numero");
		$registros = db_changes();
		if ($registros == 1)
			$message=$newsmessage[126];
		else
			$message=$newsmessage[127];
		break;
	case "delete":
		$noticia_numero = $_GET['id'];
		$query = "DELETE FROM ".$prefix."noticias WHERE reg = $noticia_numero";
		dbquery($query);
		$registros = db_changes();
		if ($registros == 1)
			$message=$newsmessage[128];
		else
			$message=$newsmessage[129];
		break;
	case "edit":
		$noticia_numero = $_GET["id"];
		$query = dbquery("SELECT * FROM ".$prefix."noticias WHERE reg = '$noticia_numero'");
		$row=fetch_array($query);
		break;
	case "editc":
		$categoria_id = $_GET["id"];
		$query = dbquery("SELECT * FROM ".$prefix."newscat WHERE id = '$categoria_id'");
		$row=fetch_array($query);
		break;
	}
	$out.="<h2>$newsmessage[1]</h2>\n<hr />\n";
	$out.="<div align=\"center\">\n";
	$out.="<form name=\"adicionar\" method=\"post\" action=\"\">\n<fieldset style=\"border: 0;\">\n<table style=\"border: 0; width: 600px;\">\n";
	$out.="<tr><td>$newsmessage[16]:</td><td>";
	$out.="<input type='text' name='autor' value=\"";
	if($_GET['action']=="edit") $out.=decode($row[1]);
	$out.="\" /></td></tr>\n<tr><td>$newsmessage[73]:</td><td><input type='text' name='email' value=\"";
	if($_GET['action']=="edit") $out.=decode($row[2]);
	$out.="\" /></td></tr>\n<tr><td>$newsmessage[12]:</td><td><input type='text' name='titulo' value='".decode($row[3])."' /></td></tr>\n";
	$out.="<tr><td>$newsmessage[114]:</td><td>";
	if($_GET['action']=="edit")
		$date=date("YmdGi",$row[5]);
	else
		$date=date("YmdGi");
	$ano=substr($date,0,4);
	$mes=substr($date,4,2);
	$dia=substr($date,6,2);
	$hora=substr($date,8,2);
	$minuto=substr($date,10,2);
	$out.="<select name=\"ano\">";
	for($i=2000;$i<2020;$i++) {
		$out.="<option value=\"$i\"";
		if($i==$ano) $out.=" SELECTED";
		$out.=">$i</option>\n";
	}
	$out.="</select>\n";
	$out.="/<select name=\"mes\">";
	for($i=1;$i<13;$i++) {
		$out.="<option value=\"$i\"";
		if($i==$mes) $out.=" SELECTED";
		$out.=">$i</option>\n";
	}
	$out.="</select>\n";
	$out.="/<select name=\"dia\">";
	for($i=1;$i<32;$i++) {
		$out.="<option value=\"$i\"";
		if($i==$dia) $out.=" SELECTED";
		$out.=">$i</option>\n";
	}
	$out.="</select>\n";
	$out.=" - <select name=\"hora\">";
	for($i=0;$i<24;$i++) {
		$out.="<option value=\"$i\"";
		if($i==$hora) $out.=" SELECTED";
		$out.=">$i</option>\n";
	}
	$out.="</select>\n";
	$out.=":<select name=\"minuto\">";
	for($i=0;$i<60;$i++) {
		$out.="<option value=\"$i\"";
		if($i==$minuto) $out.=" SELECTED";
		$out.=">$i</option>\n";
	}
	$out.="</select>\n";
	$out.="</td></tr>\n";
	$out.="<tr><td>$newsmessage[52]:</td><td><select name=\"cat\" >\n";
	$result = dbquery("SELECT * FROM ".$prefix."newscat");
	$cats=fetch_all($result);
	foreach ($cats as $catt) {
		$out.='<option value="'.$catt['id'].'"';
		if($_GET['action']=="edit" && strval($row[7])==strval($catt['id'])) $out.=' SELECTED';
		$out.='>'.decode($catt['nome'])."&nbsp;</option>\n";
	}
	$out.="</select></td></tr>\n";
	$out.="<tr><td colspan=\"2\" width=\"580\">";
	print $out;
	editor(stripslashes(decode($row[4])));
	$out="</td></tr></table>\n";
	if($_GET['action']=="edit") {
		$out.="<input type='hidden' name='reg' value='".$row[0]."' />";
		$out.=savereturn("Edit News");
	} else
		$out.=savereturn("Add News");
	$out.="</fieldset></form>\n</div>\n";
	$out.="<hr />\n<h3>$newsmessage[80]</h3>\n<table>\n";
	$query = dbquery("SELECT titulo, reg ,data,visto FROM ".$prefix."noticias ORDER BY reg DESC");
	while ($row_db = fetch_array($query)) {
		$out.="<tr><td><a href='".$_SERVER["SCRIPT_NAME"]."?do=news&amp;action=edit&amp;id=".$row_db["1"]."'><img src=\"images/edit.png\" alt=\"edit\" title=\"Edit news\" style=\"align: left; border: 0;\" /></a></td><td><a href='".$_SERVER["SCRIPT_NAME"]."?do=news&amp;action=delete&amp;id=".$row_db["1"]."'><img src=\"images/editdelete.png\" alt=\"delete\" title=\"Delete news\" style=\"align: left; border: 0;\" /></a></td><td><b>".decode($row_db["0"])."</b></td><td>".data_formatada($row_db["2"] + $fuso_s)."</td><td>$newsmessage[81]: ".$row_db["3"]."</td></tr>\n";
	}
	$out.="</table>\n<hr />\n";
	$out.="<h3>$newsmessage[78]</h3>\n";
	$out.="<form name=\"form1\" method=\"post\" action=\"\"><fieldset style=\"border: 0;\">\n<table>\n";
	$out.="<tr><td>$newsmessage[50]</td><td>";
	$out.="<input type=\"text\" name=\"name\"";
	if($_GET['action']=="editc") $out.=" value=\"".$row[1]."\"";
	$out.=" /></td></tr>\n<tr><td>$newsmessage[67]</td><td><input type=\"text\" name=\"descr\"";
	if($_GET['action']=="editc") $out.=" value=\"".$row[2]."\"";
	$out.=" /></td></tr>\n";
	if($_GET['action']=="editc") $out.="<tr><td>$newsmessage[79]</td><td><input type=\"text\" name=\"newid\" value=\"".$row[0]."\" /></td></tr>\n";
	$out.="<tr><td></td><td><input type=\"hidden\" name=\"id\" value=\"".$_GET['id']."\" />\n";
	$out.="<input type=\"hidden\" name=\"newscat\" ";
	if($_GET['action']=="editc") $out.="value=\"Edit Category\"";
	else $out.="value=\"Add Category\"";
	$out.=" />\n";
	$out.="<input type=\"submit\" name=\"\" ";
	if($_GET['action']=="editc") $out.="value=\"$newsmessage[54]\"";
	else $out.="value=\"$newsmessage[53]\"";
	$out.=" />\n";
	$out.="</td></tr>\n</table></fieldset></form>\n<table>\n";
	$res=dbquery("SELECT * FROM ".$prefix."newscat");
	while($roww=fetch_array($res))
		$out.="<tr><td><a href='".$_SERVER["SCRIPT_NAME"]."?do=news&amp;action=editc&amp;id=".$roww["0"]."'><img src=\"images/edit.png\" alt=\"edit\" style=\"align: left; border: 0;\" /></a></td><td><a href='".$_SERVER["SCRIPT_NAME"]."?do=news&amp;action=deletec&amp;id=".$roww["0"]."'><img src=\"images/editdelete.png\" alt=\"delete\" style=\"align: left; border: 0;\" /></a></td><td><b>".decode($roww["1"])."</b></td><td>".decode($roww["2"])."</td><td>Id: ".$roww["0"]."</td></tr>\n";
	$out.="</table>\n<br />\n";
}
?>
