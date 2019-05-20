var dt;

function producto(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#fproducto").serialize();
         $.ajax({
            type:"get",
            url:"../../php/producto/controladorProducto.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal(
                    'Actualizado!',
                    'Se actaulizaron los datos correctamente',
                    'success'
                )     
                dt.ajax.reload();
                $("#titulo").html("Listado de Productos");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#producto").removeClass("hide");
                $("#producto").addClass("show")
             } else {
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!'                         
                })
            }
        });
    })

    $("#contenido").on("click","a.borrar",function(){
        //Recupera datos del formulario
        var codigo = $(this).data("codigo");

        swal({
              title: '¿Está seguro?',
              text: "¿Realmente desea borrar el producto con codigo : " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "../../php/producto/controladorProducto.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El producto con codigo : ' + codigo + ' fue borrada',
                                'success'
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
        $("#titulo").html("Listado de Productos");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#producto").removeClass("hide");
        $("#producto").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#nuevo",function(){
        $("#titulo").html("Nuevo Producto");
        $("#nuevo-editar" ).load("../../php/producto/nuevoProducto.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#producto").removeClass("show");
        $("#producto").addClass("hide");
         $.ajax({
             type:"get",
             url:"../../php/proveedor/controladorProveedor.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {   
              //console.log(resultado.data)           
              $("#Nit_Prov option").remove()       
              $("#Nit_Prov").append("<option selecte value=''>Seleccione un Proveedor</option>")
              $.each(resultado.data, function (index, value) { 
                $("#Nit_Prov").append("<option value='" + value.Nit_Prov + "'>" + value.Nom_Prov + "</option>")
              });
           });
           $.ajax({
            type:"get",
            url:"../../php/tipoProducto/controladorTipoProducto.php",
            data: {accion:'listar'},
            dataType:"json"
          }).done(function( resultado ) {   
             //console.log(resultado.data)           
             $("#id_tipo_prod option").remove()       
             $("#id_tipo_prod").append("<option selecte value=''>Seleccione Tipo Producto</option>")
             $.each(resultado.data, function (index, value) { 
               $("#id_tipo_prod").append("<option value='" + value.id_tipo_prod + "'>" + value.nom_tipo_prod + "</option>")
             });
          });
    })

    $("#contenido").on("click","button#grabar",function(){
        /*var comu_codi = $("#comu_codi").attr("value");
        var comu_nomb = $("#comu_nomb").attr("value");
        var muni_codi = $("#muni_codi").attr("value");
        var datos = "comu_codi="+comu_codi+"&comu_nomb="+comu_nomb+"&muni_codi="+muni_codi;*/
      
      var datos=$("#fproducto").serialize();
       $.ajax({
            type:"get",
            url:"../../php/producto/controladorProducto.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal(
                    'Grabado!!',
                    'El registro se grabó correctamente',
                    'success'
                )     
                dt.ajax.reload();
                $("#titulo").html("Listado de Productos");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#producto").removeClass("hide");
                $("#producto").addClass("show")
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
       $("#titulo").html("Editar Producto");
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
       var proveedor;
       var tipo;
        $("#nuevo-editar").load("../../php/producto/editarProducto.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#producto").removeClass("show");
        $("#producto").addClass("hide");
       $.ajax({
           type:"get",
           url:"../../php/producto/controladorProducto.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( producto ) {        
                if(producto.respuesta === "no existe"){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Producto no existe!!!!!'                         
                    })
                } else {
                    $("#Id_Producto").val(producto.codigo);                   
                    $("#Nom_Prod").val(producto.nombre);
                    $("#Precio_Prod").val(producto.precio);
                    proveedor = producto.proveedor;
                    tipo = producto.tipo;
                }
           });

           $.ajax({
             type:"get",
             url:"../../php/proveedor/controladorProveedor.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {                     
              $("#prove_codi option").remove();
              $.each(resultado.data, function (index, value) { 
                
                if(proveedor === value.prove_codi){
                  $("#prove_codi").append("<option selected value='" + value.prove_codi + "'>" + value.prove_nomb_comer + "</option>")
                }else {
                  $("#prove_codi").append("<option value='" + value.prove_codi + "'>" + value.prove_nomb_comer + "</option>")
                }
              });
           });    
            
           /*$.ajax({
            type:"get",
            url:"../../php/tipoProducto/controladorTipoProducto.php",
            data: {accion:'listar'},
            dataType:"json"
          }).done(function( resultado ) {                     
             $("#tipo_prod_codi option").remove();
             $.each(resultado.data, function (index, value) { 
               
               if(tipo === value.tipo_prod_codi){
                 $("#tipo_prod_codi").append("<option selected value='" + value.tipo_prod_codi + "'>" + value.tipo_prod_nomb + "</option>")
               }else {
                 $("#tipo_prod_codi").append("<option value='" + value.tipo_prod_codi + "'>" + value.tipo_prod_nomb + "</option>")
               }
             });
          }); */
       })
}

$(document).ready(() => {
  $("#contenido").off("click", "a.editar");
  $("#contenido").off("click", "button#actualizar");
  $("#contenido").off("click","a.borrar");
  $("#contenido").off("click","button#nuevo");
  $("#contenido").off("click","button#grabar");
  $("#titulo").html("Listado de Productos");
  dt = $("#tabla").DataTable({
        "ajax": "../../php/producto/controladorProducto.php?accion=listar",
        "columns": [
            { "data": "produ_codi"} ,
            { "data": "produ_nomb" },
            { "data": "produ_precio" },
            { "data": "produ_stock" },
            { "data": "prove_nomb_comer" },
            { "data": "tipo_prod_nomb" },
            /*{ "data": "produ_codi",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },*/
            { "data": "produ_codi",
                render: function (data) {
                          return '<a href="php/login/login.html" data-codigo="'+ data + '" class="btn btn-success btn-sm login"> <i class="fa fa-shopping-cart"></i></a>';
                }
            }
        ]
  });
  dt = $("#tablaIndex").DataTable({
        "ajax": "php/producto/controladorProducto.php?accion=listar",
        "columns": [
            { "data": "produ_codi"} ,
            { "data": "produ_nomb" },
            { "data": "produ_precio" },
            { "data": "produ_stock" },
            { "data": "prove_nomb_comer" },
            { "data": "tipo_prod_nomb" },
            /*{ "data": "produ_codi",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },*/
            { "data": "produ_codi",
                render: function (data) {
                          return '<a href="php/login/login.html" data-codigo="'+ data + '" class="btn btn-success btn-sm login"> <i class="fa fa-shopping-cart"></i></a>';
                }
            }
        ]
  });
  producto();
});