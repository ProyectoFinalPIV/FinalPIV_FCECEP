var dt;

function proveedor(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#fproveedor").serialize();
         $.ajax({
            type:"get",
            url:"../../php/proveedor/controladorProveedor.php",
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
                $("#titulo").html("Listado Proveedores");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#proveedor").removeClass("hide");
                $("#proveedor").addClass("show")
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
              text: "¿Realmente desea borrar el proveedor con codigo : " + codigo + " ?",
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
                        url: "../../php/proveedor/controladorProveedor.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El proveedor con código : ' + codigo + ' fue borrada',
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
        $("#titulo").html("Listado Proveedores");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#proveedor").removeClass("hide");
        $("#proveedor").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })
       //Pendiente por Validar
    $("#contenido").on("click","button#nuevo",function(){
        $("#titulo").html("Nuevo proveedor");
        $("#nuevo-editar" ).load("../../php/proveedor/nuevoProveedor.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#proveedor").removeClass("show");
        $("#proveedor").addClass("hide");
           //Cargar Listado Documento
        $.ajax({
             type:"get",
             url:"../../php/documento/controlador_documento.php",
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
        /* $.ajax({
             type:"get",
             url:"../../php/genero/controlador_genero.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {   
              //console.log(resultado.data)           
              $("#gene_codi option").remove()       
              $("#gene_codi").append("<option selecte value=''>Seleccione un Genero</option>")
              $.each(resultado.data, function (index, value) { 
                $("#gene_codi").append("<option value='" + value.gene_codi + "'>" + value.gene_nomb + "</option>")
              });
           });*/
             //Cargar Listado Ciudad
         $.ajax({
             type:"get",
             url:"../../php/ciudad/controlador_ciudad.php",
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
     var datos=$("#fproveedor").serialize();
       $.ajax({
            type:"get",
            url:"../../php/proveedor/controladorProveedor.php",
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
                $("#titulo").html("Listado Proveedores");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#proveedor").removeClass("hide");
                $("#proveedor").addClass("show")
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
       $("#titulo").html("Editar proveedor");
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
       var documento;
       var genero;
       var ciudad;
        $("#nuevo-editar").load("../../php/proveedor/editarProveedor.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#proveedor").removeClass("show");
        $("#proveedor").addClass("hide");
       $.ajax({
           type:"get",
           url:"../../php/proveedor/controladorProveedor.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( proveedor ) {        
                if(proveedor.respuesta === "no existe"){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'proveedor no existe!!!!!'                         
                    })
                } else {
                    $("#prove_codi").val(proveedor.codigo);
                    documento = proveedor.documento;   //tipo documento
                    $("#docu_codi").val(proveedor.tipo);
                    $("#prove_nomb_comer").val(proveedor.nombre);
                    $("#prove_dir").val(proveedor.direccion);
                    ciudad = proveedor.ciudad;
                    $("#prove_tel").val(proveedor.telefono);
                    $("#prove_repre").val(proveedor.representante);
                }
           });

            //Cargar Listado Documento
           $.ajax({
             type:"get",
             url:"../../php/documento/controlador_documento.php",
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
               //Cargar Listado ciudades
           $.ajax({
             type:"get",
             url:"../../php/ciudad/controlador_ciudad.php",
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
  $("#titulo").html("Listado de Proveedores");
  dt = $("#tabla").DataTable({
        "ajax": "../../php/proveedor/controladorProveedor.php?accion=listar",
        "columns": [
            { "data": "prove_codi"} ,
            { "data": "docu_nomb"} , //tipo documento
            { "data": "docu_codi" },
            { "data": "prove_nomb_comer" },
            { "data": "prove_dir" },
            { "data": "ciudad_nom" },
            { "data": "prove_tel" },
            { "data": "prove_repre" },
            { "data": "prove_codi",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash glyphicon glyphicon-trash "></i></a>' 
                }
            },
            { "data": "prove_codi",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + '" class="btn btn-info btn-sm editar"> <i class="glyphicon glyphicon-edit fa fa-edit"></i></a>';
                }
            }
        ]
  });
  proveedor(); 
});  //codigo listo, falta validar