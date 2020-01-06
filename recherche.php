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
<script type="text/javascript" src="./js/jquery-1.11.3.min.js"></script><!-- jquery -->
<script type="text/javascript" src="./js/bootstrap.min.js"></script><!-- bootstrap -->
<script type="text/javascript" src="./js/bootbox.min.js"></script><!-- bootstrap dialog boxes -->
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
	
<style type="text/css">
<!--
#page-content-wrapper {
	padding: 0px;
}
#sidebar-wrapper {
	background-image: url(./pics/fondTurtleDarkTexture.jpg);
}
#titleSideBar {
	margin-top: 1px;
	height: 50px;
	background-image: url(./pics/fondNav50_marron.png);
	text-align: center;
	padding-top: 18px;
}
.arrow {
	background: url(./pics/page-arrows.png) no-repeat;
	background-size: 60px 350px;
	position: fixed;
	top: 50%;
	z-index: 100;
	width: 45px;
	height: 100px;
	-webkit-transition-property:width,left,background-position;
	-moz-transition-property:width,left,background-position;
	-o-transition-property:width,left,background-position;
	-ms-transition-property:width,left,background-position;
	transition-property:width,left,background-position;
	-webkit-transition-duration: .15s;
	-moz-transition-duration: .15s;
	-o-transition-duration: .15s;
	-ms-transition-duration: .15s;
	transition-duration: .15s;
	-webkit-user-select: none;
	-moz-user-select: none;
	user-select: none;
	-ms-user-select: none;
	cursor: pointer;
	display: none;
}
.arrow:hover {
	width: 60px;
}
.arrow:active {
	width: 60px;
}
.arrow.arrow-previous {
	left: 0;
	background-position: -15px -250px;
}
#wrapper.toggled .arrow.arrow-previous {
	left: 0;
}
@media(min-width:<?php echo $resolutionBascule; ?>px) {
	.arrow.arrow-previous {
		left: 300;
	}
}
.arrow.arrow-previous:hover {
	background-position: 0 -250px;
}
.arrow.arrow-previous:active {
	background-position: -10px -250px;
}
.arrow.arrow-next {
	right: 0;
	background-position: 0 -72px;
}
.arrow.arrow-next:active {
	background-position: +10px -72px;
}
#pagination-input {
	width: 100%;
}
@media(min-width:<?php echo $resolutionBascule; ?>px) {
	#pagination-input {
		width: 350px;
	}
}
#pagination {
	left: 0;
	/*top: 75px;*/
	/*position: absolute;*/
	/*background: #222;*/
	/*background: transparent;*/
	/*position: fixed;*/
	width: 100%;
	height: 60px;
	padding: 10px 10px 0px 10px;
	margin-top: -13px;
}
#range {
	/*left: 0;*/
	/*top: 105px;*/
	/*position: absolute;*/
	/*position: fixed;*/
	width: 100%;
	padding: 15px 20px 0px 20px;
	border-width: 1px 1px 1px 0px;
	border-style: solid;
	border-color: black;
}
#text_nombre {
	color: #000;
	background: #FFAA22;
	width: 100px;
}
.input-group {
	border-bottom:0px solid transparent;
}
.checkbox {
	margin-top: -5px;
	margin-bottom: 5px;
	color: #CCC;
}
.radio-inline {
	color: #CCC;
}
#info {
	background-color: D9534F;
	text-align: center;
	color: #FFF;
	padding: 10px;
}
#aide {
	text-align: center;
	#color: #000;
	padding: 10px;
	border-color: #000;
	border-width: 1px 0px 1px 0px;
	border-style: solid;
}
#nbrPP {
	color: black;
	background-color: white;
	border: 1px solid black;
	width: 80px;
}
#text_parPage, #menu-toggle, #offset, #detailAffichage {
	color: black;
	border: 1px solid black;
}
#offset {
	width: 70px;
}
#text_parPage {
	width: 100%;
}
#menu-toggle {
	width: 40px;
}
#enTeteTableauNav {
	position: fixed;
	top: 0;
	z-index: 2;
}
.td_photo_hidden {
	width: 5%;
}
.td_numero_hidden {
	width: 6%;
}
.td_categorie_hidden {
	width: 11%;
}
.td_materiaux_hidden {
	width: 11%;
}
.td_forme_hidden {
	width: 11%;
}
.td_observations_hidden {
	width: 18%;
}
.td_annee_hidden {
	width: 5%;
}
.td_timbreLieu_hidden {
	width: 13%;
}
.td_timbreAnnee_hidden {
	width: 5%;
}
.td_couleurs_hidden {
	width: 10%;
}
.td_caracteristiques_hidden {
	width: 60%;
}
.tooltip-inner {
	background-color: #FFAA22;
	opacity: 1;
	color: #000;
	font-size: 14px;
	border-color: #000;
	border-width: 1px;
	border-style: solid;
}
.tooltip.in {
    opacity: 1;
    filter: alpha(opacity=100);
}
.tooltip.bottom .tooltip-arrow {
	border-bottom-color: #FFAA22;
}
.tooltip.top .tooltip-arrow {
	border-top-color: #FFAA22;
}
.tooltip.left .tooltip-arrow {
	border-left-color: #FFAA22;
}	 
.tooltip.right .tooltip-arrow {
	border-right-color: #FFAA22;
}	
#cadrePhoto {
	position: relative;
	margin: 0 auto;
	background-color: transparent;
}
#cadreFiche {
	margin: 0 auto;
	border-width: 1px;
	border-style: solid;
	border-color: black;
	padding: 10px;
}
#photo {
	position: absolute;
	top: 50%;
	left: 50%;
	cursor: pointer;
	-webkit-transform: translate(-50%,-50%);
	transform: translate(-50%,-50%);
	border-width: 0px;
	border-style: solid;
	border-color: black;
}
.rubrique {
	background: #000;
	border-radius: 5px;
	padding: 6px;
}
-->
</style>

<?php

require("./dbConnection.php"); // Page contenant les methodes de connection et les paramétrages sql

$table = getTable();

// Connexion à la base de données
dbConnect();

// Récupération des couleurs de la table couleurs
$tableCouleurs = getTableCouleurs();
$nbCouleursTable = 0;
	
$queryCountTableCouleurs = "SELECT count(*) FROM $tableCouleurs";

$result = mysql_query($queryCountTableCouleurs) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$nbCouleursTable = mysql_fetch_row($result);
$nbCouleursTable = $nbCouleursTable[0];
mysql_free_result($result);

$queryTableCouleurs = "SELECT couleur, code_hexa FROM $tableCouleurs order by couleur ASC";

$result = mysql_query($queryTableCouleurs) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

$couleur_nom_liste = "";
$couleur_code_hexa_liste = "";

echo "\n<script>\n
var couleur_nom_liste = new Array();
var couleur_code_hexa_liste = new Array();
";

for($i=0; $i<$nbCouleursTable; $i++) // On boucle
{
	$row = mysql_fetch_row($result);
	$couleur_nom_liste[$i] = $row[0];
	$couleur_code_hexa_liste[$i] = $row[1];
	$couleur_nom_text = str_replace("\"","\\\"",$couleur_nom_liste[$i]);
	$couleur_nom_text = str_replace("'","\'",$couleur_nom_text);
	echo "couleur_nom_liste[$i] = '".$couleur_nom_text."';";
	$couleur_code_hexa_text = str_replace("\"","\\\"",$couleur_code_hexa_liste[$i]);
	$couleur_code_hexa_text = str_replace("'","\'",$couleur_code_hexa_text);
	echo "couleur_code_hexa_liste[$i] = '".$couleur_code_hexa_text."';";
}
echo "</script>";

mysql_free_result($result);

if ($nbCouleursTable == 0)
{
	$couleur_nom_liste = array('Blanc','Vert','Noir','Marron','Bleu','Jaune','Or','Rouge','Gris','Crème','Orange','Doré','Rose','Violet','Bordeaux','Verdâtre','Brun','Cuivre','Argent','Beige','Chêne','Bronze','Jaunâtre','Ocre','Turquoise','Ivoire','Mauve','Opaque','Saumon','Ambre','Nacre','Palissandre','Transparent','Rouille','Grenat','Blanc','Écru','Multicolore','Roux','Bois','Cognac','Fuchsia','Kaki','Brillant','Cérusé','Moutarde','Paille','Rosâtre','Terre','Anthracite','Argile','Brique','Diamant','Fer','Kraft','Laiton','Lilas','Marine','Opale');
}

// Récupération des categories

$queryCountCategories = "SELECT count(distinct(categorie)) FROM $table WHERE categorie not like '%?%' AND trim(categorie) not like ''";

$result = mysql_query($queryCountCategories) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$nbCategoriesBase = mysql_fetch_row($result);
$nbCategoriesBase = $nbCategoriesBase[0];
mysql_free_result($result);

$queryCategories = "SELECT distinct(categorie) FROM $table WHERE categorie not like '%?%' AND trim(categorie) not like '' order by categorie ASC";

$result = mysql_query($queryCategories) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

$categorie_liste = "";
$categorie_liste_libelle = "";
for($i=0; $i<$nbCategoriesBase; $i++) // On boucle
{
	$row = mysql_fetch_row($result);
	$categorie_liste[$i] = $row[0];
	if ($row[0] == "Animal") $categorie_liste_libelle[$i] = TXT_ANIMAL;
	if ($row[0] == "Métal") $categorie_liste_libelle[$i] = TXT_METAL;
	if ($row[0] == "Minéral") $categorie_liste_libelle[$i] = TXT_MINERAL;
	if ($row[0] == "Synthétique") $categorie_liste_libelle[$i] = TXT_SYNTHETIC;
	if ($row[0] == "Terre") $categorie_liste_libelle[$i] = TXT_EARTH;
	if ($row[0] == "Végétal") $categorie_liste_libelle[$i] = TXT_VEGETAL;
	if ($row[0] == "Verre-Cristal") $categorie_liste_libelle[$i] = TXT_GLASS_CRYSTAL;
}

mysql_free_result($result);

// Récupération des matériaux

$queryCountMateriaux = "
	SELECT count(distinct(materiaux))
	FROM (SELECT distinct (materiaux1) as materiaux FROM $table
		UNION SELECT distinct (materiaux2) as materiaux FROM $table
		UNION SELECT distinct (materiaux3) as materiaux FROM $table
		) table_temp WHERE materiaux not like '%?%' AND trim(materiaux) not like ''";

$result = mysql_query($queryCountMateriaux) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$nbMateriauxBase = mysql_fetch_row($result);
$nbMateriauxBase = $nbMateriauxBase[0];
mysql_free_result($result);

$queryMateriaux = "
	SELECT distinct(materiaux)
	FROM (SELECT distinct (materiaux1) as materiaux FROM $table
		UNION SELECT distinct (materiaux2) as materiaux FROM $table
		UNION SELECT distinct (materiaux3) as materiaux FROM $table
		) table_temp WHERE materiaux not like '%?%' AND trim(materiaux) not like '' order by materiaux ASC";

$result = mysql_query($queryMateriaux) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

$materiaux_liste = "";

for($i=0; $i<$nbMateriauxBase; $i++) // On boucle
{
	$row = mysql_fetch_row($result);
	$materiaux_liste[$i] = $row[0];
	$materiaux_text = str_replace("\"","\\\"",$materiaux_liste[$i]);
	$materiaux_text = str_replace("'","\'",$materiaux_text);
}

mysql_free_result($result);

// Récupération des formes

$queryCountFormes = "SELECT count(distinct(forme)) FROM $table WHERE forme not like '%?%' AND trim(forme) not like ''";

$result = mysql_query($queryCountFormes) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$nbFormesBase = mysql_fetch_row($result);
$nbFormesBase = $nbFormesBase[0];
mysql_free_result($result);

$queryFormes = "SELECT distinct(forme) FROM $table WHERE forme not like '%?%' AND trim(forme) not like '' order by forme ASC";

$result = mysql_query($queryFormes) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

$forme_liste = "";

for($i=0; $i<$nbFormesBase; $i++) // On boucle
{
	$row = mysql_fetch_row($result);
	$forme_liste[$i] = $row[0];
	$forme_text = str_replace("\"","\\\"",$forme_liste[$i]);
	$forme_text = str_replace("'","\'",$forme_text);
}

mysql_free_result($result);

// Récupération des timbre lieux

$queryCountTimbreLieux = "SELECT count(distinct(lieu)) FROM (
							SELECT distinct(tcontinent) as lieu FROM $table
							UNION SELECT distinct(tpays) as lieu FROM $table) table_temp
							WHERE lieu not like '%?%' AND trim(lieu) not like ''";

$result = mysql_query($queryCountTimbreLieux) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
$nbTimbreLieux = mysql_fetch_row($result);
$nbTimbreLieux = $nbTimbreLieux[0];
mysql_free_result($result);

$queryTimbreLieux = "SELECT distinct(lieu) FROM (
						SELECT distinct(tcontinent) as lieu FROM $table
						UNION SELECT distinct(tpays) as lieu FROM $table) table_temp
						WHERE lieu not like '%?%' AND trim(lieu) not like '' order by lieu ASC";

$result = mysql_query($queryTimbreLieux) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

$timbreLieu_liste = "";

