




$(document).ready(function() {
 
    $(document).on("change","#sGenero",function(){
    $.get("peli.php", {
                "idtipo":$("#sGenero").val()
            },function(data){
            //Pinta de nuevo la tabla
                $("#listar").html(data);
                
                  
        });//post	

    })

$(document).on("click", "#enlace6",  function (){	
   pagina = $(this).data("page");   
    genero = $("#sGenero").val();
    $.ajax({
        url:"peli.php",
        type:"get",
        data:{numero:pagina,
        idtipo:genero
        },
        success: function(data){
            $("#listar").html(data);
        }
    });//cierro ajax

});//cierro paginacio





$( "#editar" ).dialog({
    autoOpen: false,
    resizable: false,
    modal: true,

    buttons: {

        
   "Guardar": function() {	
    var file_data = $('#foto').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('foto', file_data);
    form_data.append('titulo', $("#titulo").val());
    form_data.append('director', $("#director").val());
    form_data.append('fecha', $("#fecha").val());
    form_data.append('idtipo', $("#egenero").val());
    form_data.append('sinopsis', $("#sinopsis").val());
    form_data.append('operacion', "editar");
    form_data.append('idpelicula', idpelicula);
                          
    $.ajax({
        url: 'peli.php', 
        type: 'post',
        dataType: 'html',
        data: form_data ,                         
        processData:false,
        cache:false,
        contentType: false,
        success: function(data, textStatus, jqXHR){
            $("#listar").html(data);
           
        }
     })	
       /* pagina = $(".enlace").data("num");
        idtgenero =$("#egenero").val();
       editar = "editar";
       console.log(editar);
        $.post("peli.php", {
            "numero":pagina,
            "idpelicula" : idpelicula,
            "titulo" : $("#titulo").val() ,
            "director" : $("#director").val() ,
            "fecha": $("#fecha").val(),
            "idtipo": idtgenero,
            "foto": $("#foto").val(),
            "sinopsis": $("#sinopsis").val(),
            "operacion": editar
        },function(data){		
           		
            $("#listar").html(data);
            
        });//get*/			
        
        
        $(this).dialog( "close" );			
                                        
                },
    
    }

    
});			

$(document).on("click","#editarBoton",function(){
    $(function() {
$( "#editar" ).dialog({
open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog).hide(); }
});
});

//Obtenemos el idinmueble de la fila
idpelicula = $(this).parents("tr").data("idpelicula");
//Para que ponga el campo direccion con su valor
$("#titulo").val($(this).parent().siblings("td.titulo").html());
$("#director").val($(this).parent().siblings("td.director").html());
idtgenero = $(this).parent().siblings("td.lgenero").attr("value");

 document.getElementById("egenero").value=idtgenero;
sinopsis = $(this).data("sinopsis");
$("#sinopsis").val(sinopsis);

$("#fecha").val($(this).parent().siblings("td.fecha").html());

//Muestro el dialogo
$( "#editar").dialog("open");

});	

//añadir un registro

$( "#anadir" ).dialog({
    autoOpen: false,
    resizable: false,
    modal: true,

    buttons: {
		

        "guardar": function() {
            var file_data = $('#afile').prop('files')[0];   
            var form_data = new FormData();                  
            form_data.append('afile', file_data);
            form_data.append('titulo', $("#atitulo").val());
            form_data.append('director', $("#adirector").val());
            form_data.append('fecha', $("#afecha").val());
            form_data.append('idgenero', $("#agenero").val());
            form_data.append('sinopsis', $("#asinopsis").val());
            form_data.append('operacion', "nuevo");
                                  
            $.ajax({
                url: 'peli.php', 
                type: 'post',
                dataType: 'html',
                data: form_data ,                         
                processData:false,
                cache:false,
                contentType: false,
                success: function(data, textStatus, jqXHR){
                    $("#listar").html(data);
                   
                }
             })
             
        $(this).dialog( "close" );												
            },

    "Cancelar": function() {
       
            $(this).dialog( "close" );
       
    }

 }
  

});
$(document).on("click","#anadirBoton",function(){
    $("#formularioanadir")[0].reset();
$( "#anadir").dialog("open");
});	//fin añadir pelicula



//borrar pelicula

