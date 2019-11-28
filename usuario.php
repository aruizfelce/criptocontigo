      <!-- Menu que sale en la parte superior con los datos del usuario y el boton cerrar -->
      <?php
          session_start();
          if(!isset($_SESSION["usuario"])) //si no no está logueado va a la pagina de logueo
          {
              header("Location:ingresar.php");

          }
      ?>
      <nav class="navbar navbar-expand-lg navbar-warning bg-warning mb-3">
                
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto flex-row">
              <li class="nav-item active">
                <?php
                    if ($_SESSION["administrador"]==1) { ?>
                        <li class="nav-item active">
                           <a class="nav-link" href="preguntas.php">Cuestionario </span></a>
                        </li>
                    <?php   
                        }
                    ?>
                    <li class="nav-item active">
                          <a class="nav-link" href="menu.php">Indice </span></a>
                    </li>
               </li>
           </ul>
           <ul class="nav navbar-nav navbar-right">    
                    <li class="nav-item dropdown px-2">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION["usuario"] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="cerrar.php">Cerrar Sesión</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
            </ul>  
        </div>
      </nav>