for($i=0; $i<$nbTimbreLieux; $i++) // On boucle
{
	$row = mysql_fetch_row($result);
	$timbreLieu_liste[$i] = $row[0];
	$timbreLieu_text = str_replace("\"","\\\"",$timbreLieu_liste[$i]);
	$timbreLieu_text = str_replace("'","\'",$timbreLieu_text);
}

mysql_free_result($result);

dbDisconnect();	// Déconnexion de la base de données

?>

<script language="JavaScript">
<!--

var tableauSignets = new Array(); // Tableau des signets
var resolutionBascule = <?php echo $resolutionBascule; ?> // Résolution limite entre configuration smartphone / desktop

function controlNumberFormat()
{
	if (isNaN(document.getElementById('numero').value))
	{
		bootbox.alert('Vous ne pouvez saisir que des chiffres dans ce champ !');
		document.getElementById('numero').value = "";
	}
	if (isNaN(document.getElementById('annee').value))
	{
		bootbox.alert('Vous ne pouvez saisir que des chiffres dans ce champ !');
		document.getElementById('annee').value = "";
	}
}

function majTextareaCouleur()
{
	var textCouleur = document.getElementById('couleurs');
	var selectCouleurs = document.getElementById('couleursSelect');
	if (selectCouleurs.value!='')
	{
		textCouleur.value = textCouleur.value + ' ' + selectCouleurs.value;
	}
	else textCouleur.value = '';
}

function majTextareaMateriaux()
{
	var textMateriaux = document.getElementById('materiaux');
	var selectMateriaux = document.getElementById('materiauxSelect');
	if (selectMateriaux.value!='')
	{
		textMateriaux.value = textMateriaux.value + ' ' + selectMateriaux.value;
	}
	else textMateriaux.value = '';
}

function majTextareaForme()
{
	var textForme = document.getElementById('forme');
	var selectFormes = document.getElementById('formesSelect');
	if (selectFormes.value!='')
	{
		textForme.value = selectFormes.value;
	}
	else textForme.value = '';
}

function majTextareaTimbreLieu()
{
	var textLieu = document.getElementById('tlieu');
	var selectLieu = document.getElementById('timbreLieuSelect');
	if (selectLieu.value!='')
	{
		textLieu.value = selectLieu.value;
	}
	else textLieu.value = '';
}

function resetSelection()
{
	document.getElementById('numero').value = '';
	document.getElementById('categorie').value = '';
	document.getElementById('materiaux').value = '';
	document.getElementById('forme').value = '';
	document.getElementById('observations').value = '';
	document.getElementById('annee').value = '';
	document.getElementById('tlieu').value = '';
	document.getElementById('tanneeE').value = '';
	document.getElementById('couleurs').value = '';
	document.getElementById('ordre').value = 'numero';
	document.getElementById('sensCroissant').checked = true;
	document.getElementById('sensDecroissant').checked = false;
	document.getElementById('materiauxSelect').value = '';
	document.getElementById('formesSelect').value = '';
	document.getElementById('timbreLieuSelect').value = '';
	document.getElementById('couleursSelect').value = '';
	document.getElementById('materiauxPrincipal').checked = false;
	document.getElementById('couleurExact').checked = false;
	document.getElementById('formeExact').checked = false;
	document.getElementById('tlieuExact').checked = false;
	document.getElementById('filtreSignets').checked = false;
}

function constructQueryParams()
{
	numero = document.getElementById('numero').value;
	categorie = document.getElementById('categorie').value;
	materiaux = document.getElementById('materiaux').value ;
	forme = document.getElementById('forme').value;
	observations = document.getElementById('observations').value;
	annee = document.getElementById('annee').value;
	tlieu = document.getElementById('tlieu').value;
	tanneeE = document.getElementById('tanneeE').value;
	couleurs = document.getElementById('couleurs').value;
	ordre = document.getElementById('ordre').value;
	sens = (document.getElementById('sensCroissant').checked)?'croissant':'decroissant';
	materiauxPrincipal = document.getElementById('materiauxPrincipal').checked;
	couleurExact = document.getElementById('couleurExact').checked;
	formeExact = document.getElementById('formeExact').checked;
	tlieuExact = document.getElementById('tlieuExact').checked;
	filtreSignets = document.getElementById('filtreSignets').checked;

	// queryParams = partie de la requête comportant les paramètres
	queryParams = "";
	if (numero != "")
	{
		queryParams += " AND numero = " + numero; // Sélection unique selon numéro;
	}
	else
	{
		// Sélection multiple selon critères

		function queryMotsMult(critere,valeurs) // Recherche pour chaque mot du champ de recherche
		{
			liste = valeurs.trim().split(" ");
			queryPart = "";
			for(m=0 ; m < liste.length ; m++)
			{
				if (liste[m].trim() != "")
				{
					queryPart += " AND " + critere + " LIKE '%" + liste[m] + "%'";
				}
			}
			return queryPart;
		}
			
		if (categorie != "") queryParams += " AND categorie = '" + categorie + "'";
		
		if (materiaux != "")
		{
			materiaux = materiaux.trim();
			// On double la simple cote pour éviter un bug sql à la requête
			materiaux = materiaux.replace("'","''");
			// On échappe le % pour le prendre en compte dans la requête
			materiaux = materiaux.replace("%","\%");

			if (materiauxPrincipal)
			{
				queryParams += " AND (materiaux1 LIKE '%" + materiaux + "%')";
			}
			else
			{
				liste = materiaux.trim().split(" ");
				for(m=0 ; m < liste.length ; m++)
				{
					if (liste[m].trim() != "")
					{
						queryParams += " AND (materiaux1 LIKE '%" + liste[m] + "%'";
						queryParams += " OR materiaux2 LIKE '%" + liste[m] + "%'";
						queryParams += " OR materiaux3 LIKE '%" + liste[m] + "%')";
					}
				}
			}
		}		
		if (couleurs != "")
		{
			// On double la simple cote pour éviter un bug sql à la requête
			couleurs = couleurs.replace("'","''");
			// On échappe le % pour le prendre en compte dans la requête
			couleurs = couleurs.replace("%","\%");
			
			liste = couleurs.trim().split(" ");
			for(m=0 ; m < liste.length ; m++)
			{
				if (liste[m].trim() != "")
				{
					queryParams += " AND (couleurs LIKE '%" + liste[m] + "%')";
				}
			}
			if (couleurExact)
			{
				for(m=0 ; m < couleur_nom_liste.length ; m++)
				{
					couleur_a_exclure = true;
					for(k=0 ; k < liste.length ; k++)
					{
						//if (removeAccents(couleur_nom_liste[m]).toLowerCase() == removeAccents(liste[k]).toLowerCase()) couleur_a_exclure = false;
						// Attention à ne pas exclure les couleurs contenues dans la couleur recherchée, sinon le résultat sera vide... ex "doré" contient "or"
						if (removeAccents(liste[k]).toLowerCase().indexOf(removeAccents(couleur_nom_liste[m]).toLowerCase()) >= 0 ) couleur_a_exclure = false;
					}
					if (couleur_a_exclure)
					{
						// On double la simple cote pour éviter un bug sql à la requête
						couleurNoLike = couleur_nom_liste[m].replace("'","''");
						// On échappe le % pour le prendre en compte dans la requête
						couleurNoLike = couleurNoLike.replace("%","\%");
						
						queryParams += " AND (couleurs NOT LIKE '%" + couleurNoLike + "%')";
					}
				}
			}
		}		
		if (forme != "")
		{
			forme = forme.trim();
			forme = forme.replace("'","''"); // On double la simple cote pour éviter un bug sql à la requête			
			forme = forme.replace("%","\%"); // On antislashe le % pour le prendre en compte dans la requête
			
			if (formeExact) queryParams += " AND forme LIKE '" + forme + "'";
			else queryParams += queryMotsMult("forme",forme);
		}
		if (observations != "")
		{
			observations = observations.trim();
			observations = observations.replace("'","''"); // On double la simple cote pour éviter un bug sql à la requête
			observations = observations.replace("%","\%"); // On antislashe le % pour le prendre en compte dans la requête		
			
			queryParams += queryMotsMult("observations",observations);
		}
		if (annee != "") queryParams += " AND annee = " + annee;
		
		if (tlieu != "")
		{
			tlieu = tlieu.trim();
			tlieu = tlieu.replace("'","''"); // On double la simple cote pour éviter un bug sql à la requête
			tlieu = tlieu.replace("%","\%"); // On antislashe le % pour le prendre en compte dans la requête		
			
			if (tlieuExact)
			{
				queryParams += " AND (tcontinent LIKE '" + tlieu + "'";
				queryParams += " OR tpays LIKE '" + tlieu + "')";
			}
			else
			{
				liste = tlieu.trim().split(" ");
				for(m=0 ; m < liste.length ; m++)
				{
					if (liste[m].trim() != "")
					{
						queryParams += " AND (tcontinent LIKE '%" + liste[m] + "%'";
						queryParams += " OR tpays LIKE '%" + liste[m] + "%')";
					}
				}
			}
		}		
		if (tanneeE != "") queryParams += " AND tanneeE LIKE '%" + tanneeE + "%'";
	}

	// Signets
	var nbSignets = 0;
    for (var key in tableauSignets) 
    {
        if (tableauSignets.hasOwnProperty(key)) nbSignets++;
    }
	if (filtreSignets && nbSignets > 0)
	{
		queryParams += " AND numero in (";
		var first = true;
		for(var key in tableauSignets)
		{
			if (!first) queryParams += ", ";
			queryParams += key;
			first = false;
		}
		queryParams += ")";
	}
	
	// Fin de la construction de la requête
	if (ordre == "annee_tn") ordre = "tanneeE";
	
	if (ordre == "materiaux") queryParams += " ORDER BY materiaux1";
	else
	{
		if (ordre == "lieu_tn") queryParams += " ORDER BY tcontinent, tpays";
		else queryParams += " ORDER BY " + ordre;
	}
	
	if (sens == "croissant") queryParams += " ASC";
	else queryParams += " DESC";
	if (ordre != "numero") queryParams += ", numero ASC";

	//document.write('<b>' + queryParams + '</b>)');
	return queryParams;
}

//////////////////////// Les fonctions Javascript qui gèrent la navigation ////////////////////

var tab_loading_thumbs = new Array();
var ordre_liste = { 'numero':'<?php echo TXT_NUMBER ?>', 'categorie':'<?php echo TXT_CATEGORY ?>', 'materiaux':'<?php echo TXT_MATERIAL ?>', 'forme':'<?php echo TXT_FORM ?>', 'observations':'<?php echo TXT_COMMENTS ?>', 'annee':'<?php echo TXT_YEAR ?>', 'lieu_tn':'<?php echo TXT_PLACE ?>(numism)', 'annee_tn':'<?php echo TXT_YEAR ?>(numism)' };

var isTactile = <?php if (isTactile()) echo "true"; else echo "false"; ?>;

function determineDimensionsThumbs()
{
	var hauteurMax = 70;
	var largeurMax = 97;
	for (i = 0 ; i < tab_loading_thumbs.length ; i++)
	{
		var thumbPageWeb = document.getElementById('thumb_' + i); // L'objet thumb dans la page web
		var	thumbObjet = new Image(); // L'objet photo original
		thumbObjet.src = thumbPageWeb.src;
		var ratio = thumbObjet.width / thumbObjet.height;
		if (ratio < 1)
		{
			if (hauteurMax * ratio > largeurMax)
			{
				thumbPageWeb.style.width = largeurMax + 'px';
				thumbPageWeb.style.height = Math.round(largeurMax / ratio) + 'px';
			}
			else
			{
				thumbPageWeb.style.height = hauteurMax + 'px';
				thumbPageWeb.style.width = Math.round(hauteurMax * ratio) + 'px';
			}
		}
		else
		{
			if (largeurMax / ratio > hauteurMax)
			{
				thumbPageWeb.style.height = hauteurMax + 'px';
				thumbPageWeb.style.width = Math.round(hauteurMax * ratio) + 'px';
			}
			else
			{
				thumbPageWeb.style.width = largeurMax + 'px';
				thumbPageWeb.style.height = Math.round(largeurMax / ratio) + 'px';
			}
		}
	}
}

function actionSaisieOffset(evt)
{
	if(evt.keyCode == 13) return actionSaisieOffsetGo();
	else return false;
}

function actionSaisieOffsetGo()
{
	var offset = document.getElementById('offset');
	if (isNaN(offset.value) || offset.value < 0)
	{
		offset.value = document.getElementById('rangeInput').value;
		//bootbox.alert('Vous ne pouvez saisir que des chiffres dans ce champ !');
		offset.focus();
		return false;
	}
	if (offset.value < 1)
	{
		//bootbox.alert('Vous n\'avez pas entré le numéro à afficher !');
		offset.value = document.getElementById('rangeInput').value;
		offset.focus();
		return false;
	}
	if (offset.value > nbrTotal)
	{
		offset.value = nbrTotal;
		bootbox.alert('Le dernier item de la selection est ' + nbrTotal + ' !');
		offset.focus();
		return false;
	}
	//if (document.getElementById('rangeInput').value != offset.value) submitNavigFicheDetail();
	if (document.getElementById('rangeInput').value != offset.value)
	{
		var slider = $("#rangeInput").data("ionRangeSlider");
		// Call sliders update method with any params
		slider.update({
			from: offset.value
		});
		submitRequeteAjax('affiche');
	}
}

