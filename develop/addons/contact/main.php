<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2012 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Contact Form function main.php
| Version 3.2.5 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
global $set, $contactmessage, $message;

if(file_exists("addons/contact/lang/lang_".$set['language'].".php"))
	require_once "addons/contact/lang/lang_".$set['language'].".php";
else
	require_once "addons/contact/lang/lang_en_US.php";

if($_POST['submit']=="Send message") {
		$message=sendmessage();
		if($message!="") $out.="<div class=\"LNE_message\">".$message."</div>\n";
}

function contact() {
	global $pagenum, $contactmessage, $set;
	$out="<div id=\"LNE_contact\">\n<form method=\"post\" id=\"LNE_contactform\" action=\"\"><fieldset>\n";
	if($_SESSION['user']!="") {
		$out.="<input type=\"hidden\" name=\"name\" value=\"".$_SESSION['user']."\" />\n";
		$out.="<input type=\"hidden\" name=\"email\" value=\"\" />\n";
	} else {
		$out.="<p><b>$contactmessage[30]:</b><br />\n";
		$out.="<input  type=\"text\" name=\"name\" value=\"\" /></p>\n";
		$out.="<p><b>$contactmessage[31]:</b><br />\n";
		$out.="<input  type=\"text\" name=\"email\" value=\"\" /></p>\n";
		$out.="<p><b>$contactmessage[34]:</b><br />\n";
		$out.="<input  type=\"text\" name=\"phone\" value=\"\" /></p>\n";
	}
	$out.="<p><b>$contactmessage[32]:</b><br />\n";
	$out.="<textarea name=\"text\"></textarea></p>\n";
	if($_SESSION['user']!="") {
		srand((double) microtime() * 1000000);
		$a = rand(1, 9);
		$b = rand(1, 9);
		$c=$a*$b;
		$_SESSION[session_id()]=$c;
		$out.="<input type=\"hidden\" name=\"secCode\" value=\"$c\" />\n";
	} else {
		$out.="<p><b>$contactmessage[99]:</b><br />\n";
		if($set['extension']=="0") {
			//text catchpa - use this is your server doesn't display the catchpa image correctly
			srand((double) microtime() * 1000000);
			$a = rand(0, 9);
			$b = rand(0, 9);
			$c=$a+$b;
			$out.="$a + $b = ";
			$_SESSION[session_id()] = $c;
			$out.="<input type=\"text\" name=\"secCode\" maxlength=\"2\" style=\"width:20px\" />";
			$out.="</p>\n";
			// end of text catchpa
		} else {
			// image catchpa
			$out.= catchpa();
			$out.="</p>\n";
			// end of image catchpa
		}
	}
	$out.="<p><input  type=\"hidden\" name=\"page\" value=\"$pagenum\" />\n";
	$out.="<input type=\"hidden\" name=\"submit\" value=\"Send message\" />\n";
	$out.="<input type=\"submit\" name=\"aa\" value=\"$contactmessage[33]\" />";
	$out.="</p>\n</fieldset></form></div>\n";
	return $out;
}

function sendmessage() {
	global $set, $contactmessage;
	if(!is_intval(trim($_POST['secCode'])) || !is_intval($_SESSION[session_id()])) die ("Contact - aha! Clever!");
	if($_POST['secCode'] != $_SESSION[session_id()]) {
		$message=$contactmessage[139];
	} else {
		if(isset($_POST['text'])) {
			$message=$contactmessage[26];
			if($_POST['text']!="" && $_POST['name']!="") {
				if(extension_loaded("mbstring") && function_exists("mb_encode_mimeheader")) {
					mb_language("uni");
					mb_internal_encoding("UTF-8");
//org					$fromname =  '"'. mb_encode_mimeheader($set['fromname']).'" <'.$set['fromemail'].'> ';
              $fromname =  '"'. mb_encode_mimeheader($set['author']).'" <'.$set['wemail'].'> ';

				} else {
//org					$fromname = $set['fromemail'];
              $fromname = $set['author'].'" <'.$set['wemail'].'> ';
				}
				
//
				$email = html_entity_decode(sanitize($_POST['email']));
				$text = html_entity_decode(sanitize($_POST['text']));
				$name = html_entity_decode(sanitize($_POST['name']));
				$phone = html_entity_decode(sanitize($_POST['phone']));

/*				$additional_header = array();
				$additional_header[] = 'MIME-Version: 1.0';
				$additional_header[] = 'Content-Type: text/plain; charset=utf-8';
				$additional_header[] = 'Content-Transfer-Encoding: 7bit ';
				$additional_header[] = 'From: ' .$fromname.' '.$email;
*/


//org				$to=$set['toemail']."\r\n";
            $to=$set['wemail']."\r\n";
            
            $subject=$contactmessage[27].$name." via Website";
            
            $mailbody=$contactmessage[27].": ".$name."\r\n\r\n"
                                              .$contactmessage[31].": ".$email."\r\n";
                   if ($phone != "") $mailbody.=$contactmessage[34].": ".$phone."\r\n";
                                     $mailbody.="\r\n\r\n".$contactmessage[32].":\r\n\r\n".$text;

                 $additional_header = 'MIME-Version: 1.0'."\r\n"
                                      .'Content-Type: text/plain; charset=utf-8'."\r\n"
                                      .'Content-Transfer-Encoding: 7bit '."\r\n"
                                      .'From: '.$fromname."\r\n";
				if ($email != "") $additional_header.='Reply-To: '.$name.'" <'.$email.'> '."\r\n";
                  $additional_header.='X-Mailer: LightNEasy ';

//org				if(!mail($to, $contactmessage[27].$set['fromname'], $contactmessage[27].$name."\r\n".$email."\r\n".$phone."\r\n\r\n\r\n".$text, implode("\r\n", $additional_header) ))
            if(!mail($to, $subject, $mailbody, $additional_header))
					$message=$contactmessage[28];
			} else $message=$contactmessage[29];
		} else $message=$contactmessage[29];
	}
	return $message;
}
?>
