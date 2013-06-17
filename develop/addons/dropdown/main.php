<?php
function dropdownmenu($generate=0) {
	global $pagenum, $menu, $selected, $extension, $set;
	$count=0;
	$out="\n";
	$intend=0;
	$first=true;
	$out.="<div id=\"dropdown\">\n<ul class=\"dmenu\">\n";
	while($menu[$count][0] != "") {
		if($menu[$count][2]=="0") {
			if($menu[$count][1]=="0" && $intend==1) {
				$intend=0;
				$out.="</li>\n\t\t</ul>\n\t</li>\n";
			} elseif($menu[$count][1]!="0" && $intend<1) {
				$intend=1;
				$out.="\n\t\t<ul class=\"sub\">\n";
			} else
				if(!$first)
					$out.="</li>\n";
				else
					$first=false;
			if($intend=="0")
				$out.="\t<li class=\"level1-li\"";
			else
				$out.="\t\t\t<li";
			$out.="><a";
			if($intend=="0")
				if($menu[$count][4]==$selected['name'])
					$out.=" class=\"level1-a current\" ";
				else
					$out.=" class=\"level1-a\" ";
			else
				if($menu[$count][4]==$selected['name'])
					$out.= ' class="current"';
			if(strpos($menu[$count][3],"*"))
				$out.=' href="'.str_replace("*", "",$menu[$count][3]).'">';
			else
				if($generate)
					$out.=" href=\"".$menu[$count][3].".php\">";
				else
					$out.=" href=\"".$set['indexfile']."?page=".$menu[$count][3]."\">";
			$out.=decode($menu[$count][4])."</a>";
		}
		$count++;
	}
	$out.="</li>\n</ul>\n</div>\n";
	return $out;
}

?>
