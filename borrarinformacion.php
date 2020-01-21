<?php
	include("conexion.php");
	$base=getPDO();

	$id=$_GET["id"];
	$curso=$_GET["curso"];
	$base->query("DELETE FROM informacion WHERE idContenido='$id'");
	header("Location:informacion.php?curso=$curso");

?>