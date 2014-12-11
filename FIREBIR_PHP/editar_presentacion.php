<?php
include ("conexion.php");
   $query = "SELECT NOMBRE_PRESENTACION FROM PRESENTACIONES WHERE ID_PRESENTACION = ".$_GET['id']."";
   $resultado = fbird_query($conexion,$query);
   $row = fbird_fetch_object($resultado);
                    
if (isset($_POST["editar"])){
    $conf=$_POST["editar"];
    if($conf = "CONFIMAR"){
       $sql = "EXECUTE PROCEDURE SP_PRESENTACIONES_UPDATE(".$_GET['id'].",'".$_POST['nombre']."',".$_GET['user'].")";
       fbird_query($conexion,$sql);
       fbird_commit($conexion);
       header("Location:PRESENTACIONES DE PRODUCTOS.php?id=".$_GET['user']."");
    }
            
            
}
?>
<html>
    <link rel="stylesheet" type="text/css" href="screen.css"/>   
    <title>
        EDITAR PRESENTACIONES
    </title>
    <body>       
    <center>
        <form name="fe" action="" method="POST">
            <table id="tabla" cellpadding=7>
                <tr>
                    
                    <td align="center"><b>NOMBRE:</b></td>
                    <td><label><input name="nombre"  type="text" value="<?php echo $row->NOMBRE_PRESENTACION?>" ></label></td>                       
                </tr>   
                </table>
            <input id="crear " type="submit" name="editar" value="CONFIMAR"/>
        </form>
    </center>
    
    </body>        
      
</html>