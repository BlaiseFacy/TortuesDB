<?php
if (isset($_GET["version"]))
{
	$version = $_GET["version"];
	if ($version == "avecFlash") $_SESSION["version"] = "avecFlash";
	else $_SESSION["version"] = "sansFlash";
}
else if (!isset($_SESSION["version"])) $_SESSION["version"] = "sansFlash";
if (isset($_GET["son"]))
{
	$son = $_GET["son"];
	if ($son == "on") $_SESSION["son"] = "on";
	else $_SESSION["son"] = "off";
}
else if (!isset($_SESSION["son"])) $_SESSION["son"] = "on";
?>

<script language="JavaScript">
<!--

function checkSon()
{
	document.getElementById("musique").style.display = "none";
	var son = "<?php echo $_SESSION["son"] ?>";
	if (son == "on")
	{
		document.getElementById("musique").play();
		document.getElementById("musiqueOn").checked = true;
	}
	else
	{
		document.getElementById("musique").pause();
		document.getElementById("musiqueOff").checked = true;
	}
}

function checkVersion(titre)
{
	var version = "<?php echo $_SESSION["version"] ?>";
	if (version == "avecFlash")
	{
		document.getElementById("menuFlash").style.display = "";
		document.getElementById("enteteFlash").style.display = "";
		document.getElementById("menu").style.display = "none";
		document.getElementById("entete").style.display = "none";	
		$("#hautDePage").css("background-image", "none");
		$("#sidebar-wrapper").css("background-image", "none");
		document.getElementById("boutonFlash").value = "Version du site sans Flash";
		document.getElementById("boutonFlash").title = "Cliquez pour accéder à une version du site sans Flash";
		document.getElementById("titre").innerHTML = "<h1>" + titre + "</h1>";
	}
	else
	{
		document.getElementById("menuFlash").style.display = "none";
		document.getElementById("enteteFlash").style.display = "none";
		document.getElementById("menu").style.display = "";
		document.getElementById("entete").style.display = "";
		$("#hautDePage").css("background-image", "url(./images/FBFy112neg.jpg)");
		$("#sidebar-wrapper").css("background-image", "url(./images/FBFy112.jpg)");
		document.getElementById("musique").pause();
		document.getElementById("boutonFlash").value = "Version du site avec Flash";
		document.getElementById("boutonFlash").title = "Cliquez pour accéder à une version du site avec Flash";
		if (window.innerWidth > 768)
		{
			document.getElementById("boutonFlash").style.display = "";
			document.getElementById("boutonSon").style.display = "";
			document.getElementById("entete").innerHTML = "<h1>COLLECTION DE TORTUES</h1>";
			document.getElementById("titre").innerHTML = "<h1>" + titre + "</h1>";
		}
		else
		{
			document.getElementById("boutonFlash").style.display = "none";
			document.getElementById("boutonSon").style.display = "none";
			document.getElementById("entete").innerHTML = "<h2>COLLECTION DE TORTUES</h2>";
			document.getElementById("titre").innerHTML = "<h2>" + titre + "</h2>";
		}
	}
}

function changeVersionSite()
{
	var version = "<?php echo $_SESSION["version"] ?>";
	if (version == "avecFlash") document.location = "./presentation.php?version=sansFlash";
	else document.location = "./presentation.php?version=avecFlash";
}

function submitGestionSonAjax()
{
	if (document.getElementById("musiqueOn").checked)
	{
		son = "on";
		document.getElementById("musique").play();
	}
	else
	{
		son = "off"
		document.getElementById("musique").pause();
	}
	
	$.ajax({

	url : 'gestionSonAjax.php',

	type : 'POST', // Le type de la requête HTTP

	data : 'son=' + son,

	dataType : 'html',
	
	success : function(code_html, statut) {
	
		//alert(code_html);

	},

	error : function(resultat, statut, erreur) {
	},


	complete : function(resultat, statut) {
	}
	
	});

}

//-->
</script>

<div align="center" id="menu">
	<div class="bouton"><a href="presentation.php">Présentation</a></div>
	<div class="bouton"><a href="raisons.php">Les raisons</a></div>
	<div class="bouton"><a href="outils.php">Les outils</a></div>
	<div class="bouton"><a href="classement.php">Le classement</a></div>
	<div class="bouton"><a href="chiffres.php">Des chiffres</a></div>
	<div class="bouton"><a href="rangement.php">Le rangement</a></div>
	<div class="bouton"><a href="http://rfy2.free.fr" target="_blank">La collection</a></div>
	<div class="bouton"><a href="chercher.php">Je cherche</a></div>
	<div class="bouton"><a href="liens.php">Quelques liens</a></div>
	<div class="bouton"><a href="Anglais.php">Résumé anglais</a></div>
	</br>
	<a href="./Anglais.php"><img src="images/greatbrc.gif" title="English resume. Click to read it !"</img></a></br>
</div>
<div style="text-align:center;" id="menuFlash">
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="300px" height="600px">	
	<param name="movie" value="./images/tortueMenu3b.swf"><param name="quality" value="high">
	<embed src="./images/tortueMenu3b.swf" width="300px" height="600px" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed></object>
	<br>
</div>
<table id="boutonSon" width="100%" border="0">
	<tr>
		<td width="46%" align="right" valign="center">
			<strong>Musique :</strong>
		</td>
		<td width="54%" align="left" valign="center">		
			<input type="radio" name="groupeSon" id="musiqueOn" onClick="submitGestionSonAjax();" checked>On
			<input type="radio" name="groupeSon" id="musiqueOff" onClick="submitGestionSonAjax();">Off
		</td>
	</tr>
</table>
<div align="center">
	<a href="mailto:hfacy@laposte.net"><img src="images/inkcol.gif" width="85" height="74" align="bottom" border="0" title="Cliquez pour me contacter par mail"></a></br>
	<input id="boutonFlash" type ="button" onclick="changeVersionSite('sansFlash');" value="Version du site sans Flash" title="Cliquez pour accéder à une version du site sans Flash"/>
</div>
<br>
