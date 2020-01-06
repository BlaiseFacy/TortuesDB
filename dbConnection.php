<?php

function dbConnect()
{
	// On prepare la connexion au serveur MySQL
	$host = "localhost";
	$user = "root";
	$password = "root";
	$base = "rfy2";

	// Connexion
	mysql_connect($host, $user, $password) or die ("impossible de se connecter au serveur");
	mysql_select_db($base) or die ("impossible de se connecter a la base de donnees");
	mysql_query("SET NAMES UTF8");
}

function getTable()
{
	return "table_tortues";
}

function getTableMaj()
{
	return "table_tortues_maj";
}

function getTableMdp()
{
	return "table_tortues_mdp";
}

function getTableCouleurs()
{
	return "table_tortues_couleurs";
}

function dbDisconnect()
{
	mysql_close();
}

?>