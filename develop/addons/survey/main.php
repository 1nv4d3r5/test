<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2011 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Run script for Survey addon, version 1.0
| LightNEasy 3.2.4, MySQL/SQLite
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/

function survey() {
global $prefix, $selected, $MySQL, $sqldbdb, $set;

require_once "addons/survey/settings.php";
if(file_exists("addons/survey/lang/lang_".$set['language'].".php"))
	require_once "addons/survey/lang/lang_".$set['language'].".php";
else
	require_once "addons/survey/lang/lang_en_US.php";

$out="";
if(isset($_POST['surveyvote'])) {
	if(sanitize($_POST['surveyvote'])=="voted") {
		// check if user already voted
		$voterid=getuserid($_SESSION['user']);
		if(!$voterid)
			$voterid=9999;
		$output=dbquery("SELECT * FROM ".$prefix."surveyvotes WHERE surveyid=".$_POST['surveyid']." AND voterid=$voterid");
		if(num_rows($output) && $voterid!=9999)
			$out.="<h3 style=\"color: red;\">$surveymessage[12]</h3>\n";
		else {
			dbquery("INSERT INTO ".$prefix."surveyvotes (id, surveyid, vote, voterid) VALUES ( null, ".$_POST['surveyid'].", ".$_POST[$_POST['surveyid']].", $voterid )");
			$_POST['surveyvote']="results";
		}
	}
}

$out.="<div style=\"width: ".$surveywidth."px; \">\n";
unset($row);

if(sanitize($_POST['surveyvote'])=="results") {
	$out.="<h3 id=\"surveytitle\">$surveymessage[13]</h3>\n";
	$surveys=fetch_all(dbquery("SELECT * FROM ".$prefix."surveynames WHERE surveyid=0"));
	$s=0;
	While($surveys[$s]['id']) {
		$out.="<p class=\"surveynames\">".decode($surveys[$s]['surveyname'])."</p>\n";
		$query="SELECT * FROM ".$prefix."surveynames WHERE surveyid=".$surveys[$s]['id'];
		$row=fetch_all(dbquery($query));
		$i=0;
		$out.="<table class=\"surveyresults\">\n";
		while($row[$i]['id']) {
			$out.="<tr><td>".decode($row[$i]['surveyname'])." - </td><td>";
			$output=dbquery("SELECT * FROM ".$prefix."surveyvotes WHERE surveyid=".$surveys[$s]['id']." AND vote=".$row[$i]['place']);
			$out.= num_rows($output);
			$out.="</td></tr>\n";
			$i++;
		}
		$out.="</table>\n";
		$s++;
	}
	$out.="<form name=\"surveyform\" method=\"POST\" id=\"surveyreturn\" action=\"\">\n";
	$out.="<p style=\" text-align: center; \"><br /><input type=\"submit\" name=\"aaa\" value=\"$surveymessage[14]\" /></p>\n</form>\n";
} else {
	$row=fetch_all(dbquery("SELECT * FROM ".$prefix."surveynames WHERE surveyid=0"));

	$i=0;
	$adminlevel=0;

	while($row[$i]['id']) {
		$out.="<form name=\"surveyform\" method=\"POST\" action=\"\">\n";
		$out.="<h3 id=\"surveytitle\">".decode($row[$i]['surveyname'])."</h3>\n";
		$out.="<ul class=\"surveylist\" style=\" list-style: none; margin-left: 20px;\">\n";
		$adminlevel=$row[$i]['adminlevel'];
		unset($row1);
		if($row1=fetch_all(dbquery("SELECT * FROM ".$prefix."surveynames WHERE surveyid=".$row[$i]['id']." ORDER BY place"))) {
			$j=0;
			while($row1[$j]['id']) {
				$out.="<li>";
				if(intval($_SESSION['adminlevel'])>=$adminlevel)
					$out.="<input type = \"Radio\" Name =\"".$row[$i]['id']."\" value= \"".$row1[$j]['place']."\" /> - ";
				$out.= decode($row1[$j]['surveyname'])."</li>\n";
				$j++;
			}
		}
		$out.="</ul>\n";

		if(intval($_SESSION['adminlevel'])>=$adminlevel) {
			$out.="<p style=\"text-align: center;\">";
			$out.="<input type=\"hidden\" name=\"surveyid\" value=\"".$row[$i]['id']."\" />\n";
			$out.="<input type=\"hidden\" name=\"surveyvote\" value=\"voted\" /><input type=\"submit\" name=\"aaa\" value=\"$surveymessage[10]\" /><br />\n";
		}
		$out.="</p></form>\n";
		$i++;
	}

	$out.="<form name=\"viewresults\" id=\"viewresults\" method=\"POST\" action=\"\">\n";
	$out.="<p style=\"text-align: center;\"><input type=\"hidden\" name=\"surveyvote\" value=\"results\" />";
	$out.="<input type=\"submit\" name=\"aaa\" value=\"$surveymessage[11]\" /></form></p>\n";
}
$out.="</div>\n";
return $out;
}
?>
