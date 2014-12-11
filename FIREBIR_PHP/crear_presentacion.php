<!DOCTYPE HTML>
<?php
include ("conexion.php");
if (isset($_POST["agregar"])){
    $conf=$_POST["agregar"];
    if($conf = "CONFIMAR"){
       $sql = "EXECUTE PROCEDURE SP_PRESENTACIONES_INSERT('".$_POST['nombre']."',".$_GET['id'].")";
       fbird_query($conexion,$sql);
       fbird_commit($conexion);
       header("Location:PRESENTACIONES DE PRODUCTOS.php?id=".$_GET['id']."");    
    }
            
            
}
?>
<html>
    <link rel="stylesheet" type="text/css" href="screen.css"/>   
    <title>
        CREAR PRESENTACION
    </title>
    <body>
    <center>
        <form name="fe" action="" method="POST">
            <table id="tabla" cellpadding=7>
                <tr>
                    <td align="center"><b>NOMBRE</b></td><td><label><input name="nombre"  type="text" ></label></td>                       
                </tr>   
            </table>
            <input id="crear " type="submit" name="agregar" value="CONFIMAR"/>
        </form>
    </center>
    </body>        
      
</html>