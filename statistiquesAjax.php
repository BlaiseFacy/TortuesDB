<?php
session_start();

require("./util.php");

if (isset($_POST["type"])) $type = $_POST["type"];
if (isset($_POST["tri"])) $tri = $_POST["tri"];
if (isset($_POST["sens"])) $sens = $_POST["sens"];

// On effectue la requête suivant les critères choisis

require("./dbConnection.php"); // Page contenant les methodes de connection et les paramétrages sql

$table = getTable();

// Connexion à la base de données
dbConnect();

// Récupération du nombre de tortues en base pour info sur la page

$queryCountTable = "SELECT count(*) FROM $table";
$result = mysql_query($queryCountTable) or die ('Erreur SQL !'.$queryCountTable.'<br />'.mysql_error());
$nbrTortuesEnBase = mysql_fetch_row($result)[0];
mysql_free_result($result);

$listeCouleursNonRef = array();
$numerosTortues_listeCouleurEnDouble = "";
$numerosTortues_listeCouleurNonRef = "";

// Récupération des couleurs de la table couleurs
if ($type == "couleur")
{
	$tableCouleurs = getTableCouleurs();
	$nbCouleursTable = 0;
		
	$queryCountTableCouleurs = "SELECT count(*) FROM $tableCouleurs";

	$result = mysql_query($queryCountTableCouleurs) or die ('Erreur SQL !'.$queryCountTableCouleurs.'<br />'.mysql_error());
	$nbCouleursTable = mysql_fetch_row($result);
	$nbCouleursTable = $nbCouleursTable[0];
	mysql_free_result($result);

	$queryTableCouleurs = "SELECT LOWER(couleur), code_hexa FROM $tableCouleurs order by couleur ASC";

	$result = mysql_query($queryTableCouleurs) or die ('Erreur SQL !'.$queryTableCouleurs.'<br />'.mysql_error());

	$couleur_nom_liste = "";
	$couleur_code_hexa_liste = "";

	for($i=0; $i<$nbCouleursTable; $i++) // On boucle
	{
		$row = mysql_fetch_row($result);
		// On récupère les couleurs
		$couleur_nom_liste[$i] = $row[0];
		$couleur_code_hexa_liste[$i] = $row[1];
	}

	mysql_free_result($result);

	if ($nbCouleursTable == 0)
	{
		$couleur_nom_liste = array('Blanc','Vert','Noir','Marron','Bleu','Jaune','Or','Rouge','Gris','Crème','Orange','Doré','Rose','Violet','Bordeaux','Verdâtre','Brun','Cuivre','Argent','Beige','Chêne','Bronze','Jaunâtre','Ocre','Turquoise','Ivoire','Mauve','Opaque','Saumon','Ambre','Nacre','Palissandre','Transparent','Rouille','Grenat','Blanc','Écru','Multicolore','Roux','Bois','Cognac','Fuchsia','Kaki','Brillant','Cérusé','Moutarde','Paille','Rosâtre','Terre','Anthracite','Argile','Brique','Diamant','Fer','Kraft','Laiton','Lilas','Marine','Opale');
	}
	// Récupération des couleurs renseignées en base
	// Traitement pour détecter les couleurs non référencées
	if (isset($_SESSION["accesPrix"]) && $_SESSION["accesPrix"] == "oui")
	{
		$queryCountCouleurs = "SELECT count(couleurs), numero FROM $table WHERE trim(couleurs) not like ''";

		$result = mysql_query($queryCountCouleurs) or die ('Erreur SQL !'.$queryCountCouleurs.'<br />'.mysql_error());
		$nbCouleursRenseignees = mysql_fetch_row($result);
		$nbCouleursRenseignees = $nbCouleursRenseignees[0];
		mysql_free_result($result);

		$queryCouleurs = "SELECT LOWER(couleurs), numero FROM $table WHERE trim(couleurs) not like ''";

		$result = mysql_query($queryCouleurs) or die ('Erreur SQL !'.$queryCouleurs.'<br />'.mysql_error());

		$couleursRenseignees_liste = array();
		$numerosTortues_associes = array();
		$numerosTortues_listeCouleurNonRef = array();
		for($i=0; $i<$nbCouleursRenseignees; $i++) // On boucle
		{
			$row = mysql_fetch_row($result);
			// On récupère les couleurs
			$couleursRenseignees_liste[$i] = $row[0];
			$numerosTortues_associes[$i] = $row[1];
		}
		mysql_free_result($result);

		$r=0;
		$nr=0;
		$listeCouleursUtilisees = array();
		$liste = "";
		$couleurRenseigne = "";
		for($i=0; $i<$nbCouleursRenseignees; $i++) // On boucle
		{
			$liste = $couleursRenseignees_liste[$i];
			/*
			$liste = str_replace(",,",",",$liste);
			$liste = str_replace("?","",$liste);
			$liste = str_replace(")","",$liste);
			$liste = str_replace("(","",$liste);
			$liste = str_replace("&","",$liste);
			*/
			$liste = str_replace("couleurs","",$liste); // n'est pas une couleur
			$liste = str_replace("couleur","",$liste); // n'est pas une couleur
			$liste = str_replace("macrame","",$liste); // n'est pas une couleur
			$liste = str_replace("crame","",$liste); // n'est pas une couleur
			$liste = str_replace("dominante","",$liste); // n'est pas une couleur
			$liste = str_replace("naturel","",$liste); // n'est pas une couleur
			$liste = str_replace("non","",$liste); // n'est pas une couleur
			$liste = str_replace("variable","",$liste); // n'est pas une couleur
			$liste = str_replace("toutes","",$liste); // n'est pas une couleur
			$liste = trim($liste);
			$listeTableau = explode(",",$liste);
			for($j=0; $j<count($listeTableau); $j++)
			{
				$couleurRenseigne = trim($listeTableau[$j]);
				if (trim($couleurRenseigne) != "" && (strlen($couleurRenseigne) > 2 || $couleurRenseigne == "or") )
				{
					if (!in_array($couleurRenseigne, $listeCouleursUtilisees) && !in_array($couleurRenseigne, $listeCouleursNonRef))
					{
						$couleurIdentifie = false;
						for($k=0; $k<count($couleur_nom_liste); $k++)
						{	
							// On cherche si la couleur renseignée en base contient le nom d'une couleur de la table des couleurs
							//$pos = strpos($couleurRenseigne, $couleur_nom_liste[$k]);
							//if ($pos !== false) // Opérateur spécial pour ne pas confondre le retour false et la position 0 de la chaîne trouvée
							if ($couleurRenseigne == $couleur_nom_liste[$k])
							{
								$couleurIdentifie = true;
								if (!in_array($couleur_nom_liste[$k], $listeCouleursUtilisees))
								{
									$listeCouleursUtilisees[$r] = $couleur_nom_liste[$k];
									$r++;
								}
							}
							// Si il n'y a qu'une différence d'accents, on ne met pas la couleur dans la liste des couleurs à référencer
							// $pos = strpos(wd_remove_accents($couleurRenseigne), wd_remove_accents($couleur_nom_liste[$k]));
							// if ($pos !== false) // Opérateur spécial pour ne pas confondre le retour false et la position 0 de la chaîne trouvée
							if (wd_remove_accents($couleurRenseigne) == wd_remove_accents($couleur_nom_liste[$k]))
							{
								$couleurIdentifie = true;
							}
						}
						if (!$couleurIdentifie)
						{
							$listeCouleursNonRef[$nr] = $couleurRenseigne;
							$nr++;
							// On ajoute le numéro de la tortue qui a une couleur non référencée
							$numerosTortues_listeCouleurNonRef[$couleurRenseigne] = $numerosTortues_associes[$i];
						}
					}
					elseif (in_array($couleurRenseigne, $listeCouleursNonRef))
					{
						// On ajoute tous les numéros de tortues qui ont la même couleur non référencée
						$numerosTortues_listeCouleurNonRef[$couleurRenseigne] = $numerosTortues_listeCouleurNonRef[$couleurRenseigne].", ".$numerosTortues_associes[$i];
					}
				}
			}
			// Detection des couleurs en double
			for($n=0; $n<count($couleur_nom_liste); $n++)
			{
				if (strlen($couleur_nom_liste[$n]) > 2)
				{
					$pos = strpos($liste, $couleur_nom_liste[$n]);
					if ($pos !== false)
					{
						$posDouble = strpos($liste, $couleur_nom_liste[$n], $pos + strlen($couleur_nom_liste[$n]));
						if ($posDouble !== false)
						{
							if ($numerosTortues_listeCouleurEnDouble != "") $numerosTortues_listeCouleurEnDouble = $numerosTortues_listeCouleurEnDouble.", ";
							$numerosTortues_listeCouleurEnDouble = $numerosTortues_listeCouleurEnDouble."".$numerosTortues_associes[$i];
						}
					}
				}
			}
		}
		
		for($i=0; $i<count($couleur_nom_liste); $i++)
		{
			$couleur_nom_liste[$i] = mb_ucfirst($couleur_nom_liste[$i]);
		}

		usort($listeCouleursNonRef, "wd_unaccent_compare");		
	}
}

