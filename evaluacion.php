
      <?php include 'encabezado.php'; ?>
      <?php include 'usuario.php'; ?>
      
      <?php
		include("conexion.php");
        $base=getPDO();
      ?>

      <div class="card bg-dark mb-3">
        <div class="card-body text-white">
          <div class="card-header"><h3>Responde el Cuestionario</h3></div>
           <form action='evaluacion.php' method='POST'>
              <?php 
                $conexion = $base->query("SELECT * FROM cuestionario");
                $registros = $conexion->fetchAll(PDO::FETCH_OBJ);
                $lineas=0;
                foreach($registros as $preguntas):?>
                    <p><?php echo $preguntas->pregunta?></p>
                    <select class="custom-select" size="4" id="pregunta1" name="<?php echo 'respuesta'.$lineas++?>">
                        <option value="1"><?php echo $preguntas->respuesta1?></option>
                        <option value="2"><?php echo $preguntas->respuesta2?></option>
                        <option value="3"><?php echo $preguntas->respuesta3?></option>
                        <option value="4"><?php echo $preguntas->respuesta4?></option>
                    </select>
                    <br><br>
                    
                <?php endforeach; 
                echo "<input type='text' name='cantidad_lineas' value='".$lineas."'>";
                if(!empty($_POST['guardar']))
                    {
                        for($i=1;$i<=$lineas;$i++)
                         {
                            $sql="INSERT INTO resultado VALUES(NULL,10,1,'". $_POST['respuesta'.$i]."',1)";
                            $base->query($sql);
			            
                         }
                        
                        header("location:evaluar.php");
                    }
            ?>    
          <div class="card-footer">
              <button name='guardar' value='guardar'>Evaluar </button>
              <a class="btn btn-warning" href="menu.php">Regresar al Menu</a>
          </div>
        </form>  
      </div>
            
     </div>
     
  </div>
    
 
  <?php include 'pie.php'; ?>