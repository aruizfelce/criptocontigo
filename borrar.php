<?php
	include("conexion.php");
	$base=getPDO();

	$id=$_GET["id"];
	$base->query("DELETE FROM cuestionario WHERE idpregunta='$id'");
	header("Location:preguntas.php");

?>