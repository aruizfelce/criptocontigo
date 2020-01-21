<?php include 'encabezado.php'; ?>
<?php include 'usuario.php'; ?>
	<?php

		include("conexion.php");
		$base=getPDO();
		
		if(!isset($_POST["actualizar"])){
			$id=$_GET["id"];
			$titulo= $_GET["tit"];
			$curso= $_GET["curso"];

			$conexion = $base->query("SELECT * FROM informacion WHERE idContenido=$id");
			$registros = $conexion->fetchAll(PDO::FETCH_OBJ);
			foreach($registros as $preguntas):
				$contenido= $preguntas->contenido;
			endforeach; 
		
			//$contenido= $_GET["descrip"];
			
		}	
		else{
			$id=$_POST["id"];
			$titulo= $_POST["titulo"];
			$curso= $_POST["curso"];

			/* $conexion = $base->query("SELECT * FROM informacion WHERE idContenido=$id");
			$registros = $conexion->fetchAll(PDO::FETCH_OBJ);
			foreach($registros as $preguntas):
				$contenido= $preguntas->contenido;
			endforeach;  */

			$contenido= $_POST["contenido"];
			

			$sql="UPDATE informacion SET titulo=:tit, contenido=:descrip WHERE idContenido=:miId";

			$resultado=$base->prepare($sql);

			$resultado->execute(array(":miId"=>$id,":tit"=>$titulo,":descrip"=>$contenido));

			header("Location:informacion.php?curso=$curso");
		}
	?>	

	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<table class="table">
			<thead class="thead-dark">
		  	
		  	    <input name="id" type="hidden" value="<?php echo $id?>"></td>
			<tr>
				<td class="col-12">
					Titulo
					<textarea class="form-control" rows="1" name="titulo"><?php echo $titulo?></textarea>
				</td> 
			</tr>
			<tr>
				<td class="col-12"> 
					Contenido
					<textarea class="form-control" rows="4" name="contenido"><?php echo $contenido?></textarea> 
					<script>
						CKEDITOR.replace( 'contenido' );
					</script>
					<input type="hidden" name="curso" value=<?php echo $curso?> >
				</td>
			</tr>
			<tr>	
				
				<td class="col-1">  <input type="submit" name="actualizar" class="botonimagen" value=""></td>
			</tr>
		</table>
	</form>
</div>