function goNavig(key)
{
	var modeFicheDetail = $('#modeFicheDetail').val();
	if (modeFicheDetail == 'true') nbrPP = 1;
	else nbrPP = document.getElementById('nbrPP').value;
	var nbrTotal = document.getElementById('nbrTotal').value;
	if (key == 'recherche')
	{
		$("#search-button").find('span').attr('class', 'fa fa-spinner fa-spin');
		document.getElementById('offset').value = 1;
		var slider = $("#rangeInput").data("ionRangeSlider");
		slider.update({
			from: 1,
		});
		submitRequeteAjax(key);
		return;
	}
	if (nbrTotal == 0)
	{
		//alert('Aucune tortue n\'est encore sélectionnée !');
		return;
	}
	if (key == 'affiche')
	{
		submitRequeteAjax(key);
		return;
	}
	offset = parseInt(document.getElementById('offset').value);
	newOffset = offset;
	if (key == 'debut') newOffset = 1;
	if (key == 'fin') newOffset = nbrTotal - parseInt(nbrPP) + 1;
	if (key == 'prev') newOffset = offset - parseInt(nbrPP);
	if (key == 'next') newOffset = offset + parseInt(nbrPP);
	
	if (newOffset == offset)
	{
		if (offset == 1)
		{
			//if (key == 'fin') bootbox.alert('Vous êtes déjà sur la dernière page !');
			//else bootbox.alert('Vous êtes déjà sur la première page !');
		}
		else bootbox.alert('Vous êtes déjà sur la dernière page !');
		return;
	}
	if (newOffset < 1 && offset == 1)
	{
		bootbox.alert('Vous êtes déjà sur la première page !');
		return;
	}
	if (newOffset > nbrTotal)
	{
		bootbox.alert('Vous êtes déjà sur la dernière page !');
		return;
	}
	document.getElementById('offset').value = (newOffset < 1)? 1 : newOffset;
	var slider = $("#rangeInput").data("ionRangeSlider");
	slider.update({
		from: newOffset,
	});
	submitRequeteAjax(key);	
}

function miseEnPage()
{
	organiseMenu();
	if ($('#modeFicheDetail').val() == 'true')
	{
		var largeurMaxPhoto = 700;
		var hauteurMaxPhoto = 500;
		var largeurPage = document.getElementById('page-content-wrapper').offsetWidth;
		var hauteurPage = document.getElementById('page-content-wrapper').offsetHeight;
		if (largeurPage < largeurMaxPhoto)
		{
			largeurMaxPhoto = largeurPage;
			hauteurMaxPhoto = Math.round(largeurMaxPhoto * 5 / 7);
		}
		//if (hauteurPage < hauteurMaxPhoto) hauteurMaxPhoto = hauteurPage;
		var largeurCadrePhoto = largeurMaxPhoto;
		var hauteurCadrePhoto = hauteurMaxPhoto;
		document.getElementById('cadrePhoto').style.width = largeurCadrePhoto;
		document.getElementById('cadrePhoto').style.height = hauteurCadrePhoto;
		document.getElementById('cadreFiche').style.width = largeurCadrePhoto;
		var	photoPageWeb = document.getElementById('photo'); // L'objet photo dans la page web
		var	photoObjet = new Image(); // L'objet photo original
		photoObjet.src = photoPageWeb.src;
		//alert('largeur:' + photoObjet.width + ',hauteur:' + photoObjet.height);
		if (photoObjet.width < largeurMaxPhoto) largeurMaxPhoto = photoObjet.width;
		if (photoObjet.height < hauteurMaxPhoto) hauteurMaxPhoto = photoObjet.height;
		//alert('largeurMax:' + largeurMaxPhoto + ',hauteurMax:' + hauteurMaxPhoto);
		var ratio = photoObjet.width / photoObjet.height;
		if (ratio < 1)
		{
			if (hauteurMaxPhoto * ratio > largeurMaxPhoto)
			{
				photoPageWeb.style.width = largeurMaxPhoto + 'px';
				photoPageWeb.style.height = Math.round(largeurMaxPhoto / ratio) + 'px';
			}
			else
			{
				photoPageWeb.style.height = hauteurMaxPhoto + 'px';
				photoPageWeb.style.width = Math.round(hauteurMaxPhoto * ratio) + 'px';
			}
		}
		else
		{
			if (largeurMaxPhoto / ratio > hauteurMaxPhoto)
			{
				photoPageWeb.style.height = hauteurMaxPhoto + 'px';
				photoPageWeb.style.width = Math.round(hauteurMaxPhoto * ratio) + 'px';
			}
			else
			{
				photoPageWeb.style.width = largeurMaxPhoto + 'px';
				photoPageWeb.style.height = Math.round(largeurMaxPhoto / ratio) + 'px';
			}
		}
	}
	else
	{
		var nbrTotal = document.getElementById('nbrTotal').value;
		var nbLignes = document.getElementById('tableauTortues').getElementsByTagName('tr').length - 2;
		var listeSeparateursCouleurs = document.getElementsByClassName('separateur_couleurs');
		if (nbLignes > 0)
		{
			if (innerWidth > resolutionBascule)
			{
				if (document.getElementById('page-content-wrapper').offsetWidth < 1400)
				{
					for (i=0 ; i<listeSeparateursCouleurs.length ; i++)
					{
						listeSeparateursCouleurs[i].style.display = '';
					}
				}
				else
				{
					for (i=0 ; i<listeSeparateursCouleurs.length ; i++)
					{
						listeSeparateursCouleurs[i].style.display = 'none';
					}
				}
				if (document.getElementById('page-content-wrapper').offsetWidth < 1200)
				{
					for (i=0 ; i<nbLignes ; i++)
					{
						document.getElementById('text_couleurs_' + i).style.display = 'none';
						if (document.getElementById('text_observations_court_' + i))
						{
							document.getElementById('text_observations_court_' + i).style.display = '';
							document.getElementById('text_observations_' + i).style.display = 'none';
						}
					}
				}
				else
				{
					for (i=0 ; i<nbLignes ; i++)
					{
						document.getElementById('text_couleurs_' + i).style.display = '';
						if (document.getElementById('text_observations_court_' + i))
						{
							document.getElementById('text_observations_court_' + i).style.display = 'none';
							document.getElementById('text_observations_' + i).style.display = '';
						}
					}
				}
			}
			if (innerWidth < 375) $('#text_parPage').html('/<?php echo TXT_FROM ?>');
			else $('#text_parPage').html('<?php echo TXT_PER." ".TXT_PAGE." ".TXT_FROM ?>');
			document.getElementById('td_photo_nav').style.width = document.getElementById('td_photo_titre').offsetWidth;
			document.getElementById('td_numero_nav').style.width = document.getElementById('td_numero_titre').offsetWidth;
			document.getElementById('td_categorie_nav').style.width = document.getElementById('td_categorie_titre').offsetWidth;
			document.getElementById('td_materiaux_nav').style.width = document.getElementById('td_materiaux_titre').offsetWidth;
			document.getElementById('td_forme_nav').style.width = document.getElementById('td_forme_titre').offsetWidth;
			document.getElementById('td_observations_nav').style.width = document.getElementById('td_observations_titre').offsetWidth;
			document.getElementById('td_annee_nav').style.width = document.getElementById('td_annee_titre').offsetWidth;
			document.getElementById('td_timbreLieu_nav').style.width = document.getElementById('td_timbreLieu_titre').offsetWidth;
			document.getElementById('td_timbreAnnee_nav').style.width = document.getElementById('td_timbreAnnee_titre').offsetWidth;
			document.getElementById('td_couleurs_nav').style.width = document.getElementById('td_couleurs_titre').offsetWidth;
			setTimeout('positionneEnTeteTableauNav();', 200);
		}
	}
}

function positionneEnTeteTableauNav()
{
	$("#enTeteTableauNav").css({
		'left': $('#page-content-wrapper').offset().left - $(window).scrollLeft()
	});
}

function afficheAide()
{
	if (innerWidth < resolutionBascule)
	{
		document.getElementById('aide').style.display = '';
		$('html, body').animate( { scrollTop: $('#aide').offset().top }, 750 );
		document.getElementById('tableauTortues').style.display = 'none';
		document.getElementById('ficheDetail').style.display = 'none';
		document.getElementById('range').style.display = 'none';
		document.getElementById('pagination').style.display = 'none';
		document.getElementById('info').style.display = 'none';
		
	}
	else
	{
		document.getElementById('tableauTortues').style.display = 'none';
		document.getElementById('ficheDetail').style.display = 'none';
		document.getElementById('range').style.display = 'none';
		document.getElementById('pagination').style.display = 'none';
		document.getElementById('info').style.display = 'none';
		document.getElementById('aide').style.display = '';
	}
}

function organiseMenu()
{
	if (innerWidth < resolutionBascule)
	{
		$("#navbar-bootstrap").prependTo('#wrapper');
		$("#titleSideBar").hide();
		$("#bouton-recherche-bis").show();
	}
	else
	{
		$("#navbar-bootstrap").prependTo('#page-content-wrapper');
		$("#titleSideBar").show();
		$("#bouton-recherche-bis").hide();
		if ($("#sidebar-wrapper").width() == 0) $("#wrapper").toggleClass("toggled");
	}
}

function changeSignet(numero)
{
	//if (isTactile) line.className=(line.className==couleur)?'jauneIntense':couleur;
	//else line.className=(line.className=='blancMos')?'jauneIntenseMos':'blancMos';
	submitGestionSignetsAjax('update', numero);
}

function checkSignets()
{
	var modeFicheDetail = $('#modeFicheDetail').val();
	if (modeFicheDetail == 'true')
	{
		numero = $('#photo').attr('numero');
		submitGestionSignetsAjax('read', numero);
	}
	else submitGestionSignetsAjax('read', 'all');
}

var detail = false;
var detailEnable = true;

function activationDetail(actif)
{
	detailEnable = actif;
}

function changeDetail()
{
	detail=(detail?false:true);
	afficheDetail();
}

function afficheDetail()
{
	if (detail)
	{
		$('#span_detail').attr('class', 'glyphicon glyphicon-minus');
		$("[ligneDetail='non']").attr('ligneDetail', 'oui');
		$("[detail='oui']").show();
		$("[detail='non']").hide();
	}
	else
	{
		$('#span_detail').attr('class', 'glyphicon glyphicon-plus');
		$("[ligneDetail='oui']").attr('ligneDetail', 'non');
		$("[detail='oui']").hide();
		$("[detail='non']").show();
	}
}

function afficheDetailLigne(id)
{
	if (detailEnable)
	{
		// ligne = document.getElementById('tr_tortue_' + id);
		// $('#td_thumb_' + id).find('div').show();
		// $('#td_caracteristiques_' + id).find('div').show();
		//$("[detail='oui']").show();
		//$("[detail='non']").hide();
		var listeDiv = $('#tr_tortue_' + id).find('div');
		if ($('#tr_tortue_' + id).attr('ligneDetail') == 'non')
		{
			$('#tr_tortue_' + id).attr('ligneDetail', 'oui');
			listeDiv.each(function( index ) {
				if ($(this).attr('detail') == 'oui') $(this).show();
				if ($(this).attr('detail') == 'non') $(this).hide();
			});
		}
		else
		{
			$('#tr_tortue_' + id).attr('ligneDetail', 'non');
			listeDiv.each(function( index ) {
			if ($(this).attr('detail') == 'oui') $(this).hide();
			if ($(this).attr('detail') == 'non') $(this).show();
		});
		}
	}
}

function setmodeFicheDetail(offset)
{
	$('#modeFicheDetail').val('true');
	$('#offset').val(offset);
	var slider = $("#rangeInput").data("ionRangeSlider");
	slider.update({
		from: offset
	});
	$('#ficheDetail').show();
	$('#tableauTortues').hide();
	submitRequeteAjax('recherche');
}

function unsetmodeFicheDetail()
{
	$('#modeFicheDetail').val('false');
	$('#ficheDetail').hide();
	$('#tableauTortues').show();
	submitRequeteAjax('recherche');
}

function onMouseOutLine(line,couleur)
{
	line.className = couleur;
}

function onMouseOverLine(line)
{
	line.className = 'blancMos';
}

//////////////////////// FIN fonctions Javascript qui gèrent la navigation ////////////////////

var resizeDelay;

onresize = function()
{
	clearTimeout(resizeDelay);
	checkBackground();
	resizeDelay = setTimeout('miseEnPage();', 200);
	
}

window.onorientationchange = function()
{
	checkBackground();
	miseEnPage();
}

-->
</script>

</head>

