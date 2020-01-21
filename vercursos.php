
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
				header("Location:informacion./?".$curso);
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
    <h2><?php echo $titulocurso ?></h2>
	<table class="table">
		
		<?php 
		 $i=1;
		 foreach($registros as $titulos):?>
		 <tbody>
		  <tr class="d-flex">
			<div class="accordion" id="accordionExample">
			  <div class="card">
				<div class="card-header" id="heading<?php echo($i) ?>">
					<h2 class="mb-0">
					<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo($i) ?>" aria-expanded="true" aria-controls="collapse<?php echo($i) ?>">
					<?php echo $titulos->titulo;?>
					</button>
					</h2>
				</div>

				<div id="collapse<?php echo($i) ?>" class="collapse" aria-labelledby="heading<?php $i ?>" data-parent="#accordionExample">
					<div class="card-body">
					<p style="word-break: break-all;"><?php echo $titulos->contenido;?></p>
					</div>
				</div>
			 </div>
			</div>
				
				
		 <?php $i++;?>		
		 </tr>
		<?php endforeach;?>	
		</tbody>
	 </table>
	 	<a class="nav-link" href="evaluacion.php?curso=<?php echo $curso?>">Cuestionario </span></a>
	</div>
	<nav >
   <ul class="pagination justify-content-center pagination-lg">
	<?php  
		for($i=1;$i<=$totalpaginas;$i++)
			echo "<li class='page-item'> <a class='page-link' href='?pagina=" . $i . "'>" . $i . "</a>  "; 
	?>
   </ul>
  </nav>
	
 
  </form>
  
	
</div>

<?php include 'pie.php'; ?>