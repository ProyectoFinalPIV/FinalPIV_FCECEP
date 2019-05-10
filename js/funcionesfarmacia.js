var dt;

function farmacia(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#ffarmacia").serialize();
         $.ajax({
            type:"get",
            url:"../../php/farmacia/controlador_farmacia.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal(
                    'Actualizado!',
                    'Se actualizaron los datos correctamente',
                    'success' //Palabra no modificar(Sale Chulo verde animacion) //Palabra no modificar(Sale Chulo verde animacion)
                )     
                dt.ajax.reload();
                $("#titulo").html("Listado Farmacias");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#farmacia").removeClass("hide");
                $("#farmacia").addClass("show")
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
              text: "¿Realmente desea borrar la farmacia con codigo : " + codigo + " ?",
              type: 'warning',
              //icon: 'warning', //unpkg.com/sweetalert/
              showCancelButton: true,
              //buttons: true,    //unpkg.com/sweetalert/
              confirmButtonColor: '#3085d6',
              //dangerMode: true,   //unpkg.com/sweetalert/
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
              //buttons:'Si, Borrarlo'  //unpkg.com/sweetalert/
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "../../php/farmacia/controlador_farmacia.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'La farmacia con codigo : ' + codigo + ' fue borrada',
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
        $("#titulo").html("Listado Farmacias");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#farmacia").removeClass("hide");
        $("#farmacia").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#nuevo",function(){
        $("#titulo").html("Nueva farmacia");
        $("#nuevo-editar" ).load("../../php/farmacia/nuevo_farmacia.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#farmacia").removeClass("show");
        $("#farmacia").addClass("hide");
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
     var datos=$("#ffarmacia").serialize();
       $.ajax({
            type:"get",
            url:"../../php/farmacia/controlador_farmacia.php",
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
                $("#titulo").html("Listado Farmacias");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#farmacia").removeClass("hide");
                $("#farmacia").addClass("show")
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
       $("#titulo").html("Editar Farmacia");
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
       var ciudad;
        $("#nuevo-editar").load("../../php/farmacia/editar_farmacia.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#farmacia").removeClass("show");
        $("#farmacia").addClass("hide");
       $.ajax({
           type:"get",
           url:"../../php/farmacia/controlador_farmacia.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( farmacia ) {        
                if(farmacia.respuesta === "no existe"){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Farmacia no existe!!!!!'                         
                    })
                } else {
                    $("#farma_codi").val(farmacia.codigo);   //Controlador_famacia linea 53                
                    $("#farma_nomb").val(farmacia.farmacia); //Controlador_famacia linea 54
                    $("#farma_dir").val(farmacia.direccion); //Controlador_famacia linea 55
                    ciudad = farmacia.ciudad;                //Controlador_famacia linea 56
                    $("#farma_tel").val(farmacia.telefono);  //Controlador_famacia linea 57
                    
                }
           });

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
  $("#titulo").html("Listado de Farmacias");
  dt = $("#tabla").DataTable({
        "ajax": "../../php/farmacia/controlador_farmacia.php?accion=listar",
        "columns": [
            { "data": "farma_codi"} ,
            { "data": "farma_nomb" },
            { "data": "farma_dir" },
            { "data": "ciudad_nom"},
            { "data": "farma_tel"},
            /*{ "data": "ciudad_id" ,*/ //en caso que no sea farma_codi
            { "data": "farma_codi" ,
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash glyphicon glyphicon-trash "></i></a>' 
                }
            },
            { "data": "farma_codi",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + '" class="btn btn-info btn-sm editar"> <i class="glyphicon glyphicon-edit fa fa-edit"></i></a>';
                }
            }
        ]
  });
  farmacia();
});