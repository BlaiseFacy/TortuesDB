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

<script type="text/javascript">

<?php
require("./dbConnection.php"); // Page contenant les methodes de connection et les paramétrages sql

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

echo "
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

mysql_free_result($result);

if ($nbCouleursTable == 0)
{
	$couleur_nom_liste = array('Blanc','Vert','Noir','Marron','Bleu','Jaune','Or','Rouge','Gris','Crème','Orange','Doré','Rose','Violet','Bordeaux','Verdâtre','Brun','Cuivre','Argent','Beige','Chêne','Bronze','Jaunâtre','Ocre','Turquoise','Ivoire','Mauve','Opaque','Saumon','Ambre','Nacre','Palissandre','Transparent','Rouille','Grenat','Blanc','Écru','Multicolore','Roux','Bois','Cognac','Fuchsia','Kaki','Brillant','Cérusé','Moutarde','Paille','Rosâtre','Terre','Anthracite','Argile','Brique','Diamant','Fer','Kraft','Laiton','Lilas','Marine','Opale');
}
?>

<!--
var tableauSignets = new Array(); // Tableau des signets
var resolutionBascule = <?php echo $resolutionBascule; ?> // Résolution limite entre configuration smartphone / desktop

function organiseMenu()
{
	if (innerWidth < resolutionBascule)
	{
		$("#navbar-bootstrap").prependTo('#wrapper');
		$("#titleSideBar").hide();
	}
	else
	{
		$("#navbar-bootstrap").prependTo('#page-content-wrapper');
		$("#titleSideBar").show();
		if ($("#sidebar-wrapper").offsetWidth == 0) $("#wrapper").toggleClass("toggled");
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

function refreshTriSelector()
{
	var typeSelector = document.getElementById('type');
	var triSelector = document.getElementById('tri');
	for (var i=0; i<typeSelector.options.length; i++)
	{
		if (typeSelector.options[i].selected)
		{
			//alert(i+':'+typeSelector.options[i].value);
			triSelector.options[0].text=typeSelector.options[i].text;
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
		//bootbox.alert('Aucune tortue n\'est encore sélectionnée !');
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
		document.getElementById('td_type_nav').style.width = document.getElementById('td_type').offsetWidth;
		document.getElementById('td_nombre_nav').style.width = document.getElementById('td_nombre').offsetWidth;
		document.getElementById('td_rang_nav').style.width = document.getElementById('td_rang').offsetWidth;
		document.getElementById('td_lien_nav').style.width = document.getElementById('td_lien').offsetWidth;
		setTimeout('positionneEnTeteTableauNav();', 200);
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
		$('#aide').show();
		$('html, body').animate( { scrollTop: $('#aide').offset().top }, 750 );
		$('#tableauStats').hide();
		$('#ficheDetail').hide();
		$('#pagination').hide();	
		$('#range').hide();		
	}
	else
	{
		$('#tableauStats').hide();
		$('#ficheDetail').hide();
		$('#pagination').hide();	
		$('#range').hide();
		$('#aide').show();
	}
}

function onMouseOutLine(line,couleur)
{
	line.className = couleur;
}

function onMouseOverLine(line)
{
	line.className = 'blancMos';
}

function setmodeFicheDetail(item)
{
	$('#modeFicheDetail').val('true');
	$('#item').val(item);
	$('#offset').val(1);
	var slider = $("#rangeInput").data("ionRangeSlider");
	slider.update({
		from: 1
	});
	$('#ficheDetail').show();
	$('#pagination').show();
	$('#range').show();
	var text_requete = $('#item').val();
	if ($('#type').val() == 'annee')  text_requete = '<?php echo TXT_YEAR ?> ' + text_requete;
	if ($('#type').val() == '<?php echo TXT_WEIGHT ?>')  text_requete += ' g';
	if ($('#type').val() == '<?php echo TXT_SIZE ?>')  text_requete += ' cm';
	if ($('#type').val() == '<?php echo TXT_VOLUME ?>')  text_requete += ' cm3';
	if ($('#type').val() == '<?php echo TXT_PRICE ?>')  text_requete += ' €';
	if (text_requete.length > 25 && innerWidth <= 375)
	{
		$('#text_requete').html(text_requete.substring(0, 22) + '...');
		$('#text_requete').attr('data-original-title', text_requete);
	}
	else $('#text_requete').html(text_requete);
	$('#tableauStats').hide();
	submitRequeteAjax('recherche');
}

function unsetmodeFicheDetail()
{
	$('#modeFicheDetail').val('false');
	$('#ficheDetail').hide();
	var listeTypes = document.getElementById('type');
	$('#text_requete').html('<?php echo TXT_PER ?> ' + listeTypes.options[listeTypes.selectedIndex].text);
	$('#range').hide();
	$('#tableauStats').show();
	submitStatsAjax('recherche');
}

function constructQueryParams()
{
	var type = $('#type').val();
	var item = $('#item').val();

	// queryParams = partie de la requête comportant les paramètres
	var queryParams = "";

	if (type != "")
	{
		queryParams = " and " + type + " = '" + item + "'";
		if (type == "taille")
		{
			queryParams = " and round(greatest(longueur, largeur, hauteur), 1) = '" + item.replace("," ,".") + "'";
		}
		if (type == "volume")
		{
			queryParams = " and round(longueur * largeur * hauteur, 2) = " + item.replace(",", ".");
		}
		if (type == "materiaux")
		{
			queryParams = " and (materiaux1 = '" + item + "' or materiaux2 = '" + item + "' or materiaux3 = '" + item + "')";
		}
		if (type == "couleur")
		{
			queryParams = " and couleurs like '%" + item + "%'";
		}
		if (type == "prix")
		{
			queryParams = " and round(prix,0) = " + item;
		}
	}
	
	// Fin de la construction de la requête

	//document.write('<b>' + queryParams + '</b>)');
	return queryParams;
}

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

<style type="text/css">
<!--
body {
	/*background-image: linear-gradient(#425363,#82C341);*/
	/*font-size: 1.5em;*/
	/*color: #000;*/
}
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
#titre {
	border-top: 1px solid #000;
}
.input-group {
	border-bottom:10px solid transparent;
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
#tableauStats {
	width: 100%;
}
@media(min-width:<?php echo $resolutionBascule; ?>px) {
	#pagination-input {
		width: 350px;
	}
	#tableauStats {
		margin-left: 10px;
		width: 350px;
		white-space:nowrap;
	}
	#tableauStatsTitreNav {
		margin-left: 10px;
		width: 350px;
		white-space:nowrap;
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
.checkbox {
	margin-top: -5px;
	margin-bottom: 5px;
	color: #CCC;
}
.radio-inline {
	color: #CCC;
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
#text_requete, #menu-toggle, #offset {
	color: black;
	border: 1px solid black;
}
#offset {
	width: 70px;
}
#text_requete {
	width: 100%;
}
#menu-toggle {
	width: 40px;
}
#aide {
	text-align: center;
	#color: #000;
	padding: 10px;
	border-color: #000;
	border-width: 1px 0px 1px 0px;
	border-style: solid;
}
#infoAdmin {
	font-weight: bold;
	background-color: red;
	color: black;
	padding: 2px;
	word-wrap: break-word;
}
#info {
	background-color: D9534F;
	text-align: center;
	color: #FFF;
	padding: 10px;
}
#enTeteTableauNav {
	position: fixed;
	top: 0;
	z-index: 2;
}
/*
.td_type_hidden {
	width: 60%;
}
.td_nombre_hidden {
	width: 10%;
}
.td_rang_hidden {
	width: 25%;
}
.td_lien_hidden {
	width: 5%;
}
*/
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