if ($type == "")
{
	$nbrItem = 0;
}
else
{
	// Formatage des paramètres
	$typeSql = $type;
	$sensSql = "ASC";
	if ($sens == "croissant") $sensSql = "ASC";
	if ($sens == "decroissant") $sensSql = "DESC";
	if ($tri == "nombre") $triSql = "total"." ".$sensSql.", ".$typeSql." ASC";
	else $triSql = $typeSql." ".$sensSql;

	$longueurSql = "longueur";
	$largeurSql = "largeur";
	$hauteurSql = "hauteur";
	
	// Recherche du nb total de résultats
	$queryStatCount = "SELECT count(distinct $typeSql) FROM $table";
	if ($type == "taille")
	{
		$queryStatCount = "SELECT count(distinct round(greatest($longueurSql, $largeurSql, $hauteurSql), 1)) FROM $table";
	}
	if ($type == "volume")
	{
		$queryStatCount = "SELECT count(distinct round($longueurSql*$largeurSql*$hauteurSql, 2)) FROM $table";
	}
	if ($type == "materiaux")
	{
		$queryStatCount = "
		SELECT count(distinct materiaux) FROM
		(
			( SELECT materiaux1 as materiaux, count( materiaux1 ) AS total
			FROM table_tortues
			GROUP BY materiaux1 )
			UNION
			( SELECT materiaux2 as materiaux, count( materiaux2 ) AS total
			FROM table_tortues WHERE trim(materiaux2) != ''
			GROUP BY materiaux2 )
			UNION
			( SELECT materiaux3 as materiaux, count( materiaux3 ) AS total
			FROM table_tortues WHERE trim(materiaux3) != ''
			GROUP BY materiaux3 )
		) table_temp";
	}
	if ($type == "couleur")
	{
		if ($nbCouleursTable == 0) $queryStatCount = "SELECT ".count($couleur_nom_liste);
		else
		{
			$queryStatCount = "SELECT count(total) FROM (";
			for ($i=0 ; $i<$nbCouleursTable ; $i++)
			{
				$couleur_nom_listeSql = str_replace("'","''",$couleur_nom_liste[$i]); // On double la simple cote pour éviter un bug sql à la requête
				if ($i > 0) $queryStatCount .= " UNION ";
				$queryStatCount .= "( SELECT '".$couleur_nom_listeSql."' as couleur, count(*) as total FROM $table WHERE couleurs like '%".$couleur_nom_listeSql."%')";	
			}
			$queryStatCount.= " ) table_temp ";
			$queryStatCount.= "WHERE total > 0";
		}
	}
	if ($type == "prix")
	{
		$queryStatCount = "SELECT count(distinct round($typeSql, 0)) FROM $table";
	}
	//logDebug($queryStatCount);
	$result = mysql_query($queryStatCount) or die ('Erreur SQL !'.$queryStatCount.'<br />'.mysql_error());
	$nbrItem = mysql_fetch_row($result);
	$nbrItem = $nbrItem[0];
	mysql_free_result($result);
	//logDebug($nbrItem);
	
	$queryStat = "SELECT $typeSql, count($typeSql) as total FROM $table group by $typeSql order by $triSql";

	if ($type == "taille")
	{
		$queryStat = "SELECT round(greatest($longueurSql, $largeurSql, $hauteurSql), 1) as taille, count(greatest($longueurSql, $largeurSql, $hauteurSql)) as total FROM $table group by greatest($longueurSql, $largeurSql, $hauteurSql) order by $triSql";
	}
	if ($type == "volume")
	{
		$queryStat = "SELECT round($longueurSql*$largeurSql*$hauteurSql, 2) as volume, count($longueurSql*$largeurSql*$hauteurSql) as total FROM $table group by $typeSql order by $triSql";
	}
	if ($type == "materiaux")
	{
		$queryStat = "
		SELECT materiaux, SUM(total) as total FROM
		(
			( SELECT materiaux1 as materiaux, count( materiaux1 ) AS total
			FROM table_tortues
			GROUP BY materiaux1 )
			UNION
			( SELECT materiaux2 as materiaux, count( materiaux2 ) AS total
			FROM table_tortues WHERE trim(materiaux2) != ''
			GROUP BY materiaux2 )
			UNION
			( SELECT materiaux3 as materiaux, count( materiaux3 ) AS total
			FROM table_tortues WHERE trim(materiaux3) != ''
			GROUP BY materiaux3 )
		) table_temp
		GROUP BY materiaux
		order by $triSql";
	}
	if ($type == "couleur")
	{
		$queryStat = "SELECT couleur, total FROM (";
		for ($i=0 ; $i<count($couleur_nom_liste) ; $i++)
		{
			$couleur_nom_listeSql = str_replace("'","''",$couleur_nom_liste[$i]); // On double la simple cote pour éviter un bug sql à la requête			
			if ($i > 0) $queryStat .= " UNION ";
			$queryStat .= "( SELECT '".$couleur_nom_listeSql."' as couleur, count(*) as total FROM $table WHERE couleurs like '%".$couleur_nom_listeSql."%')";	
		}
		$queryStat.= " ) table_temp ";
		$queryStat.= "WHERE total > 0 order by $triSql";
	}
	if ($type == "prix")
	{
		$queryStat = "SELECT round($typeSql, 0) as prix, count(round($typeSql,0)) as total FROM $table group by $typeSql order by $triSql";
	}
	
	//logDebug($queryStat);

	$result = mysql_query($queryStat) or die ('Erreur SQL !'.$queryStat.'<br />'.mysql_error());
}

