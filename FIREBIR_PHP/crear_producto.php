<!DOCTYPE HTML>
<?php
include ("./conexion.php");
$sql = "SELECT ID_PRESENTACION,NOMBRE_PRESENTACION FROM PRESENTACIONES";
     $resultado = fbird_query($conexion,$sql);
$sql = "SELECT ID_CATEGORIA,NOMBRE_CATEGORIA FROM CATEGORIAS";
     $resultado2 = fbird_query($conexion,$sql);     
include ("conexion.php");
if (isset($_POST["agregar"])){
    $conf=$_POST["agregar"];
    if($conf = "CONFIMAR"){
       $sql = "EXECUTE PROCEDURE SP_PRODUCTOS_INSERT(".$_POST['presentaciones'].""
               . ",'".$_POST['nombre']."',".$_POST['COSTO'].",".$_POST['PORCENTAJE_MAYORISTA'].""
               . ",".$_POST['PRECIO_MAYORISTA'].",".$_POST['PRECIO_CONSUMIDOR'].",".$_POST['EXISTENCIA'].""
               . ",".$_POST['EXISTENCIA_MINIMA'].",".$_POST['EXISTENCIA_MAXIMA'].",".$_GET['id'].")";
       fbird_query($conexion,$sql);
       fbird_commit($conexion);
       header("Location:PRODUCTOS.php?id=".$_GET['id']."");    
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
                <tr> 
                 <td align="center"><b>PRESENTACION</b></td><td><label> 
                <select name="presentaciones">
                        <?PHP
                        while ($row = fbird_fetch_object($resultado)) 
                        {
                            echo " <option value=$row->ID_PRESENTACION>$row->NOMBRE_PRESENTACION</option>"; 
                        }
                ?>
                </select>
                </label></td>
                </tr>
                 <?PHP
                echo "<tr>"; 
                echo "<td align= center> <b>CATEGORIA</b></td>";
                
                        while ($row = fbird_fetch_object($resultado2)) 
                        {
                            echo '<tr></tr>';
                            echo "<td align=rigth ><label >$row->NOMBRE_CATEGORIA</label>"; 
                            echo " <input type = 'checkbox' name = $row->NOMBRE_CATEGORIA value= $row->ID_CATEGORIA/>";
                            echo "</td>";
                            
                        }
                
                    
                echo "</tr>";
               ?>
                <tr> 
                    <td align="center"><b>COSTO</b></td><td><label><input name="COSTO"  type="number" step="any"></label></td>
                </tr>  
                <tr>
                    <td align="center"><b>PORCENTAJE MAYORISTA</b></td><td><label><input name="PORCENTAJE_MAYORISTA"  type="number" step="any" ></label></td>
                 </tr> 
                 <tr>
                    <td align="center"><b>PRECIO MAYORISTA</b></td><td><label><input name="PRECIO_MAYORISTA"  type="number" step="any" ></label></td>
                </tr> 
                 <tr> 
                     <td align="center"><b>PRECIO CONSUMIDOR</b></td><td><label><input name="PRECIO_CONSUMIDOR"  type="number" step="any" ></label></td>
                </tr>  
                <tr>
                    <td align="center"><b>EXISTENCIA </b></td><td><label><input name="EXISTENCIA"  type="number" ></label></td>
                 </tr> 
                 <tr>
                     <td align="center"><b>EXISTENCIA MINIMA</b></td><td><label><input name="EXISTENCIA_MINIMA"  type="number" ></label></td>
                 </tr> 
                 <tr>
                     <td align="center"><b>EXISTENCIA MAXIMA</b></td><td><label><input name="EXISTENCIA_MAXIMA"  type="number" ></label></td>
                </tr>   
            </table>
            <input id="crear " type="submit" name="agregar" value="CONFIMAR"/>
        </form>
    </center>
    </body>        
      
</html>