$("#borrarpeli").dialog({
    autoOpen: false,
    resizable: false,
    modal: true,
    buttons: {
    //accion de boton borrar
    "Borrar": function() {	
        borrar = "borrar";		
        
        //Ajax con get
        $.post("peli.php", {"idpelicula": idpelicula,
    "operacion":borrar}, function(data,status){				
            $("#pelic_"+idpelicula).fadeOut(100);
        });//cierro get		
        
        //Cerrar la ventana de dialogo				
        $(this).dialog("close");												
    },
    //accion boton cancelar
    "Cancelar": function() {
            //Cerrar la ventana de dialogo
            $(this).dialog("close");
    }
    }//cierro botonnes
});	

//funcion para boton borrar
$(document).on("click","#borrarboton1",function(){

idpelicula = $(this).parents("tr").data("idpelicula");
 $( "#borrarpeli" ).dialog("open");		
});//fin función borrar




//filtrar por titulo
$(document).on("click", "#filtrarTitulo",  function (){	
    genero = $("#sGenero").val();
    pagina = $(".enlace").data("num");

    $.get("peli.php", {
        filtrar : 'pelicula.tituloPelicula',
        idtipo : genero,
        numero:pagina
        },function(data){				
            $("#listar").html(data);
        })//fin metodo get			
                
   

});//cierro filtrar por titulo
//filtrar por director
$(document).on("click", "#filtrarDirector",  function (){	
    genero = $("#sGenero").val();
    pagina = $(".enlace").data("num");

    $.get("peli.php", {
        filtrar : 'pelicula.Director',
        idtipo : genero,
        numero:pagina
        },function(data){				
            $("#listar").html(data);
        })//fin metodo getget			
                
   

});//cierro filtrar por drector



///fin de peliculas


//genero

//paginador
$(document).on("click", ".enlaceg",  function (){	
    pagina = $(this).data("pag");
     $.ajax({
         url:"listarg.php",
         type:"get",
         data:{numero:pagina
         },
         success: function(data){
             $("#listar").html(data);
         }
     });//cierro ajax
    
});//cierro paginacio
    
