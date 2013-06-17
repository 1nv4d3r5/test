<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2011 Fernando Baptista
| http://lightneasy.org
+----------------------------------------------------+
| Atom feed creator atom.php
| Version 3.2.4 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/

// $pathtonews must point to the page that displays your news, relative to server root
// replace the page name if needed, default is "news"
$newspage="news.php";
// To show comments on Atom Page, set to true otherwise, set to false
$showcomments=true;

// for a generated page news.php - faster
$pathtonews="/".$newspage."?";
// for the news page inside LightNEasy, if you can't generate pages: uncomment the line below and comment the line above.
//$pathtonews="/LightNEasy.php?page=".$newspage."&amp;";


require_once "common.php";
require_once "../data/database.php";
if($MySQL==1) {
	$sqldbdb = @mysql_connect($databasehost, $databaselogin, $databasepassword) or die("Error - Could not connect to MySQL server: " . mysql_error());
	@mysql_select_db($databasename) or die("Error - Could not open database " . mysql_error());
} elseif($MySQL==0) {
	if(!$sqldbdb = @sqlite_open("../data/$databasename.db")) die ("Error - Could not open database");
} else {
	if(!$sqldbdb= new SQLite3("../data/$databasename.db")) die ("Couldn't open SQLite 3 database");
}
readsetup();
header('Content-type: application/atom+xml; charset=utf-8');

//-------------------Header-----------------------
$out.="<?xml version=\"1.0\" ?>\n";
$out.="<feed xmlns=\"http://www.w3.org/2005/Atom\">\n";
$out.="<title>".$set["title"]."</title>\n";
$out.="<link rel=\"alternate\" type=\"text/html\" href=\"".sv(SERVER_NAME)."\" />\n";
$out.="<link rel=\"self\" type=\"application/atom+xml\" href=\"http://".sv(SERVER_NAME).sv(PHP_SELF)."\" />\n";
$out.="<id>tag:".sv(SERVER_NAME).",".date("Y-m-d").":".date("Ymd")."</id>\n";
$out.="<updated>".date(DATE_ATOM)."</updated>\n"; 


//-------------------Pull from DB----------------- 
$query = "SELECT titulo,data,noticia,autor,email,visto,reg,cat FROM ".$prefix."noticias ORDER BY reg DESC LIMIT 0, 5";
$roww=fetch_all(dbquery($query));
foreach($roww as $row) {
	$catquery = "SELECT nome FROM ".$prefix."newscat WHERE id=".$row[7];
	$catid=fetch_array(dbquery($catquery));
	$out.="<entry>\n\t<title>".sanitize(stripslashes(decode($row[0])))."</title>\n";
	$out.="\t<link rel=\"alternate\" type=\"text/html\" href=\"http://".sv(SERVER_NAME).$pathtonews."id=".$row[6]."\" />\n";
	$out.="\t<id>tag:".sv(SERVER_NAME).",".date("Y-m-d",$row[1]).":".date("YmdHis",$row[1])."</id>\n";
	$out.="\t<published>".date(DATE_ATOM)."</published>\n";
	$out.="\t<updated>".date(DATE_ATOM,$row[1])."</updated>\n";
	$summ=sanitize(substr(strip_tags(stripslashes(decode($row[2]))),0,70));
	$summ=str_replace("&nbsp;","  ",$summ);
	$out.="\t<summary>".$summ."...</summary>\n";
	$out.="\t<author>\n\t\t<name>".$row[3]."</name>\n";
	$out.="\t\t<uri>http://".sv(SERVER_NAME)."</uri>\n\t</author>\n";
	$out.="\t<category term=\"".$catid."\" />\n";
	$out.="\t<content type=\"html\" xml:lang=\"en\" xml:base=\"http://www.krakerjak.com/content/\">\n";
	$out.="\t<![CDATA[".stripslashes(decode($row[2]));
//-------------------Show the comments if selected----------------- 
	if($showcomments==true) {
		$comquery = "SELECT * FROM ".$prefix."comments WHERE newsid=".$row[6]." ORDER BY time DESC";
		$comments = fetch_all(dbquery($comquery));
//-------------------Show the comments if there are any----------------- 
		if(num_rows(dbquery($comquery))>0) {
			$out.="</br><strong>Comments:</strong><hr>";        
			foreach($comments as $comment) {
				$out.="<blockquote><strong>".decode($comment['poster'])." said:</strong>  ";
				$out.=stripslashes(decode($comment['text']))."</blockquote></br>";
			}
		}
	}
	$out.="]]>\n\t</content>\n";
	$out.="</entry>\n";
}
$out.="</feed>";
print $out;
?>
