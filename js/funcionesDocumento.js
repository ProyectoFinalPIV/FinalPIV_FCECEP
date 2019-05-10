var dt;

function documento(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#fdocumento").serialize();
         $.ajax({
            type:"get",
            url:"../../php/documento/controlador_documento.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal({
                    title: 'Sweet!',
                    text: 'El registro se grabó correctamente',
                    imageUrl: "../../img/thumbs-up.jpg" //Palabra no modificar(Sale Chulo animacion)
                })
                /*swal(
                    'Actualizado!',
                    'Se actualizaron los datos correctamente',
                    'success' //Palabra no modificar(Sale Chulo animacion)
                ) */    
                dt.ajax.reload();
                $("#titulo").html("Listado Documentos");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#documento").removeClass("hide");
                $("#documento").addClass("show")
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
              text: "¿Realmente desea borrar el documento con codigo : " + codigo + " ?",
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
                        url: "../../php/documento/controlador_documento.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El documento con codigo : ' + codigo + ' fue borrada',
                                'success' //Palabra no modificar(Sale Chulo animacion)
                            )     
                            dt.ajax.reload();                            
                        } else {
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Algo salió mal!'                         
                            })
                        }
                    });
                     
                    request.fail(function( jqXHR, textStatus ) {
                        swal({
                          type: 'error',
                          title: 'Oops...',
                          text: 'Algo salió mal!' + textStatus                          
                        })
                    });
                }
        })

    });

    $("#contenido").on("click","button.btncerrar2",function(){
        $("#titulo").html("Listado Documentos");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#documento").removeClass("hide");
        $("#documento").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#nuevo",function(){
        $("#titulo").html("Nuevo Documento");
        $("#nuevo-editar" ).load("../../php/documento/nuevo_documento.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#documento").removeClass("show");
        $("#documento").addClass("hide");
         /*$.ajax({
             type:"get",
             url:"../../php/pais/controlador_pais.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {   
              //console.log(resultado.data)           
              $("#pais_id option").remove()       
              $("#pais_id").append("<option selecte value=''>Seleccione un pais</option>")
              $.each(resultado.data, function (index, value) { 
                $("#pais_id").append("<option value='" + value.pais_id + "'>" + value.pais_nom + "</option>")
              });
           });*/
    })

    $("#contenido").on("click","button#grabar",function(){
     var datos=$("#fdocumento").serialize();
       $.ajax({
            type:"get",
            url:"../../php/documento/controlador_documento.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                /*swal(
                    'Grabado!!',
                    'El registro se grabó correctamente',
                    'success' //Palabra no modificar(Sale Chulo animacion)
                )*/
                swal({
                    title: 'Sweet!',
                    text: 'El registro  se se se grabó correctamente',
                    imageUrl: "../../img/thumbs-up.jpg" //Palabra no modificar(Sale Chulo animacion)
                })     
                dt.ajax.reload();
                $("#titulo").html("Listado Documentos");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#documento").removeClass("hide");
                $("#documento").addClass("show")
             } else {
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'Algo salió mal!'                         
                })
            }
        });
    });


    $("#contenido").on("click","a.editar",function(){
       $("#titulo").html("Editar Documento");
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
        $("#nuevo-editar").load("../../php/documento/editar_documento.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#documento").removeClass("show");
        $("#documento").addClass("hide");
       $.ajax({
           type:"get",
           url:"../../php/documento/controlador_documento.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( documento ) {        
                if(documento.respuesta === "no existe"){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Documento no existe!!!!!'                         
                    })
                } else {
                    $("#docu_codi").val(documento.codigo);                   
                    $("#docu_nomb").val(documento.documento);
                }
           });
      })
}

$(document).ready(() => {
  $("#contenido").off("click", "a.editar");
  $("#contenido").off("click", "button#actualizar");
  $("#contenido").off("click","a.borrar");
  $("#contenido").off("click","button#nuevo");
  $("#contenido").off("click","button#grabar");
  $("#titulo").html("Listado de Documentos");
  dt = $("#tabla").DataTable({
        "ajax": "../../php/documento/controlador_documento.php?accion=listar",
        "columns": [
            { "data": "docu_codi"} ,
            { "data": "docu_nomb" },
            { "data": "docu_codi",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash glyphicon glyphicon-trash "></i></a>' 
                }
            },
            { "data": "docu_codi",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + '" class="btn btn-info btn-sm editar"> <i class="glyphicon glyphicon-edit fa fa-edit"></i></a>';
                }
            }
        ]
  });
  documento();
});