<?php $pagenum="gallery"; require_once "./admin/runtime.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	print checktitle();
?>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<meta http-equiv='Content-Language' content='en_US' />
<meta http-equiv='Content-Script-Type' content='text/javascript' />
<meta http-equiv='Content-Style-Type' content='text/css' />
<meta name='keywords' content='Smart Academy' />
<meta name='description' content="gallery page" />
<meta name='author' content='Deepika K.C.' />
<meta name='generator' content='Smart Academy v.1.0 beta' />
<meta name='Robots' content='index,follow' />
<meta http-equiv='imagetoolbar' content='no' /><!-- disable IE's image toolbar -->
<link rel="alternate" type="application/rss+xml" title="Smart Academy RSS Feed" href="admin/rss.php" />
<link rel="alternate" type="application/atom+xml" title="Smart Academy Atom Feed" href="admin/atom.php" />
<link rel='stylesheet' type='text/css' href='templates/admintemplate/style.css' />
<link rel='stylesheet' type='text/css' href='css/lightneasy.css' />
<?php
	print checkaddons();
?>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++++
	Created by Deepika K.C.
+++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="#">Smart Academy</a></h1>
				<p><a>Center of Excellence</a></p>
			</div>
			<div id="menu">
				<ul><?php print mainmenu(1); ?>
</ul>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content"><?php content("gallery"); ?><div style="clear: both;">&nbsp;</div>
				</div>
				<!-- end #content -->
				<div id="sidebar">
					<ul>
						<li><?php print loginform(); ?>
</li>
						<p></p>
						
					</ul>
				</div>
				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
<div id="footer">
	<p><?php print footer(); ?></p>
</div>
<!-- end #footer -->
</body>
</html>
