<?php
include ("conexion.php");
   $query = "SELECT * FROM PRODUCTO WHERE ID_PRODUCTO= ".$_GET['id']."";
   $resultado = fbird_query($conexion,$query);
   $row = fbird_fetch_object($resultado);
    $sql = "SELECT ID_PRESENTACION,NOMBRE_PRESENTACION FROM PRESENTACIONES";
     $resultado2 = fbird_query($conexion,$sql);
                    
if (isset($_POST["editar"])){
    $conf=$_POST["editar"];
    if($conf = "CONFIMAR"){
       $sql = "EXECUTE PROCEDURE SP_PRODUCTOS_UPDATE(".$_GET['id'].",".$_POST['presentaciones'].""
               . ",'".$_POST['nombre']."',".$_POST['COSTO'].",".$_POST['PORCENTAJE_MAYORISTA'].""
               . ",".$_POST['PRECIO_MAYORISTA'].",".$_POST['PRECIO_CONSUMIDOR'].",".$_POST['EXISTENCIA'].""
               . ",".$_POST['EXISTENCIA_MINIMA'].",".$_POST['EXISTENCIA_MAXIMA'].",".$_GET['user'].")";
       fbird_query($conexion,$sql);
       fbird_commit($conexion);
       header("Location:PRODUCTOS.php?id=".$_GET['user']."");
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
                    <td><label><input name="nombre"  type="text" value="<?php echo $row->NOMBRE_PRODUCTO?>" ></label></td>
                </tr>
                <tr> 
                 <td align="center"><b>PRESENTACION</b></td><td><label> 
                <select name="presentaciones">
                        <?PHP
                        while ($row2 = fbird_fetch_object($resultado2)) 
                        {
                            echo " <option value=$row2->ID_PRESENTACION>$row2->NOMBRE_PRESENTACION</option>"; 
                        }
                ?>
                </select>
                </label></td>
                </tr>
                   <td align="center"><b>COSTO:</b></td>
                   <td><label><input name="COSTO"  type="number" value = '<?php echo $row->COSTO?>'/></label></td>
               </tr>   
               <tr>
                    <td align="center"><b>PORCENTAJE DE MAYORISTA:</b></td>
                    <td><label><input name="PORCENTAJE_MAYORISTA"  type="number" value="<?php echo $row->PORCENTAJE_MAYORISTA;?>" step="any" ></label></td>
               </tr> 
               <tr>
                    <td align="center"><b>PRECIO DE MAYORISTA:</b></td>
                    <td><label><input name="PRECIO_MAYORISTA"  type="number" value="<?php echo $row->PRECIO_MAYORISTA?>" step="any" ></label></td>  
               </tr> 
               <tr>
                    <td align="center"><b>PRECIO DE CONSUMIDOR:</b></td>
                    <td><label><input name="PRECIO_CONSUMIDOR"  type="number" value="<?php echo $row->PRECIO_CONSUMIDOR?>" step="any"  ></label></td>
                </tr>  
              
                <tr>
                    <td align="center"><b>EXISTENCIA :</b></td>
                    <td><label><input name="EXISTENCIA"  type="number" step="any" value="<?php echo $row->EXISTENCIA?>"/></label></td>
                </tr>
                 <tr>
                    <td align="center"><b>EXISTENCIA MINIMA:</b></td>
                    <td><label><input name="EXISTENCIA_MINIMA"  type="number" value="<?php echo $row->EXISTENCIA_MIN?>" step="any" ></label></td>
                </tr> 
                 <tr>
                    <td align="center"><b>EXISTENCIA MAXIMA :</b></td>
                    <td><label><input name="EXISTENCIA_MAXIMA"  type="number" value="<?php echo $row->EXISTENCIA_MAX ?>"></label></td>

                 </tr> 
                </table>
            <input id="crear " type="submit" name="editar" value="CONFIMAR"/>
        </form>
    </center>
    
    </body>        
      
</html>



