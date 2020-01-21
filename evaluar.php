
      <?php include 'encabezado.php'; ?>
      <?php include 'usuario.php'; ?>
      <?php
          include("conexion.php");
          $base=getPDO();
          $usuario=$_SESSION["idusuario"];
          $curso=$_GET['curso'];
          $res = $base->prepare("SELECT puntaje, cantidadpreguntas FROM puntuaciones WHERE usuario = $usuario AND curso=$curso");
          $res->execute();
          $row = $res->fetch(PDO::FETCH_ASSOC);
          $totalpuntaje = $row['puntaje'];
          $totalpreguntas = $row['cantidadpreguntas'];
      ?>
      
      <div class="card text-center  bg-dark mb-3">
        <div class="card-body text-white">
          <br><br><br>
          <h1 class="display-2">Resultado</h1>
          <h2><?php echo $totalpuntaje ?> de <?php echo $totalpreguntas ?> Respuestas fueron correctas</h2>
          <!-- <h3>Parece que aun no tienes del todo claro algunos conceptos que giran entorno al uso de las criptomonedas. Te alentamos a seguir aprendiendo sobre el tema y que vueltas a intentarlo.</h3> -->
          <br><br><br>
          <a class="btn btn-warning" href="evaluacion.php?curso=<?php echo $curso ?>">Volver a hacer el Test</a>
          <a class="btn btn-warning" href="vercursos.php?curso=<?php echo $curso?>">Volver al Instructivo</a>
    </div>
  
</div>
      
  </div>
    
 
  <?php include 'pie.php'; ?>