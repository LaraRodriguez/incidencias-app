<?php
session_start();
include 'head.php';
                                             
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
                    <select name="tipo">
                      <option value="Basuras">Basuras</option>
                      <option value="Aseo Urbano">Aseo Urbano</option>
                      <option value="Mobiliario Urbano">Mobiliario Urbano</option>
                      <option value="Vandalismo">Vandalismo</option>
                       <option value="Transporte">Transporte</option>
                      <option value="Señales y Semaforos">Señales y Semaforos</option>
                      <option value="Mobiliario Urbano">Otros</option>
                      
                    </select>
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
											
                           