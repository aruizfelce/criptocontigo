
      <?php include 'encabezado.php'; ?>

      <div class="card text-center  bg-dark mb-3">
        <div class="card-body text-white">
          <br><br>
          <h1 class="display-2"><span style="color:white">Bienvenido</span></h1>
          <br><br>
          <div class="container">
            <div class="row">
              <div class="col-8">
              <form action="insertarUsuario.php" method="post">
                    <div class="form-group row">
                      <label for="idUsuario" class="col-sm-2 col-form-label">Id</label>
                      <div class="col-sm-6">
                        <input type="text" autofocus required maxlength="10"  class="form-control" name="idUsuario" id="idUsuario" placeholder="Ingrese su ID">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="cedula" class="col-sm-2 col-form-label">Cédula</label>
                      <div class="col-sm-6">
                        <input type="text" maxlength="10" required  class="form-control" name="cedula" id="cedula" placeholder="Ingrese su Cédula">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                      <div class="col-sm-10">
                        <input type="text" required maxlength="30" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su Nombre">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                      <div class="col-sm-10">
                        <input type="text" required maxlength="30" class="form-control" name="apellido" id="apellido" placeholder="Ingrese su Apellido">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-6">
                        <input type="password" required maxlength="10" class="form-control" name="password" id="password" placeholder="Ingrese su Password">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <input class="btn btn-warning" type="submit" name="enviando" value="Registrar">
                      </div>
                    </div>
                  </form>
               </div>   
            </div>
            </div>  
    </div>
  </div>
    
 

   <?php include 'pie.php'; ?>