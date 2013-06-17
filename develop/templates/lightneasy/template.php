<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>$#header#$</head>
<body>
<div id="outer">
	<div id="header">
		<img src="$#image#$lne.png" alt="LightNEasy" />
		<h1>$#title#$</h1>
		<h2>$#subtitle#$</h2>
		$#search#$
	</div>
	<div id="menu">
		<div><ul>$#mainmenu#$</ul></div>
	</div>
	<div id="content">
		<div id="tertiaryContent">
			<h3>Latest News</h3>
			$#lastnews#$
			<br /><br />
			$#extra#$
			<div class="xbg"></div>
		</div>
		<div id="primaryContentContainer">
			<div id="primaryContent">$#content#$</div>
		</div>
		<div id="secondaryContent">
			$#loginform#$
			<br />
			<h3>$#selected#$</h3>
			<ul>$#expmenu#$</ul>
			<p></p>
			$#links 2#$
			<div class="xbg"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div id="footer">
		<p>$#footer#$ | $#sitemap#$</p>
	</div>
</div>
<?php
define("_BBC_PAGE_NAME", $_SERVER['PHP_SELF']);
define("_BBCLONE_DIR", "bbclone/");
define("COUNTER", _BBCLONE_DIR."mark_page.php");
if (is_readable(COUNTER)) include_once(COUNTER);
?>
</body>
</html>
