<?php
require_once("conexion.php");

if(isset($_GET['control'])){
    $consulPaginador = "select idPelicula, tituloPelicula, fechaPelicula, Director, sinopsis, foto, pelicula.idGenero, genero
    from pelicula , genero 
    where pelicula.idGenero = genero.idGenero 
     and pelicula.idPelicula={$_GET['idpelicula']} ";
     $res1 = $lnk->query($consulPaginador); 
     $res2 = $lnk->query($consulPaginador); 
     
     $fila1 = $res2->fetch_object();
     while($fila = $res1->fetch_object()){?>
          
        <div class="pelidetalle">    
              
        
        
        <img src="uploads/<?=$fila->foto?>"
             
             width="250"
             height="300"/>
        
             
             
            </div>

            <div class="datos">
            <h4>Titulo</h4>
            <p><?=$fila->tituloPelicula?></p>
            <h4>Director</h4>
            <p><?=$fila->Director?></p>
            <h4>Fecha</h4>
            <p><?=$fila->fechaPelicula?></p>
            </div>
                
             <?php
            
            

            if(!isset($_GET['idtipo'])){
                $tipo =  1;
            } else {

                $tipo = $_GET['idtipo'];
            }
             ?>
             </div>

            <div class="sinopsis">
            <h4>Sinopsis</h4>
            <?=$fila->sinopsis?>
            </div>
            <div class="boton"><button  data-pagin="1" data-pagina="<?=$_GET['numero']?>" data-tipo="<?=$tipo?>" type="button" id="detalle1"><span class="glyphicon glyphicon-search"></span>volver principal</button></div>
            
        <?php } 
        session_start();
        $idData = $fila1->idPelicula;
        $numero = $_GET['numero'];
        if(isset($_SESSION['sesion'])){
            if(isset($_GET['comentario'])){
                if(strlen($_GET['texto'])>=50){
               
                $texto = $_GET['texto'];
                $idpelicula = $_GET['idpelicula'];
                $idusuario= $_SESSION['id'];
                $lnk->query("insert into comentario (idPelicula, idUsuario, texto ) values ( $idpelicula, $idusuario, '$texto' )");
              
            } else{
                    echo "por favor escriba un comentario minimo de 50 cacarteres";


                }
           
            }

            ?>
        
          
<div class="comentarios">

<form id="comentarios">
<textarea rows="5" cols="50"   minlength="40" maxlength="180" id="asinopsis" name="sinopsis">

</textarea>
</form>
<button  data-idpelicula="<?=$idData?>"  data-pagin="<?=$_GET['num']?>" data-comentario="comentario"   data-pagina="<?=$numero?>" data-tipo="<?= $_GET['idtipo']?>" type="button" id="detalle3">  <span class="glyphicon glyphicon-search"></span>añadir comentario</button>
</div>
         <?php   }  else {
             echo "<p style='color: #369;'>para añadir comentarios registrese <a href='registro.php'>aquí</a></p>";
             
         } ?>
        

<?php
$desde = 0;
$hasta = 4;

isset($_GET['num']) ? $num=$_GET['num']:$num=$_GET['numero'];

if($num>=1){
$desde=$num*$hasta-$hasta;
}
    $consulPaginador1 = "select nick, texto, P.idPelicula, idComentario
    from usuario U, pelicula P, comentario C
     where U.idUsuario = C.idUsuario 
     and  C.idPelicula = P.idPelicula
     and P.idPelicula = {$_GET['idpelicula']} order by idComentario desc ";
     
    
     $consul1 = "select * from comentario where idPelicula={$_GET['idpelicula']} ";
   
$res4 = $lnk->query($consul1); 
$res3 = $lnk->query($consulPaginador1); 

$numeroderegistros = $res4->num_rows;
//resulta de dividir la division entera + su resto
$totalPaginas = intdiv($numeroderegistros, $hasta);
 if(($numeroderegistros % $hasta)>0){
    $totalPaginas = $totalPaginas+1;
 }
 
 
 
 ?>
 <h3>comentarios : </h3>
 <?php
 
 while($fila4 = $res3->fetch_object()){?>
    <div class =  "comentario">
        <?php
        echo "<h4>".$fila4->nick."</h4>"; 
        echo "<p>".$fila4->texto."</p>"; 
        
        ?>
     </div>
<br>

 <?php } 

} else {  

?>
<h3 align="center">PELICULAS</h3>
<select id="sGenero1">
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
$i = 0;

?>
<!--inicio las capas con las películas-->
<div class="pelipadre">
       <?php
     while($fila = $res1->fetch_object()){ $i++;?>
  
<div class="peli">    
      
<div>

<img src="uploads/<?=$fila->foto?>"
     
     width="130"
     height="170"/>

     </div>
     
    </div>
        <button data-idpelicula="<?=$fila->idPelicula?>"  data-pagin="1" data-pagina="<?=$numero?>" data-tipo="<?= $_GET['idtipo']?>" type="button" id="detalle">  <span class="glyphicon glyphicon-search"></span>ver detalle</button>
     <?php

    } 
     ?>
     </div>


<div class="paginas"> 
<?php
//mostrar grupos de paginas
if($totalPaginas<5){
    for($i=1; $i<=$totalPaginas; $i++){
        if($numero==$i){

            $activado =  "activado1";
        } else{

            $activado =  "enlace1";
        }
        echo "<div id='enlace11' class ='{$activado}'  data-pagin='1' data-num={$numero} data-page={$i}>".$i."</div>";
        }
} elseif($numero<=3 && $totalPaginas>=5 ){
    for($i=1; $i<=5; $i++){
        if($numero==$i){

            $activado =  "activado1";
        } else{

            $activado =  "enlace1";
        }
        echo "<div  id='enlace11' class ='{$activado}' data-pagin='1' data-num={$numero} data-page={$i}>".$i."</div>";
    }
} elseif ($numero>3 && $numero<=$totalPaginas-2) {
    $sumando = -2;
    for($i=1; $i<=5; $i++){
        $pagina=$numero+$sumando;
        if($numero==$pagina){

            $activado =  "activado1";
        } else{

            $activado =  "enlace1";
        }
        echo "<div id='enlace11'  class ='{$activado}' data-pagin='1'  data-num={$numero} data-page={$pagina}>".$pagina."</div>";
        $sumando++;
    }
} else {
    $sumando = -2;
    $grupoFinal = $totalPaginas - 2;
    for($i=1; $i<=5; $i++){
        $pagina=$grupoFinal+$sumando;
        if($numero==$pagina){

            $activado =  "activado1";
        } else{

            $activado =  "enlace1";
        }
        echo "<div  id='enlace11' class ='{$activado}' data-pagin='1' data-num={$numero} data-page={$pagina}>".$pagina."</div>";
        $sumando++;
    }


}

echo "pag ".$numero." de ".$totalPaginas;
    ?>
    </div>
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
   ?>
   <div class="pelipadre">
       <?php
       $tipo = 1;
     while($fila = $res1->fetch_object()){ ?>
  
<div class="peli">    
      
<div>


<img src="uploads/<?=$fila->foto?>"
     
     width="130"
     height="170"/>

     </div>
     
    </div>
    <button data-idpelicula="<?=$fila->idPelicula?>" data-pagin="{$_GET['num']}" data-pagina="<?=$numero?>" data-tipo="<?=$tipo?>" type="button" id="detalle">  <span class="glyphicon glyphicon-search"></span>ver detalle</button>
     <?php
    } 
     ?>
     </div>
        
     <div class="paginas">
        <?php
     
        //mostrar grupos de paginas
        if($totalPaginas<5){
            for($i=1; $i<=$totalPaginas; $i++){
                if($numero==$i){

                    $activado =  "activado1";
                } else{

                    $activado =  "enlace1";
                }
                echo "<div id='enlace11' class ='{$activado}' data-num={$numero} data-page={$i}>".$i."</div>";
                }
        } elseif($numero<=3 && $totalPaginas>=5 ){
            for($i=1; $i<=5; $i++){
                if($numero==$i){

                    $activado =  "activado1";
                } else{

                    $activado =  "enlace1";
                }
                echo "<div  id='enlace11' class ='{$activado}' data-num={$numero} data-page={$i}>".$i."</div>";
            }
        } elseif ($numero>3 && $numero<=$totalPaginas-2) {
            $sumando = -2;
            for($i=1; $i<=5; $i++){
                $pagina=$numero+$sumando;
                if($numero==$pagina){

                    $activado =  "activado1";
                } else{

                    $activado =  "enlace1";
                }
                echo "<div id='enlace11'  class ='{$activado}'  data-num={$numero} data-page={$pagina}>".$pagina."</div>";
                $sumando++;
            }
        } else {
            $sumando = -2;
            $grupoFinal = $totalPaginas - 2;
            for($i=1; $i<=5; $i++){
                $pagina=$grupoFinal+$sumando;
                if($numero==$pagina){

                    $activado =  "activado1";
                } else{

                    $activado =  "enlace1";
                }
                echo "<div  id='enlace11' class ='{$activado}'  data-num={$numero} data-page={$pagina}>".$pagina."</div>";
                $sumando++;
            }
        
        
        }
        echo "pag ".$numero." de ".$totalPaginas;
     
}

}

?>

</div>


