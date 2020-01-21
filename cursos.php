
	<?php include 'encabezado.php'; ?>
    <?php include 'usuario.php'; ?>
	<?php
		include("conexion.php");
		$base=getPDO();
		$profesor=$_SESSION["idusuario"];
		$administrador=$_SESSION["administrador"];
//**********************PAGINACION*****************************
		
        
        if(isset($_GET["pagina"])){
			if($_GET["pagina"]==1)
				header("Location:cursos.php");
			else
				$pagina=$_GET["pagina"];
		}else
				$pagina=1;

		$filaspaginas=10;

		$empezar_desde = ($pagina-1) * $filaspaginas;
		if($administrador==1)
			$conexion = $base->query("SELECT * FROM cursos WHERE profesor=$profesor LIMIT $empezar_desde,$filaspaginas");
		else
			$conexion = $base->query("SELECT * FROM cursos  LIMIT $empezar_desde,$filaspaginas");
		$registros = $conexion->fetchAll(PDO::FETCH_OBJ);

        if($administrador==1)
			$sql_total = "SELECT * FROM cursos";
		else
			$sql_total = "SELECT * FROM cursos WHERE profesor=$profesor";
		
	
		$resultado = $base->prepare($sql_total);
		
		$resultado->execute(array());

		$numfilas=$resultado->rowCount();

		$totalpaginas = ceil($numfilas / $filaspaginas);

//*****************************FIN PAGINACION*******************		

		if(ISSET($_POST["insertar"])){
			$titulo = $_POST["titulo"];
			$descripcion = $_POST["descripcion"];
			
			
			$sql="INSERT INTO cursos (titulo,descripcion,profesor) 
			      VALUES(:tit,:descrip,:profe)";
			$resultado=$base->prepare($sql);
			$resultado->execute(array(":tit"=>$titulo,":descrip"=>$descripcion,":profe"=>$profesor));
			header("Location:cursos.php");
		}

	?>

  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <div class="container-fluid">
	<table class="table">
		<thead class="thead-dark">
			<tr class="d-flex">
				<!-- <th>Id</th>  -->
				<th class="col-3">Titulo</th>
				<th class="col-5">Descripcion</th>
				<th class="col-4">Opciones</th>
			</tr>
		</thead>
		<?php foreach($registros as $titulos):?>
		 <tbody>
			<tr class="d-flex">
				<!-- <td><?php echo $titulos->idCurso?></td>  -->
				<td class="col-3"><?php echo $titulos->titulo?> </td>	
				<td class="col-5"><?php echo $titulos->descripcion?></td>	
				<td class="col-4">
					<a href="borrarcurso.php?id=<?php echo $titulos->idCurso?>"><img src="img/borrar.png" alt="x" /></a> 
					<a href="editarcursos.php?id=<?php echo $titulos->idCurso?> &
									tit=<?php echo $titulos->titulo?> &
									descrip=<?php echo $titulos->descripcion?>	
					        ">	
								
						<input type="button" 
							   name="actualizar" 
							   style="background-color:transparent; border-color:transparent;"> 
							   <img src="img/editar.png" height="25">
						
					</a>	
					<script>
						$(function () {
								$('[data-toggle="tooltip"]').tooltip()
					})
					</script>
					<a href="informacion.php?curso=<?php echo $titulos->idCurso?>
					        ">	
								
						<input type="button" 
							   name="informacion" 
							   style="background-color:transparent; border-color:transparent;"> 
							   <img src="img/contenido.jpg" height="25" data-toggle="tooltip" data-placement="top" title="Agregar Contenido">
						
					</a>	
					<a href="preguntas.php?curso=<?php echo $titulos->idCurso?>
					        ">	
								
						<input type="button" 
							   name="informacion" 
							   style="background-color:transparent; border-color:transparent;"> 
							   <img src="img/cuestionario.png" height="25" data-toggle="tooltip" data-placement="top" title="Agregar Cuestionario">
						
					</a>
					<a href="resultados.php?curso=<?php echo $titulos->idCurso?>
					        ">	
								
						<input type="button" 
							   name="resultado" 
							   style="background-color:transparent; border-color:transparent;"> 
							   <img src="img/resultados.jpg" height="25" data-toggle="tooltip" data-placement="top" title="Ver Resultados">
						
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
				/* for($i=1;$i<=$totalpaginas;$i++)
					echo "<li class='page-item'> <a class='page-link' href='?pagina=" . $i . "'>" . $i . "</a>  ";  */
					for($i=1;$i<=$totalpaginas;$i++){
						if($i>1)
							echo "<li class='page-item'> <a class='page-link' href='?pagina=" . $i . "'>" . $i . "</a>  "; 
						else
							echo "<li class='page-item'> <a class='page-link' href='?'>" . $i . "</a>  "; 
					}	
			?>
		</ul>
    </nav>

	<table class="table">
		<tr class="d-flex">
			<br>		
			<h3>Agregar Nuevo Curso</h3>
			<td class="col-4"><textarea class="form-control" rows="4"  name="titulo"></textarea></td>
			<td class="col-7"><textarea  class="form-control" rows="4" name="descripcion"></textarea></td>
			
			<td class="col-1"><button class="btn btn-default" type="submit" name="insertar"><img src="img/guardar.png" width="40"/></button></td>
		</tr>
     </table> 
 
  </form>
 
	
</div>

<?php include 'pie.php'; ?>