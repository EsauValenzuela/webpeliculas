<?php
require_once("conexion.php")
?>
<form id="editar" enctype="multipart/form-data" method="post">
titulo pelicula: <input type="text" id="titulo" value=""><br>
director: <input type="text" id="director" value=""><br>
genero: <select id="egenero">
<?php
$consulta = "SELECT idGenero, genero
			FROM genero";
$res = $lnk->query($consulta);
while ($fila2 = $res->fetch_object()){?>
<option value="<?= $fila2->idGenero?>" ><?= $fila2->genero?></option>
<?php } ?>
</select>
<br>
fecha:  <input type="text" id="fecha" >
foto :	<input type="file" id="foto">
sinopsis : <textarea rows="10" cols="50"  id="sinopsis">

</textarea>
</form>

