
  <?php
    
    $idUsuario = $_POST["idUsuario"];
    $cedula = $_POST["cedula"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $password = $_POST["password"];
    
    
    try{
        //procedimiento para agregar al nuevo usuario
        $base = new PDO('mysql:host=localhost;dbname=criptocontigo','root','');
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");
    
        $sql = "INSERT INTO usuarios (idUsuario,cedula,nombre,apellido,password) 
        VALUES (:idusuario,:cedula,:nombre,:apellido,:password)";

        $resultado = $base->prepare($sql);
        $resultado->execute(array(":idusuario"=>$idUsuario, 
                                  ":cedula" => $cedula, 
                                  ":nombre"=>$nombre, 
                                  ":apellido"=>$apellido, 
                                  ":password"=>$password                                  
                                  ));
        
        $resultado->closeCursor();
        
        session_start();  //al crear el usuario automáticamente queda logueado y va al menu
        $_SESSION["usuario"] = $nombre . " " . $apellido; 
        header("location:menu.php");

    }catch(Exception $e){
	   die("Error: " . $e->GetMessage());
    }
   
  ?>
