<?php
session_start();
require_once("conexion.php");
 $contra = $_POST['contra'];
 $email = $_POST['mail'];
$consulogin = "select * from usuario
where email = '{$email}'
 and contrasena='{$contra}' ";

 $res = $lnk->query($consulogin); 
 $numeroderegistros = $res->num_rows;
 $fila = $res->fetch_object();
 

if($numeroderegistros == 1){
        if($fila->nivel==0){
            $_SESSION['sesion']=2;
            $_SESSION['nombre']=$fila->nick;
            $_SESSION['id']=$fila->idUsuario;
            header('location:index.php');
        } else {

            $_SESSION['sesion']=1;
            $_SESSION['nombre']=$fila->nick;
            $_SESSION['id']=$fila->idUsuario;
            header('location:index.php');

        }

} else {

    header('location:index.php');

}

?>