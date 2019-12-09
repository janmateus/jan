<?php 
if (!isset($_SESSION["LOGGED"]) || !isset($_SESSION["CODUSER"])) {
	$_SESSION["LOGGED"]="";
	$_SESSION["CODUSER"]="";
}
if (isset($_GET["logout"])) {
	$_SESSION["LOGGED"]="";
	$_SESSION["CODUSER"]="";
}
?> 