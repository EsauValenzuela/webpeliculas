<?php include "conexion.php"; 





 
isset($_GET['operacion']) ? $_GET['operacion']= $_GET['operacion']: $_GET['operacion']="listar";

switch ($_GET['operacion']) {
    case "editar":
         $consulta = "UPDATE genero SET
         genero = '" . $_GET["genero"] . "'
        WHERE idGenero = " . $_GET["idGenero"];
        $lnk->query($consulta);
        require_once("listarg.php");
        
        break;
        
    case "borrar":
        $consulta ="DELETE FROM genero
        WHERE idGenero = ". $_GET["idgenero"];
        $lnk->query($consulta);
        require_once("listarg.php");
        
        break;

    case "nuevo":
       
        $genero =  $_GET['genero'];
        $lnk->query("insert into genero (genero 
        ) values ('$genero')");
        require_once("listarg.php");
        
        break;

    default:

        require_once("listarg.php");
        break;
}


?>