$(document).on("click", ".enlaceg",  function (){	
    pagina = $(this).data("pag");
     $.ajax({
         url:"listarg.php",
         type:"get",
         data:{numero:pagina
         },
         success: function(data){
             $("#listar").html(data);
         }
     });//cierro ajax
    
});//cierro paginacio
$(document).on("click", ".enlaceu",  function (){	
    pagina1 = $(this).data("page");
     $.ajax({
         url:"listaru.php",
         type:"get",
         data:{numero:pagina1
         },
         success: function(data){
             $("#listar").html(data);
         }
     });//cierro ajax
    
    });//cierro paginacio
    
    
    
    $( "#editarg" ).dialog({
     autoOpen: false,
     resizable: false,
     modal: true,
    
     buttons: {
     "Guardar": function() {		
         pagina = $(".enlaceg").data("num");
         
        
         $.get("gene.php", {
             "numero":pagina,
             "idGenero" : idgenero,
             "genero" : $("#editgenero").val(),
             "operacion" : "editar"
         },function(data){				
             $("#listar").html(data);
             
         })//get			
         
         
         $(this).dialog( "close" );			
                                         
                 },
     
     }
    
     
    });			
    
    $(document).on("click","#editarBotong",function(){
     $(function() {
    $( "#editarg" ).dialog({
    open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog).hide(); }
    });
    });
    
    //Obtenemos el idinmueble de la fila
    idgenero = $(this).parents("tr").data("idgenero");
    //Para que ponga el campo direccion con su valor
    genero = $(this).parents("tr").data("genero");
    
    document.getElementById("editgenero").value=genero;
    
    
    $("#fecha").val($(this).parent().siblings("td.fecha").html());
    
    //Muestro el dialogo
    $( "#editarg").dialog("open");
    
    });	
    
    //añadir un registro
    $( "#anadirg" ).dialog({
     autoOpen: false,
     resizable: false,
     modal: true,
    
     buttons: {
     "guardar": function() {	
         $.get("gene.php", {
           
             genero: $("#ggenero").val(),
             operacion: "nuevo",
         },function(data,status){				
             $("#listar").html(data);
            // $("#formularioanadir")[0].reset();
         })//get			
                 
         $(this).dialog( "close" );												
                 },
     "Cancelar": function() {
        
             $(this).dialog( "close" );
        
     }
    
     
    
     
     }//buttons*/
    });			
    //accion añadir pelicula
    $(document).on("click","#anadirBotong",function(){
     $("#formularioanadirg")[0].reset();
    $( "#anadirg").dialog("open");
    });	//fin añadir pelicula
    
    
    
    //borrar pelicula
    
   $( "#borrarg" ).dialog({
     autoOpen: false,
     resizable: false,
     modal: true,
     buttons: {
     //accion de boton borrar
     "Borrar": function() {			
         //Ajax con get
         $.get("gene.php", {"idgenero":idgenero, "operacion": "borrar"},function(data,status){				
             $("#gene_"+idgenero).fadeOut(500);
         });//cierro get			

         //Cerrar la ventana de dialogo				
         $(this).dialog("close");												
     },
     //accion boton cancelar
     "Cancelar": function() {
             //Cerrar la ventana de dialogo
             $(this).dialog("close");
     }
     }//cierro botonnes
    });	
    
    //funcion para boton borrar
    $(document).on("click","#borrarge",function(){
    
    idgenero = $(this).parents("tr").data("idgenero");
    $( "#borrarg" ).dialog("open");		
    });//fin función borrar
    
   //termino genero
   //empiezo usuarios
   $( "#editaru" ).dialog({
    autoOpen: false,
    resizable: false,
    modal: true,
   
    buttons: {
    "Guardar": function() {		
        pagina = $(".enlaceu").data("num");
        
       
        $.get("usuarios.php", {
            "numero":pagina,
            "idusuario" : idusuario,
            "nick" : $("#nick").val(),
            "email" : $("#email").val(),
            "nivel" : $("#nivel").val(),
            "operacion" : "editar"
        },function(data){				
            $("#listar").html(data);
            
        })//get			
        
        
        $(this).dialog( "close" );			
                                        
                },
    
    }
   
    
   });			
   
   $(document).on("click","#editarBotonu",function(){
    $(function() {
   $( "#editaru" ).dialog({
   open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog).hide(); }
   });
   });
   
   //Obtenemos el idinmueble de la fila
   idusuario = $(this).parents("tr").data("idusuario");
   //Para que ponga el campo direccion con su valor
   nick = $(this).parents("tr").data("nick");
   email = $(this).parents("tr").data("email");
   nivel = $(this).parents("tr").data("nivel");
   
   
   $("#nick").val($(this).parent().siblings("td.nick").html());
   $("#email").val($(this).parent().siblings("td.email").html());
   $("#nivel").val($(this).parent().siblings("td.nivel").html());
   
   //Muestro el dialogo
   $( "#editaru").dialog("open");
   
   });	


   $( "#borraru" ).dialog({
       autoOpen: false,
       resizable: false,
       modal: true,
       buttons: {
       //accion de boton borrar
       "Borrar": function() {			
           //Ajax con get
           $.get("usuarios.php", {"idusuario":idusuario, "operacion": "borrar"},function(data,status){				
               $("#usu_"+idusuario).fadeOut(500);
           });//cierro get			
           //Cerrar la ventana de dialogo				
           $(this).dialog("close");												
       },
       //accion boton cancelar
       "Cancelar": function() {
               //Cerrar la ventana de dialogo
               $(this).dialog("close");
       }
       }//cierro botonnes
      });	
      
      //funcion para boton borrar
      $(document).on("click","#borrarusuario",function(){
      
      idusuario = $(this).parents("tr").data("idusuario");
      
      $( "#borraru" ).dialog("open");		
      });//fin función borrar
//termino usuarios

//controlar validando registro jquery validate

$(function (){

    $("#submit").on("click", function(){

        $("#formuUsua").validate({

            rules:{

                email:{ required:true, minlength:8, maxlength:150},
                nick:{ required:true, minlength:3, maxlength:50},
                contrasena:{ required:true, minlength:6, maxlength:50}
                
            },
                    messages: { 
                        
                        email: {required:'El campo es reuqerido', email: 'El formato es incorrecto',
                                            minlength:'El mínimo de caracteres validos son 8',
                                            maxlength: 'El maximo de caracteres validos son 150'
                            },


                            nick: {required:'El campo es reuqerido', email: 'El formato es incorrecto',
                                            minlength:'El mínimo de caracteres validos son 3',
                                            maxlength: 'El maximo de caracteres validos son 150'
                            },

                            contrasena: {required:'El campo es reuqerido', email: 'El formato es incorrecto',
                                            minlength:'El mínimo de caracteres validos son 6',
                                            maxlength: 'El maximo de caracteres validos son 150'
                            }

                }

            
        });




    });

});

