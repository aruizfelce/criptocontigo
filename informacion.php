
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
				header("Location:informacion.php/?".$curso);
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
		$conexion = $base->query("SELECT * FROM informacion WHERE curso=$curso LIMIT $empezar_desde,$filaspaginas");
		$registros = $conexion->fetchAll(PDO::FETCH_OBJ);


        $sql_total = "SELECT * FROM informacion WHERE curso=$curso";
	
		$resultado = $base->prepare($sql_total);
		
		$resultado->execute(array());

		$numfilas=$resultado->rowCount();

		$totalpaginas = ceil($numfilas / $filaspaginas);

//*****************************FIN PAGINACION*******************		

		if(ISSET($_POST["insertar"])){
			$titulo = $_POST["titulo"];
			$contenido = $_POST["contenido"];
			$curso = $_GET["curso"];
			//$curso = 1;
			$sql="INSERT INTO informacion (titulo,contenido,curso) 
			      VALUES(:tit,:descrip,:curso)";
			$resultado=$base->prepare($sql);
			$resultado->execute(array(":tit"=>$titulo,":descrip"=>$contenido,":curso"=>$curso));
			header("Location:informacion.php?curso=$curso");
		}

	?>

  <form action="<?php echo $_SERVER['PHP_SELF'] . "?curso=" .$curso;?>" method="post">
  <div class="container-fluid">
    <h2>Curso de <?php echo $titulocurso ?></h2>
	<table class="table">
		<thead class="thead-dark">
			<tr class="d-flex">
				<!-- <th>Id</th>  -->
				<th class="col-10">Titulo</th>
				
				<th class="col-2">Opciones</th>
			</tr>
		</thead>
		<?php foreach($registros as $titulos):?>
		 <tbody>
			<tr class="d-flex">
				
				<td class="col-10"><?php echo $titulos->titulo?> </td>	
				<!-- <td class="col-7"><input type="hidden" value="<?php echo $titulos->contenido?>"></td> -->
				<td class="col-2">
					<a href="borrarinformacion.php?id=<?php echo $titulos->idContenido?>&curso=<?php echo $curso?>"><img src="img/borrar.png" alt="x"></a> 
					<a href="editarinformacion.php?id=<?php echo $titulos->idContenido?> &
									tit=<?php echo $titulos->titulo?> &
									curso=<?php echo $titulos->curso?>
					        ">	
								
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
		/* for($i=1;$i<=$totalpaginas;$i++)
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
			<h3>Agregar Contenido</h3>
			<td class="col-12">
				Titulo
				<input class="form-control" name="titulo">
			</td>
		</tr>
		<tr class="d-flex">	
			<td class="col-12">
			    Contenido
				<textarea  class="form-control" rows="4" name="contenido"></textarea></td>
			<script>
                   CKEDITOR.replace( 'contenido' );
            </script>
		</tr>
		<tr class="d-flex">	
			<td class="col-1"><button class="btn btn-default" type="submit" name="insertar"><img src="img/guardar.png" width="40"/></button></td>
		</tr>
     </table> 
 
  </form>
  
	
</div>

<?php include 'pie.php'; ?>