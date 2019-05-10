var dt;

function pais(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#fpais").serialize();
         $.ajax({
            type:"get",
            url:"../../php/pais/controlador_pais.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal(
                    'Actualizado!',
                    'Se actualizaron los datos correctamente',
                    'success' //Palabra no modificar(Sale Chulo verde animacion)
                )     
                dt.ajax.reload();
                $("#titulo").html("Listado Paises");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#pais").removeClass("hide");
                $("#pais").addClass("show")
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
              text: "¿Realmente desea borrar el pais con codigo : " + codigo + " ?",
              type: 'warning',
              //icon: 'warning', //unpkg.com/sweetalert/
              showCancelButton: true,
              //buttons: true,   //unpkg.com/sweetalert/
              confirmButtonColor: '#3085d6',
              //dangerMode: true, //unpkg.com/sweetalert/
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
              //buttons:'Si, Borrarlo'  //unpkg.com/sweetalert/             
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "../../php/pais/controlador_pais.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El pais con codigo : ' + codigo + ' fue borrado',
                                'success' //Palabra no modificar(Sale Chulo verde animacion)
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
        $("#titulo").html("Listado Paises");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#pais").removeClass("hide");
        $("#pais").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

//Gestión Nuevo País
    $("#contenido").on("click","button#nuevo",function(){
        $("#titulo").html("Nuevo Pais");
        $("#nuevo-editar" ).load("../../php/pais/nuevo_pais.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#pais").removeClass("show");
        $("#pais").addClass("hide");
         $.ajax({
             type:"get",
             url:"../../php/pais/controlador_pais.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {   
              //console.log(resultado.data)           
              /*$("#muni_codi option").remove()       
              $("#muni_codi").append("<option selecte value=''>Seleccione un municipio</option>")
              $.each(resultado.data, function (index, value) { 
                $("#muni_codi").append("<option value='" + value.muni_codi + "'>" + value.muni_nomb + "</option>")
              });*/
           });
    })

    $("#contenido").on("click","button#grabar",function(){
      var datos=$("#fpais").serialize();
       $.ajax({
            type:"get",
            url:"../../php/pais/controlador_pais.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal(
                    'Grabado!!',
                    'El registro se grabó correctamente',
                    'success' //Palabra no modificar(Sale Chulo verde animacion)
                )     
                dt.ajax.reload();
                $("#titulo").html("Listado Paises");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#pais").removeClass("hide");
                $("#pais").addClass("show")
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
       $("#titulo").html("Editar Pais");
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
       /*var municipio;*/
        $("#nuevo-editar").load("../../php/pais/editar_pais.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#pais").removeClass("show");
        $("#pais").addClass("hide");
       $.ajax({
           type:"get",
           url:"../../php/pais/controlador_pais.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( pais ) {        
                if(pais.respuesta === "no existe"){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'País no existe!!!!!'                         
                    })
                } else {
                    $("#pais_id").val(pais.codigo);                   
                    $("#pais_nom").val(pais.pais);
                    /*municipio = pais.municipio;*/
                }
           });

           $.ajax({
             type:"get",
             url:"../../php/pais/controlador_pais.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {                     
              $("#pais_id option").remove();
              $.each(resultado.data, function (index, value) { 
                
                /*if(pais === value.pais_id){
                  $("#pais_id").append("<option selected value='" + value.pais_id + "'>" + value.pais_nom + "</option>")
                }else {
                  $("#pais_id").append("<option value='" + value.pais_id + "'>" + value.pais_nom + "</option>")
                }*/
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
  $("#titulo").html("Listado de Paises");
  dt = $("#tabla").DataTable({
        "ajax": "../../php/pais/controlador_pais.php?accion=listar",
        "columns": [
            { "data": "pais_id"} ,
            { "data": "pais_nom" },
            { "data": "pais_id",
                render: function (data) {
                  return '<a href="#" data-codigo="' + data + '" class="btn btn-danger btn-sm borrar"> <i class="glyphicon glyphicon-trash fa fa-trash"></i></a>' 
                }
            },
            { "data": "pais_id",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit glyphicon glyphicon-edit"></i></a>';
                }
            }
        ]
  });
  pais();
});