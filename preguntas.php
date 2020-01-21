
	<?php include 'encabezado.php'; ?>
    <?php include 'usuario.php'; ?>
	<?php
		include("conexion.php");
		$base=getPDO();
		
		if(!ISSET($_POST["insertar"])){
			$curso=$_GET["curso"];
		}else{
			$curso=$_GET["curso"];

		}
//**********************PAGINACION*****************************
		
        
        if(isset($_GET["pagina"])){
			if($_GET["pagina"]==1)
				header("Location:preguntas.php/?".$curso);
			else
				$pagina=$_GET["pagina"];
		}else
				$pagina=1;

		$filaspaginas=10;

		$empezar_desde = ($pagina-1) * $filaspaginas;

		$conexion = $base->query("SELECT * FROM cursos WHERE idCurso=$curso");
		$registros = $conexion->fetchAll(PDO::FETCH_OBJ);
		foreach($registros as $preguntas):
			$titulocurso= $preguntas->titulo;
		endforeach; 	

		$conexion = $base->query("SELECT * FROM cuestionario WHERE curso=$curso LIMIT $empezar_desde,$filaspaginas");
		$registros = $conexion->fetchAll(PDO::FETCH_OBJ);

        $sql_total = "SELECT * FROM cuestionario WHERE curso=$curso";
	
		$resultado = $base->prepare($sql_total);
		
		$resultado->execute(array());

		$numfilas=$resultado->rowCount();

		$totalpaginas = ceil($numfilas / $filaspaginas);

//*****************************FIN PAGINACION*******************		

		if(ISSET($_POST["insertar"])){
			$pregunta = $_POST["pregunta"];
			$respuesta1 = $_POST["respuesta1"];
			$respuesta2 = $_POST["respuesta2"];
			$respuesta3 = $_POST["respuesta3"];
			$respuesta4 = $_POST["respuesta4"];
			$correcta = $_POST["correcta"];
			$curso = $_POST["curso"];
			
			$sql="INSERT INTO cuestionario (pregunta,respuesta1,respuesta2,respuesta3,respuesta4,correcta,curso) 
			      VALUES(:preg,:resp1,:resp2,:resp3,:resp4,:corr,:curs)";
			$resultado=$base->prepare($sql);
			$resultado->execute(array(":preg"=>$pregunta,":resp1"=>$respuesta1,":resp2"=>$respuesta2,":resp3"=>$respuesta3,":resp4"=>$respuesta4,":corr"=>$correcta,":curs"=>$curso));
			header("Location:preguntas.php?curso=$curso");
		}

	?>

  <form action="<?php echo $_SERVER['PHP_SELF'] . "?curso=" .$curso;?>" method="post">
  <div class="container-fluid">
	<table class="table">
		<thead class="thead-dark">
			<tr class="d-flex">
				<!-- <th>Id</th>  -->
				<th class="col-2">Pregunta</th>
				<th class="col-2">Respuesta1</th>
				<th class="col-2">Respuesta2</th>
				<th class="col-2">Respuesta3</th>
				<th class="col-2">Respuesta4</th>
				<th class="col-1">Sol.</th>
				<th class="col-1">Opciones</th>

			</tr>
		</thead>
		<?php foreach($registros as $preguntas):?>
		 <tbody>
			<tr class="d-flex">
				<!-- <td><?php echo $preguntas->idpregunta?></td>  -->
				<td class="col-2"><?php echo $preguntas->pregunta?> </td>	
				<td class="col-2"><?php echo $preguntas->respuesta1?></td>	
				<td class="col-2"><?php echo $preguntas->respuesta2?></td> 
				<td class="col-2"><?php echo $preguntas->respuesta3?></td> 
				<td class="col-2"><?php echo $preguntas->respuesta4?></td> 
				<td class="col-1"><?php echo $preguntas->correcta?></td> 
				<td class="col-1">
					<a href="borrar.php?id=<?php echo $preguntas->idpregunta?>"><img src="img/borrar.png" alt="x" /></a> 
					<!-- <a href="editar.php?id=<?php echo $preguntas->idpregunta?> &
									preg=<?php echo $preguntas->pregunta?> &
									resp1=<?php echo $preguntas->respuesta1?> &
									resp2=<?php echo $preguntas->respuesta2?> &
									resp3=<?php echo $preguntas->respuesta3?>&
									resp4=<?php echo $preguntas->respuesta4?>&
									corr=<?php echo $preguntas->correcta?>		
					        ">	 -->
							<a href="editar.php?id=<?php echo $preguntas->idpregunta?>">
						<input type="button" 
							   name="actualizar" 
							   style="background-color:transparent; border-color:transparent;"> 
							   <img src="img/editar.png" height="25">
						
					</a>	
				</td>
			</tr>
		<?php endforeach;?>	
		</tbody>
	 </table>
	</div>
	<nav >
   <ul class="pagination justify-content-center pagination-lg">
	<?php  
	/* 	for($i=1;$i<=$totalpaginas;$i++)
			echo "<li class='page-item'> <a class='page-link' href='?pagina=" . $i . "'>" . $i . "</a>  ";  */
			for($i=1;$i<=$totalpaginas;$i++){
				if($i>1)
					echo "<li class='page-item'> <a class='page-link' href='?curso=$curso&pagina=" . $i . "'>" . $i . "</a>  "; 
				else
					echo "<li class='page-item'> <a class='page-link' href='?curso=$curso'>" . $i . "</a>  "; 
			}	
	?>
   </ul>
  </nav>
	<table class="table">
		<tr class="d-flex">
			<br>
			<h3>Agregar Pregunta</h3>
			<td class="col-2"><textarea class="form-control" rows="4"  name="pregunta"></textarea></td>
			<td class="col-2"><textarea  class="form-control" rows="4" name="respuesta1"></textarea></td>
			<td class="col-2"><textarea  class="form-control" rows="4"  name="respuesta2"></textarea></td> 
			<td class="col-2"><textarea  class="form-control" rows="4"  name="respuesta3"></textarea></td> 
			<td class="col-2"><textarea  class="form-control" rows="4"  name="respuesta4"></textarea></td> 
			<td class="col-1">
				<input class="form-control" type="number" name="correcta">
				<input type="hidden" name="curso" value="<?php echo $curso ?>">
			</td> 
			
			<td class="col-1"><button class="btn btn-default" type="submit" name="insertar"><img src="img/guardar.png" width="40"/></button></td>
		</tr>
     </table> 
 
  </form>
 
	
</div>

<?php include 'pie.php'; ?>