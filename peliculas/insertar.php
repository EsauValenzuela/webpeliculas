<?php
   $res1 = $lnk->query("select * from genero");
    ?>
    titulo<input type="text" id="titulo"  >
    <br>
    director<input type="text" id="director" >
    <br>
    fecha <input type="date" id="fecha"  >
    <br>
    genero<select name="hola" id="idtip">
        <?php
        while($fila = $res1->fetch_object()){

    echo '<option value="'.$fila->idGenero.'">'.$fila->genero.'</option>';
        }
        ?>
        </select>
     <input type="button" id="bo" value="enviar">