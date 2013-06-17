<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2012 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Run script for forum plugin, version 1.2
| This script can run on LightNEasy 3.2.2 or newer
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
global $prefix, $selected, $MySQL, $sqldbdb, $set;
require_once "plugins/forum/settings.php";
if(file_exists("plugins/forum/lang/lang_".$set['language'].".php"))
	require_once "plugins/forum/lang/lang_".$set['language'].".php";
else
	require_once "plugins/forum/lang/lang_en_US.php";

// Check if table exists in the database
$query="";
if($MySQL==0) {
	if(!$aa=sqlite_fetch_column_types($prefix."forumplugin", $sqldbdb)) {
		$query = "CREATE TABLE ".$prefix."forumplugin ( id INTEGER NOT NULL PRIMARY KEY, data VARCHAR(10) NOT NULL, poster VARCHAR(30) NOT NULL, name VARCHAR(50) NOT NULL, text TEXT, type INTEGER NOT NULL, baseid INTEGER, flag1 INTEGER, flag2 INTEGER)";
	}
} else {
		$query = "CREATE TABLE IF NOT EXISTS ".$prefix."forumplugin ( id INTEGER NOT NULL auto_increment, data TIMESTAMP NOT NULL, poster VARCHAR(30) NOT NULL, name VARCHAR(50) NOT NULL, text TEXT, type INTEGER NOT NULL, baseid INTEGER, flag1 INTEGER, flag2 INTEGER, PRIMARY KEY (id))";
}
if($query!="")
	@dbquery($query);

$check=true;
//Check post
if($_POST['forumsubmit']!="") {
	$submit=sanitize($_POST['forumsubmit']);
	switch($submit) {
		case "deleteforum":
			if(intval($_SESSION['adminlevel'])<$posterlevel)
				break;
			if(is_intval($_POST['id']))
				$id=$_POST['id'];
			else
				die ($forummessage[32]);
			$output=fetch_all(dbquery("SELECT * FROM ".$prefix."forumplugin WHERE baseid=$id AND type=2"));
			foreach($output as $row)
				dbquery("SELECT * FROM ".$prefix."forumplugin WHERE baseid=".$row['id']." AND type=3");
			dbquery("DELETE FROM ".$prefix."forumplugin WHERE baseid=$id AND type=2");
			dbquery("DELETE FROM ".$prefix."forumplugin WHERE id=".$id);
			break;
		case "deletetopic":
			if(!is_intval($_POST['topicid']))
				die ($forummessage[32]);
			if(intval($_SESSION['adminlevel'])>=$posterlevel) {
				dbquery("DELETE FROM ".$prefix."forumplugin WHERE id=".$_POST['topicid']);
				dbquery("DELETE FROM ".$prefix."forumplugin WHERE baseid=".$_POST['topicid']." AND type=3");
			}
			break;
		case "postedit":
			if(!is_intval($_POST['id']))
				die ($forummessage[32]);
			if(intval($_SESSION['adminlevel'])>=$posterlevel)
				dbquery("UPDATE ".$prefix."forumplugin SET text=\"".encode(sanitize($_POST['text']))."\" WHERE id=".$_POST['id']);
			$_GET['action']="topicshow";
			$check=false;
			break;
		case "deletepost":
			if(!is_intval($_POST['id']))
				die ($forummessage[32]);
			if(intval($_SESSION['adminlevel'])>=$posterlevel)
				dbquery("DELETE FROM ".$prefix."forumplugin WHERE id=".$_POST['id']);
			$_GET['action']="topicshow";
			$check=false;
			break;
		case "Add":
			if($_POST['forumname']!="" && $_SESSION['adminlevel']>=$posterlevel) {
				$query="INSERT INTO ".$prefix."forumplugin ( id, data, poster, name, text, type, baseid, flag1, flag2) VALUES (null, \"".date('Y-m-d H:i:s' )."\", \"".$_SESSION['user']."\", \"".encode(sanitize($_POST['forumname']))."\", \"".encode(sanitize($_POST['forumdescription']))."\", 1, null, null, null)";
				dbquery($query);
			}
			break;
		case "Add Topic":
			if($_POST['topicname']!="" && $_SESSION['adminlevel']>=$posterlevel) {
				if(!is_intval($_POST['forumid']))
					die ($forummessage[32]);
				$topicname=encode(sanitize($_POST['topicname']));
				$query="INSERT INTO ".$prefix."forumplugin ( id, data, poster, name, text, type, baseid, flag1, flag2) VALUES (null, \"".date('Y-m-d H:i:s' )."\", \"".$_SESSION['user']."\", \"$topicname\", \"\", 2, ".$_POST['forumid'].", null, null)";
				dbquery($query);
				if($_POST['topictext']!="") {
					$row=fetch_array(dbquery("SELECT id FROM ".$prefix."forumplugin WHERE name=\"$topicname\" AND type=2"));
					$query="INSERT INTO ".$prefix."forumplugin ( id, data, poster, name, text, type, baseid, flag1, flag2) VALUES (null, \"".date('Y-m-d H:i:s' )."\", \"".$_SESSION['user']."\", \"$topicname\", \"".encode(sanitize($_POST['topictext']))."\", 3, ".$row['id'].", null, null)";
					dbquery($query);
				}
			}
			break;
		case "Add Post":
			if($_POST['topictext']!="" && $_SESSION['adminlevel']>=$posterlevel) {
				$topicname=encode(sanitize($_POST['topicname']));
				$text=preparse_bbcode(sanitize($_POST['topictext']), &$error);
				$query="INSERT INTO ".$prefix."forumplugin ( id, data, poster, name, text, type, baseid, flag1, flag2) VALUES (null, \"".date('Y-m-d H:i:s' )."\", \"".$_SESSION['user']."\", \"$topicname\", \"".encode($text)."\", 3, ".$_GET['topicid'].", null, null)";
				dbquery($query);
			}
			break;
		default:
	}
}

