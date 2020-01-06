<?php
session_start();

require("./util.php");

if (isset($_POST["offset"])) $offset = $_POST["offset"];
if (isset($_POST["nbrPP"])) $nbrPP = $_POST["nbrPP"]; else $nbrPP = 1;
if (isset($_POST["queryParams"])) $queryParams = $_POST["queryParams"];
if (isset($_POST["nbrTotal"])) $nbrTotal = $_POST["nbrTotal"]; else $nbrTotal = 0;

// On effectue la requête suivant les critères choisis

require("./dbConnection.php"); // Page contenant les methodes de connection et les paramètrages sql

dbConnect(); // Connexion à la base de données

$table = getTable();

// $queryStart = début de la requête
$queryStart = "SELECT numero, categorie, materiaux1, materiaux2, materiaux3, couleurs, forme, observations,";
$queryStart.= "internet, poids, longueur, largeur, hauteur, type, tcontinent, tpays, tanneeE, tnumYvert, tprix, annee, prix";
$queryStart.= " FROM $table WHERE 1";

// On récupère la requête

//$queryParams = urldecode($queryParams); // On décode cette portion de la requête pour son execution sql... Apparemment c'est fait automatiquement quand on fait une requête via Ajax...
$queryParams = stripslashes($queryParams); // Mais il reste des antislashes à enlever...

//echo $queryParams;

//logDebug("queryParams:".$queryParams);

//logDebug("offset:".$offset);

if ($nbrTotal == 0)
{
	// Recherche du nb total de résultats de la requête totale
	$queryCountComplete = "SELECT COUNT(numero) FROM $table WHERE 1".$queryParams;
	//logDebug($queryCountComplete);
	$result = mysql_query($queryCountComplete) or die ('Erreur SQL !'.$queryCountComplete.'<br />'.mysql_error());
	$nbrTotal = mysql_fetch_row($result);
	$nbrTotal = $nbrTotal[0];
}
//logDebug($nbrTotal);
$queryParams.= " LIMIT ".($offset-1).",";
$nbrPPreq = $nbrPP; // Le nb de résultats par page indiqué ne change pas automatiquement en dernière page
if (($offset-1 + $nbrPP) > $nbrTotal) $nbrPPreq = $nbrTotal - ($offset-1);
$queryParams.= $nbrPPreq; // Le nb de résultats affichés en dernière page doit être ajusté pour la requête

// Recherche du nb de résultats à renvoyer
$queryCount = "SELECT COUNT(numero) FROM $table WHERE 1".$queryParams;
//logDebug($queryCount);
$result = mysql_query($queryCount) or die ('Erreur SQL !'.$queryCount.'<br />'.mysql_error());
$nbrResultat = mysql_fetch_row($result);
$nbrResultat = $nbrResultat[0];

$query = $queryStart.$queryParams; // Requête

//echo $query;

$result = mysql_query($query) or die ('Erreur SQL !'.$query.'<br />'.mysql_error()); // Execution de la requête

// On récupère les données de la requête

$listeEnregistrements = array();

for($i=0; $i<$nbrPPreq; $i++) // On boucle
{
	$row = mysql_fetch_row($result);
	$numero = $row[0];
	$categorie = $row[1];
	$materiaux1 = $row[2];
	$materiaux2 = $row[3];
	$materiaux3 = $row[4];
	$couleurs = $row[5];
	$forme = $row[6];
	$observations = str_replace ( "\r\n", " ", $row[7] );
	$internet = $row[8];
	$poids = str_replace(".", ",", $row[9]);
	$longueur = str_replace(".", ",", $row[10]);
	$largeur = str_replace(".", ",", $row[11]);
	$hauteur = str_replace(".", ",", $row[12]);
	$type = $row[13];
	$tcontinent = $row[14];
	$tpays = $row[15];
	$tanneeE = $row[16];
	$tnumYvert = $row[17];
	$tprix = $row[18];
	$annee = $row[19];
	$prix = str_replace(".", ",", $row[20]);
	
	// Calcul du chemin de la photo //////////////////////////////////////////////////////////////////
	$paquet = 500;

	$quotient = ($numero - 1) / $paquet;
	$reste = $numero % $paquet;
	$cheminPhotoDebut = str_pad((int)$quotient * $paquet + 1,5,"0",STR_PAD_LEFT);
	$cheminPhotoFin = str_pad(((int)$quotient + 1) * $paquet,5,"0",STR_PAD_LEFT);
	$cheminPhoto = $cheminPhotoDebut."-".$cheminPhotoFin."/";

	$cheminPhoto.= "T".str_pad($numero,5,"0",STR_PAD_LEFT);
	// Tortue 4836 spéciale gif animée
	if ($numero == 4836) $cheminPhoto.=".gif";
	else $cheminPhoto.=".jpg";
	/////////////////////////////////////////////////////////////////////////////////////////////////
	
	$enregistrement = array("numero" => $numero, "categorie" => $categorie, "materiaux1" => $materiaux1, "materiaux2" => $materiaux2, "materiaux3" => $materiaux3, "couleurs" => $couleurs, "forme" => $forme, "observations" => $observations, "internet" => $internet, "poids" => $poids, "longueur" => $longueur, "largeur" => $largeur, "hauteur" => $hauteur, "type" => $type, "tcontinent" => $tcontinent, "tpays" => $tpays, "tanneeE" => $tanneeE, "tnumYvert" => $tnumYvert, "tprix" => $tprix, "annee" => $annee, "prix" => $prix, "cheminPhoto" => $cheminPhoto);
	$listeEnregistrements[$i] = $enregistrement;
}

mysql_free_result($result);
dbDisconnect(); // Déconnexion de la base de données

//echo $numero.";".$categorie.";".$materiaux1.";".$materiaux2.";".$materiaux3.";".$couleurs.";".$forme.";".$observations.";".$internet.";".$poids.";".$longueur.";".$largeur.";".$hauteur.";".$type.";".$tcontinent.";".$tpays.";".$tanneeE.";".$tnumYvert.";".$tprix.";".$annee.";".$prix.";".$cheminPhoto;
//$enregistrement = array("numero" => $numero, "categorie" => $categorie, "materiaux1" => $materiaux1, "materiaux2" => $materiaux2, "materiaux3" => $materiaux3, "couleurs" => $couleurs, "forme" => $forme, "observations" => $observations, "internet" => $internet, "poids" => $poids, "longueur" => $longueur, "largeur" => $largeur, "hauteur" => $hauteur, "type" => $type, "tcontinent" => $tcontinent, "tpays" => $tpays, "tanneeE" => $tanneeE, "tnumYvert" => $tnumYvert, "tprix" => $tprix, "annee" => $annee, "prix" => $prix, "cheminPhoto" => $cheminPhoto,);

$resultat = array("listeTortues" => $listeEnregistrements, "nbrTotal" => $nbrTotal);

echo json_encode($resultat);

?>