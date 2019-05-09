var dt;

function cliente(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#fcliente").serialize();
         $.ajax({
            type:"get",
            url:"php/cliente/controlador_cliente.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal(
                    'Actualizado!',
                    'Se actualizaron los datos correctamente',
                    'success' //Palabra no modificar(Sale Chulo animacion)
                )     
                dt.ajax.reload();
                $("#titulo").html("Listado Clientes");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#cliente").removeClass("hide");
                $("#cliente").addClass("show")
             } else {
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'Algo salió mal!'                         
                })
            }
        });
    })

    $("#contenido").on("click","a.borrar",function(){
        //Recupera datos del formulario
        var codigo = $(this).data("codigo");

        swal({
              title: '¿Está seguro?',
              text: "¿Realmente desea borrar el cliente con codigo : " + codigo + " ?",
              type: 'warning',
              //icon: 'warning',  //unpkg.com/sweetalert/
              showCancelButton: true,
              //buttons: true,   //unpkg.com/sweetalert/
              confirmButtonColor: '#3085d6',
              //dangerMode: true,  //unpkg.com/sweetalert/
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
              //buttons:'Si, Borrarlo' //unpkg.com/sweetalert/
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "php/cliente/controlador_cliente.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El cliente con código : ' + codigo + ' fue borrada',
                                'success' //Palabra no modificar(Sale Chulo animacion)
                            )     
                            dt.ajax.reload();                            
                        } else {
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Something went wrong!'                         
                            })
                        }
                    });
                     
                    request.fail(function( jqXHR, textStatus ) {
                        swal({
                          type: 'error',
                          title: 'Oops...',
                          text: 'Something went wrong!' + textStatus                          
                        })
                    });
                }
        })

    });

    $("#contenido").on("click","button.btncerrar2",function(){
        $("#titulo").html("Listado Clientes");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#cliente").removeClass("hide");
        $("#cliente").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })
       //Pendiente por Validar
    $("#contenido").on("click","button#nuevo",function(){
        $("#titulo").html("Nuevo Cliente");
        $("#nuevo-editar" ).load("php/cliente/nuevo_cliente.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#cliente").removeClass("show");
        $("#cliente").addClass("hide");
           //Cargar Listado Documento
        $.ajax({
             type:"get",
             url:"php/documento/controlador_documento.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {   
              //console.log(resultado.data)           
              $("#docu_codi option").remove()       
              $("#docu_codi").append("<option selecte value=''>Seleccione un tipo de Documento</option>")
              $.each(resultado.data, function (index, value) { 
                $("#docu_codi").append("<option value='" + value.docu_codi + "'>" + value.docu_nomb + "</option>")
              });
           });
            //Cargar Listado Genero
         $.ajax({
             type:"get",
             url:"php/genero/controlador_genero.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {   
              //console.log(resultado.data)           
              $("#gene_codi option").remove()       
              $("#gene_codi").append("<option selecte value=''>Seleccione un Genero</option>")
              $.each(resultado.data, function (index, value) { 
                $("#gene_codi").append("<option value='" + value.gene_codi + "'>" + value.gene_nomb + "</option>")
              });
           });
             //Cargar Listado Documento
         $.ajax({
             type:"get",
             url:"php/ciudad/controlador_ciudad.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {   
              //console.log(resultado.data)           
              $("#ciudad_id option").remove()       
              $("#ciudad_id").append("<option selecte value=''>Seleccione una ciudad</option>")
              $.each(resultado.data, function (index, value) { 
                $("#ciudad_id").append("<option value='" + value.ciudad_id + "'>" + value.ciudad_nom + "</option>")
              });
           });
    })

    $("#contenido").on("click","button#grabar",function(){
     var datos=$("#fcliente").serialize();
       $.ajax({
            type:"get",
            url:"php/cliente/controlador_cliente.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal(
                    'Grabado!!',
                    'El registro se grabó correctamente',
                    'success' //Palabra no modificar(Sale Chulo animacion)
                )     
                dt.ajax.reload();
                $("#titulo").html("Listado Clientes");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#cliente").removeClass("hide");
                $("#cliente").addClass("show")
             } else {
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!'                         
                })
            }
        });
    });


    $("#contenido").on("click","a.editar",function(){
       $("#titulo").html("Editar Cliente");
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
       var documento;
       var genero;
       var ciudad;
        $("#nuevo-editar").load("php/cliente/editar_cliente.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#cliente").removeClass("show");
        $("#cliente").addClass("hide");
       $.ajax({
           type:"get",
           url:"php/cliente/controlador_cliente.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( cliente ) {        
                if(cliente.respuesta === "no existe"){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Cliente no existe!!!!!'                         
                    })
                } else {
                    $("#cliente_codi").val(cliente.codigo);
                    $("#cliente_cedula").val(cliente.cedula);
                    documento = cliente.documento;
                    /*$("#docu_codi").val(cliente.documento);*/
                    genero = cliente.genero;
                    /*$("#gene_codi").val(cliente.genero); */                  
                    $("#cliente_nomb").val(cliente.nombre);
                    $("#cliente_apel").val(cliente.p_apellido);
                    $("#cliente_apel2").val(cliente.s_apellido);
                    $("#cliente_fec_nac").val(cliente.fnaci);
                    $("#cliente_tel").val(cliente.telefono);
                    $("#cliente_cel").val(cliente.celular);
                    $("#cliente_dir").val(cliente.direccion);    
                    ciudad = cliente.ciudad;
                }
           });

            //Cargar Listado Documento
           $.ajax({
             type:"get",
             url:"php/documento/controlador_documento.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {                     
              $("#docu_codi option").remove();
              $.each(resultado.data, function (index, value) { 
                
                if(ciudad === value.docu_codi){
                  $("#docu_codi").append("<option selected value='" + value.docu_codi + "'>" + value.docu_nomb + "</option>")
                }else {
                  $("#docu_codi").append("<option value='" + value.docu_codi + "'>" + value.docu_nomb + "</option>")
                }
              });
           }); 

               //Cargar Listado Generos
           $.ajax({
             type:"get",
             url:"php/genero/controlador_genero.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {                     
              $("#gene_codi option").remove();
              $.each(resultado.data, function (index, value) { 
                
                if(genero === value.gene_codi){
                  $("#gene_codi").append("<option selected value='" + value.gene_codi + "'>" + value.gene_nomb + "</option>")
                }else {
                  $("#gene_codi").append("<option value='" + value.gene_codi + "'>" + value.gene_nomb + "</option>")
                }
              });
           });
               //Cargar Listado ciudades
           $.ajax({
             type:"get",
             url:"php/ciudad/controlador_ciudad.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {                     
              $("#ciudad_id option").remove();
              $.each(resultado.data, function (index, value) { 
                
                if(ciudad === value.ciudad_id){
                  $("#ciudad_id").append("<option selected value='" + value.ciudad_id + "'>" + value.ciudad_nom + "</option>")
                }else {
                  $("#ciudad_id").append("<option value='" + value.ciudad_id + "'>" + value.ciudad_nom + "</option>")
                }
              });
           }); 

             
            
       })
}

