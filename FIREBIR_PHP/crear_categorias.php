<!DOCTYPE HTML>
<?php
include ("conexion.php");
if (isset($_POST["agregar"])){
    $conf=$_POST["agregar"];
    if($conf = "CONFIMAR"){
       $sql = "EXECUTE PROCEDURE SP_CATEGORIAS_INSERT('".$_POST['nombre']."',".$_GET['id'].")";
       fbird_query($conexion,$sql);
       fbird_commit($conexion);
       header("Location:CATEGORIAS DE PRODUCTOS.php?id=".$_GET['id'].""); 
    }
            
            
}
?>
<html>
    <link rel="stylesheet" type="text/css" href="screen.css"/>   
    <body>
        <title>
            CREAR CATEGORIA
        </title>
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