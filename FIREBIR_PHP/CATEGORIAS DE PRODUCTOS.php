<?PHP
include ("./conexion.php");
?>
<!doctype html5>
  <html lang="es">
      <link rel="stylesheet" type="text/css" href="screen.css"/>   
      <head>
          <title>
              CATEGORIAS 
          </title>
      </head>
      <body>
      <center>
        
         <?php
        
        $sql = "SELECT C.ID_CATEGORIA,C.NOMBRE_CATEGORIA FROM CATEGORIAS C";
        
           $resultado=fbird_query($conexion,$sql);
          
           echo "<table border = 1 rule = nome width = 600px cellpadding = 5px id = tabla>\n";
           echo " <tr>"
                  ." <td align = center><b>CATEGORIAS EXISTENTES</b></td>"
                  ."<td align = center></td>"
                  ."<td align = center></td>"
                  . "</tr>\n";
          while($row=fbird_fetch_object($resultado)){
           echo " <tr>"
               . " <td align = center>$row->NOMBRE_CATEGORIA</td>"
               . " <td align = center><a href = 'eliminar_categorias.php?user=".$_GET['id']."&id=$row->ID_CATEGORIA' >ELIMINAR</a></td>"
               . " <td align = center><a href = 'editar_categoria.php?user=".$_GET['id']."&id=$row->ID_CATEGORIA' >EDITAR</a></td>"    
               . "</tr>\n";
           
          }
           echo "</table>\n";
           
           echo "<a href = 'crear_categorias.php?id=".$_GET['id']."' >AGREGAR NUEVA CATEGORIA</a>";
           ?>
       
        </form>
      </center>  
      </body>
  </html>
