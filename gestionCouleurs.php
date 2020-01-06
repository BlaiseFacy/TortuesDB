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
<script type="text/javascript" src="./js/jscolor.js"></script><!-- color picker -->
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
#enTeteTableauNav {
	position: fixed;
	top: 0;
	z-index: 2;
}
.td_couleur_hidden {
	width: 50px;
}
.td_nom_hidden {
	width: 130px;
}
.td_codehexa_hidden {
	width: 80px;
}
.td_action_hidden {
	width: 40%;
}
#tr_titre {
	border-top: 1px solid #000;
}
#codeHexaCouleur_a_ajouter, .jscolor {
	font-weight: bold;
	border-width: 2px;
	border-style: solid;
	border-color: #000;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;
	text-align: left;
	font-size: 14px;
	padding: 4px;
}
#nomCouleur_a_ajouter {
	font-weight: bold;
}
-->
</style>

<script type="text/javascript">
<!--

var dataCouleurs;
var resolutionBascule = <?php echo $resolutionBascule; ?> // Résolution limite entre configuration smartphone / desktop

function supprimerCouleur(item)
{
	bootbox.confirm("Etes vous sûr de vouloir supprimer la couleur " + dataCouleurs[item]['nom'] + " ?", function(result) {
		if(result) submitGestionCouleursAjax('supprimer', dataCouleurs[item]['id'], '', '');
	}); 
}
function editerCouleur(item)
{
	//document.gestionCouleurs.id_couleur_input.value = tab_couleur_id[id];
	//document.gestionCouleurs.nom_couleur_input.value = tab_couleur_nom[id];
	//document.gestionCouleurs.code_hexa_input.value = tab_code_hexa[id];
	for (i=0 ; i<dataCouleurs.length ; i++)
	{
		if (i == item)
		{
			document.getElementById('nom_couleur_' + i).innerHTML = "<input type='text' class='form-control input-default' id='nom_couleur_input_" + i + "' value='" + dataCouleurs[i]['nom'] + "' style='width:130px' maxlength='50'>";
			document.getElementById('code_hexa_' + i).innerHTML = "<input type='text' class='jscolor' id='code_hexa_input_" + i + "' value='" + dataCouleurs[i]['codeHexa'] + "' style='width:80px' maxlength='6'>";
			//document.getElementById('id_' + i).innerHTML = "<input type='hidden' id='id_couleur_input_" + i + "' value='" + dataCouleurs[i]['id'] + "'>";
			picker = new jscolor(document.getElementById('code_hexa_input_' + i));
			//document.getElementById('code_hexa_input_' + i).jscolor.show();
			document.getElementById('save_' + i).style.display = '';
			document.getElementById('edit_' + i).style.display = 'none';
			document.getElementById('delete_' + i).style.display = 'none';
		}
		else
		{
			document.getElementById('nom_couleur_' + i).innerHTML = dataCouleurs[i]['nom'];
			document.getElementById('code_hexa_' + i).innerHTML = dataCouleurs[i]['codeHexa'];
			//document.getElementById('id_' + i).innerHTML = "";
			document.getElementById('save_' + i).style.display = 'none';
			document.getElementById('edit_' + i).style.display = '';
			document.getElementById('delete_' + i).style.display = '';
		}
	}
}

function modifierCouleur(item)
{
	for (i=0 ; i<dataCouleurs.length ; i++)
	{
		if (i != item && accentsTidy(dataCouleurs[i]['nom']) == accentsTidy(document.getElementById('nom_couleur_input_' + item).value).trim())
		{
			bootbox.alert('Vous ne pouvez pas donner un nom de couleur déjà existant !');
			return false;
		}
	}
	bootbox.confirm("Etes vous sûr de vouloir modifier la couleur " + dataCouleurs[item]['nom'] + " ?", function(result) {
		if(result) submitGestionCouleursAjax('modifier', dataCouleurs[item]['id'], document.getElementById('nom_couleur_input_' + item).value, document.getElementById('code_hexa_input_' + item).value);
	}); 	
}

