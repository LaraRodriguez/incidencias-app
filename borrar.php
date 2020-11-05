<?php
session_start();
include 'head.php';
require_once 'clases/Conexion.php';
                                             
 print' 
            <strong>INTRODUCE EL IDENTIFICADOR DE LA INCIDENCIA A BORRAR<BR><BR></strong>
                                     
        <div   class="postcontent"><form action="borrar.php" method="post">
            <table align="center" class="content-layout">
              
              
              <tr><td align="right"><strong>Num Incidencia :</strong></td><td>
              <div align="left">
                    <input type="text" name="num_incidencia"/>
              </div></td></tr>
              
              <tr ><td colspan="2"><div align="center"><strong>
            <input name="borrar" type="submit" id="borrar" value="Dar de Baja"/>
            </strong></div></td></tr>
        </table>
    </form>
        </div>';
//var_dump($_SESSION['incidencias']);
if(isset($_REQUEST['borrar'])){
    $obj_conexion=new Conexion();
    //$obj_conexion->saludar();
    $con=$obj_conexion->conectar();
    $num = $_REQUEST['num_incidencia'];
    try{
    $sql1="DELETE FROM incidencia WHERE num_incidencia= ?";
    $borrado= $con->prepare($sql1);
    $borrado->execute(array($num));
    
    $filas_afectadas=$borrado->rowCount();
    if($filas_afectadas>0){
        echo '<script>alert("Borrado completado")</script>';
    }
    else{
        echo '<script>alert("No se ha encontrado ningun registro con ese identificador")</script>';
    }
    }
    catch(PDOException $e){
        echo "Fallo la insercion".$e->getMessage();
    }
    
    //echo '<br>';
    //var_dump($_SESSION['incidencias']);
}
 include 'pie.php';