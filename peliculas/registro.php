<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  <!--  <script src="jquery-2.1.4.min.js" ></scrip>-->
  
    <link rel="stylesheet" type="text/css" href="jquery/css/jquery-ui-1.10.4.custom.css"/>
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>
<script src="jquery/js/ajax.js"></script>
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js">
</script>
<!--<link rel="stylesheet"  type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<script src="bootstrap/js/bootstrap.min.js"></script>-->


    <style type="text/css">


* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

.enlace, .enlaceg, .enlaceu{
        display:inline;
		margin-left:5px;
		
	}
 
.contenedor {
    margin-top:5%;
    margin-left:5%;
	background:#ccc;
	width:90%;
	max-width:1000px;
	/*margin:auto;
 
	/* Flexbox */
	display:flex;
	flex-flow:row wrap;
}
 
body {
	background:#c0392b;
    
}
 
header {
	background:#2c3e50;
	width:100%;
	padding:20px;
 
	/* Flexbox */
	display: flex;
	justify-content:space-between;
	align-items:center;
 
	flex-direction:row;
	flex-wrap:wrap;
}
 
header .logo {
	color:#fff;
	font-size:30px;
}
 
header .logo img {
	width:80px;
	vertical-align: top;
}
 
header .logo a {
	color:#fff;
	text-decoration: none;
	line-height:50px;
}
 
header nav {
	width:50%;
	/* Flexbox */
 
	display:flex;
	flex-wrap:wrap;
	align-items:center;
}
 
header nav a {
	background:#c0392b;
	color:#fff;
	text-align: center;
	text-decoration: none;
	padding:10px;
 
	/* Flexbox */
	flex-grow:1;
}
 
header nav a:hover {
	background:#e74c3c;
}
 
.main {
	background:#fff;
	padding:20px;
 
	flex:1 1 70%;
	/*flex:1;*/
}
 
.main article {
	margin-bottom: 20px;
	padding-bottom:20px;
	border-bottom:1px solid #000;
}
 
.main article:nth-last-child(1){
	margin-bottom: 0;
	padding-bottom: 0;
	border-bottom:none;
}
 
aside {
	background:#e67e22;
	padding:20px;
	/*FLEX*/
	flex:1 1 30%;
	/*flex:0 0 300px;*/
 
	display: flex;
	flex-wrap:wrap;
	flex-direction:column;
	justify-content:flex-start;
}
 
aside .widget {
	background: #d35400;
	height:150px;
	margin:10px;
}
 
footer {
	background:#2c3e50;
	width: 100%;
	padding:20px;
 
	/* Flexbox */
	display: flex;
	flex-wrap:wrap;
	justify-content:space-between;
}
 
footer .links {
	background:#c0392b;
	display:flex;
	flex-wrap:wrap;
}
 
footer .links a {
	flex-grow:1;
 
	color:#fff;
	padding:10px;
	text-align: center;
	text-decoration:none;
}
 
footer .links a:hover {
	background:#E74C3C;
}
 
footer .social {
	background:#e67e22;
}
 
footer .social a {
	color:#fff;
	text-decoration: none;
	padding:10px;
	display: inline-block;
}
 
@media screen and (max-width: 800px) {
	.contenedor {
		flex-direction:column;
	}
 
	header {
		flex-direction:column;
		padding:0;
	}
 
	header .logo {
		margin:20px 0;
	}
 
	header nav {
		width: 100%;
	}
 
	aside {
		flex-direction:row;
		flex:0;
	}
 
	aside .widget {
		flex-grow:1;
	}
}
 
@media screen and (max-width: 600px) {
	aside {
		flex-direction:column;
	}
 
	footer {
		justify-content:space-around;
	}
}
 
h3{
    color:#c0392b;
}

  
	
	td{
	padding:1px 0px 1px;
	background-color:#e67e22;
}

.btn-primary{


    background-color:red;
}
.btn-primary:hover {
    background-color:green;

}

th{
	background-color:#CDCDCD;
	padding:5px 0px 5px;
}
</style>



<script>
   $(document).ready(function() {
 //ajax para controlar validación datos usuario
	
    
    
    
    
  

});//cierro funcion ready jquery.
 </script>

</head>
<body>
<?php
include "conexion.php";

?>


<div class="contenedor">
		<header>
			<div class="logo">
				<img src="imagenes/logo-cine.png" width="150" alt="150">
				<a href="#">MiniCine</a>
			</div>
 
			<nav>
				<a href="index.php">Inicio</a>
				<a href="somos.php">quienes somos</a>
				<a href="registro.php">Registro</a>
				<a href="service.php">webservice</a>
			</nav>
		</header>
 
		<section class="main">
		<?php
		if(!empty($_POST['control'])){
			$email = $_POST['email'];
			$consult = "select * from usuario where email like '{$email}' ";
			$res = $lnk->query($consult); 
			$cantidadEmail = $res->num_rows;
					if($cantidadEmail>0){
						echo "Ya existe un usuario con el mismo email en nuestra base de datos"."<a href='registro.php'>volver</a>";


					} else {

					$nick = $_POST['nick'];
					$email = $_POST['email'];
					$contrasena = $_POST['contrasena'];
					$lnk->query("insert into usuario ( nick, email,  contrasena
					) values ('$nick', '$email', '$contrasena' )");


					echo "usuario introducido correctamente introduzca sus datos en el formulario de login a su dereccha ir a "."<a href='index.php'> principal</a>";
					}
		} else {
			echo ' <div id="formularioUsuario">
			<form method="post" id="formuUsua">
			nick: <br><input type="text" name="nick" value="" /><br><br><br>
			email:<br> <input type="email" id="m" name="email"   autocomplete="new-password" /><br><br><br>
			contraseña:<br> <input type="password" id="c" name="contrasena" autocomplete="new-password"   /><br><br><br>
			<input type="hidden" name="control" value="confi">
			<!--contraseña: <input type="text" name="contrasena"  /><br>-->
		<input type="submit" value="registrarse" id="submit" /><br>
			</form>
			</div>';
		}

			?>	
			
			
		</section>
 
		<aside>
			<div class="widget">
			<?php
			if(isset($_SESSION['sesion'])){
				echo "hola ".$_SESSION['nombre']." bienvenido"."<br>";
				echo "<a href='cerrar.php'>cerrar</a>";
			
			} else { ?>

           <form id="login" method="post" action="login.php" ><br>
		Email: <br>
  <input type="email" name="mail" ><br>
  Contraseña: <br>
  <input type="password" name="contra" autocomplete="new-password"><br>
  <input type="submit" value="Submit">
</form> 
			<?php } ?>
           
			</div>
 
			<div class="widget">
			<?php
			if(isset($_SESSION['sesion']) && $_SESSION['sesion'] ==1){
				echo "<a href='admin.php'>ir a panel de aministracion</a>";
			
			} ?>
            
            
			</div>
		</aside>
 
		<footer>
			<section class="links">
				<a href="index.php">Inicio</a>
				<a href="somos.php">Quienes somos</a>
				<a href="registro.php">Registro</a>
				<a href="#">Contacto</a>
			</section>
 
			<div class="social">
				<a href="#">FB</a>
				<a href="#">TW</a>
			</div>
		</footer>
	</div>
</body>
</html>