function ajouterCouleur()
{
	if (document.getElementById('nomCouleur_a_ajouter').value == '')
	{
		bootbox.alert('Vous ne pouvez pas ajouter un nom de couleur vide !');
		return false;
	}
	for (i=0 ; i<dataCouleurs.length ; i++)
	{
		if (accentsTidy(dataCouleurs[i]['nom']) == accentsTidy(document.getElementById('nomCouleur_a_ajouter').value).trim())
		{
			bootbox.alert('Vous ne pouvez pas ajouter un nom de couleur déjà existant !');
			return false;
		}
	}
	if (!isValeurHexadecimale(document.getElementById('codeHexaCouleur_a_ajouter').value) && document.getElementById('codeHexaCouleur_a_ajouter').value.trim() != '')
	{
		bootbox.alert('Vous devez entrer une valeur hexadécimale\nLes caractères autorisés sont 0123456789ABCDEF');
		return false;
	}
	submitGestionCouleursAjax('ajouter', '', document.getElementById('nomCouleur_a_ajouter').value, document.getElementById('codeHexaCouleur_a_ajouter').value);
}

function accentsTidy(chaine)
{ 
	var r=chaine.toLowerCase(); 
	r = r.replace(new RegExp("\\s", 'g'),""); 
	r = r.replace(new RegExp("[àáâãäå]", 'g'),"a"); 
	r = r.replace(new RegExp("æ", 'g'),"ae"); 
	r = r.replace(new RegExp("ç", 'g'),"c"); 
	r = r.replace(new RegExp("[èéêë]", 'g'),"e"); 
	r = r.replace(new RegExp("[ìíîï]", 'g'),"i"); 
	r = r.replace(new RegExp("ñ", 'g'),"n");                             
	r = r.replace(new RegExp("[òóôõö]", 'g'),"o"); 
	r = r.replace(new RegExp("œ", 'g'),"oe"); 
	r = r.replace(new RegExp("[ùúûü]", 'g'),"u"); 
	r = r.replace(new RegExp("[ýÿ]", 'g'),"y"); 
	r = r.replace(new RegExp("\\W", 'g'),""); 
	return r; 
}

function isValeurHexadecimale(valeur)
{
	var re = /^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/;
	if (re.exec(valeur)) return true;
	else return false			 
}

function colorEchantillon(value, echantillon)
{
	document.getElementById(echantillon).style.background = value;
}

function miseEnPage()
{
	document.getElementById('td_couleur_nav').style.width = document.getElementById('td_couleur_titre').offsetWidth;
	document.getElementById('td_nom_nav').style.width = document.getElementById('td_nom_titre').offsetWidth;
	document.getElementById('td_codehexa_nav').style.width = document.getElementById('td_codehexa_titre').offsetWidth;
	document.getElementById('td_action_nav').style.width = document.getElementById('td_action_titre').offsetWidth;
	$("#titreCouleurs").css("width", $("#tableauCouleurs").width());
}

var resizeDelay;

parent.onresize = function()
{
	<?php
		if (!isTactile()) echo "
			clearTimeout(resizeDelay);
			checkBackground();
			resizeDelay = setTimeout('miseEnPage();', 200);
		";
	?>
}

parent.window.onorientationchange = function()
{
	checkBackground();
	miseEnPage();
};
-->
</script>
	
</head>