$listeEnregistrements = array();

for ($i=0 ; $i<$nbrItem ; $i++)
{
	$row = mysql_fetch_row($result);
	$typeItem = $row[0];
	//if ($type == "taille") $typeItem = number_format($typeItem, 1, ',', ' ');
	//if ($type == "volume") $typeItem = number_format($typeItem, 2, ',', ' ');
	//if ($type == "prix") $typeItem = number_format($typeItem, 0, ',', ' ');
	if ($type == "taille" || $type == "volume" || $type == "poids" || $type == "prix") $typeItem = str_replace('.', ',', $typeItem);
	$nombreItem = $row[1];
	$enregistrement = array("type" => $typeItem, "nombre" => $nombreItem);
	$listeEnregistrements[$i] = $enregistrement;
}

mysql_free_result($result);
dbDisconnect(); // Déconnexion de la base de données

$resultat = array("listeStats" => $listeEnregistrements, "nbrTotal" => $nbrTortuesEnBase, "nbrItem" => $nbrItem, "listeCouleursNonRef" => $listeCouleursNonRef, "listeNumerosCouleurNonRef" => $numerosTortues_listeCouleurNonRef, "listeNumerosCouleurEnDouble" => $numerosTortues_listeCouleurEnDouble);

echo json_encode($resultat);

?>