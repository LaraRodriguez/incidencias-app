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
                                     
        <div   class="postcontent"><form action="alta.php" method="post">
            <table align="center" class="content-layout">
              <tr>
              <td align="right"><strong>Urgente? :</strong></td>
              <td>

              <input type="checkbox" name="urgente" value="urg"/>Si											  </td></tr>
              <tr><td align="right"><strong>Tipo :</strong></td><td>
              <div align="left">
                    <select name="tipo">';
                    foreach($filas as $clave=>$valor){
                      echo '<option value="'.$valor[0].'">'.$valor[1].'</option>';
                    }
                      
                    echo '</select>
              </div></td></tr>
              
              <tr><td align="right"><strong>Lugar :</strong></td><td>
              <div align="left">
                    <input type="text" name="lugar" size=35"/>
              </div></td></tr>
              <tr><td align="right"><strong>Descripcion: </strong></td><td>
              <div align="left">
                    <textarea cols=50 rows=4 name="descripcion"></textarea>
              </div></td></tr>
              <tr ><td colspan="2"><div align="center"><strong>
            <input name="enviar" type="submit" id="enviar" value="Dar de alta"/>
            </strong></div></td></tr>
        </table>
    </form>
        </div>
<div id="imagen1">
        

        </div>        
';
}
//var_dump($_SESSION['incidencias']);

 include 'pie.php';
											
                           