//Show existing forums
$prt.="<div id=\"forumwrapper\" style=\"width: ".$forumwidth."; \">\n";
$prt.="<div id=\"forumtitle\"><h3>$forumname</h3></div>\n";

$width=$forumwidth-20;

switch (sanitize($_GET['action'])) {
	case "deleteforum":
		if($_SESSION['adminlevel']<$posterlevel)
			break;
		if(!is_intval($_GET['id']))
			die ($forummessage[32]);
		$prt.="<div id=\"forumform\">\n<p>$forummessage[29]</p>\n";
		$prt.="<form id=\"deletepost\" method=\"POST\" action=\"?page=".$selected['link']."\">\n";
		$prt.="<input type=\"hidden\" name=\"forumsubmit\" value=\"deleteforum\" />\n";
		$prt.="<input type=\"hidden\" name=\"forum\" value=\"".sanitize($_GET['forum'])."\" />\n";
		$prt.="<input type=\"hidden\" name=\"id\" value=\"".$_GET['id']."\" />\n";
		$prt.="<a class=\"cancel\" href=\"?page=".$selected['link']."\">$forummessage[15]</a>\n";
		$prt.="<input type=\"submit\" name=\"aaa\" value=\"".$forummessage[28]."\" />\n";
		$prt.="</form>\n</div>\n";
		$row = fetch_array(dbquery("SELECT * FROM ".$prefix."forumplugin where id=\"".$_GET['id']."\""));
		$prt.="<div id=\"forumtitles\">\n";
		$prt.= "<p><a href=\"?page=".$selected['link']."&amp;action=forumshow&amp;forum=".$row['name']."\">".decode($row['name'])."</a><span class=\"titleright\">$num<span style=\"float: right;\">$num1</span></span><br />".decode($row['text'])."</p>\n";
		$prt.="</div>\n";
		break;
	case "deletetopic":
		if($_SESSION['adminlevel']<$posterlevel)
			break;
		if(!is_intval($_GET['forumid']) || !is_intval($_GET['topicid']))
			die ($forummessage[32]);
		$forum=sanitize($_GET['forum']);
		$prt.="<div class=\"topictitle\">\n".decode($forum);
		$prt.="<a class=\"backlink\" href=\"?page=".$selected['link']."&amp;id=".$_GET['forumid']."&amp;forum=$forum&action=forumshow\">$forum</a>";
		$prt.="<a class=\"backlink\" href=\"?page=".$selected['link']."\">$forummessage[23] --></a></div>\n";
		$prt.="<div id=\"forumform\">\n<p>$forummessage[27]</p>\n";
		$prt.="<form id=\"deletepost\" method=\"POST\" action=\"?page=".$selected['link']."&amp;action=forumshow&amp;forum=$forum\">\n";
		$prt.="<input type=\"hidden\" name=\"forumsubmit\" value=\"deletetopic\" />\n";
		$prt.="<input type=\"hidden\" name=\"topic\" value=\"".sanitize($_GET['topic'])."\" />\n";
		$prt.="<input type=\"hidden\" name=\"topicid\" value=\"".$_GET['topicid']."\" />\n";
		$prt.="<input type=\"submit\" name=\"aaa\" value=\"".$forummessage[26]."\" />\n";
		$prt.="</form>\n</div>\n";
		$prt.="<div id=\"forumposts\">\n";
		if($row = fetch_array(dbquery("SELECT * FROM ".$prefix."forumplugin where id=\"".$_GET['topicid']."\""))) {
			$prt.= "<p class=\"topictitle\">";
			$prt.= "<a href=\"?page=".$selected['link']."&amp;action=topicshow&amp;forum=".$row['forum']."&amp;topic=".$row['topic']."\">".decode($row['name'])."</a>";
			$prt.= "<span style=\"float: right; font-weight: 400; font-size: .8em;\">$forummessage[12] <span style=\"font-size: .9em;\">".strftime("%m/%d - %I:%M %p ",$row['data'])."</span>by <b>".$row['poster']."</b></span></p>\n";
		}
		$prt.="</div>\n";
		break;
	case "deletepost":
		if($_SESSION['adminlevel']<$posterlevel)
			break;
		if(!is_intval($_GET['forumid']) || !is_intval($_GET['id']))
			die ($forummessage[32]);
		$forum=sanitize($_GET['forum']);
		$prt.="<div class=\"topictitle\">\n".decode($_GET['topic']);
		$prt.="<a class=\"backlink\" href=\"?page=".$selected['link']."&amp;id=".$_GET['forumid']."&amp;forum=$forum&action=forumshow\">$forum</a>";
		$prt.="<a class=\"backlink\" href=\"?page=".$selected['link']."\">$forummessage[23] --></a></div>\n";
		$prt.="<div id=\"forumform\">\n";
		$prt.="<form id=\"deletepost\" method=\"POST\" action=\"?page=".$selected['link']."&amp;action=topicshow&amp;forum=$forum&amp;topic=".sanitize($_GET['topic'])."&amp;topicid=".$_GET['topicid']."\">\n";
		$prt.="<input type=\"hidden\" name=\"forumsubmit\" value=\"deletepost\" />\n";
		$prt.="<input type=\"hidden\" name=\"id\" value=\"".$_GET['id']."\" />\n";
		$prt.="<input type=\"hidden\" name=\"forumid\" value=\"".$_GET['forumid']."\" />\n";
		$prt.="<input type=\"hidden\" name=\"topicid\" value=\"".$_GET['topicid']."\" />\n";
		$prt.="<input type=\"submit\" name=\"aaa\" value=\"".$forummessage[25]."\" />\n";
		$prt.="</form>\n";
		$prt.="</div>\n";
		$prt.="<div id=\"forumposts\">\n";
		$row = fetch_array(dbquery("SELECT * FROM ".$prefix."forumplugin where id=\"".$_GET['id']."\""));
		$prt.="<div class=\"topic\"><p class=\"topicposter\">$forummessage[9] <span style=\"font-size: .9em;\">".$row['data']."</span>$forummessage[10] <b>".$row['poster']."</b></p>\n";
		$texto = str_replace("\n", "<br />", decode($row['text']));
		$prt.="<p class=\"topictext\">".$texto."</p>\n</div>\n";
		$prt.="</div>\n";
		break;
	case "editpost":
		if($_SESSION['adminlevel']<$posterlevel)
			break;
		if(!is_intval($_GET['forumid']) || !is_intval($_GET['id']))
			die ($forummessage[32]);
		$forum=sanitize($_GET['forum']);
		$prt.="<div class=\"topictitle\">\n".decode($_GET['topic']);
		$prt.="<a class=\"backlink\" href=\"?page=".$selected['link']."&amp;id=".$_GET['forumid']."&amp;forum=$forum&action=forumshow\">$forum</a>";
		$prt.="<a class=\"backlink\" href=\"?page=".$selected['link']."\">$forummessage[23] --></a></div>\n";
		$prt.="<div id=\"forumform\">\n<h2>$forummessage[31]</h2>\n";
		$prt.="<form id=\"editpost\" method=\"POST\" action=\"?page=".$selected['link']."&amp;action=topicshow&amp;forum=$forum&amp;topic=".sanitize($_GET['topic'])."&amp;topicid=".$_GET['topicid']."\">\n";
		$prt.="<input type=\"hidden\" name=\"forumsubmit\" value=\"postedit\" />\n";
		$prt.="<input type=\"hidden\" name=\"id\" value=\"".$_GET['id']."\" />\n";
		$prt.="<input type=\"hidden\" name=\"forumid\" value=\"".$_GET['forumid']."\" />\n";
		$prt.="<input type=\"hidden\" name=\"topicid\" value=\"".$_GET['topicid']."\" />\n";
		$row = fetch_array(dbquery("SELECT * FROM ".$prefix."forumplugin where id=\"".$_GET['id']."\""));
		$prt.="<textarea name=\"text\" class=\"foruminput\" style=\" height:80px; \">".decode($row['text'])."</textarea>\n";
		$prt.="<input type=\"submit\" name=\"aaa\" value=\"$forummessage[31]\" />\n";
		$prt.="</form>\n";
		$prt.="</div>\n";
		$prt.="<div id=\"forumposts\">\n";
		$prt.="<div class=\"topic\"><p class=\"topicposter\">$forummessage[9] <span style=\"font-size: .9em;\">".$row['data']."</span>$forummessage[10] <b>".$row['poster']."</b></p>\n";
		$texto = str_replace("\n", "<br />", decode($row['text']));
		$prt.="<p class=\"topictext\">".$texto."</p>\n</div>\n";
		$prt.="</div>\n";
		break;
	case "forumadd":
		$prt.="<div id=\"forumform\">\n<h2>$forummessage[7]</h2>\n<h3>$forummessage[2]:</h3>\n";
		$prt.="<form id=\"newforum\" method=\"POST\" action=\"?page=".$selected['link']."\">\n";
		$prt.="<input type=\"text\" value=\"\" name=\"forumname\" style=\"width: 95%; margin-bottom: 3px;\" />\n";
		$prt.="<h3>$forummessage[22]</h3>\n";
		$prt.="<input type=\"text\" value=\"\" name=\"forumdescription\" style=\"width: 95%; margin-bottom: 3px; height: 40px;\" />\n";
		$prt.="<a class=\"cancel\" href=\"?page=".$selected['link']."\">$forummessage[15]</a>\n";
		$prt.="<input type=\"hidden\" name=\"forumsubmit\" value=\"Add\" />\n";
		$prt.="<input class=\"submit\" type=\"submit\" name=\"aaa\" value=\"$forummessage[16]\"/>\n";
		$prt.="</form></div>\n";
		break;
	case "topicadd":
		if($_SESSION['adminlevel']<$posterlevel)
			break;
		if($_GET['id']!="" && !is_intval($_GET['id']))
			die ($forummessage[32]);
		$forum=sanitize($_GET['forum']);
		$prt.="<div id=\"forumform\">\n<h2>".decode($forum)."</h2>\n";
		$prt.="<form id=\"newtopic\" method=\"POST\" action=\"?page=".$selected['link']."&amp;action=forumshow&amp;forum=".decode(sanitize($_GET['forum']))."&amp;id=".$_GET['id']."\" style=\"text-align: center\">\n";
		$prt.="$forummessage[13]:<br /><input class=\"foruminput\" type=\"text\" value=\"\" name=\"topicname\" />\n";
		$prt.="$forummessage[14]:<br /><textarea class=\"foruminput\" name=\"topictext\" style=\"height:80px\"></textarea>\n";
		$prt.="<input type=\"hidden\" name=\"forumname\" value=\"$forum\" />\n";
		$prt.="<input type=\"hidden\" name=\"forumid\" value=\"".$_GET['id']."\" />\n";
		$prt.="<input type=\"hidden\" name=\"forumsubmit\" value=\"Add Topic\" />\n";
		$prt.="<a class=\"cancel\" href=\"?page=".$selected['link']."&amp;action=forumshow&amp;forum=$forum&amp;id=".$_GET['id']."\">$forummessage[15]</a>\n";
		$prt.="<input class=\"submit\" type=\"submit\" name=\"aaa\" value=\"$forummessage[11]\"/>\n";
		$prt.=showbb();
		$prt.="</form></div>\n";
		break;
	case "forumshow":
		if($_GET['id']!="" && !is_intval($_GET['id']))
			die ($forummessage[32]);
		$forum=sanitize($_GET['forum']);
		$prt.="<div class=\"forumname\">".decode($forum);
		$prt.="<a class=\"backlink\" href=\"?page=".$selected['link']."\">$forummessage[23]</a></div>\n";
		$query="SELECT * FROM ".$prefix."forumplugin where baseid=\"".$_GET['id']."\" AND type=2 ORDER BY data DESC";
		$result=dbquery($query);
		$found=false;
		if($result) {
		while($row = fetch_array($result)) {
			if(!$found) {
				$prt.="<div id=\"forumtopics\">\n";
				$found=true;
			}
			$prt.= "<p class=\"topictitle\">";
			if($_SESSION['user']==$row['poster'] || $_SESSION['adminlevel']>=$adminlevel)
				$prt.="<a class=\"adelete\"  href=\"?page=".$selected['link']."&amp;action=deletetopic&forumid=".$_GET['id']."&amp;forum=$forum&amp;topicid=".$row['id']."&amp;topic=".$row['name']."\"><img src=\"images/editdelete.png\" alt=\"\" class=\"deleteimg\" /></a>";
			$prt.= "<a href=\"?page=".$selected['link']."&amp;action=topicshow&amp;forumid=".$_GET['id']."&amp;forum=$forum&amp;topic=".$row['name']."&amp;topicid=".$row['id']."\">".decode($row['name'])."</a>";
			
			$output=dbquery("SELECT * FROM ".$prefix."forumplugin WHERE baseid=".$row['id']." AND type=3 ORDER BY data DESC");
			$posts=num_rows($output);
			$row1=fetch_array($output);
			
			$prt.= "<span style=\"float: right; font-weight: 400; font-size: .8em;\">$forummessage[6]:$posts $forummessage[30] <span style=\"font-size: .9em;\">".substr($row1['data'],0,16)."</span> by <b>".$row1['poster']."</b>&nbsp;</span></p>\n";
		}
		if($found)
			$prt.="</div>\n";
		}
		if($_SESSION['adminlevel']>=$posterlevel) {
			$prt.="<div id=\"forumfooter\">\n";
			$prt.="<p><a href=\"?page=".$selected['link']."&amp;action=topicadd&amp;forum=$forum&amp;id=".$_GET['id']."\">".$forummessage[11]."</a></p>\n";
			$prt.="</div>";
		}
		break;
	case "topicshow":
		if($check)
			if($_GET['forumid']!="" && !is_intval($_GET['forumid']) || $_GET['topicid']!="" && !is_intval($_GET['topicid']))
				die ($forummessage[32]);
		$forum=sanitize($_GET['forum']);
		$topic=sanitize($_GET['topic']);
		$prt.="<div class=\"topictitle\">\n".decode($topic);
		$prt.="<a class=\"backlink\" href=\"?page=".$selected['link']."&amp;forum=$forum&action=forumshow&amp;id=".$_GET['forumid']."\">$forum</a>";
		$prt.="<a class=\"backlink\" href=\"?page=".$selected['link']."\">$forummessage[23] -></a></div>\n";
		$query="SELECT * FROM ".$prefix."forumplugin where baseid=".$_GET['topicid']."  AND type=3 ORDER BY data";
		$result=dbquery($query);
		$found=false;
		if($result) {
		while($row = fetch_array($result)) {
			if(!$found) {
				$prt.="<div id=\"forumposts\">\n";
				$found=true;
			}
			$texto = bbcode_format(str_replace("\n", "<br />", decode($row['text'])));
			$prt.="<div class=\"topic\"><p class=\"topicposter\">";
			if($_SESSION['user']==$row['poster'] || $_SESSION['adminlevel']>=$adminlevel)
				$prt.="<a href=\"?page=".$selected['link']."&amp;action=editpost&amp;forum=$forum&amp;forumid=".$_GET['forumid']."&amp;topic=$topic&amp;topicid=".$_GET['topicid']."&amp;id=".$row['id']."\"><img src=\"images/edit.png\" title=\"$forummessage[25]\" alt=\"$forummessage[24]\" class=\"deleteimg\" /></a>\n";
			if($_SESSION['adminlevel']>=$adminlevel || $_SESSION['user']==$row['poster'])
				$prt.="<a href=\"?page=".$selected['link']."&amp;action=deletepost&amp;forum=$forum&amp;forumid=".$_GET['forumid']."&amp;topic=$topic&amp;topicid=".$_GET['topicid']."&amp;id=".$row['id']."\"><img src=\"images/editdelete.png\" title=\"$forummessage[25]\" alt=\"$forummessage[24]\" class=\"deleteimg\" /></a>\n";
			$prt.="$forummessage[9] <span style=\"font-size: .9em;\">".substr($row['data'],0,16)."</span> $forummessage[10] <b>".$row['poster']."</b></p>\n";
			$prt.="<div class=\"topictext\">$texto</div>\n";
			$prt.="</div>\n";
		}
		if($found)
			$prt.="</div>\n";
		}
		if($_SESSION['adminlevel']>=$posterlevel) {
			$prt.="<div id=\"forumform\">\n<h2>$forummessage[17]</h2>";
			$prt.="<form method=\"POST\" action=\"?page=".$selected['link']."&amp;action=topicshow&amp;topicid=".$_GET['topicid']."&amp;forumid=".$_GET['forumid']."&amp;forum=$forum&amp;topic=$topic\" style=\"text-align: center\">\n";
			$prt.="<input type=\"hidden\" value=\"$topic\" name=\"topicname\" />\n";
			$prt.="<input type=\"hidden\" value=\"".$_GET['topicid']."\" name=\"topicid\" />\n";
			$prt.="<input type=\"hidden\" name=\"forumname\" value=\"$forum\" />\n";
			$prt.="<textarea class=\"foruminput\" name=\"topictext\" style=\" height:240px; \"></textarea>\n";
			$prt.="<input type=\"hidden\" name=\"forumsubmit\" value=\"Add Post\" />\n";
			$prt.="<input class=\"submit\" type=\"submit\" name=\"aaa\" value=\"$forummessage[17]\"/>\n";
			$prt.=showbb();
			$prt.="</form>\n</div>\n";
		}
		break;
	default:
		$found=false;
		$result=dbquery("SELECT * FROM ".$prefix."forumplugin where type=1 ORDER BY data ASC");
		if($result) {
			while($row = fetch_array($result)) {
				if(!$found) {
					$prt.="<div class=\"topictitle\">$forummessage[8]<span class=\"indexright\">$forummessage[5]&nbsp;&nbsp;$forummessage[6]</span></div>\n";
					$prt.="<div id=\"forumtitles\">\n";
					$found=true;
				}
				$result1 = dbquery("SELECT * FROM ".$prefix."forumplugin where baseid=".$row['id']."  AND type=2");
				$num = num_rows($result1);
				$lines=fetch_all($result1);
				$num1 = 0;
				foreach($lines as $line) {
					$result2=dbquery("SELECT * FROM ".$prefix."forumplugin where baseid=\"".$line['id']."\"  AND type=3");
					$num1 += num_rows($result2);
				}
				$prt.= "<p>";
				if($_SESSION['adminlevel']>=$adminlevel)
					$prt.= "<a href=\"?page=".$selected['link']."&amp;action=deleteforum&amp;id=".$row['id']."&amp;forum=".$row['name']."\"><img src=\"images/editdelete.png\" title=\"$forummessage[28]\" alt=\"$forummessage[28]\" class=\"deleteimg\" /></a>\n";
				$prt.= "<a href=\"?page=".$selected['link']."&amp;action=forumshow&amp;forum=".$row['name']."&amp;id=".$row['id']."\"><b>".decode($row['name'])."</b></a><span class=\"titleright\">$num<span style=\"float: right;\">$num1</span></span><br />".bbcode_format(decode($row['text']))."</p>\n";
			}
			if($found)
				$prt.="</div>\n";
		}
		//footer
		if($_SESSION['adminlevel']>=$adminlevel) {
			$prt.="<div id=\"forumfooter\">\n";
			$prt.="<p><a href=\"?page=".$selected['link']."&amp;action=forumadd\">$forummessage[7]</a></p>\n";
			$prt.="</div>";
		}
}
$prt.="</div>\n";

