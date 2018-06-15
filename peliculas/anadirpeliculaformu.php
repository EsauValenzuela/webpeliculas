

<?php
require_once("conexion.php")
?>
	

<form  id="formularioanadir" enctype="multipart/form-data" method="post">
titulo pelicula: <input type="text" id="atitulo" name="titulo"  value=""  required/><br>
director: <input type="text" id="adirector" value="" required /><br>
genero: <select id="agenero">
<?php
$consulta = "SELECT idGenero, genero
			FROM genero";
$res = $lnk->query($consulta);
while ($fila2 = $res->fetch_object()){?>
<option value="<?= $fila2->idGenero?>"><?= $fila2->genero?></option>
<?php } ?>
</select>
<br>
fecha:  <input type="text" id="afecha"  value="" required/>
imagen  <input type="file" id="afile" name="afile"  required/>
sinopsis : <textarea rows="10" cols="50"  id="asinopsis" name="sinopsis">

</textarea>

<!--<input type="file" name="file" value="subir archivo">-->
</form>

