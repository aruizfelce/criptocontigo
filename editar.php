<?php include 'encabezado.php'; ?>
<?php include 'usuario.php'; ?>
	<?php

		include("conexion.php");
		$base=getPDO();
		
		if(!isset($_POST["actualizar"])){
			$id=$_GET["id"];
			/* $pregunta = $_GET["preg"];
			$respuesta1 = $_GET["resp1"];
			$respuesta2 = $_GET["resp2"];
			$respuesta3 = $_GET["resp3"];
			$respuesta4 = $_GET["resp4"];
			$correcta = $_GET["corr"];
			$curso= $_GET["curso"]; */
			
			$conexion = $base->query("SELECT * FROM cuestionario WHERE idPregunta=$id");
			$registros = $conexion->fetchAll(PDO::FETCH_OBJ);
			foreach($registros as $preguntas):
				
				$pregunta = $preguntas->pregunta;
				$respuesta1 =$preguntas->respuesta1;
				$respuesta2 = $preguntas->respuesta2;
				$respuesta3 = $preguntas->respuesta3;
				$respuesta4 = $preguntas->respuesta4;
				$correcta = $preguntas->correcta;
				$curso= $preguntas->curso;
			endforeach; 
		}	
		else{
			$id=$_POST["id"];
			$pregunta = $_POST["pregunta"];
			$respuesta1 = $_POST["respuesta1"];
			$respuesta2 = $_POST["respuesta2"];
			$respuesta3 = $_POST["respuesta3"];
			$respuesta4 = $_POST["respuesta4"];
			$correcta = $_POST["correcta"];
			$curso= $_POST["curso"];

			$sql="UPDATE cuestionario SET pregunta=:preg, respuesta1=:resp1, respuesta2=:resp2, respuesta3=:resp3, respuesta4=:resp4, correcta=:correc, curso=:curs 
			      WHERE idpregunta=:miId";

			$resultado=$base->prepare($sql);

			$resultado->execute(array(":miId"=>$id,":preg"=>$pregunta,":resp1"=>$respuesta1,":resp2"=>$respuesta2,
			                          ":resp3"=>$respuesta3,":resp4"=>$respuesta4, ":correc"=>$correcta, ":curs"=>$curso
		                       ));

			header("Location:preguntas.php?curso=$curso");
		}
	?>	

	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<table class="table">
			<thead class="thead-dark">
		  	<tr>
		  		<th class="col-2">Pregunta</th>
				<th class="col-2">Respuesta1</th>
				<th class="col-2">Respuesta2</th>
				<th class="col-2">Respuesta3</th>
				<th class="col-2">Respuesta4</th>
				<th class="col-1">Sol.</th>
				<th class="col-1">Opciones</th>
			</tr>	
		  	    <input name="id" type="hidden" value="<?php echo $id?>"></td>
			<tr>
				<td class="col-2"><textarea class="form-control" rows="4" name="pregunta"><?php echo $pregunta?></textarea></td> 
				<td class="col-2"> <textarea class="form-control" rows="4" name="respuesta1"><?php echo $respuesta1?></textarea> </td>
				<td class="col-2"> <textarea class="form-control" rows="4" name="respuesta2"><?php echo $respuesta2?></textarea></td> 
				<td class="col-2"><textarea class="form-control" rows="4" name="respuesta3"><?php echo $respuesta3?></textarea></td> 
				<td class="col-2"><textarea class="form-control" rows="4" name="respuesta4"><?php echo $respuesta4?></textarea></td> 
				<td class="col-1">
				     <input type="number" class="form-control" name="correcta" value="<?php echo $correcta?>">
					 <input type="hidden" name="curso" value="<?php echo $curso?>">
				</td>

				
				<td class="col-1">  <input type="submit" name="actualizar" class="botonimagen" value=""></td>
			</tr>
		</table>
	</form>
</div>