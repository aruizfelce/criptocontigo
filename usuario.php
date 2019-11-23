      <!-- Menu que sale en la parte superior con los datos del usuario y el boton cerrar -->
      <?php
          session_start();
          if(!isset($_SESSION["usuario"])) //si no no está logueado va a la paguina de logueo
          {
              header("Location:ingresar.php");

          }
      ?>
      <nav class="navbar navbar-expand-lg navbar-warning bg-warning mb-3">
                
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <?php
                    echo "Usuario: " . $_SESSION["usuario"] . "<br> <br>"; //muestra el nombre del usuario
                  ?>
            </li>
            
            </ul>  
            <form class="form-inline my-2 my-lg-0">
                <a class="" href="cerrar.php">Cerrar Sesión</a>
          </form>
          
          
        </div>
      </nav>