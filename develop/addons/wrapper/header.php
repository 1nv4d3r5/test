<?php
/*---------------------------------------------------+
| LightNEasy Content Management System
| Copyright 2007 - 2010 Fernando Baptista
| http://www.lightneasy.org
+----------------------------------------------------+
| Addon Wrapper header module main.php
| Version 3.2.2 SQLite/MySQL
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+----------------------------------------------------*/
$string="<script language=\"JavaScript\">\nfunction calcHeight() {\n\t//find the height of the internal page\n\tvar the_height=document.getElementById('the_iframe').contentWindow.document.body.scrollHeight;\n\t//change the height of the iframe\n\tdocument.getElementById('the_iframe').height=the_height;\n}\n</script>\n";
//$string="<script type=\"text/javascript\">\nfunction getElement(aID) {\nreturn (document.getElementById) ? document.getElementById(aID) : document.all[aID];\n}\n\nfunction getIFrameDocument(aID){\nvar rv = null;\nvar frame=getElement(aID);\nif (frame.contentDocument)\n\trv = frame.contentDocument+100px;\nelse\n\trv = document.frames[aID].document+100px;\nreturn rv;\n}\n\nfunction adjustMyFrameHeight() {\nvar frame = getElement(\"myFrame\");\nvar frameDoc = getIFrameDocument(\"myFrame\");\nframe.height = frameDoc.body.offsetHeight;\n}\n</script>\n";
$out.=$string;
?>
