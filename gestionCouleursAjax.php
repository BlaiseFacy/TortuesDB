<?php
session_start();

require("./util.php");

if (isset($_POST["typeRequete"])) $typeRequete = $_POST["typeRequete"]; else $typeRequete = "";
if (isset($_POST["id"])) $id = $_POST["id"]; else $id = "";
if (isset($_POST["nom"])) $nom = $_POST["nom"]; else $nom = "";
if (isset($_POST["codeHexa"])) $codeHexa = $_POST["codeHexa"]; else $codeHexa = "";

require("./dbConnection.php"); // Page contenant les methodes de connection et les paramétrages sql

// Connexion à la base de données
dbConnect();

$tableCouleurs = getTableCouleurs();

// Construction de la requête d'update sur la table des couleurs
$queryUpdate = "";
if ($typeRequete == "ajouter")
{
	$queryIdMax = "SELECT MAX(id) FROM ".$tableCouleurs;
	$result = mysql_query($queryIdMax) or die ('Erreur SQL !'.$queryIdMax.'<br />'.mysql_error());
	$maxId = mysql_fetch_row($result);
	$maxId = $maxId[0];
	mysql_free_result($result);
	$queryUpdate = "INSERT INTO ".$tableCouleurs." VALUES (".($maxId + 1).", '".mb_ucfirst($nom)."', UPPER('".$codeHexa."'))";
}
if ($typeRequete == "modifier")
{
	$queryUpdate = "UPDATE ".$tableCouleurs." SET couleur = '".$nom."', code_hexa = '".$codeHexa."' WHERE id = ".$id;
}

if ($typeRequete == "supprimer")
{
	$queryUpdate = "DELETE FROM ".$tableCouleurs." WHERE id = ".$id;
}
if ($queryUpdate != "")
{
	//logDebug($queryUpdate);
	$result = mysql_query($queryUpdate) or die ('Erreur SQL !'.$queryUpdate.'<br />'.mysql_error());
}	
// Récupération des couleurs de la table couleurs

$queryCountTableCouleurs = "SELECT count(*) FROM $tableCouleurs";
$result = mysql_query($queryCountTableCouleurs) or die ('Erreur SQL !'.$queryCountTableCouleurs.'<br />'.mysql_error());
$nbCouleursTable = mysql_fetch_row($result);
$nbCouleursTable = $nbCouleursTable[0];
mysql_free_result($result);

$queryTableCouleurs = "SELECT id, couleur, code_hexa FROM $tableCouleurs order by couleur ASC";
$result = mysql_query($queryTableCouleurs) or die ('Erreur SQL !'.$queryTableCouleurs.'<br />'.mysql_error());
$couleur_nom_liste = "";
$couleur_code_hexa_liste = "";

for($i=0; $i<$nbCouleursTable ; $i++) // On boucle
{
	$row = mysql_fetch_row($result);
	// On récupère les couleurs
	$enregistrement = array("id" => $row[0], "nom" => $row[1], "codeHexa" => $row[2]);
	$listeEnregistrements[$i] = $enregistrement;
}

mysql_free_result($result);
dbDisconnect(); // Déconnexion de la base de données

$resultat = array("listeCouleurs" => $listeEnregistrements);

echo json_encode($resultat);

?>