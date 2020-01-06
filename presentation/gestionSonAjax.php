<?php
session_start();

$son = $_POST["son"];
$_SESSION["son"] = $son;
?>