<body>

	<?php include("./menu.php"); ?>

	<button class="btn btn-default" type="button" id="titreCouleurs">
		Gestion des couleurs <span class="badge" id="nbCouleurs"></span>
	</button>
	
	<div id="enTeteTableauNav">
		<table id="tableauCouleursTitreNav" class="couleur">

			<?php
			/////////////////////////////////////// Copie cachée du tableau de pour avoir un alignement parfait
			$tdHidden = "style='opacity:0;-moz-opacity:0;height:0px;padding:0px 1px;border-width:0px 1px;'";
			$divHidden = "style='text-align:center;height:0px;border-width:0px 1px;'";
			$inputHidden = "height:0px;padding-top:0px;padding-bottom:0px;";
			/////////////////////////////////////////////////////////////////////////////////////
			?>
			<tr class='fonce' valign='top' id='titreHidden_nav'>
				<td class='td_couleur_hidden' <?php echo $tdHidden ?>>
					<div <?php echo $divHidden ?>>
						<input type='text' style='width:50px;<?php echo $inputHidden ?>'>
					</div>
				</td>
				<td class='td_nom_hidden' <?php echo $tdHidden ?>>
					<div <?php echo $divHidden ?>>
						<input type='text' style='width:132px;<?php echo $inputHidden ?>'>
					</div>
				</td>
				<td class='td_codehexa_hidden' <?php echo $tdHidden ?>>
					<div <?php echo $divHidden ?>>
						<input type='text' style='width:80px;<?php echo $inputHidden ?>'>
					</div>
				</td>
				<td class='td_action_hidden' <?php echo $tdHidden ?>>
					<div <?php echo $divHidden ?>>
						<input type='text' style='width:50px;<?php echo $inputHidden ?>'>
					</div>
				</td>
			</tr>
			<tr class="titre" id="titre_nav">
				<td id="td_couleur_nav"></td>
				<td id="td_nom_nav">nom</td>
				<td id="td_codehexa_nav">code hexa</td>
				<td id="td_action_nav">action</td>
			</tr>
		</table>
	</div>

	<table class='couleur' id='tableauCouleurs'>
		<tr class='fonce' valign='top' id='titreHidden_nav'>
			<td class='td_couleur_hidden' <?php echo $tdHidden ?>>
				<div <?php echo $divHidden ?>>
					<input type='text' style='width:50px;<?php echo $inputHidden ?>'>
				</div>
			</td>
			<td class='td_nom_hidden' <?php echo $tdHidden ?>>
				<div <?php echo $divHidden ?>>
					<input type='text' style='width:132px;<?php echo $inputHidden ?>'>
				</div>
			</td>
			<td class='td_codehexa_hidden' <?php echo $tdHidden ?>>
				<div <?php echo $divHidden ?>>
					<input type='text' style='width:80px;<?php echo $inputHidden ?>'>
				</div>
			</td>
			<td class='td_action_hidden' <?php echo $tdHidden ?>>
				<div <?php echo $divHidden ?>>
					<input type='text' style='width:50px;<?php echo $inputHidden ?>'>
				</div>
			</td>
		</tr>
		<tr id='tr_titre' class='titre' align='center'>
			<td id='td_couleur_titre'></td>
			<td id='td_nom_titre'>nom</td>
			<td id='td_codehexa_titre'>code hexa</td>
			<td id='td_action_titre'>action</td>
		</tr>
		<tr id='tr_ajout' style='background-color:#FFFFFF'>
			<td class='td_couleur' style='text-align:center;height:40px;'>&nbsp;<span id='echantillon' style='border:2px #000 solid;font-size:16px;padding:4px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;</td>
			<td class='td_couleur' style='text-align:center;padding:0 2px 0 2px;'><input type='text' class='form-control input-default' id='nomCouleur_a_ajouter' placeholder='nom' value='' maxlength='50' style='width:130px;'></td>
			<td class='td_couleur'><input type='text' class="jscolor{mode:'HSV', position:'bottom', onFineChange:'colorEchantillon(this.toHEXString(), \'echantillon\')'}" id='codeHexaCouleur_a_ajouter' value='' maxlength='6' style='width:80px;text-align:center;'>
			</td>
			<td class='td_couleur' align='center'>
				<button type='button' class='btn btn-default btn-default' id='ajouter' onClick='ajouterCouleur();'>
					<span>ajouter</span>
				</button>
			</td>
		</tr>
	</table>
	
	<div id="spacer" style="height:70px;"></div>

	<script type="text/javascript">

	function submitGestionCouleursAjax(typeRequete, id, nom, codeHexa)
	{
		$.ajax({

		url : 'gestionCouleursAjax.php',

		type : 'POST', // Le type de la requête HTTP

		data : 'typeRequete=' + typeRequete + '&id=' + id + '&nom=' + nom + '&codeHexa=' + codeHexa,

		dataType : 'html',
		
		success : function(code_html, statut) {
		
			//alert(code_html);
			
			// On enlève tous les éléments de l'affichage de la requête précédente
			var nbLignes = document.getElementById('tableauCouleurs').getElementsByTagName('tr').length - 3;
			for (i=0 ; i<nbLignes ; i++)
			{
				ligne = document.getElementById('tr_ligne_' + i);
				ligne.parentNode.removeChild(ligne);
			}

			dataCouleurs = JSON.parse(code_html)['listeCouleurs'];
			for (i=0 ; i<dataCouleurs.length ; i++)
			{
				couleur=i%2==0?'clair':'fonce';
				var ligne = document.createElement('tr');
				ligne.setAttribute('id', 'tr_ligne_' + i);
				ligne.setAttribute('class', couleur);
				ligne.setAttribute('valign', 'middle');
				var span_couleur = document.createElement('span');
				var style_span_couleur = 'border:2px #000 solid;font-size:16px;padding:4px;';
				if (removeAccents(dataCouleurs[i]['nom']).toLowerCase() == 'brillant') style_span_couleur += 'background-image:url(./pics/brillant.png);';
				else if (removeAccents(dataCouleurs[i]['nom']).toLowerCase() == 'multicolore') style_span_couleur += 'background-image:url(./pics/multicolore.png);';
				else style_span_couleur += 'background-color:#' + dataCouleurs[i]['codeHexa'] + ';';
				span_couleur.setAttribute('style', style_span_couleur);
				span_couleur.innerHTML = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				var td_couleur = document.createElement('td');
				td_couleur.setAttribute('style','height:40px;text-align:center;');
				td_couleur.setAttribute('id','id_' + i);
				td_couleur.appendChild(span_couleur);
				ligne.appendChild(td_couleur);
				var td_nom = document.createElement('td');
				td_nom.setAttribute('style','font-weight:bold;text-align:left;padding:0 2px 0 2px;');
				td_nom.setAttribute('id','nom_couleur_' + i);
				td_nom.innerHTML = dataCouleurs[i]['nom'];
				ligne.appendChild(td_nom);
				var td_codeHexa = document.createElement('td');
				td_codeHexa.setAttribute('style','font-weight:bold;text-align:center;padding:0 2px 0 2px;');
				td_codeHexa.innerHTML = '<span id=code_hexa_' + i + '>' + dataCouleurs[i]['codeHexa'] + '</span>';
				ligne.appendChild(td_codeHexa);
				var td_action = document.createElement('td');
				
				var button_edit = document.createElement('button');
				button_edit.setAttribute('type','button');
				button_edit.setAttribute('class','btn btn-default btn-default');
				button_edit.setAttribute('id','edit_' + i);
				button_edit.setAttribute('onclick','editerCouleur(' + i +')');
				button_edit.innerHTML = "<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>";

				var span_spacer = document.createElement('span');
				span_spacer.innerHTML = '&nbsp;';
				
				var button_save = document.createElement('button');
				button_save.setAttribute('type','button');
				button_save.setAttribute('class','btn btn-success btn-default');
				button_save.setAttribute('id','save_' + i);
				button_save.setAttribute('onclick','modifierCouleur(' + i +')');
				button_save.setAttribute('style','display:none;');
				//button_save.innerHTML = "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";
				button_save.innerHTML = "save";
				
				var button_delete = document.createElement('button');
				button_delete.setAttribute('type','button');
				button_delete.setAttribute('class','btn btn-danger btn-default');
				button_delete.setAttribute('id','delete_' + i);
				button_delete.setAttribute('onclick','supprimerCouleur(' + i +')');
				button_delete.innerHTML = "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
				
				td_action.appendChild(button_edit);
				td_action.appendChild(span_spacer);
				td_action.appendChild(button_save);
				td_action.appendChild(button_delete);
				td_action.setAttribute('style','text-align:center;');
				ligne.appendChild(td_action);

				document.getElementById('tableauCouleurs').appendChild(ligne);
				document.getElementById('nbCouleurs').innerHTML = dataCouleurs.length;
				
				document.getElementById('nomCouleur_a_ajouter').value = "";
				document.getElementById('codeHexaCouleur_a_ajouter').value = "FFFFFF";
				$('#codeHexaCouleur_a_ajouter').css('background-color','#FFF');
				$('#echantillon').css('background-color','#FFF');
			}

		},

		error : function(resultat, statut, erreur) {
		},


		complete : function(resultat, statut) {
		}
		
		});

	}
	
	$(document).ready(function() {
		if (innerWidth < resolutionBascule) idToScroll = 'tableauCouleurs';
		else idToScroll = '';
		$().UItoTop({ easingType: 'easeOutQuart', idElementToScroll: idToScroll });
	});

	$(window).scroll(function() {
		var sd = $(window).scrollTop();
		var limite = $('#tableauCouleurs').offset().top;
		$("#enTeteTableauNav").css({
			//'position': 'absolute',
			//'top': 0,
			'left': $('#tableauCouleurs').offset().left - $(window).scrollLeft()
		});
		if (document.getElementById('tableauCouleurs').getElementsByTagName('tr').length > 4)
		{
			if ( sd > limite )
			{
				$("#tableauCouleursTitreNav").css("width", $("#tableauCouleurs").width());
				$("#enTeteTableauNav").fadeIn(600);
			}
			else 
				$("#enTeteTableauNav").fadeOut(400);
		}
	});
	document.getElementById("titrePage").innerHTML = "ADMIN";
	submitGestionCouleursAjax('');
	document.getElementById('enTeteTableauNav').style.display = 'none';
	miseEnPage();

	</script>
	
</body>
</html>