$out.=$prt;

function showbb() {
	$prt="<div align=\"center\">\n<h3>BB Codes:</h3>\n";
	$prt.="<table cellspacing=\"1\" cellpadding=\"1\" border=\"1\" style=\"width: 202px; height: 81px;\"><tbody>\n";
	$prt.="<tr><td>[b]bold[/b]</td><td><strong>bold</strong></td><td>[url]www.google.com[/url]</td><td><a href=\"http://www.google.com\">www.google.com</a></td></tr>\n";
	$prt.="<tr><td>[i]italic[/i]</td><td><em>italic</em></td><td>[url=www.google.com]Google[/url]</td><td><a href=\"http://www.google.com\">Google</a></td></tr>\n";
	$prt.="<tr><td>[u]underline[/u]</td><td><u>underline</u></td><td>[img]pathtoimage[/img]</td><td><img alt=\"image\" src=\"images/edit.png\" /></td></tr>\n";
	$prt.="</tbody></table>\n</div>\n";
	return $prt;
}

function preparse_bbcode($text, &$errors) {
	// Change all simple BBCodes to lower case
	$a = array('[B]', '[I]', '[U]', '[/B]', '[/I]', '[/U]');
	$b = array('[b]', '[i]', '[u]', '[/b]', '[/i]', '[/u]');
	$text = str_replace($a, $b, $text);

	// Do the more complex BBCodes (also strip excessive whitespace and useless quotes)
	$a = array( '#\[url=("|\'|)(.*?)\\1\]\s*#i',
				'#\[url\]\s*#i',
				'#\s*\[/url\]#i',
				'#\[email=("|\'|)(.*?)\\1\]\s*#i',
				'#\[email\]\s*#i',
				'#\s*\[/email\]#i',
				'#\[img\]\s*(.*?)\s*\[/img\]#is',
				'#\[colou?r=("|\'|)(.*?)\\1\](.*?)\[/colou?r\]#is');

	$b = array(	'[url=$2]',
				'[url]',
				'[/url]',
				'[email=$2]',
				'[email]',
				'[/email]',
				'[img]$1[/img]',
				'[color=$2]$3[/color]');

		// For non-signatures, we have to do the quote and code tags as well
		$a[] = '#\[quote=(&quot;|"|\'|)(.*?)\\1\]\s*#i';
		$a[] = '#\[quote\]\s*#i';
		$a[] = '#\s*\[/quote\]\s*#i';
		$a[] = '#\[code\][\r\n]*(.*?)\s*\[/code\]\s*#is';

		$b[] = '[quote=$1$2$1]';
		$b[] = '[quote]';
		$b[] = '[/quote]'."\n";
		$b[] = '[code]$1[/code]'."\n";

	// Run this baby!
	$text = preg_replace($a, $b, $text);

		$overflow = check_tag_order($text, $error);

		if ($error)
			// A BBCode error was spotted in check_tag_order()
			$errors[] = $error;
		else if ($overflow)
			// The quote depth level was too high, so we strip out the inner most quote(s)
			$text = substr($text, 0, $overflow[0]).substr($text, $overflow[1], (strlen($text) - $overflow[0]));

	return trim($text);
}

