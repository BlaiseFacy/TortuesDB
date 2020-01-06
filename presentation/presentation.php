<?php
session_start();

require("../dbConnection.php"); // Page contenant les methodes de connection et les paramétrages sql
require("../util.php");

// Connexion à la base de données
dbConnect();

$tableMaj = getTableMaj();

$queryTableMaj = "SELECT max(date_maj), max(nb_tortues) FROM $tableMaj";
$result = mysql_query($queryTableMaj) or die ('Erreur SQL !'.$queryTableMaj.'<br />'.mysql_error());
$lastMaj = mysql_fetch_row($result);
$lastDatesMaj = $lastMaj[0];
$nbTortues = intval($lastMaj[1]);
mysql_free_result($result);

$dateDerniereMaj = f_dateFR($lastDatesMaj)." à ".f_timeFR($lastDatesMaj);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN">
<html>
<head>
<title>Collection de tortues</title>
<link href="./tortue.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="tortues, tortue, chélonien, chéloniens, collection, collections, collectionneur, collectionneurs">
<meta name="keywords" content="reptile, reptiles, turtle, tortoise">
<meta name="description" content="Présentation d'une collection de tortues de plus de 36000 pièces, de tous matériaux et de toutes formes">
<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
<link href="./css/simple-sidebar.css" rel="stylesheet">
<link href="./css/tortues.css" rel="stylesheet">
<script type="text/javascript" src="./js/jquery.min.js"></script>

<style type="text/css">
<!--

-->
</style>

</head>

<body>
	<div id="wrapper">

		<!-- Sidebar -->
		<div id="sidebar-wrapper">
			<?php include("./menu.php"); ?>
		</div>
		<!-- /#sidebar-wrapper -->

		<div id="hautDePage" style="text-align:center">
			<div id="entete"></div>
			<div id="enteteFlash"><embed width="608" height="98" src="./images/tortuerfys.swf"></div>
			<div id="titre"></div>
			<div class="bouton"><a href="#menu-toggle" id="menu-toggle">MENU</a></div>
		</div>
		
		<!-- Page Content -->
		<div id="page-content-wrapper">
			<div style="padding:20px;">




		
<audio src='./son/The Beatles - Here Comes The Sun.mp3' id='musique' autoplay controls loop><span class='ko'>&lt;audio&gt; non supportée !</span></audio>

<img src="images/t-une.jpg" style="float: left;" border="0" width="40%">
<p align="justify"><b><font color="#ffcc99" face="Times New Roman" size="6">A</font></b><font color="#ffcc99" face="Times New Roman" size="4"> 
la t&ecirc;te d'une collection de tortues de <?php echo $nbTortues ?> pi&egrave;ces, 
je souhaite, par l'interm&eacute;diaire de ce site, lier des contacts 
avec d'autres collectionneurs ou amateurs, dans le but de faire progresser 
notre passion commune.<br>
</font><b><font color="#ffcc99" face="Times New Roman" size="6"><br>
C</font></b><font color="#ffcc99" face="Times New Roman" size="4">haque 
collectionneur a ses raisons particuli&egrave;res d'amasser tel ou tel 
objet, suivant tel ou tel crit&egrave;re, &agrave; partir de telle ou 
telle envie. J'expose, dans les pages qui suivent, ma d&eacute;marche 
personnelle et l'&eacute;tat de ma collection.</font></p>

<p style="text-align: center;" align="center"><b><span style="font-size: 18pt; color: rgb(255, 204, 153);">J</span></b><b><span style="font-size: 13.5pt; color: rgb(255, 204, 153);">'attire
particuli&egrave;rement l'attention sur la rubrique "</span></b><b><span style="font-size: 18pt; color: rgb(255, 204, 153);">Je Cherche</span></b><b><span style="font-size: 13.5pt; color: rgb(255, 204, 153);">"&nbsp; qui dresse<br>

la liste des objets que je ne n'ai pas encore r&eacute;ussi &agrave; trouver, notamment dans
l'Art.</span></b></p>

<hr style="clear:both;" size="4" width="65%">
<p style="text-align: center;" align="center"><b><span style="font-size: 13.5pt; color: fuchsia;">
</span></b><b><span style="font-size: 24pt; color: fuchsia;">L</span></b><b><span style="font-size: 13.5pt; color: fuchsia;">a Rubrique "</span></b><b><span style="font-size: 18pt; color: fuchsia;">La Collection</span></b><b><span style="font-size: 13.5pt; color: fuchsia;">"</span></b></p>
<p style="text-align: center;" align="center"><b><span style="font-size: 13.5pt; color: fuchsia;">met en ligne ma base de donn&eacute;es</span></b></p>

<p style="text-align: center;" align="center"><b><span style="font-size: 13.5pt; color: fuchsia;">avec la possibilit&eacute; de visionner l'ensemble de la collection
(textes et photos)</span></b></p>

<div class="MsoNormal" style="text-align: center;" align="center">
<hr align="center" size="4" width="65%">
</div>
<p class="MsoNormal" style="text-align: center;" align="center"><b><span style="font-size: 13.5pt; color: rgb(255, 204, 153);">B</span><span style="color: rgb(255, 204, 153);">onne
navigation et n'h&eacute;sitez pas &agrave; me contacter.</span></b> </p>
<div class="MsoNormal" style="text-align: center;" align="center">
<hr align="center" size="4" width="65%">
</div>

<p style="text-align: center;" align="center"><span style="color: rgb(255, 204, 153);">&nbsp; </span>
<span style="color: rgb(255, 204, 153);">Site créé en Mai 1999. Dernière mise à jour <?php echo $dateDerniereMaj ?></span></p>

<br><br>
	
		
		
		
			</div>
		</div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	<!-- Menu Toggle Script -->
	<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
	checkVersion("- PRESENTATION -");
	checkSon();
    </script>

</body>

</html>
