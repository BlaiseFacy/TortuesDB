<?php
session_start();

if (isset($_POST["action"])) $action = $_POST["action"]; else $action = "";
if (isset($_POST["numero"])) $numero = $_POST["numero"]; else $numero = "all";

//echo count($_SESSION["tableauSignets"]);

if ($action == "read")
{
	if ($numero == "all") echo json_encode($_SESSION["tableauSignets"]);
	else
	{
		if (array_key_exists($numero, $_SESSION["tableauSignets"])) echo "s";
		else echo "";
	}
}

if ($action == "update")
{
	if (!array_key_exists($numero, $_SESSION["tableauSignets"])) $_SESSION["tableauSignets"][$numero] = "";
	else unset($_SESSION["tableauSignets"][$numero]);
}
?>