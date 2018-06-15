<?php
 include "conexion.php"; 





 
isset($_GET['operacion']) ? $_GET['operacion']= $_GET['operacion']: $_GET['operacion']="listar";

switch ($_GET['operacion']) {
    case "editar":
         $consulta = "UPDATE usuario SET
         nick = '" . $_GET["nick"] . "',
         email = '" . $_GET["email"] . "',
         nivel = " . $_GET["nivel"] .",
         idUsuario = " . $_GET["idusuario"] ."
        WHERE idUsuario = " . $_GET["idusuario"];
        $lnk->query($consulta);
        require_once("listaru.php");
        break;
        
    case "borrar":
        $consulta ="DELETE FROM usuario
        WHERE idUsuario = ". $_GET["idusuario"];
        $lnk->query($consulta);
        echo "entra borrar";
        require_once("listaru.php");
        
        break;

    default:

        require_once("listaru.php");
        break;
}


?>