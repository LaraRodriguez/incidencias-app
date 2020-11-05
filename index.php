<?php
session_start();
include 'head.php';
require_once 'clases/Conexion.php';
//require_once 'clases/Personaje.php';

                                        

echo'<center><img src="images/alta_incidencia.png" width="600" height="300" alt="incidencia"/></center>';

$obj_conexion=new Conexion();
//$obj_conexion->saludar();
$con=$obj_conexion->conectar();//ya tengo en esa variable la conexion 

/*$incidencias = array();

$incidencias[]=array(1,"Si","Vandalismo","25-10-2020 10:37:43","Plaza mayor","193.12.56.25","Farola rota");
$incidencias[]=array(2,"Si","Basuras","26-10-2020 12:07:23","C/Pelicano 25","131.120.121.125","Contenedor basura roto");
$incidencias[]=array(3,"Si","Vandalismo","27-10-2020 00:07:23","C/Cigueña 5","145.10.11.15","Banco roto");
$_SESSION['incidencias'] = $incidencias;*/

$sql="SELECT * FROM incidencia ORDER BY numero";  
  $consulta = $con->prepare($sql);
  $consulta->execute();
  $registros = $consulta->fetchAll();
   print "<BR> <br>TODOS LOS REGISTROS<br>"; 
   print'<table border="2">
		<tr>
		<th>numero</th>
		<th>urgencia</th>
    <th>tipo</th>
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
      echo '<td>'.$item[3] .'</td>';
      echo '<td>'.$item[4] .'</td>';
      echo '<td>'.$item[5] .'</td>';
      echo '<td>'.$item[6] .'</td></tr>';
      //ó $item['descripcion']
		
      
  }
print'</table>';



include 'pie.php';

