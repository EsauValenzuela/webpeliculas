
<?php
require_once("conexion.php");
$desde=0;
$hasta = 3;

   

    isset($_GET['numero']) ? $numero=$_GET['numero']:$numero=1;
if($numero>=1){
$desde=$numero*$hasta-$hasta;
}
$consul = "select * from genero; ";
    
     $consulPaginador = "select * from genero limit  {$desde}, {$hasta}; ";

$res = $lnk->query($consul); 
$res1 = $lnk->query($consulPaginador); 
$numeroderegistros = $res->num_rows;
//resulta de dividir la division entera + su resto
$totalPaginas = intdiv($numeroderegistros, $hasta);
 if(($numeroderegistros % $hasta)>0){
    $totalPaginas = $totalPaginas+1;
 }
?>
<h3 align="center">GENEROS</h3>
 <div id="tabla">
 <table class="table table-striped">
 <tr><th>IDGENERO</th><th>GENERO</th><th>EDITA</th><th>BORRAR</th></tr>
<?php while($fila = $res1->fetch_object()){?>
    <tr id="gene_<?=$fila->idGenero?>" align="center" data-idgenero="<?=$fila->idGenero?>" data-genero= "<?=$fila->genero?> " >
    <td class="idgenero" ><?=$fila->idGenero?></td><td id="egenero" class="genero"><?=$fila->genero?></td>
         <td><button type="button" class="btn btn-warning" id="editarBotong">editar</button></td>
         <td><button class="btn btn-warning" id="borrarge">borrar</button></td>
    </tr>
<?php } ?>
</table>

 </div>
 <button id="anadirBotong" class="btn btn-danger">nuevo regisstro</button>
 <div class="paginas">
<?php
//mostrar grupos de paginas
if($totalPaginas<5){
    for($i=1; $i<=$totalPaginas; $i++){
        if($numero==$i){

            $activado =  "activado3";
        } else{

            $activado =  "enlace3";
        }
        echo "<div id='enlace3' class ='{$activado}' data-num={$numero} data-page={$i}>".$i."</div>";
        }
} elseif($numero<=3 && $totalPaginas>=5 ){
    for($i=1; $i<=5; $i++){
        if($numero==$i){

            $activado =  "activado3";
        } else{

            $activado =  "enlace3";
        }
        echo "<div  id='enlace3' class ='{$activado}' data-num={$numero} data-page={$i}>".$i."</div>";
    }
} elseif ($numero>3 && $numero<=$totalPaginas-2) {
    $sumando = -2;
    for($i=1; $i<=5; $i++){
        $pagina=$numero+$sumando;
        if($numero==$pagina){

            $activado =  "activado3";
        } else{

            $activado =  "enlace3";
        }
        echo "<div id='enlace3'  class ='{$activado}'  data-num={$numero} data-page={$pagina}>".$pagina."</div>";
        $sumando++;
    }
} else {
    $sumando = -2;
    $grupoFinal = $totalPaginas - 2;
    for($i=1; $i<=5; $i++){
        $pagina=$grupoFinal+$sumando;
        if($numero==$pagina){

            $activado =  "activado3";
        } else{

            $activado =  "enlace3";
        }
        echo "<div  id='enlace3' class ='{$activado}'  data-num={$numero} data-page={$pagina}>".$pagina."</div>";
        $sumando++;
    }


}
echo "pag ".$numero." de ".$totalPaginas;
    ?>

</div>
