
      <?php include 'encabezado.php'; ?>
      <?php include 'usuario.php'; ?>
      
      <?php
		include("conexion.php");
        $base=getPDO();
        $usuario=$_SESSION["idusuario"];
      ?>

      <div class="card bg-dark mb-3">
        <div class="card-body text-white">
          <div class="card-header"><h3>Responde el Cuestionario</h3></div>
           <form action='evaluacion.php' method='POST'>
              <?php 
                $conexion = $base->query("SELECT * FROM cuestionario");
                $registros = $conexion->fetchAll(PDO::FETCH_OBJ);
                $lineas=1;
                foreach($registros as $preguntas):?>
                    <p><?php echo $preguntas->pregunta?></p>
                    
                    <select class="custom-select" size="4" id="pregunta1" name="<?php echo 'respuesta'.$lineas?>">
                        <option value="1"><?php echo $preguntas->respuesta1?></option>
                        <option value="2"><?php echo $preguntas->respuesta2?></option>
                        <option value="3"><?php echo $preguntas->respuesta3?></option>
                        <option value="4"><?php echo $preguntas->respuesta4?></option>
                    </select>
                    <input type="hidden" id="idpregunta1" name="<?php echo 'idpregunta'.$lineas++?>" value="<?php echo $preguntas->idpregunta?>">
                    <br><br>
                    
                <?php endforeach; 
                echo "<input type='hidden' name='cantidad_lineas' value='".$lineas."'>";
                if(!empty($_POST['guardar']))
                    {   
                        //elimina las respuestas del usuario de intentos anteriores
                        $sql="DELETE FROM resultado WHERE usuario=$usuario;";
                        $base->query($sql);
                        
                        //agrega en resultado las respuestas del usuario al cuestionario
                        for($i=1;$i<=$lineas-1;$i++)
                         {
                            $sql="INSERT INTO resultado VALUES(NULL,$usuario,'". $_POST['idpregunta'.$i]."','". $_POST['respuesta'.$i]."',1)";
                            $base->query($sql);
			            
                         }
                         //coloca en resultado si las respuestas fueron correctas(1) o incorrectas (0)
                         $sql="UPDATE resultado INNER JOIN cuestionario ON resultado.pregunta=cuestionario.idpregunta 
                                SET puntos = IF(respondio=correcta,1,0); ";
                         $base->query($sql);

                         //Totaliza el puntaje y se lo asigna a la tabla usuarios
                         $sql="UPDATE usuarios INNER JOIN resultado ON resultado.usuario=usuarios.id 
                                SET puntaje = (SELECT Sum(resultado.puntos) AS sumapuntos FROM resultado)";
                         $base->query($sql);
                         
                         //direcciona a evaluar
                         echo '<meta http-equiv="Refresh" content="0;URL=evaluar.php">';
                    }
            ?>    
          <div class="card-footer">
              <button class="btn btn-warning" name='guardar' value='guardar'>Evaluar </button>
              <a class="btn btn-warning" href="menu.php">Regresar al Menu</a>
          </div>
        </form>  
      </div>
            
     </div>
     
  </div>
    
 
  <?php include 'pie.php'; ?>