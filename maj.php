<?php
session_start();
include("./config.php");
require("./util.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>

<title>Collection de tortues</title>
<link rel="icon" size="16x16" href="./pics/favicon16.png" type="image/png">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no"><!-- Mise à l'échelle du smartphone pour avoir un ratio confortable -->
<meta name="keywords" content="tortues, tortue, chélonien, chéloniens, collection, collections, collectionneur, collectionneurs">
<meta name="keywords" content="reptile, reptiles, turtle, tortoise, recherche, statistiques">
<meta name="description" content="Consultation en ligne d'une collection de tortues de plus de 36000 pièces, de tous matériaux et de toutes formes">
<!-- Attention, l'ordre des imports de librairies javascript est important -->
<script type="text/javascript" src="./js/jquery-1.11.3.min.js"></script><!-- jquery -->
<script type="text/javascript" src="./js/bootstrap.min.js"></script><!-- bootstrap -->
<script type="text/javascript" src="./js/modernizr.js"></script><!-- Modernizr -->
<script type="text/javascript" src="./js/jquery.menu-aim.js"></script><!-- pour le menu -->	  
<script type="text/javascript" src="./js/jquery.ui.totop.js"></script><!-- UItoTop plugin -->
<script type="text/javascript" src="./js/jquery.easing.js"></script><!-- UItoTop plugin -->
<link rel="stylesheet" href="./css/bootstrap.min.css"><!-- bootstrap -->
<link rel="stylesheet" href="./css/simple-sidebar.css"><!-- simple-sidebar -->
<link rel="stylesheet" href="./css/ui.totop.css" media="screen,projection"><!-- UItoTop plugin -->
<link rel="stylesheet" href="./css/tortues-backgrounds.css"/><!-- backgrounds tortues -->

<?php
require("./dbConnection.php"); // Page contenant les methodes de connection et les paramétrages sql
	
// Connexion à la base de données
dbConnect();

$table = getTable();
$tableMaj = getTableMaj();

$queryTableMaj = "SELECT date_maj, nb_tortues FROM $tableMaj order by date_maj ASC";
$queryCountTableMaj = "SELECT count(date_maj) FROM $tableMaj WHERE 1";

$result = mysql_query($queryCountTableMaj) or die ('Erreur SQL !'.$queryCountTableMaj.'<br />'.mysql_error());
$nbDatesMaj = mysql_fetch_row($result);
$nbDatesMaj = $nbDatesMaj[0];
mysql_free_result($result);

$result = mysql_query($queryTableMaj) or die ('Erreur SQL !'.$queryTableMaj.'<br />'.mysql_error());

for($i=0; $i<$nbDatesMaj; $i++) // On boucle
{
	$row = mysql_fetch_row($result);
	// On récupère les infos de chaque élément en base
	$dateMaj[$i] = $row[0];
	$nbTortuesMaj[$i] = $row[1];
	//logDebug(f_dateFR($dateMaj[$i]).":".$nbTortuesMaj[$i]." tortues");
}

mysql_free_result($result);
dbDisconnect();	// Déconnexion de la base de données

?>

<script type="text/javascript">
<!--
-->
</script>

<style type="text/css">
<!--

body {
	/*background-image: linear-gradient(#425363,#82C341);*/
	font-size: 1.5em;
	color: #000;
}
#wrapper {
	padding: 15px;
	font-size: 1.5em;
}
#titre {
	border-top: 1px solid #000;
}
#tableauMaj {
	font-size: 16px;
}

-->
</style>

<script type='text/javascript'>

<!--

var resizeDelay;
// On récupère l'event sur la page parent car la frame perturbe les events sur certains mobiles
parent.onresize = function()
{
	<?php
		if (!isTactile()) echo "
		clearTimeout(resizeDelay);
		resizeDelay = setTimeout('changeBackground();', 200);
		";
	?>
}
// On récupère l'event sur la page parent car la frame perturbe les events sur certains mobiles
parent.window.onorientationchange = function()
{
	clearTimeout(resizeDelay);
	resizeDelay = setTimeout('changeBackground();', 200);
}
-->
</script>

</head>

<body>

<div id="conteneur">

	<?php include("./menu.php"); ?>

	<div id="wrapper">

		<button class="btn btn-default" type="button" id="titreMaj">
			Les <span class="badge" id="nbCouleurs"><?php echo $nbDatesMaj; ?></span> dernières mises à jour
		</button>

		<table class="couleur" id="tableauMaj">
			<tr class="titre" id="titre">
				<td id="td_date">date</td>
				<td id="td_date">heure</td>
				<td id="td_nb">nombre</td>
			</tr>

	<?php
		for($i=0; $i<$nbDatesMaj; $i++)
		{
			$couleur=$i%2==0?'clair':'fonce';
			echo "<tr class='".$couleur."'>";
			echo "<td style='text-align:left'>".f_dateFR($dateMaj[$i])."</td>";
			echo "<td style='text-align:left'>".f_timeFR($dateMaj[$i])."</td>";
			echo "<td style='text-align:center'>".$nbTortuesMaj[$i]."</td>";
			echo "</tr>";
		}
	?>

		</table>
	</div> <!-- wrapper -->
</div>
	<script>
		document.getElementById("titrePage").innerHTML = "ADMIN";
		$("#titreMaj").css("width", $("#tableauMaj").width());
	</script>

</body>

</html>
