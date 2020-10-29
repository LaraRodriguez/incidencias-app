<?php
session_start();
include 'head.php';
                                             
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
    $num = $_REQUEST['num_incidencia'];
    foreach($_SESSION['incidencias'] as $clave=>$valor){
        if($valor[0]==$num){
            echo $clave.'<br>';
            echo $valor;
            //unset($_SESSION['incidencias'][$clave]);
        }
            
        
        
    }
    
    //echo '<br>';
    //var_dump($_SESSION['incidencias']);
}
 include 'pie.php';