</head>

<body>

	<div id="wrapper">	
	
	<?php include("./menu.php"); ?>
	
		<!-- Sidebar -->
		<div id="sidebar-wrapper">
			<div id="titleSideBar">
				<span class="label" style="color:#000;font-size:16px;">PARAMETRES</span>
			</div>
			<div style="padding:10px;">
				<h3 style="margin-top: 0px;">
					<button type="button" class="btn btn-success btn-default" id="search-button" onClick="submitStatsAjax();">
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
					<div class="input-group" style="width:100%;">
						<span class="input-group-addon primary" style="width:100px;" data-toggle="tooltip" data-placement="bottom" title=""><?php echo TXT_GROUP_BY ?></span>
						<select id="type" class="form-control" onChange="refreshTriSelector();">
							<option value="annee"><?php echo TXT_YEAR ?></option>
							<option value="categorie"><?php echo TXT_CATEGORY ?></option>
							<option value="materiaux"><?php echo TXT_MATERIAL ?></option>
							<option value="forme"><?php echo TXT_FORM ?></option>
							<option value="poids"><?php echo TXT_WEIGHT ?></option>
							<option value="taille"><?php echo TXT_SIZE ?></option>
							<option value="volume"><?php echo TXT_VOLUME ?></option>
							<option value="couleur"><?php echo TXT_COLOR ?></option>
							<?php if (isset($_SESSION["accesPrix"]) && $_SESSION["accesPrix"] == "oui") echo "<option value='prix'>".TXT_PRICE."</option>" ?>
						</select>
					</div>
				</div>
				<br>
				<div class="rubrique">
					<div class="input-group" style="width:100%;">
						<span class="input-group-addon primary" style="width:100px;" data-toggle="tooltip" data-placement="bottom" title=""><?php echo TXT_SORT_BY ?></span>
						<select id="tri" class="form-control">
							<option value="type"><?php echo TXT_TYPE ?></option>
							<option value="nombre"><?php echo TXT_QUANTITY ?></option>
						</select>
					</div>
				</div>
				<label class="radio-inline">
					<input type="radio" name="sens" id="sensCroissant" value="croissant" checked><?php echo TXT_ASCENDING ?>
				</label>
				<label class="radio-inline">
					<input type="radio" name="sens" id="sensDecroissant" value="decroissant"><?php echo TXT_DESCENDING ?>
				</label>
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
				<table id="tableauStatsTitreNav" class="couleur">

					<?php
					/////////////////////////////////////// Copie cachée du tableau de pour avoir un alignement parfait
					$tdHidden = "style='opacity:0;-moz-opacity:0;height:0px;padding:0px 1px;border-width:0px 1px;'";
					$divHidden = "style='text-align:center;height:0px;border-width:0px 1px;'";
					$inputHidden = "height:0px;padding-top:0px;padding-bottom:0px;";
					/////////////////////////////////////////////////////////////////////////////////////
					?>
					<tr class='fonce' valign='top' id='titreHidden_nav'>
						<td class='td_type_hidden' <?php echo $tdHidden ?>>
							<div <?php echo $divHidden ?>>
								<input type='text' style='width:140px;<?php echo $inputHidden ?>'>
							</div>
						</td>
						<td class='td_nombre_hidden' <?php echo $tdHidden ?>>
							<div <?php echo $divHidden ?>>
								<input type='text' style='width:50px;<?php echo $inputHidden ?>'>
							</div>
						</td>
						<td class='td_rang_hidden' <?php echo $tdHidden ?>>
							<div <?php echo $divHidden ?>>
								<input type='text' style='width:80px;<?php echo $inputHidden ?>'>
							</div>
						</td>
						<td class='td_lien_hidden' <?php echo $tdHidden ?>>
							<div <?php echo $divHidden ?>>
								<input type='text' style='width:50px;<?php echo $inputHidden ?>'>
							</div>
						</td>
					</tr>
					<tr class="titre" id="titre_nav">
						<td id="td_type_nav">type</td>
						<td id="td_nombre_nav">nb</td>
						<td id="td_rang_nav">rang</td>
						<td id="td_lien_nav">lien</td>
					</tr>
				</table>
			</div>
			
			<div id="aide">
				<h4 style="line-height: 1.3;text-align:left;">
					<ul>
					<li>L'année correspond à l'année d'acquisition de la tortue.</li>
					<li>Les catégories sont au nombre de 7 : Animal, Métal, Minéral, Synthétique, Terre, Verre-Cristal, Végétal</li>
					<li>Materiaux : tous les matériaux possibles pouvant consituer un objet.</li>
					<li>Forme désigne l'utilité particulière de l'objet.</li>
					<li>Le poids est indiqué en grammes.</li>
					<li>La taille désigne la plus grande des 3 mesures en cm : longueur, largeur et hauteur.</li>
					<li>Le volume désigne l'encombrement de l'objet en cm3 : longueur x largeur x hauteur.</li>
					<li>Couleur : la couleur ou une des couleurs caractérisant l'objet.</li>
					<?php if (isset($_SESSION["accesPrix"]) && $_SESSION["accesPrix"] == "oui") echo "<li>Prix : prix d'acquisition de la tortue en euros.</li>"; ?>
					</ul>
				</h4>
			</div>
		</div>

		<div id="info">
		</div>
		<div id="infoAdmin">
		</div>

		<div id="pagination" class="transparent">
			<h4 style="color:white">
				<div class="input-group" id="pagination-input">
					<a href="#menu-toggle" class="input-group-addon" id="menu-toggle">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					</a>
					<span class="input-group-addon primary" id="text_requete" data-toggle="tooltip" data-placement="bottom" title=""></span>
					<input id="offset" type="text" class="form-control" maxlength="5" value="0" onKeyUp="actionSaisieOffset(event);" onBlur="actionSaisieOffsetGo();">
				</div>
				<input id='nbrTotal' type='hidden' value='0'>
				<input id='item' type='hidden' value=''>
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

		<table id="tableauStats" class="couleur">

			<?php
			/////////////////////////////////////// Copie cachée du tableau de selection/navigation pour avoir un alignement parfait
			$tdHidden = "style='opacity:0;-moz-opacity:0;height:0px;padding:0px 1px;border-width:0px 1px;'";
			$divHidden = "style='text-align:center;height:0px;border-width:0px 1px;'";
			$inputHidden = "height:0px;padding-top:0px;padding-bottom:0px;";
			?>
			
			<tr class='fonce' valign='top' id='titreHidden'>
				<td class='td_type_hidden' <?php echo $tdHidden ?>>
					<div <?php echo $divHidden ?>>
						<input type='text' style='width:140px;<?php echo $inputHidden ?>'>
					</div>
				</td>
				<td class='td_nombre_hidden' <?php echo $tdHidden ?>>
					<div <?php echo $divHidden ?>>
						<input type='text' style='width:50px;<?php echo $inputHidden ?>'>
					</div>
				</td>
				<td class='td_rang_hidden' <?php echo $tdHidden ?>>
					<div <?php echo $divHidden ?>>
						<input type='text' style='width:80px;<?php echo $inputHidden ?>'>
					</div>
				</td>
				<td class='td_lien_hidden' <?php echo $tdHidden ?>>
					<div <?php echo $divHidden ?>>
						<input type='text' style='width:50px;<?php echo $inputHidden ?>'>
					</div>
				</td>
			</tr>
			
			<?php
			/////////////////////////////////////////////////////////////////////////////////////
			?>

			<tr class="titre" id="titre">
				<td id="td_type">type</td>
				<td id="td_nombre">nb</td>
				<td id="td_rang">rang</td>
				<td id="td_lien">lien</td>
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
		
		<div id="spacer" style="height:70px;"></div>
		
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

	<script type="text/javascript">

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

	function submitStatsAjax() {

		$("#search-button").find('span').attr('class', 'fa fa-spinner fa-spin');
		var sens = (document.getElementById('sensCroissant').checked)?'croissant':'decroissant';
		
		$.ajax({

		url : 'statistiquesAjax.php',

		type : 'POST', // Le type de la requête HTTP

		data : 'type=' + $('#type').val() + '&tri=' + $('#tri').val() + '&sens=' + sens,

		dataType : 'html',
		
		success : function(code_html, statut) {
		
			//alert(code_html);
			
			$("#search-button").find('span').attr('class', 'glyphicon glyphicon-search');
			document.getElementById('td_type').innerHTML = $('#type').val();
			document.getElementById('td_type_nav').innerHTML = $('#type').val();
			var listeTypes = document.getElementById('type');
			$('#text_requete').html('<?php echo TXT_PER ?> ' + listeTypes.options[listeTypes.selectedIndex].text);
			$('#pagination').show();
			$('#offset').val(1);
			$('#info').hide();
			$('#infoAdmin').hide();
			$('.arrow').hide();
			
			if (innerWidth < resolutionBascule) $('html, body').animate( { scrollTop: $('#pagination').offset().top - parseInt($('#pagination').css('margin-top')) }, 750 );
			
			var tableauResultat = JSON.parse(code_html)['listeStats'];
			
			var nbrTotal = JSON.parse(code_html)['nbrTotal'];
			var nbrItem = JSON.parse(code_html)['nbrItem'];
			var listeCouleursNonRef = JSON.parse(code_html)['listeCouleursNonRef'];
			var listeNumerosCouleurNonRef = JSON.parse(code_html)['listeNumerosCouleurNonRef'];
			var listeNumerosCouleurEnDouble = JSON.parse(code_html)['listeNumerosCouleurEnDouble'];
			var isTactile = <?php if (isTactile()) echo "true"; else echo "false"; ?>;
			$('#aide').hide();
			$('#range').hide();
			$('#ficheDetail').hide();
			document.getElementById('text_nombre').innerHTML = padLeft(nbrTotal,5,0);
			
			var info = "";
			if (listeCouleursNonRef.length > 0)
			{
				$('#infoAdmin').show();
				info += "Il y a des couleurs non référencées en base : ";
				for(i=0; i<listeCouleursNonRef.length; i++)
				{
					if (i>0) info += ",&nbsp;";
					info += "\"" + listeCouleursNonRef[i] + "\"";
				}
				info += "<br>";
				info += "Veuillez les ajouter à la table des couleurs ou les corriger si ce sont des erreurs de saisie.<br>=> <a href='gestionCouleurs.php' style='color:white;text-decoration:underline;'>Ajouter une couleur </a><br>";
				info += "<span style='text-decoration:underline;'>N° des tortues concernées : </span><br>";
				for (var couleur in listeNumerosCouleurNonRef)
				{
					info += "- \"" + couleur + "\" : " + listeNumerosCouleurNonRef[couleur] + "<br>";
				}
			}
			if (listeNumerosCouleurEnDouble != "")
			{
				$('#infoAdmin').show();
				if (listeCouleursNonRef.length > 0) info += "<br>";
				if (listeNumerosCouleurEnDouble.split(",").length == 1) info += "La tortue n°" + listeNumerosCouleurEnDouble + " comporte des couleurs en double.";
				else
				{
					info += "Il y a des tortues comportant des couleurs en double, voici les n° des " + (listeNumerosCouleurEnDouble.split(",").length) + " tortues concernées : ";
					info += listeNumerosCouleurEnDouble;
				}
			}
			$('#infoAdmin').html(info);
			
			// On enlève tous les éléments de l'affichage de la requête précédente

			var nbLignes = document.getElementById('tableauStats').getElementsByTagName('tr').length - 2;
			for (i=0 ; i<nbLignes ; i++)
			{
				ligne = document.getElementById('tr_ligne_' + i);
				ligne.parentNode.removeChild(ligne);
			}			
			$('#tableauStats').show();
			
			// On génère les lignes du tableau pour afficher le tableau de l'affichage de la requête
			
			$('#titre_nav').show();
			$('#titreHidden').show();
			$('#titreHidden_nav').show();
			for (i=0 ; i<tableauResultat.length ; i++)
			{
				couleur=i%2==0?'clair':'fonce';
				var ligne = document.createElement('tr');
				ligne.setAttribute('id', 'tr_ligne_' + i);
				ligne.setAttribute('class', couleur);
				ligne.setAttribute('valign', 'middle');
				if (!isTactile)
				{
					ligne.setAttribute('onMouseOver', 'onMouseOverLine(this)');
					ligne.setAttribute('onMouseOut', 'onMouseOutLine(this,\'' + couleur + '\')');
				}
				var td_type = document.createElement('td');
				td_type.setAttribute('style','font-weight:bold;text-align:left;');
				type_text = 'SANS';
				if (tableauResultat[i]['type'] != '') type_text = tableauResultat[i]['type'];
				if ($('#type').val() == 'couleur')
				{
					var couleurResultat = '';
					for (k=0 ; k<couleur_nom_liste.length ; k++)
					{
						if (removeAccents(type_text).toLowerCase() == removeAccents(couleur_nom_liste[k]).toLowerCase()) couleurResultat = '#' + couleur_code_hexa_liste[k];
					}
					var span_couleur = document.createElement('span');
					var style_span_couleur = 'border:2px #000 solid;';
					if (removeAccents(type_text).toLowerCase() == 'brillant') style_span_couleur += 'background-image:url(./pics/brillant.png);';
					else if (removeAccents(type_text).toLowerCase() == 'multicolore') style_span_couleur += 'background-image:url(./pics/multicolore.png);';
					else style_span_couleur += 'background-color:' + couleurResultat + ';';
					<?php if (isset($_SESSION["accesPrix"]) && $_SESSION["accesPrix"] == "oui") echo "
						style_span_couleur += 'cursor:pointer;';
						span_couleur.setAttribute('onClick', '\'document.location=./gestionCouleurs.php\'');
					";
					?>
					span_couleur.setAttribute('style', style_span_couleur);
					span_couleur.innerHTML = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
					td_type.appendChild(span_couleur);
				}
				var span_type = document.createElement('span');
				span_type.innerHTML = '&nbsp;' + type_text;
				td_type.appendChild(span_type);
				ligne.appendChild(td_type);
				var td_nombre = document.createElement('td');
				td_nombre.setAttribute('style','font-weight:bold;text-align:right;');
				td_nombre.innerHTML = tableauResultat[i]['nombre'];
				ligne.appendChild(td_nombre);
				var td_rang = document.createElement('td');
				td_rang.setAttribute('style','font-weight:bold;text-align:right;');
				td_rang.innerHTML = (i + 1) + '/' + nbrItem;
				ligne.appendChild(td_rang);
				var td_lien = document.createElement('td');
				td_lien.setAttribute('style','text-align:center;cursor:pointer;');
				var img_lien = document.createElement('img');
				img_lien.setAttribute('src', './pics/lien_tortue.png');
				//var span_lien = document.createElement('span');
				//span_lien.setAttribute('class', 'glyphicon glyphicon-eye-open');
				//span_lien.setAttribute('style', 'font-size:2.0em;color:black;cursor:pointer;');
				img_lien.setAttribute('height', '25px');
				img_lien.setAttribute('onClick', 'setmodeFicheDetail("' + tableauResultat[i]['type'] + '");');
				td_lien.appendChild(img_lien);
				ligne.appendChild(td_lien);
				
				document.getElementById('tableauStats').appendChild(ligne);
			}
			miseEnPage();
		},

		error : function(resultat, statut, erreur) {
			$("#search-button").find('span').attr('class', 'glyphicon glyphicon-search');
			$('#info').html("<h2>Le service est momentanément indisponible, veuillez réessayer...</h2>");
			$('#info').show();
			$('#ficheDetail').hide();
			$('#tableauStats').hide();
			('#pagination').hide();
			('#range').hide();
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

	function submitRequeteAjax(key)
	{

		offset = $('#offset').val();
		if ($('#offset').val() == 0) $('#offset').val(1);
		var modeFicheDetail = $('#modeFicheDetail').val();
		var nbrPP = 1;
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
			var slider = $("#rangeInput").data("ionRangeSlider");
			slider.update({
				min: 1,
				max: new_nbrTotal,
				from: 1,
			});
		}
		
		var isTactile = <?php if (isTactile()) echo "true"; else echo "false"; ?>;
		
		if (!isTactile) $('.arrow').show();
		
		if (key == 'recherche') document.getElementById('aide').style.display = 'none';

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

		},
		
		error : function(resultat, statut, erreur) {
			$("#search-button").find('span').attr('class', 'glyphicon glyphicon-search');
			$('#info').html("<h2>Le service est momentanément indisponible, veuillez réessayer...</h2>");
			$('#info').show();
			$('#ficheDetail').hide();
			$('#tableauStats').hide();
			('#pagination').hide();
			('#range').hide();
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
		if (action == "read")
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
		if (action == 'update')
		{
			if (!tableauSignets.hasOwnProperty(numero))
			{
				tableauSignets[numero] = '';
				$('#fiche_signet').attr('class', 'glyphicon glyphicon-star');
				$('#fiche_signet').attr('style', 'font-size:3.0em;color:#FF0;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;cursor:pointer;');
			}
			else
			{
				delete tableauSignets[numero];
				$('#fiche_signet').attr('class', 'glyphicon glyphicon-star-empty');
				$('#fiche_signet').attr('style', 'font-size:3.0em;color:black;cursor:pointer;');
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

	// create a simple instance
	// by default, it only adds horizontal recognizers
	var panelPhoto = document.getElementById('photo');
	var mc_photo = new Hammer(panelPhoto);

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
		if (innerWidth < resolutionBascule) idToScroll = 'pagination';
		else idToScroll = '';
		$().UItoTop({ easingType: 'easeOutQuart', idElementToScroll: idToScroll });
	});

	$(window).scroll(function() {
		var sd = $(window).scrollTop();
		var limite = $('#tableauStats').offset().top;
		$("#enTeteTableauNav").css({
			//'position': 'absolute',
			//'top': 0,
			'left': $('#page-content-wrapper').offset().left - $(window).scrollLeft()
		});
		if (document.getElementById('tableauStats').getElementsByTagName('tr').length > 4)
		{
			if ( sd > limite )
			{
				$("#tableauStatsTitreNav").css("width", $("#tableauTortues").width());
				$("#enTeteTableauNav").fadeIn(600);
			}
			else 
				$("#enTeteTableauNav").fadeOut(400);
		}
	});

	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
	document.getElementById("titrePage").innerHTML = "<?php echo TXT_STATS ?>";
	refreshTriSelector();
	document.getElementById('tableauStats').style.display = 'none';
	document.getElementById('ficheDetail').style.display = 'none';
	document.getElementById('enTeteTableauNav').style.display = 'none';
	document.getElementById('pagination').style.display = 'none';
	document.getElementById('range').style.display = 'none';
	document.getElementById('aide').style.display = 'none';
	document.getElementById('info').style.display = 'none';
	document.getElementById('infoAdmin').style.display = 'none';
	miseEnPage();
	</script>

</body>

</html>
