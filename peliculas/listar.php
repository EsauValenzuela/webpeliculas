







<?php
require_once("conexion.php");
?>
<h3 align="center">PELICULAS</h3>
<select id="sGenero">
<option value="1">todas</option>
<?php
$consultaG = "SELECT * FROM genero";
$resultadoG = $lnk->query($consultaG);
while ($fila2 = $resultadoG->fetch_object()){?>
<option value="<?=$fila2->idGenero?>" 
<?php if (!empty($_GET["idtipo"]) && $_GET["idtipo"]==$fila2->idGenero) {echo ' selected="selected" ';}?>
><?=$fila2->genero?></option>
<?php } ?>
</select>
<?php

$desde=0;
$hasta = 3;
//echo $_GET['idtipo'];
isset($_GET['filtrar']) ? $filtrar=$_GET['filtrar']:$filtrar="pelicula.idPelicula";
if(!empty($_GET['idtipo']) && $_GET['idtipo']!=1 ) {
   

    isset($_GET['numero']) ? $numero=$_GET['numero']:$numero=1;
if($numero>=1){
$desde=$numero*$hasta-$hasta;
}
    $consulPaginador = "select idPelicula, tituloPelicula, fechaPelicula, Director, sinopsis, foto, pelicula.idGenero, genero
     from pelicula , genero 
     where pelicula.idGenero = genero.idGenero 
      and pelicula.idGenero={$_GET['idtipo']}  order by {$filtrar}  desc  limit {$desde}, {$hasta} ";
    
     $consul = "select * from pelicula where idGenero={$_GET['idtipo']} ";

$res = $lnk->query($consul); 
$res1 = $lnk->query($consulPaginador); 
$numeroderegistros = $res->num_rows;
//resulta de dividir la division entera + su resto
$totalPaginas = intdiv($numeroderegistros, $hasta);
 if(($numeroderegistros % $hasta)>0){
    $totalPaginas = $totalPaginas+1;
 }
?>

 <div id="tabla" class="table table-striped">
 <table>
 <table class="table table-striped">
    <tr><th>TITULO</th><th>DIRECTOR</th><th>GENERO</th><th>FECHA</th><th>EDITA</th><th>BORRA</th></tr>  
<?php while($fila = $res1->fetch_object()){?>
    <tr id="pelic_<?=$fila->idPelicula?>" align="center" data-idpelicula="<?=$fila->idPelicula?>">
    <td class="titulo"><?=$fila->tituloPelicula?></td><td class="director"><?=$fila->Director?></td>
    <td  class="lgenero" value=<?=$fila->idGenero?>><?=$fila->genero?></td><td class="fecha"><?=$fila->fechaPelicula?></td>
    <td><button id="editarBoton" class="btn btn-warning" data-sinopsis="<?=$fila->sinopsis?>">editar</button></td>
         <td><button id="borrarboton1" class="btn btn-warning" >borrar</button></td>
    </tr>
<?php } ?>
</table>

 </div>
 <button id="anadirBoton">nuevo regisstro</button>
 <div class="paginas">
<?php
//mostrar grupos de paginas
if($totalPaginas<5){
    for($i=1; $i<=$totalPaginas; $i++){
        if($numero==$i){

            $activado =  "activado";
        } else{

            $activado =  "enlace";
        }
        echo "<div id='enlace6' class ='{$activado}' data-num={$numero} data-page={$i}>".$i."</div>";
        }
} elseif($numero<=3 && $totalPaginas>=5 ){
    for($i=1; $i<=5; $i++){
        if($numero==$i){

            $activado =  "activado";
        } else{

            $activado =  "enlace";
        }
        echo "<div  id='enlace6' class ='{$activado}' data-num={$numero} data-page={$i}>".$i."</div>";
    }
} elseif ($numero>3 && $numero<=$totalPaginas-2) {
    $sumando = -2;
    for($i=1; $i<=5; $i++){
        $pagina=$numero+$sumando;
        if($numero==$pagina){

            $activado =  "activado";
        } else{

            $activado =  "enlace";
        }
        echo "<div id='enlace6'  class ='{$activado}'  data-num={$numero} data-page={$pagina}>".$pagina."</div>";
        $sumando++;
    }
} else {
    $sumando = -2;
    $grupoFinal = $totalPaginas - 2;
    for($i=1; $i<=5; $i++){
        $pagina=$grupoFinal+$sumando;
        if($numero==$pagina){

            $activado =  "activado";
        } else{

            $activado =  "enlace";
        }
        echo "<div  id='enlace6' class ='{$activado}'  data-num={$numero} data-page={$pagina}>".$pagina."</div>";
        $sumando++;
    }


}

echo "pag ".$numero." de ".$totalPaginas;
    ?>
    </div>
    <button id="filtrarTitulo">filtrar por titulo</button> 
    <button id="filtrarDirector">filtrar por director</button>
    <?php

}  else {
 
        isset($_GET['numero']) ? $numero=$_GET['numero']:$numero=1;
        if($numero>=1){
            $desde=$numero*$hasta-$hasta;
        }
        $consulPaginador = "select idPelicula, tituloPelicula, fechaPelicula, Director, sinopsis, foto, pelicula.idGenero,  genero
        from pelicula , genero 
        where pelicula.idGenero = genero.idGenero  order by {$filtrar} desc
        limit {$desde}, {$hasta} ";
        $consul = "select * from pelicula";

        $res = $lnk->query($consul); 
        $res1 = $lnk->query($consulPaginador); 
        $numeroderegistros = $res->num_rows;
        //resulta de dividir la division entera + su resto
        $totalPaginas = intdiv($numeroderegistros,$hasta);
        if(($numeroderegistros % $hasta)>0){
            $totalPaginas = $totalPaginas+1;
        }
        
        //imprimo tabla
    ?> <div id="tabla">
            <table class="table table-striped">
            <tr><th>TITULO</th><th>DIRECTOR</th><th>GENERO</th><th>FECHA</th><th>EDITA</th><th>BORRA</th></tr>   
    <?php while($fila = $res1->fetch_object()){?>
        <tr id="pelic_<?=$fila->idPelicula?>" align="center" data-idpelicula="<?=$fila->idPelicula?>">
            <td class="titulo"><?=$fila->tituloPelicula?></td><td class="director"><?=$fila->Director?></td>
            <td class="lgenero" value="<?=$fila->idGenero?>"><?=$fila->genero?></td><td class="fecha"><?=$fila->fechaPelicula?></td>
            <td><button id="editarBoton"  class="btn btn-warning" data-sinopsis="<?=$fila->sinopsis?>">editar</button></td>
            <td><button id="borrarboton1" class="btn btn-warning">borrar</button></td>
                </tr>
     <?php } ?>
             </table> 
        </div>  
        <button id="anadirBoton" class="btn btn-danger">nuevo regisstro</button>
        <div class="paginas">
        <?php
        //mostrar grupos de paginas
        if($totalPaginas<5){
            for($i=1; $i<=$totalPaginas; $i++){
                if($numero==$i){
        
                    $activado =  "activado";
                } else{
        
                    $activado =  "enlace";
                }
                echo "<div id='enlace6' class ='{$activado}' data-num={$numero} data-page={$i}>".$i."</div>";
                }
        } elseif($numero<=3 && $totalPaginas>=5 ){
            for($i=1; $i<=5; $i++){
                if($numero==$i){
        
                    $activado =  "activado";
                } else{
        
                    $activado =  "enlace";
                }
                echo "<div  id='enlace6' class ='{$activado}' data-num={$numero} data-page={$i}>".$i."</div>";
            }
        } elseif ($numero>3 && $numero<=$totalPaginas-2) {
            $sumando = -2;
            for($i=1; $i<=5; $i++){
                $pagina=$numero+$sumando;
                if($numero==$pagina){
        
                    $activado =  "activado";
                } else{
        
                    $activado =  "enlace";
                }
                echo "<div id='enlace6'  class ='{$activado}'  data-num={$numero} data-page={$pagina}>".$pagina."</div>";
                $sumando++;
            }
        } else {
            $sumando = -2;
            $grupoFinal = $totalPaginas - 2;
            for($i=1; $i<=5; $i++){
                $pagina=$grupoFinal+$sumando;
                if($numero==$pagina){
        
                    $activado =  "activado";
                } else{
        
                    $activado =  "enlace";
                }
                echo "<div  id='enlace6' class ='{$activado}'  data-num={$numero} data-page={$pagina}>".$pagina."</div>";
                $sumando++;
            }
        
        
        }

        echo "pag ".$numero." de ".$totalPaginas;
        ?>
        </div>
        <button id="filtrarTitulo" class="btn btn-success">filtrar por titulo</button> 
        <button id="filtrarDirector" class="btn btn-success">filtrar por director</button>
        <?php
    
    
}



?>




