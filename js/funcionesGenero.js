var dt;

function genero(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#fgenero").serialize();
         $.ajax({
            type:"get",
            url:"../../php/genero/controlador_genero.php",
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
                $("#titulo").html("Listado Genero");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#genero").removeClass("hide");
                $("#genero").addClass("show")
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
              text: "¿Realmente desea borrar el genero con codigo : " + codigo + " ?",
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
                        url: "../../php/genero/controlador_genero.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El genero con codigo : ' + codigo + ' fue borrado',
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
        $("#titulo").html("Listado Genero");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#genero").removeClass("hide");
        $("#genero").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#nuevo",function(){
        $("#titulo").html("Nuevo Genero");
        $("#nuevo-editar" ).load("../../php/genero/nuevo_genero.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#genero").removeClass("show");
        $("#genero").addClass("hide");
         /*$.ajax({
             type:"get",
             url:"./php/pais/controlador_pais.php",
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
     var datos=$("#fgenero").serialize();
       $.ajax({
            type:"get",
            url:"../../php/genero/controlador_genero.php",
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
                $("#titulo").html("Listado Genero");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#genero").removeClass("hide");
                $("#genero").addClass("show")
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
       $("#titulo").html("Editar Genero");
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
       /*var pais;*/
        $("#nuevo-editar").load("../../php/genero/editar_genero.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#genero").removeClass("show");
        $("#genero").addClass("hide");
       $.ajax({
           type:"get",
           url:"../../php/genero/controlador_genero.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( genero ) {        
                if(genero.respuesta === "no existe"){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Genero no existe!!!!!'                         
                    })
                } else {
                    $("#gene_codi").val(genero.codigo);                   
                    $("#gene_nomb").val(genero.genero);
                    /*pais = ciudad.pais;*/
                }
           });

          /* $.ajax({
             type:"get",
             url:"./php/pais/controlador_pais.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {                     
              $("#pais_id option").remove();
              $.each(resultado.data, function (index, value) { 
                
                if(pais === value.pais_id){
                  $("#pais_id").append("<option selected value='" + value.pais_id + "'>" + value.pais_nom + "</option>")
                }else {
                  $("#pais_id").append("<option value='" + value.pais_id + "'>" + value.pais_nom + "</option>")
                }
              });
           });  */  
            
       })
}

$(document).ready(() => {
  $("#contenido").off("click", "a.editar");
  $("#contenido").off("click", "button#actualizar");
  $("#contenido").off("click","a.borrar");
  $("#contenido").off("click","button#nuevo");
  $("#contenido").off("click","button#grabar");
  $("#titulo").html("Listado de Genero");
  dt = $("#tabla").DataTable({
        "ajax": "../../php/genero/controlador_genero.php?accion=listar",
        "columns": [
            { "data": "gene_codi"} ,
            { "data": "gene_nomb"} ,
            { "data": "gene_codi",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash glyphicon glyphicon-trash "></i></a>' 
                }
            },
            { "data": "gene_codi",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + '" class="btn btn-info btn-sm editar"> <i class="glyphicon glyphicon-edit fa fa-edit"></i></a>';
                }
            }
        ]
  });
  genero();
});