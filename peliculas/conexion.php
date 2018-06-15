<?php
 $lnk = new mysqli("localhost", "root", "");

 if($lnk->connect_errno){
    echo "no se ha podido conectar al servidor.<br>";
    die ("**Error: ".$lnk->connect_error);
}
$lnk->select_db("peliculas");
$lnk->set_charset("utf8");
/*
$lnk = new mysqli("localhost", "id6154944_esau", "hojita76");

 if($lnk->connect_errno){
    echo "no se ha podido conectar al servidor.<br>";
    die ("**Error: ".$lnk->connect_error);
}
$lnk->select_db("id6154944_peliculas");
$lnk->set_charset("utf8");

*/
?>