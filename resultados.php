
	<?php include 'encabezado.php'; ?>
    <?php include 'usuario.php'; ?>
	<?php
		include("conexion.php");
		$base=getPDO();
		$curso=$_GET["curso"];
		
		$conexion = $base->query("SELECT titulo FROM cursos WHERE idCurso=$curso");
		$registros = $conexion->fetchAll(PDO::FETCH_OBJ);
		
		foreach($registros as $cursos):
			$titulocurso=$cursos->titulo;
		endforeach;
//**********************PAGINACION*****************************
        
        if(isset($_GET["pagina"])){
			if($_GET["pagina"]==1)
				header("Location:resultado.php/?".$curso);
			else
				$pagina=$_GET["pagina"];
		}else
				$pagina=1;
				
		$filaspaginas=10;
		
		$empezar_desde = ($pagina-1) * $filaspaginas;
		
		$conexion = $base->query("SELECT puntuaciones.*, usuarios.nombre, usuarios.apellido FROM puntuaciones INNER JOIN usuarios ON puntuaciones.usuario=usuarios.id WHERE Curso=$curso LIMIT $empezar_desde,$filaspaginas");
		$registros = $conexion->fetchAll(PDO::FETCH_OBJ);

        $sql_total = "SELECT puntuaciones.*, usuarios.nombre, usuarios.apellido FROM puntuaciones INNER JOIN usuarios ON puntuaciones.usuario=usuarios.id WHERE Curso=$curso";
	
		$resultado = $base->prepare($sql_total);
		
		$resultado->execute(array());

		$numfilas=$resultado->rowCount();

		$totalpaginas = ceil($numfilas / $filaspaginas);

//*****************************FIN PAGINACION*******************		

		

	?>

 
  <div class="container-fluid">
    <h2>Curso de <?php echo $titulocurso ?></h2>
	<table class="table">
		<thead class="thead-dark">
			<tr class="d-flex">
				<!-- <th>Id</th>  -->
				<th class="col-6">Usuario</th>
				
				<th class="col-4">Puntaje</th>
				<th class="col-2">Opciones</th>
			</tr>
		</thead>
		<?php foreach($registros as $titulos):?>
		 <tbody>
			<tr class="d-flex">
				
				<td class="col-6"><?php echo $titulos->nombre . " " . $titulos->apellido?> </td>	
				
				<td class="col-4"><?php echo $titulos->puntaje . "/" . $titulos->cantidadpreguntas?> </td>	
				<td class="col-2">
					<a href="borrarinformacion.php?id=<?php echo $titulos->idContenido?>&curso=<?php echo $curso?>"><img src="img/borrar.png" alt="x"></a> 
				</td>
			</tr>
		<?php endforeach;?>	
		</tbody>
	 </table>
	</div>
	<nav >
   <ul class="pagination justify-content-center pagination-lg">
	<?php  
		for($i=1;$i<=$totalpaginas;$i++){
			if($i>1)
				echo "<li class='page-item'> <a class='page-link' href='?curso=$curso&pagina=" . $i . "'>" . $i . "</a>  "; 
			else
				echo "<li class='page-item'> <a class='page-link' href='?curso=$curso'>" . $i . "</a>  "; 
		}	
	?>
   </ul>
  </nav>
	
 
  
  
	
</div>

<?php include 'pie.php'; ?>