<body>

	<div id="wrapper">

	<?php include("./menu.php"); ?>
	
		<!-- Sidebar -->
		<div id="sidebar-wrapper">
			<div id="titleSideBar">
				<span class="label" style="color:#000;font-size:16px;"><?php echo TXT_SEARCH_FILTERS ?></span>
			</div>
			<div style="padding:10px;">
				<h3 style="margin-top: 0px;">
					<button type="button" class="btn btn-danger btn-default" onClick="resetSelection();">
						<span class="glyphicon glyphicon-erase" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-success btn-default" id="search-button" onClick="goNavig('recherche');">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					</button>
					<span class="label label-warning" id="text_nombre"><?php echo str_pad(0,5,"0",STR_PAD_LEFT) ?></span>
					<button type="button" class="btn btn-primary btn-default" id="help-button" onClick="afficheAide();">
						<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
					</button>
				</h3>
				<input id="queryParams" type="hidden" value="">
				<input id="nbrTotal" type="hidden" value="0">
				<br>
				<div class="rubrique">
					<div class="input-group" style="border-top:3px solid transparent;border-bottom:10px solid transparent">
						<span class="input-group-addon primary" style="width:90px;" data-toggle="tooltip" data-placement="bottom" title="Numéro d'identification unique de chaque tortue. Chaque tortue de la collection a un numéro attribué par ordre d'acquisition. Si la checkbox est cochée, la recherche filtrera les tortues marquées d'un signet (en jaune vif)."><?php echo TXT_NUMBER ?></span>
						<input id="numero" type="text" class="form-control" style="width:90px;" maxlength="5" placeholder="?" aria-describedby="basic-addon1" onBlur="controlNumberFormat();">
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" value="" id="filtreSignets" unchecked><?php echo TXT_FILTER_BOOKMARKS ?>
						</label>
					</div>
				</div>
				<br>
				<div class="rubrique">
					<div class="input-group" style="width:100%;border-bottom:10px solid transparent">
						<span class="input-group-addon primary" style="width:90px;"><?php echo TXT_CATEGORY ?></span>
						<select id="categorie" class="form-control">
							<option value="" selected><?php echo TXT_ALL_FEMALE ?></option>
							<?php
								for ($i=0 ; $i<count($categorie_liste) ; $i++)
								{
									echo "<option value=\"".$categorie_liste[$i]."\">".$categorie_liste_libelle[$i]."</option>";
								}
							?>
						</select>
					</div>
				</div>
				<br>
				<div class="rubrique">
					<div class="input-group" style="width:100%;">
						<span class="input-group-addon primary" style="width:90px;" data-toggle="tooltip" data-placement="top" title="Vous pouvez rechercher plusieurs materiaux à la fois en les écrivant ou en vous aidant de la liste déroulante. Si la checkbox est cochée, la recherche portera exclusivement sur le materiau principal."><?php echo TXT_MATERIAL ?></span>
						<select id="materiauxSelect" class="form-control" onChange="majTextareaMateriaux();">
							<option value="" selected><?php echo TXT_ALL_MALE ?></option>
							<?php
							for ($i=0 ; $i<count($materiaux_liste) ; $i++)
							{
								echo "<option value=\"".$materiaux_liste[$i]."\">".$materiaux_liste[$i]."</option>";
							}
							?>
						</select>
					</div>
					<textarea id="materiaux" class="form-control" placeholder="<?php echo TXT_MATERIAL ?> ?" rows="2" style="height:54px"></textarea>
					<div class="checkbox" style="border-top:10px solid transparent">
						<label>
							<input type="checkbox" value="" id="materiauxPrincipal" unchecked><?php echo TXT_MAIN_MATERIAL ?></span>
						</label>
					</div>
				</div>
				<br>
				<div class="rubrique">
					<div class="input-group" style="width:100%;">
						<span class="input-group-addon primary" style="width:90px;" data-toggle="tooltip" data-placement="top" title="Entrez ici un type d'objet et non pas une forme géométrique. Ex : brosse, porte clef, boite, coupe papier... Vous pouvez écrire la forme ou la choisir dans la liste déroulante. Si la checkbox est cochée, le terme exact sera recherché."><?php echo TXT_FORM ?></span>
						<select id="formesSelect" class="form-control" onChange="majTextareaForme();">
							<option value="" selected><?php echo TXT_ALL_FEMALE ?></option>
							<?php
							for ($i=0 ; $i<count($forme_liste) ; $i++)
							{
								echo "<option value=\"".$forme_liste[$i]."\">".$forme_liste[$i]."</option>";
							}
							?>
						</select>
					</div>
					<textarea id="forme" class="form-control" placeholder="<?php echo TXT_FORM ?> ?" rows="2" style="height:54px"></textarea>
					<div class="checkbox" style="border-top:10px solid transparent">
						<label>
							<input type="checkbox" value="" id="formeExact" unchecked><?php echo TXT_EXACT_FORM ?>
						</label>
					</div>
				</div>
				<br>
				<div class="rubrique">
					<div class="input-group" style="width:100%;border-bottom:10px solid transparent">
						<span class="input-group-addon primary" data-toggle="tooltip" data-placement="top" title="Ce champ comporte des renseignements divers sur les tortues. Vous pouvez faire des recherches assez variées, avec possibilité de jumeler avec les critères des autres rubriques."><span style=font-size:1.5em;" class="glyphicon glyphicon-eye-open"></span></span>
						<textarea id="observations" class="form-control" placeholder="<?php echo TXT_COMMENTS ?> ?" rows="2" style="height:54px;"></textarea>
					</div>
				</div>
				<br>
				<div class="rubrique">
					<div class="input-group" style="border-bottom:10px solid transparent">
						<span class="input-group-addon primary" style="width:90px;" data-toggle="tooltip" data-placement="top" title="Année d'acquisition de la tortue."><?php echo TXT_YEAR ?></span>
						<input id="annee" class="form-control" style="width:90px;" maxlength="4" placeholder="<?php echo TXT_YEAR ?> ?" onBlur="controlNumberFormat();">
					</div>
				</div>
				<br>
				<div class="rubrique">
					<span class="input-group-addon primary"><?php echo TXT_NUMISMAT ?></span>
					<div class="input-group" style="width:100%;border-bottom:0px;">
						<span class="input-group-addon primary" style="width:90px;" data-toggle="tooltip" data-placement="top" title="Lieu d'émission pour les objets du type : TIMBRE, BILLET, MONNAIE."><?php echo TXT_PLACE ?>&nbsp;<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
						<select id="timbreLieuSelect" class="form-control" onChange="majTextareaTimbreLieu();">
							<option value="" selected><?php echo TXT_ALL_MALE ?></option>
							<?php
							for ($i=0 ; $i<count($timbreLieu_liste) ; $i++)
							{
								echo "<option value=\"".$timbreLieu_liste[$i]."\">".$timbreLieu_liste[$i]."</option>";
							}
							?>
						</select>
					</div>
					<textarea id="tlieu" class="form-control" placeholder="<?php echo TXT_PLACE_OF_ISSUE ?> ?" rows="2" style="height:54px"></textarea>
					<div class="checkbox" style="display:none;">
						<label>
							<input type="checkbox" value="" id="tlieuExact" unchecked><?php echo TXT_EXACT_PLACE ?>
						</label>
					</div>
					<div class="input-group" style="width:100%;">
						<span class="input-group-addon primary" style="width:90px;" data-toggle="tooltip" data-placement="bottom" title="Année d'émission pour les objets du type : TIMBRE, BILLET, MONNAIE."><?php echo TXT_YEAR ?>&nbsp;<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
						<input id="tanneeE" class="form-control" placeholder="<?php echo TXT_YEAR_OF_ISSUE ?> ?">
					</div>
				</div>
				<br>
				<div class="rubrique">
					<div class="input-group" style="width:100%;border-top:10px solid transparent">
						<span class="input-group-addon primary" style="width:90px;" data-toggle="tooltip" data-placement="top" title="Vous pouvez rechercher plusieurs couleurs à la fois en les écrivant directement ou en vous aidant de la liste déroulante. Si la checkbox est cochée, la recherche sera exclusive."><?php echo TXT_COLOR ?></span>
						<select id="couleursSelect" class="form-control" onChange="majTextareaCouleur();">
							<option value="" selected><?php echo TXT_ALL_FEMALE ?></option>
							<?php
							for ($i=0 ; $i<count($couleur_nom_liste) ; $i++)
							{
								echo "<option value=\"".$couleur_nom_liste[$i]."\">".$couleur_nom_liste[$i]."</option>";
							}
							?>
						</select>
					</div>
					<textarea id="couleurs" class="form-control" placeholder="<?php echo TXT_COLOR ?> ?" rows="2" style="height:54px"></textarea>
					<div class="checkbox" style="border-top:10px solid transparent">
						<label>
							<input type="checkbox" value="" id="couleurExact" unchecked><?php echo TXT_EXACT_COLOR ?>
						</label>
					</div>
				</div>
				<br>
				<div class="rubrique">
					<div class="input-group" style="width:100%;">
						<span class="input-group-addon primary" style="width:90px;"><?php echo TXT_SORT_BY ?></span>
						<select id="ordre" class="form-control">
							<script>
								for(var key in ordre_liste)
								{
									document.write('<option value=\"' + key + '\" ');
									if (key == 'numero') document.write('selected');
									document.write('>' + ordre_liste[key] + '</option>');
								}
							</script>
						</select>
					</div>
					<div style="margin-top:0px">
						<label class="radio-inline"><input type="radio" name="sens" id="sensCroissant" checked><?php echo TXT_ASCENDING ?></label>
						<label class="radio-inline"><input type="radio" name="sens" id="sensDecroissant"><?php echo TXT_DESCENDING ?></label>
					</div>
				</div>
				<h3 style="margin-top: 10px;" id="bouton-recherche-bis">
					<button type="button" class="btn btn-danger btn-default" onClick="resetSelection();">
						<span class="glyphicon glyphicon-erase" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-success btn-default" id="search-button-bis" onClick="goNavig('recherche');">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-primary btn-default" id="help-button-bis" onClick="afficheAide();">
						<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
					</button>
					<br><br>
				</h3>
			</div>
		</div>
		<!-- /#sidebar-wrapper -->

		<!-- arrows -->
		<div class="arrow arrow-previous" onClick="doubleclick(this, function(){goNavig('prev');}, function(){goNavig('debut');});"></div>
		<div class="arrow arrow-next" onClick="doubleclick(this, function(){goNavig('next');}, function(){goNavig('fin');});"></div>
		<!-- /#arrows -->
		
		<!-- Page Content -->
		<div id="page-content-wrapper">

			<div id="enTeteTableauNav">
				<table id="tableauTortuesTitreNav" class="couleur" width="100%">

					<?php
					/////////////////////////////////////// Copie cachée du tableau pour avoir un alignement parfait
					$tdHidden = "style='opacity:0;-moz-opacity:0;height:0px;padding:0px 1px;border-width:0px 1px;'";
					$tdHiddenSpec = "style='opacity:0;-moz-opacity:0;height:0px;padding:0px 0px;border-width:0px 1px;'";
					$divHidden = "style='text-align:center;height:0px;border-width:0px 1px;'";
					$inputHidden = "height:0px;padding-top:0px;padding-bottom:0px;";
					/////////////////////////////////////////////////////////////////////////////////////
					?>
					<tr class='fonce' valign='top' id='titreHiddenDesktop_nav'>
						<td class='td_photo_hidden' <?php echo $tdHidden ?>>
							<div <?php echo $divHidden ?>>
								<input type='text' style='width:98px;<?php echo $inputHidden ?>'>
							</div>
						</td>
						<td class='td_numero_hidden' <?php echo $tdHidden ?>>
							<div <?php echo $divHidden ?>>
								<input type='text' style='width:55px;<?php echo $inputHidden ?>'>
							</div>
						</td>
						<td class='td_categorie_hidden' <?php echo $tdHidden ?>>
							<div <?php echo $divHidden ?>>
								<input type='text' style='width:100px;<?php echo $inputHidden ?>'>
							</div>
						</td>
						<td class='td_materiaux_hidden' <?php echo $tdHidden ?>>
							<div <?php echo $divHidden ?>>
								<input type='text' style='width:116px;<?php echo $inputHidden ?>'>
							</div>
						</td>
						<td class='td_forme_hidden' <?php echo $tdHidden ?>>
							<div <?php echo $divHidden ?>>
								<input type='text' style='width:116px;<?php echo $inputHidden ?>'>
							</div>
						</td>
						<td class='td_observations_hidden' <?php echo $tdHidden ?>>
							<div <?php echo $divHidden ?>>
								<input type='text' style='width:121px;<?php echo $inputHidden ?>'>
							</div>
						</td>
						<td class='td_annee_hidden' <?php echo $tdHidden ?>>
							<div <?php echo $divHidden ?>>
								<input type='text' style='width:55px;<?php echo $inputHidden ?>'>
							</div>
						</td>
						<td class='td_timbreLieu_hidden' <?php echo $tdHiddenSpec ?>>
							<div <?php echo $divHidden ?>>
								<input type='text' style='width:116px;<?php echo $inputHidden ?>'>
							</div>
						</td>
						<td class='td_timbreAnnee_hidden' <?php echo $tdHiddenSpec ?>>
							<div <?php echo $divHidden ?>>
								<input type='text' style='width:75px;<?php echo $inputHidden ?>'>
							</div>
						</td>
						<td class='td_couleurs_hidden' <?php echo $tdHidden ?>>
							<div <?php echo $divHidden ?>>
								<input type='text' style='width:116px;<?php echo $inputHidden ?>'>
							</div>
						</td>
					</tr>
					<tr class="titre" id="titre_nav">
						<td id="td_photo_nav"><?php echo TXT_PHOTO ?></td>
						<td id="td_numero_nav">n°</td>
						<td id="td_categorie_nav"><?php echo TXT_CATEGORY ?></td>
						<td id="td_materiaux_nav"><?php echo TXT_MATERIAL ?></td>
						<td id="td_forme_nav"><?php echo TXT_FORM ?></td>
						<td id="td_observations_nav"><?php echo TXT_COMMENTS ?></td>
						<td id="td_annee_nav"><?php echo TXT_YEAR ?></td>
						<td id="td_timbreLieu_nav"><?php echo TXT_PLACE ?>&nbsp;<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></td>
						<td id="td_timbreAnnee_nav"><?php echo TXT_YEAR ?>&nbsp;<span class="glyphicon glyphicon-envelope" aria-hidden="true"></td>
						<td id="td_couleurs_nav"><?php echo TXT_COLOR ?></td>
					</tr>
				</table>
			</div>

			<div id="aide">
				<h4 style="line-height: 1.3;text-align:left;">
					Saisissez vos critères de sélection et cliquez sur le bouton
					<button type="button" class="btn btn-success btn-default" onClick="goNavig('recherche');">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					</button>
					<br>
					Le résultat de la recherche s'affichera ici-même.
					Si vous voulez acceder à une navigation complète dans la base de données, il suffit de lancer une
					requête à vide (ne renseignez aucun critère).
					<br>
					Le bouton
					<button type="button" class="btn btn-danger btn-default">
						<span class="glyphicon glyphicon-erase" aria-hidden="true"></span>
					</button>
					sert à remettre à vide tous les champs de recherche.
					<br><br>

					Par défaut, toutes les recherches par matériaux, forme, lieu et couleurs se font
					de manière souple.
					<br>
					Dès qu'un des mots saisis pour ces critères est retrouvé pour une tortue donnée, 
					cette dernière est sélectionnée.
					<br>
					Exemple : si on tape "brosse" pour le critère de forme, on va sélectionner les tortues 
					en forme de "brosse" mais aussi de "brosse à ongle", de "brosse WC", etc...
					<br><br>
					Il est possible de cocher une checkbox
					<input type="checkbox" checked>
					pour certains critères : numéro, matériaux, forme, lieu et couleur.
					<br>
					Pour les numéros, la recherche filtrera les tortues marquées d'un signet (avec les étoiles de couleur jaune vif).
					<br>
					Pour forme et lieu, la sélection ne retiendra que les tortues pour lesquelles le critère correspond exactement
					aux mots saisis.
					Exemple : si on tape "brosse" pour le critère de forme, on va sélectionner uniquement les tortues 
					en forme de "brosse" tout court.
					<br>
					Pour matériaux, la recherche portera uniquement sur le matériaux principal.
					<br>
					Pour couleurs, la recherche filtrera les éléments comportant uniquement les couleurs précisées en excluant toutes les autres.
				</h4>
				<br><br>
			</div>

			<div id="pagination" class="transparent">
				<h4 style="color:white">
					<div class="input-group" id="pagination-input">
						<a href="#menu-toggle" class="input-group-addon" id="menu-toggle">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</a>
						<select class="form-control" id="nbrPP" onChange="goNavig('affiche');">
							<option value='1'>1</option>
							<option value='2'>2</option>
							<option value='3'>3</option>
							<option value='4'>4</option>
							<option value='5'>5</option>
							<option value='6'>6</option>
							<option value='7'>7</option>
							<option value='8'>8</option>
							<option value='9'>9</option>
							<option value='10'>10</option>
							<option value='20'>20</option>
							<option value='30' selected>30</option>
							<option value='40'>40</option>
							<option value='50'>50</option>
							<option value='60'>60</option>
							<option value='70'>70</option>
							<option value='80'>80</option>
							<option value='90'>90</option>
							<option value='100'>100</option>
							<option value='200'>200</option>
							<option value='300'>300</option>
							<option value='400'>400</option>
							<option value='500'>500</option>
						</select>
						<span class="input-group-addon primary" id="text_parPage"><?php echo TXT_PER." ".TXT_PAGE ?></span>
						<input id="offset" type="text" class="form-control" maxlength="5" value="0" onKeyUp="actionSaisieOffset(event);" onBlur="actionSaisieOffsetGo();">
						<span class="input-group-addon" id="detailAffichage" onClick="changeDetail();">
							<span class="glyphicon glyphicon-plus" aria-hidden="true" id="span_detail"></span>
						</span>
					</div>
					<input id='nbrTotal' type='hidden' value='0'>
					<input id='modeFicheDetail' type='hidden' value='false'>
				</h4>
			</div>
			<div id="range" class="argent">
				<input type='text' id='rangeInput' value=''>
				<script>
					$("#rangeInput").ionRangeSlider({
						type: 'single',
						hide_min_max: false,
						min: 1,
						max: 0,
						from: 0,
						step: 1,
						prefix: '',
						grid: true,
						keyboard: false,
						keyboard_step: 5,
						onStart: function (data) {
						},
						onChange: function (data) {
							document.getElementById('offset').value = data.from;
						},
						onFinish: function (data) {
							document.getElementById('offset').value = data.from;
							goNavig('affiche');
						},
						onUpdate: function (data) {
							//console.log("onUpdate");
						}
					});
				</script>
			</div>
			<div id="info">
			</div>
			<table id="tableauTortues" class="couleur" width="100%">

				<?php
				/////////////////////////////////////// Copie cachée du tableau de selection/navigation pour avoir un alignement parfait
				$tdHidden = "style='opacity:0;-moz-opacity:0;height:0px;padding:0px 1px;border-width:0px 1px;'";
				$tdHiddenSpec = "style='opacity:0;-moz-opacity:0;height:0px;padding:0px 0px;border-width:0px 1px;'";
				$divHidden = "style='text-align:center;height:0px;border-width:0px 1px;'";
				$inputHidden = "height:0px;padding-top:0px;padding-bottom:0px;";
				?>
				
				<tr class='fonce' valign='top' id='titreHiddenDesktop'>
					<td class='td_photo_hidden' <?php echo $tdHidden ?>>
						<div <?php echo $divHidden ?>>
							<input type='text' style='width:98px;<?php echo $inputHidden ?>'>
						</div>
					</td>
					<td class='td_numero_hidden' <?php echo $tdHidden ?>>
						<div <?php echo $divHidden ?>>
							<input type='text' style='width:55px;<?php echo $inputHidden ?>'>
						</div>
					</td>
					<td class='td_categorie_hidden' <?php echo $tdHidden ?>>
						<div <?php echo $divHidden ?>>
							<input type='text' style='width:100px;<?php echo $inputHidden ?>'>
						</div>
					</td>
					<td class='td_materiaux_hidden' <?php echo $tdHidden ?>>
						<div <?php echo $divHidden ?>>
							<input type='text' style='width:116px;<?php echo $inputHidden ?>'>
						</div>
					</td>
					<td class='td_forme_hidden' <?php echo $tdHidden ?>>
						<div <?php echo $divHidden ?>>
							<input type='text' style='width:116px;<?php echo $inputHidden ?>'>
						</div>
					</td>
					<td class='td_observations_hidden' <?php echo $tdHidden ?>>
						<div <?php echo $divHidden ?>>
							<input type='text' style='width:121px;<?php echo $inputHidden ?>'>
						</div>
					</td>
					<td class='td_annee_hidden' <?php echo $tdHidden ?>>
						<div <?php echo $divHidden ?>>
							<input type='text' style='width:55px;<?php echo $inputHidden ?>'>
						</div>
					</td>
					<td class='td_timbreLieu_hidden' <?php echo $tdHiddenSpec ?>>
						<div <?php echo $divHidden ?>>
							<input type='text' style='width:116px;<?php echo $inputHidden ?>'>
						</div>
					</td>
					<td class='td_timbreAnnee_hidden' <?php echo $tdHiddenSpec ?>>
						<div <?php echo $divHidden ?>>
							<input type='text' style='width:75px;<?php echo $inputHidden ?>'>
						</div>
					</td>
					<td class='td_couleurs_hidden' <?php echo $tdHidden ?>>
						<div <?php echo $divHidden ?>>
							<input type='text' style='width:116px;<?php echo $inputHidden ?>'>
						</div>
					</td>
				</tr>
				
				<?php
				/////////////////////////////////////////////////////////////////////////////////////
				?>

				<tr class="titre" id="titreDesktop">
					<td id="td_photo_titre"><?php echo TXT_PHOTO ?></td>
					<td id="td_numero_titre">n°</td>
					<td id="td_categorie_titre"><?php echo TXT_CATEGORY ?></td>
					<td id="td_materiaux_titre"><?php echo TXT_MATERIAL ?></td>
					<td id="td_forme_titre"><?php echo TXT_FORM ?></td>
					<td id="td_observations_titre"><?php echo TXT_COMMENTS ?></td>
					<td id="td_annee_titre"><?php echo TXT_YEAR ?></td>
					<td id="td_timbreLieu_titre"><?php echo TXT_PLACE ?>&nbsp;<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></td>
					<td id="td_timbreAnnee_titre"><?php echo TXT_YEAR ?>&nbsp;<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></td>
					<td id="td_couleurs_titre"><?php echo TXT_COLOR ?></td>
				</tr>
			</table>

			<div id="ficheDetail">
				<div id="cadrePhoto">
					<img id="photo" onClick="unsetmodeFicheDetail();">
				</div>
				<div id="cadreFiche" class="argent">
					<div style="float:right;width:40px;text-align:center;">
						<span id="fiche_signet" class="glyphicon glyphicon-star-empty"></span>
					</div>
					<div>
						<div id="fiche_numero" style="font-weight:bold;"></div>
						<div id="fiche_categorie"></div>
						<div id="fiche_annee"></div>
						<div id="fiche_materiaux"></div>
						<div id="fiche_forme"></div>
						<div id="fiche_observations"></div>
						<div id="fiche_timbreLieu"></div>
						<div id="fiche_timbreAnnee"></div>
						<div id="fiche_timbrePrix"></div>
						<div id="fiche_dimensions"></div>
						<div id="fiche_poids"></div>
						<div id="fiche_couleurs"></div>
					</div>
				</div>
				<input type="hidden" id="cheminPhoto">
			</div>
		</div>
		<div id="spacer" style="height:70px;"></div>
		
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script type='text/javascript'>
	<!--

	var checkLoadingPhotoStepLimite = 5;
	var checkLoadingPhotoStep = 0;

	function startCheckLoadingPhoto()
	{
		checkLoadingPhotoStep = 0;
		checkLoadingPhoto();
	}

	function checkLoadingPhoto()
	{
		var cheminPhoto = document.getElementById('cheminPhoto').value;
		var imageConteneur = new Image();
		imageConteneur.src = cheminPhoto;
		if (document.getElementById('photo').src.indexOf('Loading') == -1)
		{
			document.getElementById('photo').src = './pics/tortueLoading700.gif';
			miseEnPage();
			//setTimeout('miseEnPage();', 200);
		}
		if (imageConteneur.complete)
		{
			document.getElementById('photo').src = cheminPhoto;
			miseEnPage();
		}
		else
		{
			checkLoadingPhotoStep++;
			if (checkLoadingPhotoStep == checkLoadingPhotoStepLimite)
			{
				document.getElementById('cheminPhoto').value = './pics/photoInconnue.png';
			}
			setTimeout('checkLoadingPhoto()', 500);
		}	
	}
	
	function startCheckLoadingThumbs()
	{
		checkLoadingThumbsStep = 0;
		checkLoadingThumbs();
	}

	var checkLoadingThumbsStepLimite = 5;
	var checkLoadingThumbsStep = 0;
	function checkLoadingThumbs()
	{
		var loading_complete = true;
		for (i = 0 ; i < tab_loading_thumbs.length ; i++)
		{
			// Pour effectuer le chargement des images et tester s'il est correct, il faut instancier de nouveaux objets image localement dans la fonction de chargement
			var imageConteneur = new Image(); // image physique créé localement qui va pouvoir se charger réellement
			imageConteneur.src = tab_loading_thumbs[i];
			if (!imageConteneur.complete)
			{
				loading_complete = false;
				if (document.getElementById('thumb_' + i).src.indexOf('Loading') == -1)
				{
					document.getElementById('thumb_' + i).src = './pics/tortueLoading.gif';
					document.getElementById('thumb_' + i).style.width='97px';
					document.getElementById('thumb_' + i).style.height='70px'
				}
				if (checkLoadingThumbsStep == checkLoadingThumbsStepLimite)
				{
					document.getElementById('thumb_' + i).src = './pics/thumbInconnue.png';
					tab_loading_thumbs[i] = './pics/thumbInconnue.png';
				}
			}
			else document.getElementById('thumb_' + i).src = tab_loading_thumbs[i];
		}
		if (!loading_complete)
		{
			checkLoadingThumbsStep++;
			setTimeout('checkLoadingThumbs()', 500);
		}
		else determineDimensionsThumbs();
	}

	function submitRequeteAjax(key)
	{

		offset = $('#offset').val();
		if ($('#offset').val() == 0) $('#offset').val(1);
		var modeFicheDetail = $('#modeFicheDetail').val();
		if (modeFicheDetail == 'true') nbrPP = 1;
		else nbrPP = $('#nbrPP').val();
		$('#queryParams').val(constructQueryParams());
		//alert($('#queryParams').val());
		
		$.ajax({

		url : 'requeteAjax.php',

		type : 'POST', // Le type de la requête HTTP

		data : 'queryParams=' + encodeURIComponent($('#queryParams').val()) + '&offset=' + $('#offset').val() + '&nbrPP=' + nbrPP,

		dataType : 'html',
		
		success : function(code_html, statut) {
		
		//alert(code_html);
		
		$("#search-button").find('span').attr('class', 'glyphicon glyphicon-search');
		
		var tableauResultat = JSON.parse(code_html)['listeTortues'];

		var nbrTotal = document.getElementById('nbrTotal').value;
		var new_nbrTotal = JSON.parse(code_html)['nbrTotal'];
		if (nbrTotal != new_nbrTotal)
		{
			document.getElementById('nbrTotal').value = new_nbrTotal;
			document.getElementById('text_nombre').innerHTML = padLeft(new_nbrTotal,5,0);
			var slider = $("#rangeInput").data("ionRangeSlider");
			slider.update({
				min: 1,
				max: new_nbrTotal,
				from: 1,
			});
		}
		
		var isTactile = <?php if (isTactile()) echo "true"; else echo "false"; ?>;
		
		if (key == 'recherche') document.getElementById('aide').style.display = 'none';

		if (tableauResultat.length == 0)
		{
			document.getElementById('info').innerHTML = "<h2>Aucune tortue trouvée</h2>";
			//document.getElementById('info').style.height = innerHeight;
			document.getElementById('info').style.display = '';
			document.getElementById('tableauTortues').style.display = 'none';
			document.getElementById('range').style.display = 'none';
			document.getElementById('pagination').style.display = 'none';
			document.getElementById('ficheDetail').style.display = 'none';
			$('.arrow').hide();
			if (innerWidth < resolutionBascule)
			{
				//document.getElementById('spacer').style.height = innerHeight - document.getElementById('info').offsetHeight;
				$('html, body').animate( { scrollTop: $('#info').offset().top - parseInt($('#info').css('margin-top')) }, 750 );
			}
		}
		else
		{
			if (!isTactile) $('.arrow').show();
			if (modeFicheDetail == 'true')
			{
				/* fiche detaillée */

				document.getElementById('info').style.display = 'none';
				document.getElementById('range').style.display = '';
				document.getElementById('pagination').style.display = '';
				document.getElementById('ficheDetail').style.display = '';
				document.getElementById('tableauTortues').style.display = 'none';		
				if (innerWidth > resolutionBascule)
				{
					$('#cadrePhoto').css('margin-top', '5px');
					$('#cadrePhoto').css('margin-bottom', '5px');
					//$('#photo').css('border-radius', '10px 10px 10px 10px');
					$('#photo').css('border-width: 0px');
					$('#cadreFiche').css('border-radius', '00px 0px 10px 10px');
				}
				document.getElementById('photo').src = './photos/' + tableauResultat[0]['cheminPhoto'];
				document.getElementById('cheminPhoto').value = './photos/' + tableauResultat[0]['cheminPhoto'];
				$('#photo').attr('numero',tableauResultat[0]['numero']); // Pour récupérérer le numéro facilement dans le DOM
				var text_numero = '<?php echo TXT_TURTLE ?> n° ' + padLeft(tableauResultat[0]['numero'],5,0);
				var text_prix = '';
				<?php if (isset($_SESSION["accesPrix"]) && $_SESSION["accesPrix"] == "oui") echo "text_prix = '(' + parseInt(tableauResultat[0]['prix']) + '€)';"; ?>
				$('#fiche_numero').html(text_numero + ' ' + text_prix);
				$('#fiche_categorie').html('<b><?php echo TXT_CATEGORY ?> : </b>' + tableauResultat[0]['categorie']);
				$('#fiche_annee').html('<b><?php echo TXT_YEAR ?> : </b>' + tableauResultat[0]['annee']);
				var text_materiaux = '';
				if (tableauResultat[0]['materiaux1'] != '') text_materiaux += tableauResultat[0]['materiaux1'];
				if (tableauResultat[0]['materiaux2'] != '') text_materiaux += ', ' + tableauResultat[0]['materiaux2'];
				if (tableauResultat[0]['materiaux3'] != '') text_materiaux += ', ' + tableauResultat[0]['materiaux3'];
				$('#fiche_materiaux').html('<b><?php echo TXT_MATERIAL ?> : </b>' + text_materiaux);
				var text_forme = tableauResultat[0]['forme'];
				if (text_forme == '') text_forme = 'SANS';
				$('#fiche_forme').html('<b><?php echo TXT_FORM ?> : </b>' + text_forme);
				$('#fiche_observations').html('<b><?php echo TXT_COMMENTS ?> : </b>' + tableauResultat[0]['observations']);
				$('#fiche_timbreLieu').html("");
				$('#fiche_timbreAnnee').html("");
				$('#fiche_timbrePrix').html("");
				var text_timbreLieu = '';
				if (tableauResultat[0]['tcontinent'] != '') text_timbreLieu += tableauResultat[0]['tcontinent'];
				if (tableauResultat[0]['tpays'] != '')
				{
					if (tableauResultat[0]['tcontinent'] != '') text_timbreLieu += ', ';
					text_timbreLieu += tableauResultat[0]['tpays'];
				}
				if (text_timbreLieu != '') $('#fiche_timbreLieu').html("<b><?php echo TXT_PLACE_OF_ISSUE ?> : </b>" + text_timbreLieu);
				var text_timbreAnnee = tableauResultat[0]['tanneeE'];
				if (text_timbreAnnee != '') $('#fiche_timbreAnnee').html("<b><?php echo TXT_YEAR_OF_ISSUE ?> : </b>" + text_timbreAnnee);
				var text_timbrePrix = '';
				<?php if (isset($_SESSION["accesPrix"]) && $_SESSION["accesPrix"] == "oui") echo "text_timbrePrix = tableauResultat[0]['tprix'];"; ?>
				if (text_timbrePrix != '') $('#fiche_timbrePrix').html('<b><?php echo TXT_PRICE ?> <?php echo TXT_NUMISMATIC ?> : </b>' + text_timbrePrix);
				$('#fiche_dimensions').html('<b><?php echo TXT_DIMENSIONS ?> (L x l x h) : </b>' + tableauResultat[0]['longueur'] + ' x ' + tableauResultat[0]['largeur'] + ' x ' + tableauResultat[0]['hauteur'] + ' cm');
				$('#fiche_poids').html('<b><?php echo TXT_WEIGHT ?> : </b>' + tableauResultat[0]['poids'] + ' g');
				var text_couleurs = '';
				if (tableauResultat[0]['couleurs'] != '')
				{
					text_couleurs += '<span id=\'text_couleurs_' + 0 + '\'>' + tableauResultat[0]['couleurs'] + '<br></span>';
					text_couleurs += '<div style=\'height:4px\'></div>';
					liste = tableauResultat[0]['couleurs'];
					liste = liste.replace(',,',',');
					liste = liste.replace('?','');
					liste = liste.replace('(','');
					liste = liste.replace(')','');
					liste = liste.replace('&','');
					liste = liste.replace('couleurs',''); // n'est pas une couleur
					liste = liste.replace('couleur',''); // n'est pas une couleur
					liste = liste.replace('crame',''); // n'est pas une couleur
					liste = liste.replace('dominante',''); // n'est pas une couleur
					liste = liste.replace('macrame',''); // n'est pas une couleur
					liste = liste.replace('naturel',''); // n'est pas une couleur
					liste = liste.replace('non',''); // n'est pas une couleur
					liste = liste.replace('variable',''); // n'est pas une couleur
					liste = liste.replace('toutes',''); // n'est pas une couleur
					liste = liste.trim();
					couleurResultat = '';
					liste = liste.split(',');
					for(j=0; j<liste.length; j++)
					{
						couleurRenseigne = liste[j].trim();
						if (couleurRenseigne.trim() != '' && couleurRenseigne.length > 2 || couleurRenseigne == 'or')
						{
							for (k=0 ; k<couleur_nom_liste.length ; k++)
							{
								if (removeAccents(couleurRenseigne).toLowerCase() == removeAccents(couleur_nom_liste[k]).toLowerCase()) couleurResultat = '#' + couleur_code_hexa_liste[k];
							}
						}						
						text_couleurs += '<span style=\'border:2px #000 solid;margin:2px;';
						if (removeAccents(couleurRenseigne).toLowerCase() == 'brillant') text_couleurs += 'background-image:url(./pics/brillant.png);\'>';
						else if (removeAccents(couleurRenseigne).toLowerCase() == 'multicolore') text_couleurs += 'background-image:url(./pics/multicolore.png);\'>';
						else text_couleurs += 'background-color:' + couleurResultat + '\'>';
						text_couleurs += '&nbsp;&nbsp;</span>';
						if (j>0 && j%14 == 0)
						{
							text_couleurs += '<div class=\'separateur_couleurs\' style=\'height:8px\'><br></div>';
						}
					}
				}
				text_couleurs += '<div class=\'separateur_couleurs\' style=\'height:8px\'><br></div>';
				$('#fiche_couleurs').html('<b><?php echo TXT_COLOR ?> : </b>' + text_couleurs);
				$('#fiche_signet').attr('onClick', 'changeSignet(' + tableauResultat[0]['numero'] + ');');
				startCheckLoadingPhoto();
				checkSignets();
				if (key == 'recherche' && innerWidth < resolutionBascule) $('html, body').animate( { scrollTop: $('#pagination').offset().top - parseInt($('#pagination').css('margin-top')) }, 750 );
			}
			else
			{
				/* liste de tortues */

				// On enlève tous les éléments de l'affichage de la requête précédente

				var nbLignes = document.getElementById('tableauTortues').getElementsByTagName('tr').length - 2;
				for (i=0 ; i<nbLignes ; i++)
				{
					ligne = document.getElementById('tr_tortue_' + i);
					ligne.parentNode.removeChild(ligne);
				}
				/*
				var listeTortues = document.getElementById('listeTortues');
				while( listeTortues.firstChild) {
					listeTortues.removeChild( listeTortues.firstChild);
				}
				*/

				tab_loading_thumbs.length = 0;
				document.getElementById('info').style.display = 'none';
				document.getElementById('range').style.display = '';
				document.getElementById('pagination').style.display = '';
				document.getElementById('tableauTortues').style.display = '';
				if (!isTactile) document.getElementById('titre_nav').style.display = '';
				
				// On génère les lignes du tableau pour afficher le tableau de l'affichage de la requête
				
				if (innerWidth < resolutionBascule)
				{

					/* version smartphone */

					document.getElementById('titre_nav').style.display = 'none';
					document.getElementById('titreDesktop').style.display = 'none';
					document.getElementById('titreDesktop').style.display = 'none';
					document.getElementById('titreHiddenDesktop').style.display = 'none';
					document.getElementById('titreHiddenDesktop_nav').style.display = 'none';
					document.getElementById('detailAffichage').style.display = '';
					for (i=0 ; i<tableauResultat.length ; i++)
					{
						var cheminThumb = './thumbs/' + tableauResultat[i]['cheminPhoto'];
						tab_loading_thumbs.push(cheminThumb);
						couleur=i%2==0?'clair':'fonce';
						
						var ligne = document.createElement('tr');
						ligne.setAttribute('id','tr_tortue_' + i);
						ligne.setAttribute('numero',tableauResultat[i]['numero']); // Pour récupérérer le numéro facilement dans le DOM
						ligne.setAttribute('class', couleur);
						ligne.setAttribute('valign', 'top');
						ligne.setAttribute('ligneDetail', 'non');
						if (isTactile)
						{
							ligne.setAttribute('onClick', 'afficheDetailLigne(\'' + i + '\')');
						}
						else
						{
							ligne.setAttribute('onClick', 'afficheDetailLigne(\'' + i + '\')');
							ligne.setAttribute('onMouseOver', 'onMouseOverLine(this)');
							ligne.setAttribute('onMouseOut', 'onMouseOutLine(this,\'' + couleur + '\')');
						}
						var td_thumb = document.createElement('td');
						td_thumb.setAttribute('id','td_thumb_' + i);
						td_thumb.setAttribute('align', 'center');
						td_thumb.setAttribute('style','width:5%;font-weight:bold;');

						var thumb = document.createElement('img');
						thumb.setAttribute('id','thumb_' + i);
						thumb.setAttribute('border', '1');
						thumb.setAttribute('src', cheminThumb);
						thumb.setAttribute('width', '97px');
						thumb.setAttribute('height', '68px');
						thumb.setAttribute('style', 'border-style:solid; border-width:1px; border-color:#000;cursor:pointer;');
						thumb.setAttribute('onMouseOver', 'activationDetail(false);');
						thumb.setAttribute('onMouseOut', 'activationDetail(true);');
						//thumb.setAttribute('onClick', 'doubleclick(this, function(){newFicheDetail(\'\',\'ficheDetail\',' + (parseInt(offset) + i) + ');}, function(){return(false)})');
						thumb.setAttribute('onClick', 'setmodeFicheDetail(' + (parseInt(offset) + i) + ');');
						//thumb.setAttribute('onTouchEnd', 'setmodeFicheDetail(' + (parseInt(offset) + i) + ');');
						
						var div_numero_thumb = document.createElement('div');
						div_numero_thumb.setAttribute('detail','oui');
						div_numero_thumb.setAttribute('style', 'display:none;');
						var text_numero = 'N° ' + padLeft(tableauResultat[i]['numero'],5,0);
						div_numero_thumb.innerHTML = text_numero;
						var div_prix_thumb = document.createElement('div');
						div_prix_thumb.setAttribute('detail','oui');
						div_prix_thumb.setAttribute('style', 'display:none;');
						var text_prix = '';
						<?php if (isset($_SESSION["accesPrix"]) && $_SESSION["accesPrix"] == "oui") echo "text_prix += '".TXT_PRICE." : ' + parseInt(tableauResultat[i]['prix']) + '€';"; ?>
						div_prix_thumb.innerHTML = text_prix;
						var div_annee_thumb = document.createElement('div');
						div_annee_thumb.setAttribute('detail','oui');
						div_annee_thumb.setAttribute('style', 'display:none;');
						var text_annee = tableauResultat[i]['annee'];
						div_annee_thumb.innerHTML = '<?php echo TXT_YEAR ?> : ' + text_annee;
						
						td_thumb.appendChild(thumb);
						td_thumb.appendChild(div_numero_thumb);
						td_thumb.appendChild(div_prix_thumb);
						td_thumb.appendChild(div_annee_thumb);
						
						ligne.appendChild(td_thumb);
						
						var td_caracteristiques = document.createElement('td');
						td_caracteristiques.setAttribute('id','td_caracteristiques_' + i);
						td_caracteristiques.setAttribute('style','width:95%;font-weight:bold;position:relative;');

						var div_numero = document.createElement('div');
						div_numero.setAttribute('detail','non');
						div_numero.innerHTML = text_numero;
						var div_prix = document.createElement('div');
						div_prix.setAttribute('detail','non');
						div_prix.innerHTML = text_prix;
						
						var div_categorie = document.createElement('div');
						var text_categorie = '<?php echo TXT_CATEGORY ?> : ' + tableauResultat[i]['categorie'];
						div_categorie.innerHTML = text_categorie;
						
						var div_annee = document.createElement('div');
						div_annee.setAttribute('detail','non');
						div_annee.innerHTML = '<?php echo TXT_YEAR ?> : ' + text_annee;
						
						var div_materiaux = document.createElement('div');
						div_materiaux.setAttribute('detail','oui');
						var text_materiaux = '<?php echo TXT_MATERIAL ?> : ';
						if (tableauResultat[i]['materiaux1'] != '') text_materiaux += tableauResultat[i]['materiaux1'];
						if (tableauResultat[i]['materiaux2'] != '') text_materiaux += ', ' + tableauResultat[i]['materiaux2'];
						if (tableauResultat[i]['materiaux3'] != '') text_materiaux += ', ' + tableauResultat[i]['materiaux3'];
						div_materiaux.innerHTML = text_materiaux;
						div_materiaux.setAttribute('style', 'display:none;');
						
						var div_forme = document.createElement('div');
						div_forme.setAttribute('detail','oui');
						var text_forme = tableauResultat[i]['forme'];
						if (text_forme == '') text_forme = 'SANS';
						div_forme.innerHTML = '<?php echo TXT_FORM ?> : ' + text_forme;
						div_forme.setAttribute('style', 'display:none;');

						var div_observations = document.createElement('div');
						div_observations.setAttribute('detail','oui');
						var text_observations = tableauResultat[i]['observations'];
						div_observations.innerHTML = 'Observations : ' + text_observations;
						div_observations.setAttribute('style', 'display:none;');

						var div_timbreLieu = document.createElement('div');
						div_timbreLieu.setAttribute('detail','oui');
						var text_timbreLieu = '';
						if (tableauResultat[i]['tcontinent'] != '') text_timbreLieu += tableauResultat[i]['tcontinent'];
						if (tableauResultat[i]['tpays'] != '')
						{
							if (tableauResultat[i]['tcontinent'] != '') text_timbreLieu += ', ';
							text_timbreLieu += tableauResultat[i]['tpays'];
						}
						if (text_timbreLieu != '') div_timbreLieu.innerHTML = 'Lieu d\'émission : ' + text_timbreLieu;
						div_timbreLieu.setAttribute('style', 'display:none;');
						
						var div_timbreAnnee = document.createElement('div');
						div_timbreAnnee.setAttribute('detail','oui');
						var text_timbreAnnee = tableauResultat[i]['tanneeE'];
						if (text_timbreAnnee != '') div_timbreAnnee.innerHTML = 'Année d\'émission : ' + text_timbreAnnee;
						div_timbreAnnee.setAttribute('style', 'display:none;');
						
						var div_couleurs = document.createElement('div');
						var text_couleurs = '';
						if (tableauResultat[i]['couleurs'] != '')
						{
							text_couleurs += '<span id=\'text_couleurs_' + i + '\'><b>' + tableauResultat[i]['couleurs'] + '</b><br></span>';
							text_couleurs += '<div style=\'height:4px\'></div>';
							liste = tableauResultat[i]['couleurs'];
							liste = liste.replace(',,',',');
							liste = liste.replace('?','');
							liste = liste.replace('(','');
							liste = liste.replace(')','');
							liste = liste.replace('&','');
							liste = liste.replace('couleurs',''); // n'est pas une couleur
							liste = liste.replace('couleur',''); // n'est pas une couleur
							liste = liste.replace('crame',''); // n'est pas une couleur
							liste = liste.replace('dominante',''); // n'est pas une couleur
							liste = liste.replace('macrame',''); // n'est pas une couleur
							liste = liste.replace('naturel',''); // n'est pas une couleur
							liste = liste.replace('non',''); // n'est pas une couleur
							liste = liste.replace('variable',''); // n'est pas une couleur
							liste = liste.replace('toutes',''); // n'est pas une couleur
							liste = liste.trim();
							liste = liste.split(',');
							for(j=0; j<liste.length; j++)
							{
								couleurResultat = '';
								couleurRenseigne = liste[j].trim();
								if (couleurRenseigne.trim() != '' && couleurRenseigne.length > 2 || couleurRenseigne == 'or')
								{
									for (k=0 ; k<couleur_nom_liste.length ; k++)
									{
										if (removeAccents(couleurRenseigne).toLowerCase() == removeAccents(couleur_nom_liste[k]).toLowerCase()) couleurResultat = '#' + couleur_code_hexa_liste[k];
									}
								}
								
								
								text_couleurs += '<span style=\'border:2px #000 solid;margin:2px;';
								if (removeAccents(couleurRenseigne).toLowerCase() == 'brillant') text_couleurs += 'background-image:url(./pics/brillant.png);\'>';
								else if (removeAccents(couleurRenseigne).toLowerCase() == 'multicolore') text_couleurs += 'background-image:url(./pics/multicolore.png);\'>';
								else text_couleurs += 'background-color:' + couleurResultat + '\'>';
								text_couleurs += '&nbsp;&nbsp;</span>';
								if (j>0 && j%14 == 0)
								{
									text_couleurs += '<div class=\'separateur_couleurs\' style=\'height:8px\'><br></div>';
								}
							}
						}
						text_couleurs += '<div class=\'separateur_couleurs\' style=\'height:8px\'><br></div>';
						div_couleurs.innerHTML = '<?php echo TXT_COLOR ?> : ' + text_couleurs ;
						div_couleurs.setAttribute('detail','oui');
						div_couleurs.setAttribute('style', 'display:none;');
						
						var div_gauche = document.createElement('div');
						var div_droite = document.createElement('div');
						//div_gauche.setAttribute('style', 'float:left;');
						div_droite.setAttribute('style', 'float:right;width:40px;text-align:center;');
						
						var span_signet = document.createElement('span');
						span_signet.setAttribute('class', 'glyphicon glyphicon-star-empty');
						span_signet.setAttribute('style', 'font-size:3.0em;color:black;cursor:pointer;');
						span_signet.setAttribute('id','signet_' + tableauResultat[i]['numero']);
						span_signet.setAttribute('onMouseOver', 'activationDetail(false);');
						span_signet.setAttribute('onMouseOut', 'activationDetail(true);');
						span_signet.setAttribute('onClick', 'changeSignet(' + tableauResultat[i]['numero'] + ');');
						
						div_droite.appendChild(span_signet);
						
						div_gauche.appendChild(div_numero);
						div_gauche.appendChild(div_prix);
						div_gauche.appendChild(div_categorie);
						div_gauche.appendChild(div_materiaux);
						div_gauche.appendChild(div_forme);
						div_gauche.appendChild(div_observations);
						div_gauche.appendChild(div_annee);
						div_gauche.appendChild(div_timbreLieu);
						div_gauche.appendChild(div_timbreAnnee);
						div_gauche.appendChild(div_couleurs);
						td_caracteristiques.appendChild(div_droite);
						td_caracteristiques.appendChild(div_gauche);
						ligne.appendChild(td_caracteristiques);
						document.getElementById('tableauTortues').appendChild(ligne);
					}
					document.getElementById('spacer').style.height = (innerHeight - document.getElementById('tableauTortues').offsetHeight) + 10;
					//if (key == 'recherche' || key == 'affiche')
					$('html, body').animate( { scrollTop: $('#pagination').offset().top - parseInt($('#pagination').css('margin-top')) }, 750 );
				}
				else
				{
					/* version tablette et PC */
					
					document.getElementById('titre_nav').style.display = '';
					document.getElementById('titreDesktop').style.display = '';
					document.getElementById('titreHiddenDesktop').style.display = '';
					document.getElementById('titreHiddenDesktop_nav').style.display = '';
					document.getElementById('detailAffichage').style.display = 'none';
					for (i=0 ; i<tableauResultat.length ; i++)
					{
						var cheminThumb = './thumbs/' + tableauResultat[i]['cheminPhoto'];
						tab_loading_thumbs.push(cheminThumb);
						couleur=i%2==0?'clair':'fonce';
						
						var ligne = document.createElement('tr');
						ligne.setAttribute('id','tr_tortue_' + i);
						ligne.setAttribute('numero',tableauResultat[i]['numero']); // Pour récupérérer le numéro facilement dans le DOM
						ligne.setAttribute('class', couleur);
						ligne.setAttribute('valign', 'top');
						if (!isTactile)
						{
							ligne.setAttribute('onMouseOver', 'onMouseOverLine(this)');
							ligne.setAttribute('onMouseOut', 'onMouseOutLine(this,\'' + couleur + '\')');
						}
						var td_thumb = document.createElement('td');
						td_thumb.setAttribute('id','td_thumb_' + i);
						td_thumb.setAttribute('align', 'center');

						var thumb = document.createElement('img');
						thumb.setAttribute('id','thumb_' + i);
						thumb.setAttribute('border', '1');
						thumb.setAttribute('src', cheminThumb);
						thumb.setAttribute('width', '97px');
						thumb.setAttribute('height', '68px');
						thumb.setAttribute('style', 'border-style:solid; border-width:1px; border-color:#000;cursor:pointer;');
						thumb.setAttribute('onMouseOver', 'activationDetail(false);');
						thumb.setAttribute('onMouseOut', 'activationDetail(true);');
						//thumb.setAttribute('onClick', 'doubleclick(this, function(){newFicheDetail(\'\',\'ficheDetail\',' + (parseInt(offset) + i) + ');}, function(){return(false)})');
						thumb.setAttribute('onClick', 'setmodeFicheDetail(' + (parseInt(offset) + i) + ');');
						//thumb.setAttribute('onTouchEnd', 'setmodeFicheDetail(' + (parseInt(offset) + i) + ');');

						td_thumb.appendChild(thumb);
						
						ligne.appendChild(td_thumb);
						
						var td_numero = document.createElement('td');
						td_numero.setAttribute('id','td_numero_' + i);
						td_numero.setAttribute('style','font-weight:bold;text-align:center;');
						var text_numero = padLeft(tableauResultat[i]['numero'],5,0);
						<?php if (isset($_SESSION["accesPrix"]) && $_SESSION["accesPrix"] == "oui") echo "text_numero += '<br>' + parseInt(tableauResultat[i]['prix']) + '€';"; ?>
						td_numero.innerHTML = text_numero;
						
						var spacer = document.createElement('div');
						spacer.setAttribute('style', 'height:2px;');
						var span_signet = document.createElement('span');
						span_signet.setAttribute('class', 'glyphicon glyphicon-star-empty');
						span_signet.setAttribute('style', 'font-size:3.0em;color:black;cursor:pointer;');
						span_signet.setAttribute('aria-hidden', 'true');
						span_signet.setAttribute('id','signet_' + tableauResultat[i]['numero']);
						span_signet.setAttribute('onMouseOver', 'activationDetail(false);');
						span_signet.setAttribute('onMouseOut', 'activationDetail(true);');
						span_signet.setAttribute('onClick', 'changeSignet(' + tableauResultat[i]['numero'] + ');');
						
						td_numero.appendChild(spacer);
						td_numero.appendChild(span_signet);
						
						ligne.appendChild(td_numero);
						
						var td_categorie = document.createElement('td');
						td_categorie.setAttribute('id','td_categorie_' + i);
						td_categorie.setAttribute('style','font-weight:bold;');
						td_categorie.innerHTML = tableauResultat[i]['categorie'];
						
						ligne.appendChild(td_categorie);

						var td_materiaux = document.createElement('td');
						td_materiaux.setAttribute('id','td_materiaux_' + i);
						td_materiaux.setAttribute('style','font-weight:bold;');
						var text_materiaux = '';
						if (tableauResultat[i]['materiaux1'] != '') text_materiaux += '-' + tableauResultat[i]['materiaux1'];
						if (tableauResultat[i]['materiaux2'] != '') text_materiaux += '<br>-' + tableauResultat[i]['materiaux2'];
						if (tableauResultat[i]['materiaux3'] != '') text_materiaux += '<br>-' + tableauResultat[i]['materiaux3'];
						td_materiaux.innerHTML = text_materiaux;
						
						ligne.appendChild(td_materiaux);
						
						var td_forme = document.createElement('td');
						td_forme.setAttribute('id','td_forme_' + i);
						td_forme.setAttribute('style','font-weight:bold;');
						td_forme.innerHTML = tableauResultat[i]['forme'];
						
						ligne.appendChild(td_forme);
						
						var td_observations = document.createElement('td');
						td_observations.setAttribute('id','td_observations_' + i);
						td_observations.setAttribute('style','font-weight:bold;');
						var text_observations = tableauResultat[i]['observations'];
						var text_observations_court = (text_observations.length < 60)?text_observations:text_observations.substring(0, 60) + '...';
						var text_observations_html = '<span id=\'text_observations_court_' + i + '\'>' + text_observations_court + '</span>';
						text_observations_html += '<span id=\'text_observations_' + i + '\'>' + text_observations + '</span>';
						td_observations.innerHTML = text_observations_html;
						
						ligne.appendChild(td_observations);

						var td_annee = document.createElement('td');
						td_annee.setAttribute('id','td_annee_' + i);
						td_annee.setAttribute('style','font-weight:bold;');
						td_annee.setAttribute('align','center');
						td_annee.innerHTML = tableauResultat[i]['annee'];
						
						ligne.appendChild(td_annee);

						var td_timbreLieu = document.createElement('td');
						td_timbreLieu.setAttribute('id','td_timbreLieu_' + i);
						td_timbreLieu.setAttribute('style','font-weight:bold;');
						var text_timbreLieu = '';
						if (tableauResultat[i]['tcontinent'] != '') text_timbreLieu += '-' + tableauResultat[i]['tcontinent'];
						if (tableauResultat[i]['tpays'] != '')
						{
							if (tableauResultat[i]['tcontinent'] != '') text_timbreLieu += '<br>';
							text_timbreLieu += '-' + tableauResultat[i]['tpays'];
						}
						td_timbreLieu.innerHTML = text_timbreLieu;
						ligne.appendChild(td_timbreLieu);

						var td_timbreAnnee = document.createElement('td');
						td_timbreAnnee.setAttribute('id','td_timbreAnnee_' + i);
						td_timbreAnnee.setAttribute('style','font-weight:bold;');
						td_timbreAnnee.innerHTML = tableauResultat[i]['tanneeE'];

						td_timbreAnnee.innerHTML = tableauResultat[i]['tanneeE'];
						
						ligne.appendChild(td_timbreAnnee);
						
						var td_couleurs = document.createElement('td');
						td_couleurs.setAttribute('id','td_couleurs_' + i);
						
						var text_couleurs = '';
						if (tableauResultat[i]['couleurs'] != '')
						{
							text_couleurs += '<span id=\'text_couleurs_' + i + '\'><b>' + tableauResultat[i]['couleurs'] + '</b><br></span>';
							text_couleurs += '<div style=\'height:4px\'></div>';
							liste = tableauResultat[i]['couleurs'];
							liste = liste.replace(',,',',');
							liste = liste.replace('?','');
							liste = liste.replace('(','');
							liste = liste.replace(')','');
							liste = liste.replace('&','');
							liste = liste.replace('couleurs',''); // n'est pas une couleur
							liste = liste.replace('couleur',''); // n'est pas une couleur
							liste = liste.replace('crame',''); // n'est pas une couleur
							liste = liste.replace('dominante',''); // n'est pas une couleur
							liste = liste.replace('macrame',''); // n'est pas une couleur
							liste = liste.replace('naturel',''); // n'est pas une couleur
							liste = liste.replace('non',''); // n'est pas une couleur
							liste = liste.replace('variable',''); // n'est pas une couleur
							liste = liste.replace('toutes',''); // n'est pas une couleur
							liste = liste.trim();
							liste = liste.split(',');
							for(j=0; j<liste.length; j++)
							{
								couleurResultat = '';
								couleurRenseigne = liste[j].trim();
								if (couleurRenseigne.trim() != '' && couleurRenseigne.length > 2 || couleurRenseigne == 'or')
								{
									for (k=0 ; k<couleur_nom_liste.length ; k++)
									{
										if (removeAccents(couleurRenseigne).toLowerCase() == removeAccents(couleur_nom_liste[k]).toLowerCase()) couleurResultat = '#' + couleur_code_hexa_liste[k];
									}
								}
								text_couleurs += '<span style=\'border:2px #000 solid;margin:2px;';
								if (removeAccents(couleurRenseigne).toLowerCase() == 'brillant') text_couleurs += 'background-image:url(./pics/brillant.png);\'>';
								else if (removeAccents(couleurRenseigne).toLowerCase() == 'multicolore') text_couleurs += 'background-image:url(./pics/multicolore.png);\'>';
								else text_couleurs += 'background-color:' + couleurResultat + '\'>';
								text_couleurs += '&nbsp;&nbsp;</span>';
								if (j>0 && j%6 == 0)
								{
									text_couleurs += '<div class=\'separateur_couleurs\' style=\'height:8px\'><br></div>';
								}
							}
						}
						td_couleurs.innerHTML = text_couleurs;
						
						ligne.appendChild(td_couleurs);
						
						document.getElementById('tableauTortues').appendChild(ligne);
					}
					$('html, body').animate( { scrollTop: $('#pagination').offset().top - parseInt($('#pagination').css('margin-top')) }, 750 );
				}
				startCheckLoadingThumbs();
				miseEnPage();
				checkSignets();
				afficheDetail();
				document.getElementById('enTeteTableauNav').style.display = 'none';
			}
		}

		},
		
		error : function(resultat, statut, erreur) {
			$("#search-button").find('span').attr('class', 'glyphicon glyphicon-search');
			document.getElementById('info').innerHTML = "<h2>Le service est momentanément indisponible, veuillez réessayer...</h2>";
			document.getElementById('info').style.display = '';
			document.getElementById('tableauTortues').style.display = 'none';
			document.getElementById('range').style.display = 'none';
			document.getElementById('pagination').style.display = 'none';
			document.getElementById('ficheDetail').style.display = 'none';
			$('.arrow').hide();
			if (innerWidth < resolutionBascule)
			{
				//document.getElementById('spacer').style.height = innerHeight - document.getElementById('info').offsetHeight;
				$('html, body').animate( { scrollTop: $('#info').offset().top - parseInt($('#info').css('margin-top')) }, 750 );
			}
		},

		complete : function(resultat, statut) {
		}
		
		});

	}

	function submitGestionSignetsAjax(action, numero)
	{

		$.ajax({

		url : 'gestionSignetsAjax.php',

		type : 'POST', // Le type de la requête HTTP

		data : 'action=' + action + '&numero=' + numero,

		dataType : 'html',
		
		success : function(code_html, statut) {

		//alert(code_html);
		var modeFicheDetail = $('#modeFicheDetail').val();
		if (action == "read")
		{
			if (modeFicheDetail == 'true')
			{
				if (code_html == 's')
				{
					$('#fiche_signet').attr('class', 'glyphicon glyphicon-star');
					$('#fiche_signet').attr('style', 'font-size:3.0em;color:#FF0;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;cursor:pointer;');
				}
				else
				{
					$('#fiche_signet').attr('class', 'glyphicon glyphicon-star-empty');
					$('#fiche_signet').attr('style', 'font-size:3.0em;color:black;cursor:pointer;');
				}
			}
			else
			{
				tableauSignets = JSON.parse(code_html);
				var nbLignes = document.getElementById('tableauTortues').getElementsByTagName('tr').length - 2;
				for (i=0 ; i<nbLignes ; i++)
				{
					line = document.getElementById('tr_tortue_' + i);
					numero = line.getAttribute('numero');
					if (tableauSignets.hasOwnProperty(numero))
					{
						$('#signet_' + numero).attr('class', 'glyphicon glyphicon-star');
						$('#signet_' + numero).attr('style', 'font-size:3.0em;color:#FF0;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;cursor:pointer;');
					}
					else
					{
						$('#signet_' + numero).attr('class', 'glyphicon glyphicon-star-empty');
						$('#signet_' + numero).attr('style', 'font-size:3.0em;color:#673418;cursor:pointer;');
					}
				}
			}
		}
		if (action == 'update')
		{
			if (!tableauSignets.hasOwnProperty(numero))
			{
				tableauSignets[numero] = '';
				if (modeFicheDetail == 'true')
				{
					$('#fiche_signet').attr('class', 'glyphicon glyphicon-star');
					$('#fiche_signet').attr('style', 'font-size:3.0em;color:#FF0;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;cursor:pointer;');
				}
				else
				{
					$('#signet_' + numero).attr('class', 'glyphicon glyphicon-star');
					$('#signet_' + numero).attr('style', 'font-size:3.0em;color:#FF0;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;cursor:pointer;');
				}
			}
			else
			{
				delete tableauSignets[numero];
				if (modeFicheDetail == 'true')
				{
					$('#fiche_signet').attr('class', 'glyphicon glyphicon-star-empty');
					$('#fiche_signet').attr('style', 'font-size:3.0em;color:black;cursor:pointer;');
				}
				else
				{
					$('#signet_' + numero).attr('class', 'glyphicon glyphicon-star-empty');
					$('#signet_' + numero).attr('style', 'font-size:3.0em;color:#673418;cursor:pointer;');
				}
			}		
		}
		
		},

		error : function(resultat, statut, erreur) {
		},


		complete : function(resultat, statut) {
		}
		
		});
	}

	<!-- Menu Toggle Script -->
	$("#menu-toggle").click(function(e) {
		if (innerWidth < resolutionBascule)
		{
			$('html, body').animate( { scrollTop: $('#sidebar-wrapper').offset().top }, 750 );
		}
		else
		{
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		}
	});

	$(document).ready(function() {
		if (innerWidth < resolutionBascule) idToScroll = 'pagination';
		else idToScroll = '';
		$().UItoTop({ easingType: 'easeOutQuart', idElementToScroll: idToScroll });
	});

	$(window).scroll(function() {
		var sd = $(window).scrollTop();
		var limite = $('#tableauTortues').offset().top;
		$("#enTeteTableauNav").css({
			//'position': 'absolute',
			//'top': 0,
			'left': $('#page-content-wrapper').offset().left - $(window).scrollLeft()
		});
		if (document.getElementById('tableauTortues').getElementsByTagName('tr').length > 4)
		{
			if ( sd > limite )
			{
				$("#tableauTortuesTitreNav").css("width", $("#tableauTortues").width());
				$("#enTeteTableauNav").fadeIn(600);
			}
			else 
				$("#enTeteTableauNav").fadeOut(400);
		}
	});

	// create a simple instance
	// by default, it only adds horizontal recognizers
	var panelTableau = document.getElementById('tableauTortues');
	var panelPhoto = document.getElementById('photo');
	var mc_tableau = new Hammer(panelTableau);
	var mc_photo = new Hammer(panelPhoto);

	// listen to events...
	mc_tableau.on("panleft panright panend pancancel", function(ev) {
		//myElement.textContent = ev.type +" gesture detected.";
		this.containerSize = panelTableau.offsetWidth;
		var deltax = ev.deltaX;
		var deltay = ev.deltaY;
		var percentx = (100 / this.containerSize) * deltax;
		var percenty = (100 / this.containerSize) * deltay;
		if (ev.type == 'panend' || ev.type == 'pancancel') {
			if (ev.type == 'panend' && Math.abs(percentx) > 20 && Math.abs(percentx) > Math.abs(percenty))
			{
				if (percentx < 0) goNavig('next');
				else goNavig('prev');
			}
			percentx = 0;
			percenty = 0;
		}
	});
	// listen to events...
	mc_photo.on("panleft panright panend pancancel", function(ev) {
		//myElement.textContent = ev.type +" gesture detected.";
		this.containerSize = panelPhoto.offsetWidth;
		var deltax = ev.deltaX;
		var deltay = ev.deltaY;
		var percentx = (100 / this.containerSize) * deltax;
		var percenty = (100 / this.containerSize) * deltay;
		if (ev.type == 'panend' || ev.type == 'pancancel') {
			if (ev.type == 'panend' && Math.abs(percentx) > 20 && Math.abs(percentx) > Math.abs(percenty))
			{
				if (percentx < 0) goNavig('next');
				else goNavig('prev');
			}
			percentx = 0;
			percenty = 0;
		}
	});
	
	$(document).ready(function() {
		$('.js-scrollTo').on('click', function() { // Au clic sur un élément
			var page = $(this).attr('href'); // Page cible
			var speed = 750; // Durée de l'animation (en ms)
			$('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
			return false;
		});
	});
	
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	document.getElementById("titrePage").innerHTML = "<?php echo TXT_SEARCH ?>";
	document.getElementById('tableauTortues').style.display = 'none';
	document.getElementById('ficheDetail').style.display = 'none';
	document.getElementById('enTeteTableauNav').style.display = 'none';
	document.getElementById('pagination').style.display = 'none';
	document.getElementById('range').style.display = 'none';
	document.getElementById('aide').style.display = 'none';
	document.getElementById('info').style.display = 'none';
	miseEnPage();
	-->
    </script>

</body>

</html>