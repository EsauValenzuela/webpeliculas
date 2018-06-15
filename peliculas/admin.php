session_start();

}

?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  <!--  <script src="jquery-2.1.4.min.js" ></scrip>-->

    <link rel="stylesheet" type="text/css" href="jquery/css/jquery-ui-1.10.4.custom.css"/>
<script src="jquery/js/jquery-1.10.2.js"></script>
<script src="jquery/js/jquery-ui-1.10.4.custom.js"></script>

<link rel="stylesheet"  type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<!--<script src="bootstrap/js/bootstrap.min.js"></script>-->
<script src="jquery/js/ajax.js"></script>

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
	background-color:#e67e22;
}

.btn-primary{


    background-color:#c0392b;
}
.btn-primary:hover {
    background-color:#2c3e50;

}

th{
	background-color:#CDCDCD;
	padding:5px 0px 5px;
}

.paginas{
	align-items: center;
justify-content: center;	
margin: 10px auto;
display:flex;
}

.enlace2{	
margin: 5px;
border: 1px solid;
width:30px;
height:30px;
margin:10px;
border-radius:100%;
vertical-align: middle;
text-align: center;
background-color:#e67e22;
}

.enlace2:hover{
	background-color:#c0392b;

}

.activado2{	
margin: 5px;
border: 1px solid;
width:30px;
height:30px;
margin:10px;
border-radius:100%;
vertical-align: middle;
text-align: center;
background-color:#2c3e50;
}

.enlace{	
margin: 5px;
border: 1px solid;
width:30px;
height:30px;
margin:10px;
border-radius:100%;
vertical-align: middle;
text-align: center;
background-color:#e67e22;
}

.enlace:hover{
	background-color:#c0392b;

}

.activado{	
margin: 5px;
border: 1px solid;
width:30px;
height:30px;
margin:10px;
border-radius:100%;
vertical-align: middle;
text-align: center;
background-color:#2c3e50;
}


.enlace3{	
margin: 5px;
border: 1px solid;
width:30px;
height:30px;
margin:10px;
border-radius:100%;
vertical-align: middle;
text-align: center;
background-color:#e67e22;
}

.enlace3:hover{
	background-color:#c0392b;

}

.activado3{	
margin: 5px;
border: 1px solid;
width:30px;
height:30px;
margin:10px;
border-radius:100%;
vertical-align: middle;
text-align: center;
background-color:#2c3e50;
}
</style>



<script>
   $(document).ready(function() {
 //menu
 $(document).on("click","#peliculas",function(){
 $.get("listar.php", {
         },function(data){
         //Pinta de nuevo la tabla
             $("#listar").html(data);
             
               
     });
});


$(document).on("click","#generos",function(){
 $.get("listarg.php", {
         },function(data){
         //Pinta de nuevo la tabla
             $("#listar").html(data);
             
               
     });
});


$(document).on("click","#usuarios",function(){
 $.get("listaru.php", {
         },function(data){
         //Pinta de nuevo la tabla
             $("#listar").html(data);
             
               
     });
});



 //fin menu
 //datapicker
 $(function(){
        $("#afecha").datepicker({
        changeMonth:true,
        changeYear:true,
    
        });//cierro picker para anadir
    
        $("#fecha").datepicker({
        changeMonth:true,
        changeYear:true,
    
        });//cierro  picker para editar
    
    
    });//cierro fecha


   




    //ajax para controlar usuario

   
    
    
    
    
  

});//cieero funcion ready jquery.
 </script>

</head>
<body>
<?php


?>


<div class="contenedor">
		<header>
			<div class="logo">
				<img src="imagenes/logo-cine.png" width="150" alt="150">
				<a href="#">MiniCine</a>
			</div>
 
			<nav>
				<a href="index.php">Inicio</a>
				<a href="#">Blog</a>
				<a href="registro.php">registro</a>
				<a href="service.php">webservice</a>
			</nav>
		</header>
 
		<section class="main">
            <div id="listar">
				<?php
			include "listar.php";
			?>
			</div>
			
		</section>
 
		<aside>
			<div class="widget">
           		<div id = "menu">
					<button class="btn btn-primary btn-sm" id="peliculas">peliculas</button><br><br>
					<button class="btn btn-primary btn-sm" id="generos">generos</button><br><br>
					<button class="btn btn-primary btn-sm" id="usuarios">usuarios</button><br><br>
				</div>
			</div>
 
			<div class="widget">
            
			</div>
		</aside>
 
		<footer>
			<section class="links">
				<a href="#">Inicio</a>
				<a href="#">Blog</a>
				<a href="#">Proyectos</a>
				<a href="#">Contacto</a>
			</section>
 
			<div class="social">
				<a href="#">FB</a>
				<a href="#">TW</a>
			</div>
		</footer>
	</div>
<div id="principal">



<!--formularios peliculas-->
	<div id="editar" title="editar pelicula">
	<?php include "formularioEditar.php";?>
	</div>
	<div id="anadir" title="anadir pelicula">
	<?php include "anadirpeliculaformu.php";?>
	</div>
	<div id="borrarpeli" title="borrar pelicula">
	<?php include "borrarpeliculaformu.php";?>
	</div>
	<!--formularios generos-->
	<div id="editarg" title="editar genero">
	<?php include "formularioEditarGenero.php";?>
	</div>
	<div id="anadirg" title="anadir genero">
	<?php include "anadirgeneroformu.php";?>
	</div>
	<div id="borrarg" title="borrar genero">
	<?php include "borrargenero.php";?>
	</div>
	<!--formularios usuarios-->
	<div id="editaru" title="editar usuario">
	<?php include "formularioEditarUsuario.php";?>
	</div>
	<div id="borraru" title="borrar usuario">
	<?php include "borrar.php";?>
	</div>
</div>

</body>
</html>