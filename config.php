<?php

$nbrMaxPP = 500; // Le nb de résultats maximal par page

$nbrPPdefaut = 30; // Le nombre de résultats par page par défaut

$resolutionBascule = 768; // Résolution limite entre affichage smartphone et desktop (1050) => simple-sidebar.css

/* langues */
if (isset($_GET["lang"])) $_SESSION["lang"] = $_GET["lang"];
else if (!isset($_SESSION["lang"])) $_SESSION["lang"] = "fr";

if ($_SESSION["lang"] == "fr") {
	include("lang/fr-lang.php");
} 
else if ($_SESSION["lang"] == "en") {
	include('lang/en-lang.php');
}
else if ($_SESSION["lang"] == "es") {
	include('lang/es-lang.php');
}
else if ($_SESSION["lang"] == "de") {
	include('lang/de-lang.php');
}
else if ($_SESSION["lang"] == "it") {
	include('lang/it-lang.php');
}
else {
	$_SESSION["lang"] = "fr";
	include("lang/fr-lang.php");
}

if (isset($_GET["theme"])) $_SESSION["theme"] = $_GET["theme"];
else if (!isset($_SESSION["theme"])) $_SESSION["theme"] = "EscherIrise";

$theme = array();
if ($_SESSION["theme"] == "EscherIrise")
{
	$theme["color-text"] = "#000";
}
if ($_SESSION["theme"] == "EscherNB")
{
	$theme["color-text"] = "#000";
}
if ($_SESSION["theme"] == "GreenTexture")
{
	$theme["color-text"] = "#FFF";
}
if ($_SESSION["theme"] == "GrossesEcailles")
{
	$theme["color-text"] = "#FFF";
}
if ($_SESSION["theme"] == "TortueNinja")
{
	$theme["color-text"] = "#FFF";
}
if ($_SESSION["theme"] == "DarkTexture")
{
	$theme["color-text"] = "#FFF";
}

?>