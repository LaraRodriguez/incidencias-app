<?php
session_start();
include 'head.php';
                                             
require_once 'clases/Conexion.php';
if(isset($_REQUEST['enviar'])){
      $obj_conexion=new Conexion();
      //$obj_conexion->saludar();
      $con=$obj_conexion->conectar();//ya tengo en esa variable la conexion 

      if(isset($_REQUEST['urgente'])){
            $urgente = 1;
      }
      else{
            $urgente = 0;   
      }
      try{
            $tipo_inc = $_REQUEST['tipo'];
            $lugar = htmlspecialchars(strlen($_REQUEST['lugar']));
            $desc = htmlspecialchars(strlen($_REQUEST['descripcion']));
            if($lugar==0){
                  echo "Error, valor no introducido<br>";
            }
            elseif($desc==0){
                  echo "Error, valor no introducido<br>";
            }
            else{
                  $fecha = date('Y-m-d H:i:s');
                  $ip = "{$_SERVER['REMOTE_ADDR']}";
                  $sql1="INSERT INTO incidencia (urgencia, id_tipo, fecha, lugar, ip, descripcion, arreglada)
                  VALUES (?,?,?,?,?,?,?)";
                  $insercion=$con->prepare($sql1);
                  $insercion->execute(array($urgente, $tipo_inc, $fecha, $lugar, $ip, $desc, 0));
                  echo '<script>alert("Insercion correcta")</script>';
            
            }
      }
      catch(PDOException $e){
            echo "Fallo la insercion".$e->getMessage();
      }
    
}
else{
      $obj_conexion=new Conexion();
      //$obj_conexion->saludar();
      $con=$obj_conexion->conectar();//ya tengo en esa variable la conexion 

      $sql="SELECT * FROM tipo_incidencia";  
      $consulta = $con->prepare($sql);
      $consulta->execute();
      $filas = $consulta->fetchAll();                                 
 print' 
        <h2 class="postheader">FORMULARIO ALTA INCIDENCIA</h2>
                                     
              <input type="checkbox" name="urgente" value="urg"/>Si											  </td></tr>
              <tr><td align="right"><strong>Tipo :</strong></td><td>
              <div align="left">
                    <select name="tipo">
                      <option value="Basuras">Basuras</option>
                      <option value="Aseo Urbano">Aseo Urbano</option>
                      <option value="Mobiliario Urbano">Mobiliario Urbano</option>
                      <option value="Vandalismo">Vandalismo</option>
                       <option value="Transporte">Transporte</option>
                      <option value="Señales y Semaforos">Señales y Semaforos</option>
                      <option value="Mobiliario Urbano">Otros</option>
                    <select name="tipo">';
                    foreach($filas as $clave=>$valor){
                      echo '<option value="'.$valor[0].'">'.$valor[1].'</option>';
                    }
                    echo '</select>
              </div></td></tr>
              
              <tr><td align="right"><strong>Lugar :</strong></td><td>

        </div>';

}
//var_dump($_SESSION['incidencias']);
if(isset($_REQUEST['enviar'])){
      $cuenta_array = count($_SESSION['incidencias']);
      $num_inc = $cuenta_array+1;

      if(isset($_REQUEST['urgente'])){
            $urgente = "Si";
      }
      else{
            $urgente = "No";   
      }
      $tipo_inc = $_REQUEST['tipo'];
      $lugar = htmlspecialchars(strlen($_REQUEST['lugar']));
      $desc = htmlspecialchars(strlen($_REQUEST['descripcion']));
      if($lugar==0){
            echo "Error, valor no introducido<br>";
      }
      elseif($desc==0){
            echo "Error, valor no introducido<br>";
      }
      else{
            $fecha = date('d-m-Y H:i:s');
            $ip = $_SERVER['REMOTE_ADDR'];
      
      
            $_SESSION['incidencias'][] = array($num_inc, $urgente, $tipo_inc, $fecha, $lugar, $ip, $desc);
            var_dump($_SESSION['incidencias']);
      }
    
}
 include 'pie.php';