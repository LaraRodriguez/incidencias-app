<?php
session_start();
include 'head.php';
require_once 'clases/Conexion.php';
if(isset($_REQUEST['listar'])){
  $obj_conexion=new Conexion();
  //$obj_conexion->saludar();
  $con=$obj_conexion->conectar();
  try{
  $tipo = $_REQUEST['tipo'];

  $sql="SELECT * FROM incidencia WHERE id_tipo=?";  
  $consulta = $con->prepare($sql);
  $consulta->execute(array($tipo));
  $registros = $consulta->fetchAll();
  print "<BR> <br>TODOS LOS REGISTROS<br>"; 
  print'<table border="2">
          <tr>
          <th>numero</th>
          <th>urgencia</th>
          <th>fecha</th>
          <th>lugar</th>
          <th>ip</th>
          <th>descripcion</th>
          </tr>';
  foreach($registros as $item)
  {
      echo '<tr><td>'.$item[0] .'</td>'	;	
      //ó $item['nombre']
      echo '<td>'.$item[1] .'</td>'	;
      echo '<td>'.$item[2] .'</td>';
      echo '<td>'.$item[4] .'</td>';
      echo '<td>'.$item[5] .'</td>';
      echo '<td>'.$item[6] .'</td></tr>';
      //ó $item['descripcion']
          
      
  }
  print'</table>';
  }
  catch(PDOException $e){
    echo "No hay registros".$e->getMessage();
}
}
else{
print ' 
         <strong>SELECCIONA EL TIPO DE INCIDENCIA A LISTAR<BR><BR></strong>
                                     
        <div   class="postcontent"><form action="listar.php" method="post">
            <table align="center" class="content-layout">
              										  </td></tr>
              <tr>
                <td align="right"><strong>Tipo :</strong></td><td>
                 <div align="left">
                    <select name="tipo">
                    <option value="1">Pavimentacion</option>
                    <option value="2">Fuga</option>
                    <option value="3">Jardineria</option>
                    <option value="4">Generico</option>
                     <option value="5">Vandalismo</option>
                    </select>
                </div>
               </td>
              </tr>
              <tr >
              <td colspan="2"><div align="center"><strong>
                <input name="listar" type="submit" id="listar" value="Listar"/>
                </strong>
                </div>
              </td>
            </tr>
              
        </table>
    </form>
        </div>';
//var_dump($_SESSION['incidencias']);
}

include 'pie.php';
