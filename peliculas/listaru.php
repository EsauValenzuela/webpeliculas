
<?php
require_once("conexion.php");
$desde=0;
$hasta = 3;

isset($_GET['numero']) ? $numero=$_GET['numero']:$numero=1;
if($numero>=1){
$desde=$numero*$hasta-$hasta;
}
    $consulPaginador = "select * from usuario    limit {$desde}, {$hasta} ";
    
     $consul = "select * from usuario";

$res = $lnk->query($consul); 
$res1 = $lnk->query($consulPaginador); 
$numeroderegistros = $res->num_rows;
//resulta de dividir la division entera + su resto
$totalPaginas = intdiv($numeroderegistros, $hasta);
 if(($numeroderegistros % $hasta)>0){
    $totalPaginas = $totalPaginas+1;
 }
?>
<h3 align="center">USUARIOS</h3>
 <div id="tabla">
 <table class="table table-striped">
 <tr><th>NICK</th><th>EMAIL</th><th>NIVEL</th><th>EDITA</th><th>BORRAR</th></tr>
<?php while($fila = $res1->fetch_object()){?>
    <tr id="usu_<?=$fila->idUsuario?>" align="center"   data-idusuario="<?=$fila->idUsuario?>"   data-nick="<?=$fila->nick?>" data-email="<?=$fila->email?>"   data-nivel="<?=$fila->nivel?>">
    <td class="nick" ><?=$fila->nick?></td><td class="email"><?=$fila->email?></td>
    <td  class="nivel" value=<?=$fila->nivel?>><?=$fila->nivel?></td>
         <td><button type="button" class="btn btn-warning" id="editarBotonu">editar</button></td>
         <td><button  id="borrarusuario" class="btn btn-warning">borrar</button></td>
    </tr>
<?php } ?>
</table>

 </div>
 <div class="paginas">
<?php
//mostrar grupos de paginas
if($totalPaginas<5){
    for($i=1; $i<=$totalPaginas; $i++){
        if($numero==$i){

            $activado =  "activado2";
        } else{

            $activado =  "enlace2";
        }
        echo "<div id='enlaceu' class ='{$activado}' data-num={$numero} data-page={$i}>".$i."</div>";
        }
} elseif($numero<=3 && $totalPaginas>=5 ){
    for($i=1; $i<=5; $i++){
        if($numero==$i){

            $activado =  "activado2";
        } else{

            $activado =  "enlace2";
        }
        echo "<div  id='enlaceu' class ='{$activado}' data-num={$numero} data-page={$i}>".$i."</div>";
    }
} elseif ($numero>3 && $numero<=$totalPaginas-2) {
    $sumando = -2;
    for($i=1; $i<=5; $i++){
        $pagina=$numero+$sumando;
        if($numero==$pagina){

            $activado =  "activado2";
        } else{

            $activado =  "enlace2";
        }
        echo "<div id='enlaceu'  class ='{$activado}'  data-num={$numero} data-page={$pagina}>".$pagina."</div>";
        $sumando++;
    }
} else {
    $sumando = -2;
    $grupoFinal = $totalPaginas - 2;
    for($i=1; $i<=5; $i++){
        $pagina=$grupoFinal+$sumando;
        if($numero==$pagina){

            $activado =  "activado2";
        } else{

            $activado =  "enlace2";
        }
        echo "<div  id='enlaceu' class ='{$activado}'  data-num={$numero} data-page={$pagina}>".$pagina."</div>";
        $sumando++;
    }

}
echo "pag ".$numero." de ".$totalPaginas;
    ?>

    
</div>