function check_tag_order($text, &$error) {
	// The maximum allowed quote depth
	$max_depth = 3;

	$cur_index = 0;
	$q_depth = 0;

	while (true) {
		// Look for regular code and quote tags
		$c_start = strpos($text, '[code]');
		$c_end = strpos($text, '[/code]');
		$q_start = strpos($text, '[quote]');
		$q_end = strpos($text, '[/quote]');

		// Look for [quote=username] style quote tags
		if (preg_match('#\[quote=(&quot;|"|\'|)(.*)\\1\]#sU', $text, $matches))
			$q2_start = strpos($text, $matches[0]);
		else
			$q2_start = 65536;

		// Deal with strpos() returning false when the string is not found
		// (65536 is one byte longer than the maximum post length)
		if ($c_start === false) $c_start = 65536;
		if ($c_end === false) $c_end = 65536;
		if ($q_start === false) $q_start = 65536;
		if ($q_end === false) $q_end = 65536;

		// If none of the strings were found
		if (min($c_start, $c_end, $q_start, $q_end, $q2_start) == 65536)
			break;

		// We are interested in the first quote (regardless of the type of quote)
		$q3_start = ($q_start < $q2_start) ? $q_start : $q2_start;

		// We found a [quote] or a [quote=username]
		if ($q3_start < min($q_end, $c_start, $c_end)) {
			$step = ($q_start < $q2_start) ? 7 : strlen($matches[0]);

			$cur_index += $q3_start + $step;

			// Did we reach $max_depth?
			if ($q_depth == $max_depth)
				$overflow_begin = $cur_index - $step;

			++$q_depth;
			$text = substr($text, $q3_start + $step);
		}

		// We found a [/quote]
		else if ($q_end < min($q_start, $c_start, $c_end)) {
			if ($q_depth == 0) {
				$error = "BBCode error 1!";
				return;
			}

			$q_depth--;
			$cur_index += $q_end+8;

			// Did we reach $max_depth?
			if ($q_depth == $max_depth)
				$overflow_end = $cur_index;

			$text = substr($text, $q_end+8);
		}

		// We found a [code]
		else if ($c_start < min($c_end, $q_start, $q_end)) {
			// Make sure there's a [/code] and that any new [code] doesn't occur before the end tag
			$tmp = strpos($text, '[/code]');
			$tmp2 = strpos(substr($text, $c_start+6), '[code]');
			if ($tmp2 !== false)
				$tmp2 += $c_start+6;

			if ($tmp === false || ($tmp2 !== false && $tmp2 < $tmp)) {
				$error = "BBCode error 2!";
				return;
			}
			else
				$text = substr($text, $tmp+7);

			$cur_index += $tmp+7;
		}

		// We found a [/code] (this shouldn't happen since we handle both start and end tag in the if clause above)
		else if ($c_end < min($c_start, $q_start, $q_end)) {
				$error = "BBCode error 3!";
			return;
		}
	}

	// If $q_depth <> 0 something is wrong with the quote syntax
	if ($q_depth) {
				$error = "BBCode error 4!";
		return;
	}
	else if ($q_depth < 0) {
				$error = "BBCode error 5!";
		return;
	}

	// If the quote depth level was higher than $max_depth we return the index for the
	// beginning and end of the part we should strip out
	if (isset($overflow_begin))
		return array($overflow_begin, $overflow_end);
	else
		return null;
}

function bbcode_format($var) {
	$search = array('/\[b\](.*?)\[\/b\]/is', '/\[i\](.*?)\[\/i\]/is', '/\[u\](.*?)\[\/u\]/is', '/\[img\](.*?)\[\/img\]/is', '/\[url\](.*?)\[\/url\]/is', '/\[url\=(.*?)\](.*?)\[\/url\]/is', '/\[quote\](.*?)\[\/quote\]/is' );
	$replace = array('<strong>$1</strong>', '<em>$1</em>', '<u>$1</u>', '<img src="$1" />', '<a href="$1">$1</a>', '<a href="$1">$2</a>', '<ul class="quote"><em>$1</em></ul>' );
	$var = preg_replace ($search, $replace, $var);
	return $var;
}
?>
