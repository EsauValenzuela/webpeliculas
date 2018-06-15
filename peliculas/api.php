<?php
try {
	$lnk = new pdo("mysql:host=localhost;dbname=peliculas","root","");
} catch (PDOException $e) {
	// Si no se ha podido conectar a la base de datos se muestra un mensaje de error
      echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
      die ("Error: " . $e->getMessage());
}
/*try {
	$lnk = new pdo("mysql:host=localhost;dbname=id6154944_peliculas", "id6154944_esau", "hojita76");
} catch (PDOException $e) {
	// Si no se ha podido conectar a la base de datos se muestra un mensaje de error
      echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
	  die ("Error: " . $e->getMessage());
}*/

//Creamos array que contendrá los datos recogidos
$ans = [];

if (isset($_GET['api_key']) && $_GET['api_key'] != "") { // Se comprueba si se ha introducido una api key
	$api_key = $_GET['api_key'];
	//Obtengo el id de usuario de la base de datos del código introducido
	$sql = "SELECT idPelicula from pelicula where MD5(tituloPelicula)='".$api_key."'" ;
	$res = $lnk->query($sql) ;
	    //Si no encuentra el usuario
	    if ($res->rowCount() == 0) {  
	      $ans["exito"] = false ;    
	      $ans["mensaje"] = "No se encuentra el usuario en la base de datos" ;
	      
	    } else { //Si encuentra al usuario
	    	if (isset($_GET['cop']) && $_GET['cop'] != "") { // Se comprueba si se ha introducido un código de operación
	    	$cop = $_GET['cop'] ;
			//$data = $res->fetchAll(PDO::FETCH_ASSOC); // Cogemos el id de pelicula

			$sql = "select tituloPelicula, fechaPelicula, Director from  pelicula where tituloPelicula LIKE '{$cop}' limit 1 ";
			$res1 = $lnk->query($sql);
			if($res1->rowCount()>=1){
				$data = $res1->fetchAll(PDO::FETCH_ASSOC);
				$ans["exito"] = true ;    
				$ans["mensaje"] = "-----" ;
				$ans["data"] = $data;
			


			} else {
				$ans["exito"] = false ;    
				$ans["mensaje"] = "no hay ningun titulo de pelicula llamado asi" ;


			}
			
	    
	
} else { // Si no se ha introducido una api key
	$ans["exito"] = false ;    
    $ans["mensaje"] = "No se ha introducido ninguna api key" ;
		}
	}
}
header("Content-Type: application/json;") ;

	// Pintamos en JSON el array con los datos
	echo json_encode($ans);
