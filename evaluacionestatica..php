
      <?php include 'encabezado.php'; ?>
      <?php include 'usuario.php'; ?>

      <div class="card bg-dark mb-3">
        <div class="card-body text-white">
          <div class="card-header"><h3>Responde el Cuestionario</h3></div>
              <p>1) Cuál de las siguientes no es una característica del bitcoin</p>
               <select class="custom-select" size="4" id="pregunta1">
                    <option value="1">Es de código abierto</option>
                    <option value="2">*Se basa en operaciones matemáticas con números primos</option>
                    <option value="3">Las transacciones son irreversibles</option>
                    <option value="4">Es de libre acceso </option>
                </select>

            <br><br>
              <p>2) ¿En qué se basa la confianza en los bitcoins y su respaldo?</p>
                <select class="custom-select" size="4" id="pregunta2">
                     <option value="1">En nodos de confianza que poseen la autoridad para verificar las transacciones y firmarlas digitalmente dándoles validez.</option>
                     <option value="2">*En la cadena de bloques, una red de computadoras conectadas que llevan un registro común de transacciones y le brindan seguridad al sistema</option>
                     <option value="3">En números únicos predefinidos, que deben ser encontrados mediante complejas operaciones matemáticas</option>
                     <option value="4">En algoritmos criptográficos con llaves de 2048 bits imposibles de descifrar </option>
                 </select>

            <br><br>
              <p>3) ¿Todas las transacciones de bitcoin realizadas son anónimas?</p>
                 <select class="custom-select" size="2" id="pregunta3">
                     <option value="1">Verdadero</option>
                     <option value="2">*Falso</option>
                  </select>
                    
            <br><br>
               <p>4) ¿Como se pueden adquirir los bitcoins?</p>
                  <select class="custom-select" size="5" id="pregunta4">
                      <option value="1">Como forma de pago por bienes y/o servicios</option>
                      <option value="2">Adquiriéndolos en una casa de cambio</option>
                      <option value="3">Adquiriéndolos de usuarios que los ofrecen o subastan</option>
                      <option value="4">Compitiendo a través de la minería </option>
                      <option value="5">*Todas las Anteriores </option>
                  </select>

            <br><br>
                <p>5) La minería es indispensable para el mantenimiento del bitcoin. ¿por qué?</p>
                   <select class="custom-select" size="4" id="pregunta5">
                      <option value="1">Es el proceso por el cual se crean nuevos bitcoins</option>
                      <option value="2">Es el proceso por el cual se sincronizan todos los nodos</option>
                      <option value="3">*Es el proceso por el cual se procesan las transacciones y se garantiza la seguridad de la red</option>
                      <option value="4">Todas las anteriores </option>
                         
                   </select>  

            <br><br>
                <p>6) La emisión de bitcoins se detendrá completamente</p>
                    <select class="custom-select" size="4" id="pregunta6">
                        <option value="1">*Al llegar a los 21 millones de bitcoins</option>
                        <option value="2">Al llegar a los 25 millones de bitcoins</option>
                        <option value="3">Al llegar a los 27 millones de bitcoins</option>
                        <option value="4">Siempre será posible emitir más bitcoins.</option>
                     </select>  
            
           <br><br>
                <p>7) El cryptojacking es</p>
                   <select class="custom-select" size="4" id="pregunta7">
                      <option value="1">Un tipo de malware</option>
                      <option value="2">*Un ataque en el que se infecta una página web con un script de minería</option>
                      <option value="3">Una aplicación potencialmente no deseada que puede perjudicar al usuario</option>
                      <option value="4">Ninguna de las anteriores</option>
                   </select>  

           <br><br>
               <p>8) ¿Para qué más se puede utilizar el blockchain?</p>
                  <select class="custom-select" size="4" id="pregunta8">
                      <option value="1">Para respaldar otras criptomonedas como Bitcoin cash o Ether</option>
                      <option value="2">Para emitir certificados que respalden la autenticidad de una página web</option>
                      <option value="3">Para realizar cualquier transacción descentralizada</option>
                      <option value="4">*Todas son correctas</option>
                  </select>  
          
           <br><br>
                <p>9) ¿Cuál de las siguientes no es una criptomoneda?</p>
                   <select class="custom-select" size="4" id="pregunta9">
                       <option value="1">Maker</option>
                       <option value="2">Litecoin</option>
                       <option value="3">*Copper </option>
                       <option value="4">Tether</option>
                    </select>  
            
            <br><br>
                    <p>10) ¿Cuál es la característica que ha hecho que Monero se vuelva tan popular?</p>
                       <select class="custom-select" size="3" id="pregunta10">
                           <option value="1">Es una criptomoneda que puede ser minada con dispositivos comunes como laptops y móviles.</option>
                           <option value="2">Se centra en la privacidad del usuario y el anonimato</option>
                           <option value="3">*Ambas son correctas  </option>
                           
                        </select> 
   
          <div class="card-footer">
              <a class="btn btn-warning" href="evaluar.php">Evaluar</a>
              <a class="btn btn-warning" href="menu.php">Regresar al Menu</a>
          </div>
      </div>
            
     </div>
     
  </div>
    
 
  <?php include 'pie.php'; ?>