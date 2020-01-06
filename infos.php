<?php
session_start();
?>
<?php include("./config.php"); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>

<title>Collection de tortues</title>
<link rel="icon" size="16x16" href="./pics/favicon16.png" type="image/png">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no"><!-- Mise à l'échelle du smartphone pour avoir un ratio confortable -->
<script type="text/javascript" src="./js/jquery-1.11.3.min.js"></script><!-- jquery -->
<script type="text/javascript" src="./js/bootstrap.min.js"></script><!-- bootstrap -->
<script type="text/javascript" src="./js/ion.rangeSlider.min.js"></script><!-- slider ion -->
<script type="text/javascript" src="./js/modernizr.js"></script><!-- Modernizr -->
<script type="text/javascript" src="./js/jquery.menu-aim.js"></script><!-- pour le menu -->	  
<script type="text/javascript" src="./js/jquery.ui.totop.js"></script><!-- UItoTop plugin -->
<script type="text/javascript" src="./js/jquery.easing.js"></script><!-- UItoTop plugin -->
<script type="text/javascript" src="./js/hammer.min.js"></script><!-- gestion tactile -->
<script type="text/javascript" src="./js/jquery.hammer.js"></script><!-- gestion tactile -->
<script type="text/javascript" src="./js/util.js"></script><!-- fonctions utilitaires -->
<link rel="stylesheet" href="./css/bootstrap.min.css"><!-- bootstrap -->
<link rel="stylesheet" href="./css/ion.rangeSlider.css"/><!-- pour le slider ion -->
<link rel="stylesheet" href="./css/ion.rangeSlider.skinHTML5_tortues.css"/><!-- pour le slider ion -->
<link rel="stylesheet" href="./css/simple-sidebar.css"><!-- simple-sidebar -->
<link rel="stylesheet" href="./css/ui.totop.css" media="screen,projection"><!-- UItoTop plugin -->
<link rel="stylesheet" href="./css/font-awesome.min.css"><!-- iconic web fonts -->
<link rel="stylesheet" href="./css/tortues-backgrounds.css"/><!-- backgrounds tortues -->

<script type="text/javascript">
<!--

-->
</script>

<style type="text/css">
<!--

body {
	/*background-image: linear-gradient(#425363,#82C341);*/
	font-size: 1.5em;
}
#wrapper {
	padding: 15px;
	font-size: 1.5em;
	text-align: center;
	background-size: 50px 50px;
}
#wrapper a {
	text-decoration: underline;
}
#conteneur {
}

-->
</style>

</head>

<body>

<div id="conteneur">

	<?php include("./menu.php"); ?>

	<div id="wrapper">	
	
		Cette interface permet de naviguer dans une base de données contenant la collection complète présentée à cette adresse :
		<a href="./presentation/" target="_blank">Présentation de la collection</a>.<br><br>
		Elle est compatible en principe avec tous les navigateurs actuels, si vous rencontrez un bug ou un souci particulier, merci de le signaler.
		Contact :
		<button type="button" class="btn btn-default btn-default" onClick="location.href='mailto:hfacy@laposte.net?subject=collection de tortues'">
			<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
		</button>
		<br><br>
		Bonne visite.
		<br><br>

	</div> <!-- wrapper -->

</div>
	
	<script>
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
			};
			*/
		$().UItoTop({ easingType: 'easeOutQuart' });
		});

	document.getElementById("titrePage").innerHTML = "INFOS";
	</script>

</body>

</html>