$(document).ready(() => {
  $("#contenido").off("click", "a.editar");
  $("#contenido").off("click", "button#actualizar");
  $("#contenido").off("click","a.borrar");
  $("#contenido").off("click","button#nuevo");
  $("#contenido").off("click","button#grabar");
  $("#titulo").html("Listado de Clientes");
  dt = $("#tabla").DataTable({
        "ajax": "php/cliente/controlador_cliente.php?accion=listar",
        "columns": [
            { "data": "cliente_codi"} ,
            { "data": "cliente_cedula"} ,
            { "data": "docu_nomb"} , //tipo documento
            { "data": "gene_nomb"} ,
            { "data": "cliente_nomb" },
            { "data": "cliente_apel" },
            { "data": "cliente_apel2" },
            { "data": "cliente_fec_nac" },
            { "data": "cliente_tel" },
            { "data": "cliente_cel" },
            { "data": "cliente_dir" },
            { "data": "ciudad_nom" },
            { "data": "cliente_codi",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash glyphicon glyphicon-trash "></i></a>' 
                }
            },
            { "data": "cliente_codi",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + '" class="btn btn-info btn-sm editar"> <i class="glyphicon glyphicon-edit fa fa-edit"></i></a>';
                }
            }
        ]
  });
  cliente(); 
});  //codigo listo, falta validar