<?php include "conexion.php"; 





 
isset($_POST['operacion']) ? $_POST['operacion']= $_POST['operacion']: $_POST['operacion']="listar";

switch ($_POST['operacion']) {
    case "editar":
    if(isset($_FILES['foto'])){
        if ($_FILES['foto']['error']==0) {
            // Donde se va a guardar el fichero (la imagen)
            $nombreTemporal = $_FILES['foto']['tmp_name'];
            $cadena = "abcdefghijklmnopqrstuwwxyzABCDEFGHIJKLMNOPQVWXYZ1234567";
            $longitud = strlen($cadena);
            $archivo = $_FILES['foto']['name'];
            $nombreFinal="i";
            $extension = explode(".",$archivo);
            $ext = $extension[1];//AQUI LA EXTENSION
            for($i=0; $i<=6; $i++){
                $aleatorio = rand(1, $longitud);
                $caracter = substr($cadena, $aleatorio, 1);
                $nombreFinal.= $caracter;
            }
            $nombreFinal.= ".";
            $nombreFinal.= $ext;
            move_uploaded_file($nombreTemporal, 'uploads/'.$nombreFinal);

            $consulta = "UPDATE pelicula SET
            tituloPelicula = '" . $_POST["titulo"] ."',
            fechaPelicula = '" . $_POST["fecha"] ."',
            Director = '" . $_POST["director"] . "',
            sinopsis = '" . $_POST["sinopsis"] . "',
            foto = '" . $nombreFinal. "',
            idGenero = " . $_POST["idtipo"] . "
           WHERE idPelicula = " . $_POST["idpelicula"];
           $lnk->query($consulta);
           require_once("listar.php");

        } 
        
        } else {
 $consulta = "UPDATE pelicula SET
            tituloPelicula = '" . $_POST["titulo"] ."',
            fechaPelicula = '" . $_POST["fecha"] ."',
            Director = '" . $_POST["director"] . "',
            sinopsis = '" . $_POST["sinopsis"] . "',
            idGenero = " . $_POST["idtipo"] . "
           WHERE idPelicula = " . $_POST["idpelicula"];
           $lnk->query($consulta);
           require_once("listar.php");

        }
    
      
       
        break;
        
    case "borrar":
    
        $consulta ="DELETE FROM pelicula
        WHERE idPelicula = ". $_POST["idpelicula"];
        $lnk->query($consulta);
/*require_once("listar.php");*/
    
        break;

    case "nuevo":
     $archivo =  $_FILES['afile'];
    if ($_FILES['afile']['error']==0) {
        // Donde se va a guardar el fichero (la imagen)
        $nombreTemporal = $_FILES['afile']['tmp_name'];
        $cadena = "abcdefghijklmnopqrstuwwxyzABCDEFGHIJKLMNOPQVWXYZ1234567";
        $longitud = strlen($cadena);
        $archivo=$_FILES['afile']['name'];
        $nombreFinal="i";
        $extension = explode(".",$archivo);
        $ext = $extension[1];//AQUI LA EXTENSION
        for($i=0; $i<=6; $i++){
            $aleatorio = rand(1, $longitud);
            $caracter = substr($cadena, $aleatorio, 1);
            $nombreFinal.= $caracter;
        }
        $nombreFinal.= ".";
        $nombreFinal.= $ext;
        move_uploaded_file($nombreTemporal, 'uploads/'.$nombreFinal);
    
    
      
       $sinopsis = $_POST['sinopsis'];
        $titulo = $_POST['titulo'];
        $director = $_POST['director'];
        $fecha = $_POST['fecha'];
        $genero =  $_POST['idgenero'];
        $lnk->query("insert into pelicula (tituloPelicula, fechaPelicula, Director, sinopsis, foto,  idGenero 
        ) values ('$titulo', '$fecha', '$director', '$sinopsis', '$nombreFinal',  $genero)");
    } else{

        $sinopsis = $_POST['sinopsis'];
        $titulo = $_POST['titulo'];
        $director = $_POST['director'];
        $fecha = $_POST['fecha'];
        $genero =  $_POST['idgenero'];
        $lnk->query("insert into pelicula (tituloPelicula, fechaPelicula, Director, sinopsis,   idGenero 
        ) values ('$titulo', '$fecha', '$director', '$sinopsis',  $genero)");




    }
        require_once("listar.php");
        
        break;

    default:

        require_once("listar.php");
        break;
}


?>