//controlar principal peliculas portada

$(document).on("change","#sGenero1",function(){
    $.get("listarPrincipal.php", {
                "idtipo":$("#sGenero1").val()
            },function(data){
            //Pinta de nuevo la tabla
                $("#listar").html(data);
                
                  
        });//post	

    })


    $(document).on("click", "#enlace11",  function (){	
        pagina = $(this).data("page");   
         genero = $("#sGenero1").val();
         control1 = "control1";
         num = $(this).data("pagin");
         $.ajax({
             url:"listarPrincipal.php",
             type:"get",
             data:{numero:pagina,
             idtipo:genero,
             control1:control1,
             num:num
             },
             success: function(data){
                 $("#listar").html(data);
             }
         });//cierro ajax
     
     });//cierro paginacio


     //paginacion comentarios
     $(document).on("click", "#enlace12",  function (){	
        pagina = $(this).data("page");  
        idpelicula = $(this).data("idpelicula");    
         control = "control";
         num = $(this).data("pagin");  
        
         $.ajax({
             url:"listarPrincipal.php",
             type:"get",
             data:{numero:pagina,
             control:control,
             num:num,
             idpelicula:idpelicula
             },
             success: function(data){
                 $("#listar").html(data);
             }
         });//cierro ajax
     
     });//cierro paginacion

     //paginacion usuarios
     $(document).on("click", "#enlaceu",  function (){	
        pagina = $(this).data("page");   
         $.ajax({
             url:"listaru.php",
             type:"get",
             data:{numero:pagina},
             success: function(data){
                 $("#listar").html(data);
             }
         });//cierro ajax
     
     });//cierro paginacio


     $(document).on("click", "#enlace3",  function (){	
        pagina = $(this).data("page");   
         $.ajax({
             url:"listarg.php",
             type:"get",
             data:{numero:pagina},
             success: function(data){
                 $("#listar").html(data);
             }
         });//cierro ajax
     
     });//cierro paginacio
     
     
    //detalle
     $(document).on("click", "#detalle",  function (){	
        idpelicula= $(this).data("idpelicula");   
         numero = $(this).data("pagina");
         idtipo = $(this).data("tipo");
         control = "control";
         num = $(this).data("pagin");
         $.ajax({
             url:"listarPrincipal.php",
             type:"get",
             data: {numero: numero,
             idtipo: idtipo,
             idpelicula: idpelicula,
             num: num,
             control: control},
             success: function(data){
                 $("#listar").html(data);
                
             }
         });//cierro ajax
     
     });//cierro paginacio

//volver a pagina normal
$(document).on("click", "#detalle1",  function (){	  
     numero = $(this).data("pagina");
     idtipo = $(this).data("tipo");
     num = $(this).data("pagin");
     $.ajax({
         url:"listarPrincipal.php",
         type:"get",
         data:{numero:numero,
         idtipo:idtipo,
         num:num
         

         },
         success: function(data){
             $("#listar").html(data);
         }
     });//cierro ajax
    });//cierro paginacion

    $(document).on("click", "#detalle3",  function (){	
        idpelicula = $(this).data("idpelicula");   
         numero = $(this).data("pagina");
         idtipo = $(this).data("tipo");
         control = "control";
         texto = $("#asinopsis").val();
         comentario = $(this).data("comentario");  
         num = $(this).data("pagin"); 
      
         $.ajax({
             url:"listarPrincipal.php",
             type:"get",
             data: {numero: numero,
             idtipo: idtipo,
             idpelicula: idpelicula,
             control: control,
             texto: texto,
             num: num,
             comentario: comentario },
             success: function(data){
                 $("#listar").html(data);
                
             }
         });//cierro ajax*/
     
     });//cierro paginacio
 

 (function(){
    $("#m").val(' ');
    $("#c").val(' ');
    
})();

});//cierro ready$("#mail").val('');
