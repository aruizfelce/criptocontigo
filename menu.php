
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
			$conexion = $base->query("SELECT cursos.*,usuarios.nombre,usuarios.apellido FROM cursos INNER JOIN usuarios ON cursos.profesor = usuarios.id WHERE profesor=$profesor LIMIT $empezar_desde,$filaspaginas");
		else
			$conexion = $base->query("SELECT cursos.*,usuarios.nombre,usuarios.apellido FROM cursos INNER JOIN usuarios ON cursos.profesor = usuarios.id LIMIT $empezar_desde,$filaspaginas");

		$registros = $conexion->fetchAll(PDO::FETCH_OBJ);

		if($administrador==1)
//			$sql_total = "SELECT * FROM cursos WHERE profesor=$profesor";
			$sql_total = "SELECT cursos.*,usuarios.nombre,usuarios.apellido FROM cursos INNER JOIN usuarios ON cursos.profesor = usuarios.id WHERE profesor=$profesor";
		else
			$sql_total = "SELECT cursos.*,usuarios.nombre,usuarios.apellido FROM cursos INNER JOIN usuarios ON cursos.profesor = usuarios.id";
		
	
		$resultado = $base->prepare($sql_total);
		
		$resultado->execute(array());

		$numfilas=$resultado->rowCount();

		$totalpaginas = ceil($numfilas / $filaspaginas);

//*****************************FIN PAGINACION*******************		

		if(ISSET($_POST["insertar"])){
			$titulo = $_POST["titulo"];
			$descripcion = $_POST["descripcion"];
			
			
			$sql="INSERT INTO cursos (titulo,descripcion) 
			      VALUES(:tit,:descrip)";
			$resultado=$base->prepare($sql);
			$resultado->execute(array(":tit"=>$titulo,":descrip"=>$descripcion));
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
				<th class="col-7">Descripcion</th>
				<th class="col-2">Elaborado Por</th>
				
			</tr>
		</thead>
		<?php foreach($registros as $titulos):?>
		 <tbody>
			<tr class="d-flex">

					<td class="col-3">
						<a href="vercursos.php?curso=<?php echo $titulos->idCurso?>">
							<?php echo $titulos->titulo?> 
						</a>
					</td>	

					<td class="col-7">
						<a href="vercursos.php?curso=<?php echo $titulos->idCurso?>">
							<?php echo $titulos->descripcion?>
						</a>
					</td>	

					<td class="col-2">
						<a href="vercursos.php?curso=<?php echo $titulos->idCurso?>">
							<?php echo $titulos->nombre . " " . $titulos->apellido?>
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
	
</div>

<?php include 'pie.php'; ?>

   